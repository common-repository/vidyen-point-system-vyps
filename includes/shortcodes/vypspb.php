<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Copy of the public log file
//Public balance also functions as leader board
//Curtis made a good leaderboard, but I wrote this from scratch as I needed less arrays and more customization like icons etc. Also I solved the rank problem.
//There is a feature I want to add that shows spending into WooWallet, but I realized it may be undeeded and I'd want to do a different short for that all together
//Either for a expenditure balance or a WW balance itself.

/* Main Public Balance shortcode function */

function vyps_public_balance_func( $atts ) {

	/* Technically users don't have to be logged in
	* Should litterally be the log the admin sees
	* I don't care. Tell users to not put personal identificable
	* information in their user name (referred to PID in the health care industry)
	*/

	//Shortcode stuff
	//I'm going to eventually have site admins set logs for activities like reason etc and the meta fields, but for now.
	$atts = shortcode_atts(
		array(
				'pid' => '1',
				'reason' => '0',
				'rows' => 50,
				'bootstrap' => 'no',
				'userid' => '0',
				'percent' => 'no',
		), $atts, 'vyps-pb' );

	$point_id = $atts['pid'];
	$reason = $atts['reason'];
	$table_row_limit = $atts['rows']; //50 by default
	$user_id = $atts['userid'];
	$boostrap_on = $atts['bootstrap'];
	$percent_toggle = $atts['percent'];

	global $wpdb;
	$table_name_points = $wpdb->prefix . 'vyps_points';
	$table_name_log = $wpdb->prefix . 'vyps_points_log';
	$table_name_users = $wpdb->prefix . 'users';

	//BTW the number of IDs should always match the number of rows, NO EXCEPTIONS. If it doesn't it means the admin deleted a row
	//And that is against the psuedo-blockchain philosophy. //Also it dawned on me I can rewrite the public log here.

	//need to know how many users there are at this point in time.
	$number_of_users_rows_query = "SELECT max( id ) FROM ". $table_name_users;  //checking to see how many users there are on this wp install. BTW not all users will have points.
	$number_of_users_rows = $wpdb->get_var( $number_of_users_rows_query ); //Ok. I realized that not only prepare() doesn't work it, there is no varialbes needed to sanitize as the table name is actually hard coded.

	//$number_of_log_rows = $wpdb->get_var( "SELECT max( id ) FROM $table_name_log" ); //No WHERE needed. All rows. No exceptions
  $number_of_log_rows_query = "SELECT max( id ) FROM ". $table_name_log;  //I'm wondering if a prepare is even needed, but throw it all in.
  $number_of_log_rows = $wpdb->get_var( $number_of_log_rows_query ); //Ok. I realized that not only prepare() doesn't work it, there is no varialbes needed to sanitize as the table name is actually hard coded.

	$amount_of_pages = ceil( $number_of_users_rows / $table_row_limit); //So we know how many rows and we divide it by whatever it is and round up if not even as means maybe like one extra item over?

	//$number_of_point_rows = $wpdb->get_var( "SELECT max( id ) FROM $table_name_points" ); //No WHERE needed. All rows. No exceptions
  $number_of_point_rows_query = "SELECT max( id ) FROM ". $table_name_points;  //I'm wondering if a prepare is even needed, but throw it all in.
  $number_of_point_rows = $wpdb->get_var( $number_of_point_rows_query ); //Same issue as line 33. No real user input involved. Just server variables.

	//This will be set by the rows atts above eventually
	$begin_row = 1;
	$end_row = ''; //Eventually will have admin ability to filter how many rows they see as after 1000 may be intensive

	//Because I'm OCD, I want the icons.
	//$sourceName = $wpdb->get_var( "SELECT name FROM $table_vyps_points WHERE id= '$sourcePointID'" );
	$sourceName_query = "SELECT name FROM ". $table_name_points . " WHERE id= %d"; //I'm not sure if this is resource optimal but it works. -Felty
	$sourceName_query_prepared = $wpdb->prepare( $sourceName_query, $point_id );
	$sourceName = $wpdb->get_var( $sourceName_query_prepared );

	//$sourceIcon = $wpdb->get_var( "SELECT icon FROM $table_vyps_points WHERE id= '$sourcePointID'" );
	$sourceIcon_query = "SELECT icon FROM ". $table_name_points . " WHERE id= %d";
	$sourceIcon_query_prepared = $wpdb->prepare( $sourceIcon_query, $point_id );
	$sourceIcon = $wpdb->get_var( $sourceIcon_query_prepared );

	/* Although normally against totally going programatic. Since I know I'm going to reuse this for the public log I'm going to put the headers into variables */
	/* For public log the user_name should be display name and no need to see the UID and PID */
	$transaction_id = "Transaction ID";
	$rank_label = "Rank";
	$date_label = "Date";
	$display_name_label = "Display Name";
	$user_id_label = "UID";
	$point_type_label = "Point Type";
	$point_id_label = "PID";
	$amount_label = "Amount";
	$reason_label = "Adjustment Reason";

	//this code below checks the gets and determines the page nation
	if (isset($_GET['action'])){

		$page_number = intval(htmlspecialchars($_GET['action']));

	} else{

		$page_number = 1; //Well... Always first.

	}

	//Header output is also footer output if you have not noticed.
	//Also isn't it nice you can edit the format directly instead it all in the array?
	$header_output = "
			<tr>
				<th>$rank_label</th>
				<th>$display_name_label</th>
				<th>$sourceName</th>
			</tr>
	";

	$page_button_output = ''; //Needs a define

	//this is what it's goint to be called
	$table_output = "";

	//Ok I got logic here that I think will work. the > will always be $table_range_stop = $number_of_log_rows - ($number_of_log_rows - $table_row_limit ) or $current_rows_output number.
	//OLD: for ($x_for_count = $number_of_log_rows; $x_for_count > 0; $x_for_count = $x_for_count -1 ) {
	$table_range_start = $number_of_users_rows -( $table_row_limit * ( $page_number - 1 )); //Hrm... This doesn't seem like it will work.
	$table_range_stop = $number_of_users_rows - ($table_row_limit * $page_number); //I'm thinking oddly here but this should be higher.

	//Ok a catch stop for pages with more than 0 items
	if ( $table_range_stop < 1 ){

				$table_range_stop = 1; //If we go below 1, then just hard floor it at 1 as no 0 or negative transaction numbers exists.
	}

	$prior_amount = 0; //I'm throwing this in before the for as had to be initialized somewhere and if you need to mess with it, it's close by.

	//NOTE: I was thinking to myself, one could just do a loop given you know how many users there are, but then, find the order of which one is the max.
	//But I feel like this could be fixed with concatination.
	//Perhaps a find and replace function.

	//I realized we need to get the order of the users. Throw it into an array like  users 1 = 3rd place etc user 2 = 1st place etc
	//And rather than using the x_for_count for the user_id, istead use it fror the rank order (which meants we should maybe do another count method? or not, we could jsut put ranks on top arbitrarily)

	$rank_order_array = 0;
	//This shouldn't be too hard in theory. It's not going to be get gar though. Probaly column and feed into array.
	//$rank_order_array_query = "SELECT sum(points_amount) FROM ". $table_name_log . " WHERE point_id = %d GROUP BY user_id ORDER BY sum(points_amount)"; //This should list users by their sum and order them into an array.
	$rank_order_array_query = "SELECT user_id FROM ". $table_name_log . " WHERE point_id = %d AND EXISTS (SELECT ID FROM ". $table_name_users . " WHERE ID = " . $table_name_log .".user_id) GROUP BY user_id ORDER BY sum(points_amount)"; //actually isn't that more useful to rank user_id by rank?
	$rank_order_array_query_prepared = $wpdb->prepare( $rank_order_array_query, $point_id );
	$rank_order_array = $wpdb->get_col( $rank_order_array_query_prepared ); //Hrm... The vypspb.php is the first time I did a column call as I hate arrays. But here we are.
	$rank_order_array_count = count($rank_order_array); //This maybe useful to know how mnay we had in the rank. Actually why don't we make the for loop use it. Saves us a lot of time.

	//return $rank_order_array_count; // What is this?

	$rank_order_array_count = $rank_order_array_count -1; //Need to start from 0, so down 1.

	//return "The count is ". $rank_order_array_count . "<br>" . $rank_order_array['0'] . "<br>". $rank_order_array['1'] . "<br>". $rank_order_array['2'] . "<br>" . $rank_order_array['3'] . "<br>". $rank_order_array['4']; //testing this. //requires 4 users or gives error

	//NOTE: need a sum of all points of id. So we can get a percent if desired. I could toggle this only percent is called for but totals would be good somewhere. But will deal with that later.
	$total_amount_data_query = "SELECT sum(points_amount) FROM ". $table_name_log . " WHERE point_id = %d";
	$total_amount_data_query_prepared = $wpdb->prepare( $total_amount_data_query, $point_id ); //pulling this from the shortcode atts, by default its 1. Technically it won't work without a coin, but *shrugs*
	$total_amount_data = $wpdb->get_var( $total_amount_data_query_prepared );

	$total_amount_data = intval($total_amount_data); //Got to cram it into an int.

	//Ok. We need to just do an $x_for_count for just all the users. I really doubt you will have more than 1000 users. But we will burn that bridge when we get to it. //NOTE we have burned that bridge as cripto had that many users ergo the new code.
	for ($x_for_count = $rank_order_array_count; $x_for_count >= 0; $x_for_count = $x_for_count - 1 ) { //Let's just use the order array count. How many users could their possibly be? //Apparently a lot. -Felty to itself

		//NOTE: In this method, the $x_for_count is not the actual user id but the rank of the top. To align the user ID, we need to pull it from array.

		$current_ranked_user_id = $rank_order_array[ $x_for_count ]; //It feels like it shoulnd't be that easy beating my head over this for the past 48 hours.

		//This is needed as we need the user name
		//$display_name_data = $wpdb->get_var( "SELECT display_name FROM $table_name_users WHERE id= '$user_id_data'" ); //And this is why I didn't call it the entire row by arrow. We are in 4d with multiple tables
		$display_name_data_query = "SELECT display_name FROM ". $table_name_users . " WHERE id = %d"; //Note: Pulling from WP users table
		$display_name_data_query_prepared = $wpdb->prepare( $display_name_data_query, $current_ranked_user_id );
		$display_name_data = $wpdb->get_var( $display_name_data_query_prepared );

		//there needs to be a rank() function soemwhere.
		//We do need this.
		//$amount_data = $wpdb->get_var( "SELECT points_amount FROM $table_name_log WHERE id= '$x_for_count'" );
    $amount_data_query = "SELECT sum(points_amount) FROM ". $table_name_log . " WHERE user_id = %d AND point_id = %d";
    $amount_data_query_prepared = $wpdb->prepare( $amount_data_query, $current_ranked_user_id, $point_id ); //pulling this from the shortcode atts, by default its 1. Technically it won't work without a coin, but *shrugs*
    $amount_data = $wpdb->get_var( $amount_data_query_prepared );

		$amount_data = intval($amount_data); //need to set this a int and if it's zero then ignore the output. BTW I should put less than, but I think negative numbers and zeroes have their place


		//If the $percent_toggle is set to yes, then we just use the user percentage.
		if ( $percent_toggle == 'yes'){

			//Here is the math for the percent, not needed otherwise, but its best place for it
			$user_percentage = $amount_data / $total_amount_data; //This should return a percentage

			//This way we got a whole user display in percentage. I'll take on the % later.
			$user_percent_whole = intval($user_percentage * 100); //Cram it into an int!

			$amount_data = $user_percent_whole . '%'; //Is that legal? I will make it legal.

		} else {

			//If we don't have a percent, chances are it needs a good formatting. Otherwise, you can't really go above 100 in percent. (In theory! Violation of laws of reality)
			$amount_data = number_format($amount_data); //because I like commas. Moved this up out of the else....

		}


		//Ok going to check to see if the display named returned anything and if now, then blank it out.
		if ( $display_name_data == '' ){

			$current_row_output = ''; //No output if there is no name. Probaly not an amount either.

		} else {

			//$current_amount = $amount_data; //Saving this for comparison. As we know this row is valid we only need to change variable now.
			$display_rank_data = ($rank_order_array_count - $x_for_count) + 1; //Normies don't count start counting at zero.

			$current_row_output = "
				<tr>
					<td>$display_rank_data</td>
					<td>$display_name_data</td>
					<td><img src=\"$sourceIcon\" width=\"16\" hight=\"16\" title=\"$sourceName\"> $amount_data</td>
				</tr>";
		} //END no display of blank data

		//The idea is to check to see if that row should be on the page, if not skip
		//Some magic person manipulation here as we are using the $display_rank_data to acheive this as the other is a bit... off
		if( $display_rank_data <= $table_row_limit ){

			$table_output = $table_output . $current_row_output; //Output row

		}

	} //END FOR

	//simple tables for now.
	return "
		<div class=\"wrap\">
			<table class=\"wp-list-table widefat fixed striped users\">
				$header_output
				$table_output
				$header_output
			</table>
		</div>
	";



}

/*
* Shortcode for the log.
*/

add_shortcode( 'vyps-pb', 'vyps_public_balance_func');
