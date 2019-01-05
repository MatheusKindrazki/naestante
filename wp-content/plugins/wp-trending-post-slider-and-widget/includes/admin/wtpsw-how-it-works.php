<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Action to add menu
add_action('admin_menu', 'wtpsw_register_design_page');

/**
 * Register plugin design page in admin menu
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0
 */
function wtpsw_register_design_page() {
	add_submenu_page( 'wtpsw-settings', __('Getting Started - WP Trending Post Slider and Widget', 'wtpsw'), __('Getting Started', 'wtpsw'), 'edit_posts', 'wtpsw-help', 'wtpsw_designs_page' );
}

/**
 * Function to display plugin design HTML
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0
 */
function wtpsw_designs_page() { 

	$wpos_feed_tabs = wtpsw_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'how-it-work'; ?>

	<div class="wrap wtpsw-wrap">
		<h2 class="nav-tab-wrapper">
			<?php foreach ($wpos_feed_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array('page' => 'wtpsw-help', 'tab' => $tab_key), admin_url('admin.php') ); ?>
				<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_name; ?></a>
			<?php } ?>
		</h2>

		<div class="wtpsw-tab-cnt-wrp">
			
			<?php if( isset($active_tab) && $active_tab == 'how-it-work' ) {
				wtpsw_howitwork_page();
			} else if( isset($active_tab) && $active_tab == 'plugins-feed' ) {
				echo wtpsw_get_plugin_design( 'plugins-feed' );
			} else {
				echo wtpsw_get_plugin_design( 'offers-feed' );
			} ?>

		</div><!-- end .wtpsw-tab-cnt-wrp -->
	</div><!-- end .wtpsw-wrap -->

<?php }

/**
 * Gets the plugin design part feed
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0
 */
function wtpsw_get_plugin_design( $feed_type = '' ) {

	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : '';

	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}

	// Taking some variables
	$wpos_feed_tabs = wtpsw_help_tabs();
	$transient_key 	= isset($wpos_feed_tabs[$active_tab]['transient_key']) 	? $wpos_feed_tabs[$active_tab]['transient_key'] 	: 'wpfat_' . $active_tab;
	$url 			= isset($wpos_feed_tabs[$active_tab]['url']) 			? $wpos_feed_tabs[$active_tab]['url'] 				: '';
	$transient_time = isset($wpos_feed_tabs[$active_tab]['transient_time']) ? $wpos_feed_tabs[$active_tab]['transient_time'] 	: 172800;
	$cache 			= get_transient( $transient_key );

	if ( false === $cache ) {

		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, $transient_time );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'wtpsw' ) . '</div>';
		}
	}
	return $cache;	
}

/**
 * Function to get plugin feed tabs
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0
 */
function wtpsw_help_tabs() {
	$wpos_feed_tabs = array(
						'how-it-work' 	=> array(
													'name' => __('How It Works', 'wtpsw'),
												),						
						'plugins-feed' 	=> array(
													'name' 				=> __('Our Plugins', 'wtpsw'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/plugins-data.php',
													'transient_key'		=> 'wpos_plugins_feed',
													'transient_time'	=> 172800
												),
						'offers-feed' 	=> array(
													'name'				=> __('Hire Us', 'wtpsw'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/wpos-offers.php',
													'transient_key'		=> 'wpos_offers_feed',
													'transient_time'	=> 86400,
												)
					);
	return $wpos_feed_tabs;
}

/**
 * Function to get 'How It Works' HTML
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0
 */
function wtpsw_howitwork_page() { ?>

	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box .postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.wtpsw-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wtpsw-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
	</style>

	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">

				<!--How it workd HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								
								<h3 class="hndle">
									<span><?php _e( 'How It Works - Display and Shortcode', 'wtpsw' ); ?></span>
								</h3>

								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Getting Started', 'wtpsw'); ?></label>
												</th>
												<td>
													<p><?php _e('Trending Post display most visited post on your website. It works with WordPress default post type.', 'wtpsw'); ?></p>
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('All Shortcodes', 'wtpsw'); ?></label>
												</th>
												<td>
													<span class="wtpsw-shortcode-preview">[wtpsw_popular_post]</span> – <?php _e('Trending Post Slider View', 'wtpsw'); ?></br>
													<span class="wtpsw-shortcode-preview">[wtpsw_carousel]</span> – <?php _e('Trending Post Carousel View', 'wtpsw'); ?></br>
													<span class="wtpsw-shortcode-preview">[wtpsw_gridbox]</span> – <?php _e('Trending Post Gridbox View', 'wtpsw'); ?>
													<br/><br/>
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('Need Support?', 'wtpsw'); ?></label>
												</th>
												<td>
													<p><?php _e('Check plugin document for shortcode parameters and demo for designs.', 'wtpsw'); ?></p> <br/>
													<a class="button button-primary" href="http://docs.wponlinesupport.com/trending-popular-post-slider-and-widget/?utm_source=hp&event=doc" target="_blank"><?php _e('Documentation', 'wtpsw'); ?></a>
													<a class="button button-primary" href="http://demo.wponlinesupport.com/trending-post-demo/?utm_source=hp&event=demo" target="_blank"><?php _e('Demo', 'wtpsw'); ?></a>
												</td>
											</tr>
										</tbody>
									</table>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-body-content -->

				<!--Upgrad to Pro HTML -->
				<div id="postbox-container-1" class="postbox-container">
					
					<div class="metabox-holder wpos-pro-box">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox" style="">
									
								<h3 class="hndle">
									<span><?php _e( 'Upgrate to Pro', 'wtpsw' ); ?></span>
								</h3>
								<div class="inside">
									<ul class="wpos-list">
										<li>40+ stunning and cool designs for Grid, slider, carousel and gridbox</li>
										<li>8 shortcodes</li>
										<li>Visual Composer Page Builder Support</li>
										<li>6 different types of widgets</li>
										<li>Custom post type support</li>
										<li>Display Desired post include and exclude </li>
										<li>Display posts with include categories and exclude categories</li>
										<li>Display posts with particular include author and exclude author</li>
										<li>Custom CSS</li>
										<li>100% Multi language</li>
									</ul>
									<a class="button button-primary wpos-button-full" href="https://www.wponlinesupport.com/wp-plugin/trending-post-slider-widget/?utm_source=hp&event=go_premium" target="_blank"><?php _e('Go Premium ', 'wtpsw'); ?></a>	
									<p><a class="button button-primary wpos-button-full" href="http://demo.wponlinesupport.com/prodemo/pro-featured-and-trending-post/?utm_source=hp&event=pro_demo" target="_blank"><?php _e('View PRO Demo ', 'wtpsw'); ?></a></p>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->

					<div class="metabox-holder wpos-pro-box">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								<h3 class="hndle">
									<span><?php _e('Need PRO Support?', 'wtpsw'); ?></span>
								</h3>
								<div class="inside">
									<p><?php _e('Hire our experts for any WordPress task.', 'wtpsw'); ?></p>
									<p><a class="button button-primary wpos-button-full" href="<?php echo esc_url('https://www.wponlinesupport.com/wordpress-support/?utm_source=hp&event=projobs'); ?>" target="_blank"><?php _e('Know More', 'wtpsw'); ?></a></p>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->

					<!-- Help to improve this plugin! -->
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
									<h3 class="hndle">
										<span><?php _e( 'Help to improve this plugin!', 'wtpsw' ); ?></span>
									</h3>
									<div class="inside">
										<p><?php _e('Enjoyed this plugin? You can help by rate this plugin', 'wtpsw'); ?> <a href="https://wordpress.org/support/plugin/wp-trending-post-slider-and-widget/reviews#new-post" target="_blank"><?php _e('5 stars!', 'wtpsw'); ?></a></p>
									</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-container-1 -->

			</div><!-- #post-body -->
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }