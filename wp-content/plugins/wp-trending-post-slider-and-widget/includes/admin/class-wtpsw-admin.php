<?php
/**
 * Admin Class
 *
 * Handles admin side functionality of plugin
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wtpsw_Admin {

	function __construct() {

		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'wtpsw_register_menu') );

		// Action to add admin menu
		add_action( 'admin_menu', array($this, 'wtpsw_register_extra_menu'), 12 );

		// Action to register plugin settings
		add_action ( 'admin_init', array($this,'wtpsw_admin_processes') );
	}

	/**
	 * Function to register admin menus
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_register_menu() {
		add_menu_page ( __('Trending Post', 'wtpsw'), __('Trending Post', 'wtpsw'), 'manage_options', 'wtpsw-settings', array($this, 'wtpsw_settings_page'), 'dashicons-star-filled' );
	}
	
	function wtpsw_register_extra_menu() {

		// Register plugin premium page
		add_submenu_page( 'wtpsw-settings', __('Upgrade to PRO - Trending/Popular Post Slider and Widget', 'wtpsw'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'wtpsw').'</span>', 'manage_options', 'wtpsw-premium', array($this, 'wtpsw_premium_page') );

		// Register plugin hire us page
		add_submenu_page( 'wtpsw-settings', __('Hire Us', 'wtpsw'), '<span style="color:#2ECC71">'.__('Hire Us', 'wtpsw').'</span>', 'manage_options', 'wtpsw-hireus', array($this, 'wtpsw_hireus_page') );
	}

	/**
	 * Function to handle the setting page html
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_settings_page() {
		include_once( WTPSW_DIR . '/includes/admin/form/wtpsw-settings.php' );
	}

	/**
	 * Upgrade to PRO Vs Free 
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_premium_page() {
		include_once( WTPSW_DIR . '/includes/admin/form/premium.php' );
	}
	
	/**
	 * Hire Us Page Information
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_hireus_page() {
		include_once( WTPSW_DIR . '/includes/admin/form/hire-us.php' );
	}
	
	/**
	 * Function register setings
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_admin_processes() {
		
		// If plugin notice is dismissed
		if( isset($_GET['message']) && $_GET['message'] == 'wtpsw-plugin-notice' ) {
			set_transient( 'wtpsw_install_notice', true, 604800 );
		}

		register_setting( 'wtpsw_plugin_options', 'wtpsw_options', array($this, 'wtpsw_validate_options') );
	}

	/**
	 * Validate Settings Options
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_validate_options( $input ){
		
		$input['post_types']	= isset($input['post_types'])	? $input['post_types'] 							: array();

		return $input;
	}
}

$wtpsw_Admin = new Wtpsw_Admin();