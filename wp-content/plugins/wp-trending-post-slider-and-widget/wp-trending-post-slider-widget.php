<?php
/**
 * Plugin Name: Trending/Popular Post Slider and Widget
 * Plugin URI: http://www.wponlinesupport.com/
 * Description: Show Trending/Popular post in page and sidebar with slider/Grid block with different designs. 
 * Author: WP Online Support 
 * Version: 1.2.4
 * Author URI: http://www.wponlinesupport.com/
 *
 * @package WordPress
 * @author SP Technolab
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Basic plugin definitions
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
if( !defined( 'WTPSW_VERSION' ) ) {
	define( 'WTPSW_VERSION', '1.2.4' ); // Version of plugin
}
if( !defined( 'WTPSW_DIR' ) ) {
	define( 'WTPSW_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'WTPSW_URL' ) ) {
	define( 'WTPSW_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'WTPSW_META_PREFIX' ) ) {
	define( 'WTPSW_META_PREFIX', '_wtpsw_' ); // Plugin meta prefix
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_load_textdomain() {
	load_plugin_textdomain( 'wtpsw', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

// Action to load plugin text domain
add_action('plugins_loaded', 'wtpsw_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wtpsw_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wtpsw_uninstall');

/**
 * Plugin Activation Function
 * Does the initial setup, sets the default values for the plugin options
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_install(){

	// get settings for the plugin
	$wtpsw_options = get_option( 'wtpsw_options' );
	
	if( empty( $wtpsw_options ) ) { // Check plugin version option

		// set default settings
		wtpsw_default_settings();

		// Update plugin version to option
		update_option( 'wtpsw_plugin_version', '1.1' );
	}

	// Version 1.1
	$plugin_version = get_option('wtpsw_plugin_version');

	if( version_compare( $plugin_version, '1.0', '=' ) && !isset($wtpsw_options['post_types']) ) {
		$wtpsw_options['post_types'][0] = 'post';
		update_option('wtpsw_options', $wtpsw_options);
		update_option( 'wtpsw_plugin_version', '1.1' );
	}

	// Deactivate free version
	if( is_plugin_active('featured-and-trending-post-pro/featured-and-trending-post-pro.php')) {
		add_action('update_option_active_plugins', 'wtpsw_deactivate_version');
	}
}
 
/**
 * Plugin Deactivation Function
 * Delete  plugin options
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_uninstall() {
}

/**
 * Deactivate free plugin
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.2.3
 */
function wtpsw_deactivate_version() {

	if( is_plugin_active('featured-and-trending-post-pro/featured-and-trending-post-pro.php') ) {
		deactivate_plugins('featured-and-trending-post-pro/featured-and-trending-post-pro.php', true);
	}
}

/**
 * Function to display admin notice of activated plugin.
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.2.3
 */
function wtpsw_admin_notice() {

	global $pagenow;

	$dir 				= WP_PLUGIN_DIR . '/featured-and-trending-post-pro/featured-and-trending-post-pro.php';
	$notice_link        = add_query_arg( array('message' => 'wtpsw-plugin-notice'), admin_url('plugins.php') );
	$notice_transient   = get_transient( 'wtpsw_install_notice' );

	// If PRO plugin is active and free plugin exist
	if( $notice_transient == false && $pagenow == 'plugins.php' && file_exists( $dir ) && current_user_can( 'install_plugins' ) ) {
		echo '<div class="updated notice" style="position:relative;">
					<p>
						<strong>'.sprintf( __('Thank you for activating %s', 'wtpsw'), 'Trending/Popular Post Slider and Widget').'</strong>.<br/>
						'.sprintf( __('It looks like you had PRO version %s of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'wtpsw'), '<strong>(<em>Featured and Trending Post Pro</em>)</strong>' ).'
					</p>
					<a href="'.esc_url( $notice_link ).'" class="notice-dismiss" style="text-decoration:none;"></a>
				</div>';
	}
}
add_action( 'admin_notices', 'wtpsw_admin_notice');

// Taking some globals
global $wtpsw_options, $wtpsw_model, $wtpsw_view_by;

// Functions File
require_once(  WTPSW_DIR . '/includes/wtpsw-functions.php' );
$wtpsw_options = wtpsw_get_settings();

// Model Class File
require_once(  WTPSW_DIR . '/includes/class-wtpsw-model.php' );

// Script Class File
require_once(  WTPSW_DIR . '/includes/class-wtpsw-script.php' );

// Admin Class File
require_once(  WTPSW_DIR . '/includes/admin/class-wtpsw-admin.php' );

// Shortcode Class File
require_once(  WTPSW_DIR . '/includes/class-wtpsw-shortcode.php' );

// Public Class File
require_once(  WTPSW_DIR . '/includes/class-wtpsw-public.php' );

// Wigets File
require_once( WTPSW_DIR . '/includes/widgets/class-wtpsw-post-list-widget.php' );

// Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
	require_once( WTPSW_DIR . '/includes/admin/wtpsw-how-it-works.php' );
}