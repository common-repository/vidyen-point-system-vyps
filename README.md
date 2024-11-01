=== VidYen Crypto Reward System ===
Contributors: vidyen, felty, shanevidyen
Donate link: https://www.vidyen.com/donate/
Tags: Rewards, Miner, Crypto, Monero, Adscend, Wannads, mining, WooCommerce, GamiPress, myCred, Bitcoin, credit, wallet
Requires at least: 4.9.8
Tested up to: 5.2.2
Requires PHP: 7.0
Stable tag: 3.0.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Reward users for web mining crypto, watching video ads, or other money making activities on your site.

== Description ==

The VidYen Crypto Reward System allows you to create your own rewards site on WordPress which you can reward users for web mining crypto, watching video ads, or other money making activities on your site.. It supports both Adscend Media, Wannads, and our own VidYen Webminer as methods to monetize sites by allowing users to purchase items off a WooCommerce store or other systems with points earned from doing those activities.

Video: Demo of how the plugin works.

[youtube https://youtu.be/2sxPhd96RpA]

Video: What is a rewards site?

[youtube https://youtu.be/yfV4qN1m0Fs]

This is a multi-part system, similar to WooCommerce, that allows WordPress administrators to track points for rewards using monetization systems. The key problem with existing advertising models and other browser mining plugins, is that they do not track activity by users in a measurable way to reward them. Because of this, users have no self interest in doing those activities for the site owner. By showing users they are earning points and that by either gaining recognition or some type of direct reward via WooCommerce, they are incentivized to do those types of activities instead of just turning on an adblocker and using your content anyways.

Currently, this plugin allows you to create points and assign them to users based off monetization activities such as Adscend Media advertising, Wannads, or even the VidYen VidYen Webminer (adblock  and AV friendly!). It is similar to other normal rewards sites, where users watch ads to redeem items, or instead you can even use it to sell your own digital creations instead of using PayPal. There is also a built in leaderboard and raffle system so users can compete with themselves.

== Features ==

- Point tracking per user
- System to exchange point type for other points (copper => silver => gold)
- Leaderboards
- Raffles
- Public and user logs
- Time based transfers and rewards (i.e. daily or weekly rewards)
- [Adscend Media](https://adscendmedia.com/) API tracking
- [Wannads](https://www.wannads.com/) API tracking
- [AdGate Media](https://adgatemedia.com/) API Tracking
- VidYen Webminer (non-adblock version)
- [WooCommerce Wallet](https://wordpress.org/plugins/woo-wallet/) bridge
- [myCred](https://wordpress.org/plugins/mycred/) bridge
- [Gamipress](https://wordpress.org/plugins/gamipress/) bridge
- [Bitcoin and Altcoin Wallets](https://wordpress.org/plugins/wallets/) (Dashed-Slug) bridge
- [VidYen Video Poker Support](https://www.vidyen.com/product/vidyen-video-poker/)

There are plans to include other monetization systems with more games and other activities for site users. Keep watching!

== Frequently Asked Questions ==

=Can I delete point types?=

No. In order to make a more open and fair system, admins can only change the name and icon of the points rather than allowing the wiping of entire balances. You can simply change the name and then remove all possibility of users interacting with that point type going forward. You cannot wipe the history though.

=Can I delete a point transaction?=

No. In order to have a system similar to a blockchain or a bank ledger, to decrease a user's balance you must have a negative transaction of that point type so everyone can see in the log that the change happened and that there is a history that everyone can see.

=Can I use point types I create with VYPS to give credit to users on WooCommerce?=

Yes. You can install TeraWallet for WooCommerce and use the point transfer shortcode to transfer points at various rates and then the user can use the wallet credit to make purchases.

=Can users transfer points between themselves=

Yes. This has changed in 1.7 as users can now use the Point Exchange short code to transfer points to their referrals.

=Can users buy points directly through WooCommerce?=

No. It was not intended as an RMT or a virtual currency exchange, but if we get enough demand for it, it would not be too hard to add in theory. In the meantime, you could simply sell points in WooCommerce as a virtual item and then manually add them through the admin panel.

=Is there anyway to reward users outside of WooCommerce?=

Yes, with the VidYen Webminer, you can setup up shareholder mining so users get a chance to earn XMR hashes to a specified wallet based on the percentage of the designated points they own.

=My users want their rewards in crypto currency rather than in gift cards and virtual items. Can you add this?=

You can, but you need to setup [Dashed Slug's](https://wordpress.org/plugins/wallets/) wallet which is rather complex and go through the VYPS point exchange through a previously setup bank user to do a user to user off blockchain transfer and then use the aforementioned plugin to do the withdrawal.

=Can I use my own server for the web miner?=

Yes, you can. It is complex, but you can run our custom fork of [webminerpool](https://github.com/VidYen/webminerpool) on a Debian server to track your own hashes. We'd ask for a donation if you need our help with it though. See the VY256 shortcode instructions for details.

=How do I remove the branding?=

There is a pro version plugin you can buy off [VidYen.com](https://vidyen.com) that will turn off the branding when installed. NOTE: You can use the VYPS to earn credits towards its purchase.

=Why postback support not included in base version?=

Unfortunately, postbacks are generally not intended for WordPress so I had to shuffle that part off the official repository and required a bit more work and testing. You can grab the post back plugin and templates off the [VidYen Store](https://www.vidyen.com/product/wannads-postback-plugin/). NOTE: You can use rewards credit earned off the site to purchase or contact us showing you have confirmation of using our referral code with Wannads and we will give you the credit to purchase. (Adscend postback coming down road)

=Why did you remove the throttles and threads on the miner?=

After a long period of user feed back and watching people struggle with the controls, I realized that no one ever used those as the majority of the people who mine for rewards aren't miners or otherwise they would be miners for themselves. The majority of the time they just click one setting every time or they just get confused. It is easier this way trust me.

== Screenshots ==

1. Create your own point types with their own name and icon.
2. You can name the point type anything you would like and use any image that would make a good icon.
3. Admins can manually add point transactions for their users through the WordPress user panel.
4. Using the point transfer shortcodes, users can exchange points at various rates to other points or WooCommerce credit. Also timed rewards buttons!
5. Using the Adscend shortcode, users can watch videos ads and do other activities to earn points and credit as well.
6. Using the VidYen Webminer shortcode, you can avoid adblockers while still having users consent to mining for points.
7. You can use shortcodes to display leaderboards for user rank by point earnings.
8. Or you can display which user owns what percent of the current supply of points.
9. Wannads support included in VYPS 1.9
10. QUADS - The random number generator game, where user can bet points trying to get 4 of a kind to get 10x payout
11. Logs for users to see their history
12. Public logs so all users can see if site is being fair and what other users are doing
13. New updated GUI for the Webminer Setup
14. Payouts handled on actual XMR pool through MoneroOcean.=


== This plugin uses the 3rd party services ==

- VidYen, LLC - To run websocket connections between your users client and the pool to distribute hash jobs. [Privacy Policy](https://www.vidyen.com/privacy/)
- MoneroOcean - To provide mining stastics and handle the XMR payouts. [Privacy Policy](https://moneroocean.stream/#/help/faq)
- Wannads - Offer Walls [Privacy Policy](https://publishers.wannads.com/privacy)
- AdScend Media - Offer Walls [Privacy Policy](https://adscendmedia.com/notices/privacy-policy)
- AdGate Media - Offer Walls [Privacy Policy](https://adgatemedia.com/pp.php)

== Changelog ==

= 3.0.3 =

- Fix: Major bug related to over counting hashes. You should update to this version.
- Update: Wallet link change if you need an exchange.
- Add: Both `[date]` and `[time]` fields added to the Discord hook bot as makes it easier to see logs.

= 3.0.2 =

- Major Fix: Webminer wpdb table will now upgrade correctly
- Major Fix: WooCommerce mode now pays to the smallest unit based on the rounding in WooCommerce settings. ie: 1, 0.01, 0.0001 and so on. Check your hash settings!
- Fix: Removed but that allowed TeraWallet on while Pro Mode was off (Sorry)
- Fix: Fixed issue where current balance was not loading correctly before pushing button
- Update: Brackets removed as no longer needed in this format for better readability


= 3.0.1 =

- Update: Added specific settings to each power level as previous version was unusable to some users.

= 3.0.0 =

- Update: Evolutionary jump to GUI miner.
- Update: New miner more friendly to users and adds points automatically as they are earned.
- Add: New updated Webminer with GUI interface
- Add: Pro mode which has fee of 15 seconds out of 10 minutes to remove branding
- Add: Discord hooks for Webminer in pro mode
- Add: Direct payments to WooCommerce with webminer

= 2.5.1 =

- Add: `pro_mode = woo` will now mine straight to woo wallet.

= 2.5.0 =

- Add: New pro version from webminer that removes branding for a fee use `pro=TRUE` in the `[vyps-256 pro=TRUE]` shortcode
- Add: Icon update for plugin.

= 2.4.3 =

- Fix: VidYen miner redesigned for mobile vs desktop compatibility in stat display.

= 2.4.2 =

- Update: Made functions more compatible with WordPress RTS interface from Github (Yes a VidYen RTS exists)
- Fix: Fixed current user log to not error.
- Add: Added icons to new current user log and public log.
- Add: New shortcodes for these are: `[vidyen-public-log]` and `[vidyen-user-log]`
- Add: Put some tutorial videos on the VidYen miner instructions page on how to make a wallet and how payout works.
- Fix: User logs are fixed under the edit points screen of users on admin panel. (Yeah it took a year no?)
- Add: Embedded the Wannads Tutorial to the menu so won't have to keep copy and pasting it in Discord

= 2.4.1 =

- Fix: Last Transaction bug for Webminer.
- Change: Log for the user has been moved to `[vidyen-user-log start=1 end=20]`. Is more SQL efficient.
- Change: `VY256 Mining` reason changed to `VidYen Webmining`
- Change: Fixed branding references to Tera Wallet from WooWallet after they decided (or were forced) to change names. Everything still worked before this though.

= 2.4.0 =

- Fix: Miner text in progress bars more adaptive to small screens (iPhone 5)
- Add: Adscend redemption says point name rather than just 'points'
- Add: Shortcode to the VidYen Webminer of `effort=10` which makes the effort move more slowly like an XP bar.
- Add: Pico only server. Set shortcode `pico=TRUE`

= 2.3.9 =

- Fix: Point Exchange with two inputs fix.
- Fix: Readme changed to 5.2 compatible
- Fix: Table for reward timers and exchange set to 100% width by default due to the nature of the text.

= 2.3.8 =

- Add: Reward timers with no inputs with a cleaner interface. (I actually needed this for a personal project) `[vidyen-reward-timer outputid=3 outputamount=100 minutes=5]`

= 2.3.7 =

- Add: RPG Fantasy Miner Animations `graphic=fantasy` for peasant miner and `graphc=cyber` for cyber miner.
- Fix: Log pagination fix for those with large amounts of user activity. `pages=25` can set to whatever number you wish for your page.

= 2.3.6 =

- Fix: Console log information should only display in miner when `debug=TRUE` is on reducing memory footprint.
- Fix: Removed error in console about null ago before it has been switched to.
- Change: VidYen Webminer is now referred to VidYen Webminer

= 2.3.5 =

- Add: Leaderboard options for lifetime earnings and not current balance `[vyps-pbe pid=1]`
- Fix: Slider should now be 100% wide on all themes.
- Fix: Miner text should not be off somewhere in right hand side on certain themes. `Again why did no one tell me?`

= 2.3.4 =

- Fix: Graphic minor rotation bug. `Why did no one tell me?`

= 2.3.3 =

- Fix: If mobile is detected with the browser, threads are locked to 2 threads. This has been tested with 7 different phones (Thanks `@Radioactive3D` ) to resolve mobile mining issues on iPhone and Android.
- Fix: CSS fix for VY256 to be more theme compatible
- Add: Shortcode `roundup=TRUE` which rounds up to nearest point as after 1 point as currently you lose hashes in between after the first point you earned (not a default)
- Add: Earned function to allow to show total earned over all time rather than a sum of current. (Useful for book keeping)
- Fix: Logo and branding adjustment. `Why yes its bigger.`
- Fix: Less emphasis on the hash rate as changed wording to 'Effort' and moved the Current Algo to the hash rate bar.

= 2.3.2 =

- Revert: Switched back to hash as core count. Yes, it will make everyone who got used to it angry, but I got push back over shares as it was hard to understand. Use the `marketmult=` to mitigate market price swings and `hash=` for your point per hash rate. I am still working on a better solution.
- Add: More instructions on multi device mining.
- Add: Added device drop down option in consent for multi device miner. You get 6 devices and user must remember it. `multidevice=TRUE`
- Add: If you do not like the client hashes, you can set `clienthashes=none` and it will remove that bar. That bar does show current algo being mined, but sometimes users don't care.

= 2.3.1 =

- Fix: Start button on Vy256 made more theme friendly.
- Fix: Only iOS will have hash reporting fix until WMP is fixed.
- Included valid shares multi. In case one wish a really low point to valid shares ratio or to make it higher.
- Documentation: I included the intended uses of what mining rewards should be. You do not have to take my advice, but if you want to make money, please listen.
- Add: More `debug=true` options. Personally, I think its useful for users to see, but if you do not want them to see too much data. Leave it off except for your test pages.
- Add: Experimental shortcode `marketmulti=0.05` This will take the price of XMR in USD and times it but the market multi and then multiply the valid shares. Have not thoroughly tested!

= 2.3.0 =

- Add: Created login option for ProfileGrid to make it easier for my own test site in login awareness. `[vyps-pg-lg]`
- Add: Also made login option to show image while not logged in. `[vyps-lg-img url=https://vidyen.com/imgage/image.png]`
- Add: To resolve the multi-device mining issue, admins can create a page with `donate=true` attribue and all the mining rewards go to the referral listed.
- Add: VY256 algo miner now shows which algo mining every new job (or in js console)
- Fix: Second point in multi point transfers had a centering issue fixed.
- Fix: Reported of hashes mined on mobile devices have been correct for iOS WASM.
- Change: `[vyps-pe]` will default to `mobile=TRUE` so this may change your site look, but got too many complaints about mobile use and not reading the instructions. Change to `mobile=FALSE` to get legacy.
- Change: (experimental) Added `auto=TRUE` to `[vyps-pe]` which will automatically run the PE, but you can only have one shortcode of PE on that page to work right.
- Change: Improvement of internal APIs to talk to other VidYen plugins.
- Remove: All files related to Coinhive removed as they are shutting down their servers (make sure you get your funds withdrawn if you can)
- Change: Rewards are based on `valid shares` from the MoneroOcean API rather than hashes. Explanation [here](https://www.vidyen.com/319changes)
- Change: VidYen Webminer now has client side tracking after I discovered notgiven688 had them but wasn't documented.

= 2.2.4 =

- Note: Had issues with both VidYen Twitch and Vidhash, you will need to upgrade both of those to 1.1.1
- Fix: Fixed a lot of VidYen Webminer issues and updated code to be compatible with various themes.
- Fix: Resolved the thread issues which would often display incorrectly and now show true thread use.
- Add: Added a message display that was happening in console that lets your user know miner is doing something before report of hashes from MoneroOcean.
- Fix: Resolved issue with custom webminerpool server resulting in index error.


= 2.2.3 =

- Fix: jQuery bug broke threads on certain servers. I would recommend updating to this hot fix.

= 2.2.2 =

- Add: Slider to control CPU throttle on the VidYen Webminer. Should have added it years ago.
- Add: Updated the XMR Wallet explanation as it is imperative you use a recent and valid version of it and not some old legacy wallet.
- Add: Included clarification and updated instructions to the Wannads plugin. The offer wall and post back NEED to be on different pages.
- Add: The usual round of undocumented features for short code options. Say, overriding max settings.
- Add: Addition of Clarion to the server list.
- Change: Default hash per point adjusted to `hash=1000`. If your users complain set back to 1024. (It's arbitrary)
- Change: Thread count no longer goes to 0 as you can set cpu to zero instead.
- Remove: I have removed the Coinhive menu out of anger at them. The shortcodes still work, but I have decided to no longer support them with their abuse of the XMR network.

= 2.2.1 =

- Fix: Fixed missing variable of cookies not being set when logged in for VY256 while `twitch=true` or `youtube=true`
- Add: Shortcode attribute for vy256 added called `password=` so you can set your default MoneroOcean account without having a GPU miner (not documented)

= 2.2.0 =

- Change: Hash tracking is now direct from MoneroOcean rather than VidYen. You should a more accurate hash per point now when it comes to accepted hashes.
- Add: Support for point tracking both [Twitch Player](https://wordpress.org/plugins/vidyen-twitch-player/) and [VidHash](https://wordpress.org/plugins/vidyen-vidhash/) (See each plugins Shortcodes for details after install)
- Add: Dynamic server balancing keeping option to run own webminer pool server.
- Add: Prep to allow different pools.
- Fix: Made Ajax URL names unique to not interfere with other plugins.
- Fix: You can reliably use `server=webminer.moneroocean.stream wsport=443` as a backup now. I would not recommend as default as MO is blocked on many routers, antivirus, and adblockers. Again, you can run your own server if you want or find someone not blocked.

= 2.1.0 =

- Add: Hash per second display on the VidYen Webminer.
- Add: Console log for miner.
- Fix: Documentation updated and checked for grammar

= 2.0.0 =

- Fix: VidYen Webminer has way better hashrate (More of a server side fix)
- Fix: Menu graphics have been made more friendly to WordPress installs that rename their default plugins folder to something other than plugins.
- Fix: Public log for current user fixed (mostly as pagenation does not work). Use: [vyps-pl current=TRUE]
- Add: (MAJOR) RNG QUADS game [vyps-quads pid=4 betbase=100] (Ere we go!)
- Add: Some links to other plugins that VidYen has developed.

= 1.9.0 =

- Add: Basic version of Wannads support. Will only display page and let users earn on your wall for demonstration, but will use postback unless referral is confirmed. Otherwise, will let users use but without point additions. Instructions here [VidYen Store](https://www.vidyen.com/product/wannads-postback-plugin/) how to confirm referral.
- Add: Some Monero Ocean explanations about earnings.
- Add: Balance shortcode has a decimal=(number value). Not really useful as just a placeholder for now.
- Add: `[vyps-pl current=TRUE]` now displays just the current users. Since postback systems take a while to process (which is why I frown on them for game theory), its useful for end user to see their own log.
- Fix: Formatting changes in code. This affects me more than you, but helps with the instructions pages.

= 1.8.3 =

- Add: [Gamipress](https://wordpress.org/plugins/gamipress/) support in [vyps-pe] which is basically the same except you need outputid (as the GamiPress slug name) since GamiPress may have one that more point `[vyps-pe firstid=3 firstamount=1000 outputid=gamiyen outputamount=100 gamipress=true]`
- Add: Created hooks for pro version in case anyone wants to remove branding. See [VidYen Store](https://www.vidyen.com/product/vyps-pro-install/) for details. Will include direct payouts to WW, myCred, and GamiPress.
- Fix: Some Point Exchange grammar adjustments.
- Fix: Removed redundant instruction pages.

= 1.8.2 =

- Add: Functionalization of Point Exchange. Now with 3rd party API abilities
- Add: [myCred](https://wordpress.org/plugins/mycred/) hook into `[vyps-pe]` Point Exchange that allows for Monetization transfer into that. ie `[vyps-pe firstid=3  firstamount=1000 outputamount=100 mycred=true]`

= 1.8.1 =

- Fix: Moved core shortcode instructions to its own page.
- Fix: Balance update in PE during action for Dashed Slug use.
- Fix: Admin log fixed to be manageable for large user bases. (Who would have thought this would be used on sites with thousands of users?)
- Add: Functions moved around to appropriate folders.
- Add: (Major) Streamlined the VidYen Webminer UI to look like an XP bar and to consolidate space and streamline. Feel free to send feedback. Progress bar text colors can be modified via shortcode (see VY256 shortcode page)

= 1.8.0 =

- Note: As of this update, the VY256 Mining server is down pending approval or service provider switch in next 48 hours. See [VidYen Discord](https://discord.gg/6svN5sS) for details.
- Fix: Made it so if Adscend reports a refund that it doesn't double count double negatives.
- Fix: Update server meta for the VidYen Webminer and increase stability of server connection
- Fix: Fix of non-numeric error in VidYen Webminer. It still means an issue is going on the VY256 server side, but will fail a bit more gracefully now.
- Fix: Consent shortcode text= actually works now.
- Fix: Public balance rows= also actually works now so you don't have 10,000 users on a single leaderboard page.
- Add: Localisation options for non-english sites in VidYen Webminer. redeembtn=, startbtn=
- Add: Although should be a pro-feature, added the ability to specify your webminer server if you want to use your own using our [webminerpool](https://github.com/VidYen/webminerpool) fork.
- Add: Put the disclaimer in the consent button so it goes away when clicked. Use shortcode disclaimer= to use a custom version.

= 1.7.3 =

- Fix: Added SQL Fix for leaderboard to show correct rankings and to not include deleted users if still had point balance.
- Fix: Resolved a "Warning: call_user_func_array() expects..." on the user profiles.
- Fix: Some server side fixes on VidYen Webminer for stability.


= 1.7.2 =

- Fix: Raffle ticket purchases not working depending on no one else buying one before you.
- Fix: Added feature that if you want to prevent users to not hit F5 and buy another raffle ticket via refresh=true (off by default as it will break a lot of themes)
- Fix: Removed base vy256.com from the list of fail over servers as no longer used in list.

= 1.7.1 =

- Note: For any sites not able to mine with the new XMR fork with the VidYen Webminer. Delete your browser cache and temp files after updating!
- Add: MoneroOcean worker name now determined by use of site= in the VidYen Webminer. It is now set to 'default' by default.
- Fix: Made it possible to multi-mine with same account using different site= (or you can just transfer using different accounts and refer)
- Fix: Raffles no longer auto buy tickets on post refresh via F5 and clicking yes. (Use raffles if you wish to have high end rewards that no one user can mine on their own)

= 1.7.0 =

- Update: Made VY256 Worker compatible with the October 18th XMR hard fork. This is more complex that this line  of text makes it seem.
- Add: New short code attribute to the Point Exchange with transfer=true so that you change have a point transfer direct to users referral. (I would put it on your referral page) NOTE: Time functions cannot be used with user transfers, so do not use as a daily reward method.
- Add: Halloween skeleton miner graphic to the vy256. Set graphic=3 to display. I did not put into rotation to surprise users in areas that are skeleton adverse.
- Fix: Fixed destination amount format in confirmation pop up in point exchange.


= 1.6.2 =

- Fix: Have functions provided by WooWallet to do the transfers. Everything can go back to normal.
- Fix: Reversion to instructions to using WooWallet.
- Add: You now get emails when you transfer to WooWallet since using API now.
- Add: Have functions to call WooWallet Balance natively but not in use yet as will be put into the regular balance.
- Add: More functions() for other developers to work on. They are in the functions folder in the includes.

= 1.6.1 =

- NOTE: If you need to use the old WooWallet transfer you need to use the old version of WooWallet [older version](https://www.vidyen.com/vyps-woocommerce-wallet/) which still works.
- NOTE: The new [vyps-pe] works fine, but the icons are no longer working, but will come up with our own.
- Add: Some warranty wording.
- Fix: Adjustment of reason for Wallet Payout and other wallet functions to work with older version.

= 1.6.0 =

- Fix: WooCommerce Wallet (semi-hotfix) moved into the point exchange shortcode.
- Syntax:  [vyps-pe firstid=3  firstamount=1000 outputamount=0.01 woowallet=true]
- Add: Removed the "You need to be logged" in on miner as let the admin use their own LG code in native language if need be (This will be done to more things)
- Note: vyps-pt-ww will remain but will be removed eventually as people update their WooWallet version.


= 1.5.11 =

- Add: User request. Added "timebar=yellow" and "workerbar=orange" to the [vyps-vy256] short code. Replace the color with the color of the choice for the bars.
- Executive Decision: Revert to old method of activity bar rather than a counter bar as it felt more alive.

= 1.5.10 =

- Add: VY256 Worker (Miner) now has a progress bar. Two actually like a boss. The yellow is for activity. If it isn't going you may have to refresh. The orange is the steady progress till the point payout which when it gets to 100% will reward the point. It is useful for high hash payout.
- Fix: I raised the default hash payout to 1024 as I believe this reduces the amount of zero by a great abundance. As always you can set with the hash= attribute in the shortcode.
- Some ground work for v2 XMR fork in October.

= 1.5.9 =

- Fix: Miner display issue. When you had really high has to point ratios, it would display 1 before you got there.
- Add: [vyps-ww] can use the same short code attributes as PE now or the old ones so it doesn't break the site when you update. I am going to revisit this and use a different method before bringing it in PE before depreciating vyps-ww to a better method.

= 1.5.8 =

- Revision of the VY256 hash to point method. I have always tried to avoid decimals but it was always pointed out to me that the current system still creates large amount of points and large amounts of digits on both sides of the decimal point get annoying. So going forward, by default the VidYen Webminer will show both hashes and points with the default payout being hashes divided by 256. You can change this ratio by hash=1024 if you want a scale. It will always round down.
- Added ability to have custom urls for the miners. This is undocumented pro level. So feel free to ask me directly if interested.
- Note: I feel the start up of the VY256 a bit clunky in feed back, but I need to get other opinions with the timer.
- Fixes to readme file.
- Dropped the [VYPS] the plugin name to match the repository to see if that fix an ongoing statistics issue.
- Mobile view for the [VYPS-PE] with mobile=true makes it friendly with sites with limited width.
- Fix: Seemed to misspelled height with hight in some of the HTML tables. Corrected.

= 1.5.7 =

- Retro-active version change due to WordPress Repository tracking issues. We now are version 1.0 going forward and we have always been at 1.0 not Oceania.
- [VYPS-PE refer=] fix. If symbol= is called it counts the input point as the refer reward and refer=10 will be the 10% of the firstamount= not the output as that will be in crypto not points and cannot be translated accordingly. Hopefully that will not be confusing.
- Readme now has bullets.
- Fix: Apparently, I did not actually include the vyps_is_refer_func() if you have been getting that error it was undefined.
- NOTE: This update was made with 4 hours of sleep. Let me know if there are any bugs, grammar, or spelling issues.

= 1.5.6 =

- Dashed Slug's wallet integration. Added the ability to use the point exchange to trade points for crypto on Dashed Slug's awesome wallet program. It is a rather complicated process and if you want to use it and cannot figure out how it works, you may have to contact me directly for support. I will make a video tutorial in the near future along with working on better documenation.
- Modified wording as there will be a shift from Coinhive to other miners as they now cost $200 or more to use it. Remember VidYen Webminer is free to use!


= 1.5.5 =

- More referral system additions.
- Added refer= to the [vyps-pe] system to where if they have a referral code entered it gives them points. This way admins can gate in earnings transfers through point exchanges. NOTE: This does not work on WooWallet transfers. Yet... There is a side plan to roll the WW shortcode into the PE one and use short code attribute to specify.
- Created [vyps-refer-bal] which shows log of the points earned by users referrals. NOTE: This is not who has their codes, but had their code and earned them points at some time in the past. You will have to specify the pid= like you would in the public balance.

= 1.5.4 =

- Update to the referral system. More difficult that I expected, but it does more checking and validation of codes and uses a hash system rather than the old method.
- NOTE: If your users started using it (all 9 of you), then they will have to re-update the refer code. That said, the new codes are now and hereby forever the same for each user in perpetuity.
- It is also capitalization sensitive. Just tell them to copy and paste it. I am moving the refer log and exchange bonus to next version. I may allow for a GET update for the code from URL, but it is not that important compared to the other things I need to do.
- Also, some minor wording changes to move away from the use of certain words to better words.

= 1.5.3 =

- Addition of referral system [vyps-refer] short code to display and enter other user's referral codes.
To reward people for referrals, add refer=10 on the [vyps-vy256] short code to give a 10% point award when the referral of that user uses the miner.
- NOTE: I did not add this to other systems, as I would prefer to shuffle people into using the VidYen Webminer. You may reach out to me directly through the usual means if you want it for Adscend or Coinhive.
- Fixed the [vyps-xmr-wallet] order of operations.
- Naming convention changes in function (for those who use the GitHub). Invisible to WordPress repository users.

= 1.5.2 =

- VidYen Webminer focus:
- Miner (minor) counting bug with saying hashes mined but not mined. (I think I have it fixed?)
Executive decision to remove the term "hash" to end user on VidYen Webminer and use whatever the name and icon of the point it pays out to since that is a known. - I don't think end users need to know what a hash was and since it counts rejected hashes off the server, they often earn more points than what shows up on MoneroOcean.
- Added a XMR wallet validation check. Your wallet needs to start with a 4 or 8 and be at least 90 characters. Yeah. I know legacy wallets may be shorter, but you should really be generating new wallets every now and then when they update the Monero CLI.
- Added a 0:60 count down timer so that people have a false sense of something happening when the miner revs up. Unless they have a potato, it will show reward points way before then. It goes away as soon as hashes are worked on. Laggy but one day will have a real budget for resolving this.


= 1.5.1 =

- As requested. We are adding functionality for a pro-version to remove the branding on demand. Contact on Facebook for details as it takes time for Envato approval.
- This has little functionality except some built in ground word for new planned function for new functionality such as referrals and custom miner work.

= 1.4.18 =

- Added percent ownership to leaderboards as percent=yes in the shortcode attribute options. Now you can see percentage of point ownership without pulling out Excel.
- Update to the VY256 instructions, as needed to be more clear on how to use MoneroOcean.
Some minor house cleaning.

= 1.4.17 =

- Addition of "Powered by VYPS" branding to Coinhive and Adscend portions. Again, if you need a pro-version feel free to reach out.

= 1.4.16 =

- Added shortcode so user can store their XMR for the miner share system.
- Added miner shareholders where users can upload their XMR address and based how much they own of a point type they will get their wallet with a weighted roll to be mined too. (A good meta for your users who want to convert other points to mining shareholder to earn actual XMR without having to worry about your site being hacked)
- See VidYen Webminer Shortcode instruction page for details.

= 1.4.15 =

- Updated VidYen Webminer to animate when start button is clicked.
- Various wording fixes. Proofreading. My one weakness.

= 1.4.14 =

- Added new VidYen Webminer graphics. Now goes into rotation between male or female. See VidYen Webminer Shortcode instruction page for options.
- And a 'Powered by VYPS' branding. If it bothers anyone feel free to ask for a pro version or you can edit it our yourself (it is all open source you know)

= 1.4.13 =

- Added timed based transfers for minute, hourly, daily, or weekly rewards with [vyps-pe]
- See shortcode instructions for attributes. Can be used for a liquidity gate if required points set to a value instead of 0.
- [vyps-pe] now automatically can do two inputs or not depending if its added in shortcode.
- NOTE: vyps-pe will be depreciating all point transfer methods in future so vyps-pt, vyps-pt-tbl, and vyps-pt-two will all be going away (someday)
- Also removal of the word points in some areas to make the system more generic if admin wanted to make it crypto or game resource related.

= 1.4.12 =

- Added new shortcode for point transfer using two inputs. [vyps-pt-two]
- Small revisions to point transfer wording.

= 1.4.11 =

- Moved hash and mining server to cloud.vy254.com
- No longer only uses port 80 so less problems with WordPress servers that cannot curl call on custom ports.
- Also added in ability for rollover servers, but no need for now.
- Some minor fixes to miner.
- On server side can spool from instances if there is an outage on the VidYen Webminer.
- Threshold raffle had header updates.
- Executive decision to support MoneroOcean as only supported miner for VY256 due to issues with other pools. (In theory its still possible to use other pools, but you need to run your own server and the code is open source on our Github)

= 1.4.10 =

- Another VidYen Webminer update. NOW with CPU control!
- Also fancy graphical interface update. The old version still exists under vyps-256-debug shortcode.

= 1.4.9 =

- Major VY256 update! NOW with server side hash tracking!
- Does not appear to have problems with uBlock, Brave, or Malwarebytes (Still requires consent!)
- Needs more work such as throttle and CPU control, but under Windows 10 usually only takes up 10% and can be increased by using more than one browser profile.
- Pays to any wallet and currently works with MoneroOcean.stream pool (more pools incoming).
- And some various bug fixes and testing.

= 1.4.6 =

- Added a very experimental mining software that uses VidYen's own pool (thanks to notgiven688 webminer pool Github )
- NOTE: This is VERY experimental. Hashes are tracked client side, so if anyone hacked the post they could in theory add as many points as they want.
- HOWEVER: This appears to not cause any adblockers to have issues nor Malwarebytes to complain. I still require use of the consent button for code to show.
- ALSO NOTE: Since hashes are tracked on the page closing the browser or refreshing the page with something other than the redeem button will cause them not to be awarded. Therefore you should warn them about that.

= 1.4.3 =

- Added a public user balance shortcode so other users can be aware of the balances of other users without having to do manual calculations with the log. (Game theory)

= 1.3.9 =

- Added pagination to the public log as it was getting cumbersome on our own test server. ex: [vyps-pl rows=25 bootstrap=yes]
- Minor bug fixes.
- Prep for public balances and leaderboards.

= 1.3.6 =

- Official release of Threshold Raffle Game via shortcode. (Yes you can use Coinhive to do a RNG raffle now)
- See VYPS menu page instruction on how to implement.
- Minor fixes to formatting.
- Prep for Public Log Pagination system.

= 1.3.3 =

- Emergency hotfix with WP users panel. Nothing to see here.
- Some minor security updates with POST catches.

= 1.2.9 =

- Database fix :NOTE: It says less than 10 active installation on official so I'm taking a gamble that no one needs their tables upgraded. If I'm wrong reach out via support.
- Otherwise you need a fresh install to upgrade.
- Added Threshold Raffle, but no documentation as is Alpha testing. Shortcode is as such: [vyps-tr spid=3 dpid=3 samount=1000 damount=10000 tickets=10]
Otherwise a ton of fixes to the database calls making it more readable.

= 1.2.6 =

- Added support for Adscend and Coinhive API Tracking
Various bug fixes.

= 1.2.4 =

- Official release of base program
- WooCommerce Wallet bridge.
- Multiple point types
- User viewable balances with icons
- Admin option in users to add or subtract points from users
- Public point transaction logo
- Point transfer exchange shortcodes.

== Future Plans ==

WordPress based combat game
Downloadable public log
Online game API transfer system (EVE Online, Aria Online API etc.)
