<?php
/**
 * Public Class
 *
 * Handles the public side functionality of plugin
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wtpsw_Public {

	function __construct(){

		// Ajax call to update post count
		add_action( 'wp_ajax_wtpsw_post_view_count', array($this, 'wtpsw_post_view_count') );
		add_action( 'wp_ajax_nopriv_wtpsw_post_view_count',array( $this, 'wtpsw_post_view_count') );

	}

	/**
	 * Function to update views of post
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_post_view_count(){

		$prefix		= WTPSW_META_PREFIX;
		$post_id 	= isset($_POST['post_id']) ? $_POST['post_id'] : '';

		if( !empty($post_id) ) {

			// Getting existing views
			$views = get_post_meta( $post_id, $prefix.'views', true );
			$views = !empty($views) ? $views : 0;

			// Update new views
			update_post_meta( $post_id, $prefix.'views', ($views+1) );

			echo 'Success';
		} else {
			echo 'Error - Reference Id not found.';
		}
		die();

	}
}

$wtpsw_public = new Wtpsw_Public();