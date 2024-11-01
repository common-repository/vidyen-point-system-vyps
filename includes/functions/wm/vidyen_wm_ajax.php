<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// For the 3.0 update, I've decided to use a system where it just cashes out every 100,000 hashes
// I need to set the field for hash per point and then a multi-but lets go with it
// -Felty

/*** AJAX TO GRAB HASH PER SECOND FROM MO ***/

// register the ajax action for authenticated users
add_action('wp_ajax_vidyen_wm_api_action', 'vidyen_wm_api_action'); //Commented out as you have to get the  no prov

//register the ajax for non authenticated users
//NOTE: I need to get feed back if nonautheneticaed users should actually be able to use this.
add_action( 'wp_ajax_nopriv_vidyen_wm_api_action', 'vidyen_wm_api_action' );

// handle the ajax request
function vidyen_wm_api_action()
{
  global $wpdb; // this is how you get access to the database

  //NOTE: I do not think there is a need for nonce as no user input to wordpress

  //First things first. Let's pull the variables with a single SQL call
  $vy_wm_parsed_array = vidyen_vy_wm_settings();
  $index = 1; //Lazy coding but easier to copy and paste stuff.

  //I don't think we need anything beyond this fromt the SQL. Its here if we need it though
  $hash_per_point = $vy_wm_parsed_array[$index]['hash_per_point'];
	$point_id = 	$vy_wm_parsed_array[$index]['point_id'];
  $wm_pro_active = $vy_wm_parsed_array[$index]['wm_pro_active']; //Whoops yeah need this
  $wm_woo_active = $vy_wm_parsed_array[$index]['wm_woo_active']; //And these
  $discord_webhook = $vy_wm_parsed_array[$index]['discord_webhook'];
  $discord_text = $vy_wm_parsed_array[$index]['discord_text'];
  $site_name = $vy_wm_parsed_array[$index]['site_name'];

  //This must be active to be active.
  if ($wm_pro_active != 1)
  {
    $wm_woo_active = 0; //slap that down, no WC without pro
    $discord_webhook = ''; //no discord either
    $round_places = 0;
  }
  elseif ($wm_woo_active ==1)
  {
    $site_name = $site_name.'-wc'; //site name should have its own meta fields
    $round_places = intval(get_option( 'woocommerce_price_num_decimals' )); //pulling from woocommerce what the decimal places are options are
  }


  //Kind of dawned on me we don't need to pass the variables via ajax since they are a known.
  $crypto_wallet = $vy_wm_parsed_array[$index]['crypto_wallet'];

  if (!is_user_logged_in())
  {
    $mo_array_server_response = array(
        'site_hashes' => 0,
        'credit_result' => 0,
        'rewarded_hashes' => 0,
        'current_XMRprice' => 0,
    );

    echo json_encode($mo_array_server_response); //Proper method to return json

    wp_die(); // this is required to terminate immediately and return a proper response
  }

  //Compile the worker
  $user_id = get_current_user_id();
  $site_worker = $user_id.'-'.$site_name;

  //Init variables in case not called
  $site_total_hashes = 0;
  $credit_result = 0;
  $rewarded_hashes = 0;
  $current_xmr_price =0;
  $reward_payout = 0;
  $reason = 'WebMining'; //Honestly, I should create a global reason variable but I have deadlines.

  /*** MoneroOcean Gets***/
  //Site get
  $site_url = 'https://api.moneroocean.stream/miner/' . $crypto_wallet . '/stats/' . $site_worker;
  $site_mo_response = wp_remote_get( $site_url );
  if ( is_array( $site_mo_response ) )
  {
    $site_mo_response = $site_mo_response['body']; // use the content
    $site_mo_response = json_decode($site_mo_response, TRUE);
    if (array_key_exists('totalHash', $site_mo_response))
    {
      $site_total_hashes = floatval($site_mo_response['totalHash']); //I'm removing the number format as we need the raw data.
      $site_valid_shares = floatval($site_mo_response['validShares']); //I'm removing the number format as we need the raw data.
      $site_hash_per_second = number_format(intval($site_mo_response['hash2'])); //We already know site total hashes.
      $site_hash_per_second = ' ' . $site_hash_per_second . ' H/s';
    }
    else
    {
      $site_hash_per_second = '';
      $site_total_hashes = 0;
      $site_valid_shares = 0; //Moving to the share system as better to predict payments.
    }
  }

  //Let's get the price of XMR now if we can: I need to really do something with this since I put the effort into finding this out.
  $current_xmr_price = vyps_mo_xmr_usd_api();

  $key = 'vidyen_wm_total_hash'.$site_name; //Sitename must be applied
  $single = TRUE;
  $user_prior_total_hashes = floatval(get_user_meta( $user_id, $key, $single ));

  //Get time stamp
  $date_key = 'vidyen_wm_last_mined_date'.$site_name; //Unique name with -wc at end
  $user_prior_mined_date = floatval(get_user_meta( $user_id, $date_key, $single )); //This will be raw UTC
  $current_mined_date = time();
  $time_difference = $current_mined_date - $user_prior_mined_date;

  //Goign to credit it here. Dev NOTE: I believe that if MO reports wrong there is nothing we can do.
  if(  $site_total_hashes > $user_prior_total_hashes )
  {
    $rewarded_hashes = $site_total_hashes - $user_prior_total_hashes; //Find the different
    $reward_payout = floatval($rewarded_hashes / $hash_per_point);

    //It dawned on me we were getting 0 rewards on occasion wasting stuff
    if ($reward_payout > 0 AND $wm_woo_active == 1)
    {
      $meta_value = $site_total_hashes;
      update_user_meta( $user_id, $key, $meta_value, $prev_value );
      update_user_meta( $user_id, $date_key, $current_mined_date, $prev_value );

      $reward_payout = $reward_payout / pow(10,$round_places); //This should work. 1/100 = 0.01, 1/1000 = 0.001 and so on 10^0 should be 1
      //$reward_payout = round($reward_payout, $round_places ); //In case there is some weird math.
      $credit_result = vyps_ww_point_credit_func( $user_id, $reward_payout, $reason ); //Note no point ID's
    }
    elseif (intval($reward_payout) > 0)
    {
      $meta_value = $site_total_hashes;
      update_user_meta( $user_id, $key, $meta_value, $prev_value );
      update_user_meta( $user_id, $date_key, $current_mined_date, $prev_value );

      $reward_payout = intval($reward_payout);
      //The credit result will now be pushed to the vyps credit.
      $credit_result = vyps_point_credit_func($point_id, $reward_payout, $user_id, $reason);
    }

    if($discord_webhook != '' AND $reward_payout > 0)
    {
      $username = 'Reward Report Bot'; //I need to fix this. Gah!
      $mined_date = date("m/d/Y");
      $mined_time = date("H:i:s");

      //if you can use a discord hook you can learn how to type it in lower case.
      //User name replace.
      $discord_text = str_replace("[user]",vidyen_user_display_name($user_id),$discord_text);

      //Amount replace.
      $discord_text = str_replace("[amount]",$reward_payout,$discord_text);

      //Date replace
      $discord_text = str_replace("[date]",$mined_date,$discord_text);

      //Date replace
      $discord_text = str_replace("[time]",$mined_time,$discord_text);


      $discord_result = vidyen_discord_webhook_func($discord_text, $username, $discord_webhook);
    }
  }
  elseif( $time_difference > 86400 )
  {
    //Ok some developer notes about the above logica
    //This should only fire if the total hashes are not greater than last reported
    //Under normal circumstations they have never mined or worker has been deleted because longer than 24 hours
    //However, it is possible that the MO api is down ergo the worker will come back with the right Hashes
    //As that often the mining pool will still be counting hashes but unlikley that this is ongoing beyond 24 hours.
    //I am trying to visualize a case where the miner mined and then the server crashed or the worker did not get deleted
    //Eventually the above will be positive when worker comes back online (I think. -Felty)
    $meta_value = 0;
    update_user_meta( $user_id, $key, $meta_value, $prev_value );
  }

  //Need an outside to get balance for woo wallet.
  //Thank the gods I got into funcitons
  if($wm_pro_active == 1 AND $wm_woo_active == 1)
  {
    //NOTE: It's going to return the balance with the symbol
    //WHich is controlled by WooCommerce.
    //Mostly a futile effort if I'm the one doing it
    $reward_balance = vyps_ww_point_bal_func($user_id);
    //This is being rather annoying as the WW people never did make this appropriatley
    //$woo_wallet_pull = vyps_ww_point_bal_func($user_id);
    //$reward_balance = str_replace("&#36;","",$woo_wallet_pull); //KIND OF FORGOT IT WAS HTML!

    //$reward_balance = preg_replace('/[^0-9]/', '', $woo_wallet_pull);
    //$reward_balance = preg_replace('/[^0-9.]/','',$woo_wallet_pull);
  }
  else
  {
    $reward_balance = intval(vyps_point_balance_func($point_id, $user_id));
  }

  $mo_array_server_response = array(
      'site_hashes' => $site_total_hashes,
      'reward_payout' => $reward_payout,
      'reward_balance' => $reward_balance,
      'rewarded_hashes' => $rewarded_hashes,
      'current_XMRprice' => $current_xmr_price,
      'site_url' => $site_url,
      'round_place' => $round_places,
  );

  echo json_encode($mo_array_server_response); //Proper method to return json

  wp_die(); // this is required to terminate immediately and return a proper response
}
