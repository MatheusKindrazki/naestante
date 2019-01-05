<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wtpsw_Script { 

	function __construct() {

		// Action to add style on frontend
		add_action( 'wp_enqueue_scripts', array($this, 'wtpsw_front_end_style') );

		// Action to add script on frontend
		add_action( 'wp_enqueue_scripts', array($this, 'wtpsw_front_end_script'), 15 );
	}

	/**
	 * Enqueue front styles
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_front_end_style() {

		// Registring and enqueing slick slider css
		if( !wp_style_is( 'wpos-slick-style', 'registered' ) ) {
			wp_register_style( 'wpos-slick-style', WTPSW_URL.'assets/css/slick.css', null, WTPSW_VERSION );
			wp_enqueue_style('wpos-slick-style');
		}

		// Registring slider style
		wp_register_style( 'wtpsw-public-style', WTPSW_URL.'assets/css/wtpsw-public.css', null, WTPSW_VERSION );
		wp_enqueue_style('wtpsw-public-style');
	}

	/**
	 * Enqueue front script
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_front_end_script() {

		global $post;

		// Taking post id to update post view count
		$post_id 			= isset($post->ID) ? $post->ID : '';
		$post_view_count	= 0;

		$supported_posts = wtpsw_get_option( 'post_types', array() ); // suppoterd post type

		if( !empty($post_id) && !is_preview() && !empty($supported_posts) && is_singular($supported_posts) && !is_front_page() && !is_home() && !is_feed() && !is_robots() ) {
			$post_view_count = $post_id;
		}

		// Registring slider script
		if( !wp_script_is( 'wpos-slick-jquery', 'registered' ) ) {	
			wp_register_script( 'wpos-slick-jquery', WTPSW_URL.'assets/js/slick.min.js', array('jquery'), WTPSW_VERSION, true );
		}

		// Registering Public Script (Slider Script)
		wp_register_script( 'wtpsw-public-script', WTPSW_URL.'assets/js/wtpsw-public.js', array('jquery'), WTPSW_VERSION, true );
		wp_localize_script( 'wtpsw-public-script', 'Wtpsw', array(
																	'ajaxurl'			=> admin_url( 'admin-ajax.php', ( is_ssl() ? 'https' : 'http' ) ),
																	'is_mobile' 		=> (wp_is_mobile()) ? 1 : 0,
																	'is_rtl' 			=> (is_rtl()) 		? 1 : 0,
																	'post_view_count'	=> $post_view_count,
																
																));
		wp_enqueue_script( 'wtpsw-public-script' );
	}
}

$wtpsw_script = new Wtpsw_Script();