<?php
/**
 * Shortcode Class
 *
 * Handles the shortcode functionality of plugin
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wtpsw_Shortcode {

	var $model;

	function __construct() {

		global $wtpsw_model;

		$this->model = $wtpsw_model;

		// Popular post shortcode
		add_shortcode( 'wtpsw_popular_post', array($this, 'wtpsw_popular_post') );
		add_shortcode( 'wtpsw_carousel', array($this, 'wtpsw_popular_post_carousel') );
		add_shortcode( 'wtpsw_gridbox', array($this, 'wtpsw_popular_post_grid') );
	}

	/**
	 * Handles Popuplar Post shortcode
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_popular_post( $atts, $content ) {

		global $wtpsw_options, $wtpsw_view_by, $post;

		// Enqueue required script
		wp_enqueue_script('wpos-slick-jquery');

		// Shortcode attributes
		extract( shortcode_atts( array(	
			'limit' 					=> 10,
			'post_type'					=> 'post',
			'view_by'					=> 'views',
			'order'						=> 'DESC',
			'orderby'					=> 'meta_value_num',
			'design'					=> 'design-1',
			'showdate'					=> 'true',
			'showauthor'				=> 'true',
			'showcontent'				=> 'true',
			'words_limit'				=> 40,
			'dots'						=> 'true',
			'arrows'					=> 'true',
			'speed'						=> 300,
			'autoplay'					=> 'true',
			'autoplayinterval'			=> 3000,
			'show_comment_count'		=> 'true',
			'hide_empty_comment_count'	=> 'false',
		), $atts, 'wtpsw_popular_post' ) );

		$prefix						= WTPSW_META_PREFIX;
		$supported_post_types 		= wtpsw_get_option( 'post_types', array() );
		$unique						= wtpsw_get_unique();
		$limit 						= (!empty($limit) && is_numeric($limit)) 	? $limit 		: 10;
		$view_by					= !empty($view_by)							? $view_by 		: 'views';
		$post_type 					= (!empty($post_type) && in_array($post_type, $supported_post_types)) ? $post_type : '';
		$order 						= ($order == 'DESC')						? 'DESC'		: 'ASC';
		$orderby 					= (!empty($orderby))						? $orderby		: 'date';
		$speed						= (!empty($speed))							? $speed		: 300;
		$autoplayinterval			= (!empty($autoplayinterval)) 				? $autoplayinterval : 3000;
		$hide_empty_comment_count 	= ($hide_empty_comment_count == 'true') 	? true 			: false;

		// If no valid post type is found
		if(empty($post_type) ) {
			return $content;			
		}

		// Slider configuration
		$slider_conf = compact('dots', 'arrows', 'autoplay', 'autoplayinterval', 'speed');

		// Order By
		if( $view_by == 'comment' ) {
			$orderby = 'comment_count';
		} elseif ( $view_by == 'views' ) {
			$orderby = 'meta_value_num';
		}

		$wtpsw_view_by = $orderby; // Assign to global variable for query filter

		$post_args = array(
							'post_type'			=> $post_type,
							'posts_per_page'	=> $limit,
							'order'				=> $order,
							'orderby'			=> $orderby
						);

		if( $view_by == 'views' ) {
			$post_args['meta_key'] = $prefix.'views';
		}

		// Filter to change query where condition
		add_filter( 'posts_where', array($this->model, 'wtpsw_query_where') );

		// Query to get post
		$wtpsw_posts = $this->model->wtpsw_get_posts( $post_args );

		// Remove Filter for change query where condition
		remove_filter( 'posts_where', array($this->model, 'wtpsw_query_where') );

		ob_start();

		if( $wtpsw_posts->have_posts() ){
			include( WTPSW_DIR . '/templates/slider/design-1.php' );
		}

		$content .= ob_get_clean();

		return $content;
	}

	/**
	 * Handles Popuplar Post carousel shortcode
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_popular_post_carousel( $atts, $content ){

		global $wtpsw_options, $wtpsw_view_by, $post;

		// Enqueue required script
		wp_enqueue_script('wpos-slick-jquery');

		// Shortcode attributes
		extract( shortcode_atts( array(	
			'limit' 					=> 10,
			'post_type'					=> 'post',
			'view_by'					=> 'views',
			'order'						=> 'DESC',
			'orderby'					=> 'meta_value_num',
			'design'					=> 'design-1',
			'showdate'					=> 'true',
			'showauthor'				=> 'true',
			'showcontent'				=> 'false',
			'words_limit'				=> 40,
			'slides_to_show'  			=> 3,
			'slides_to_scroll'  		=> 1,
			'dots'						=> 'true',
			'arrows'					=> 'true',
			'speed'						=> 300,
			'autoplay'					=> 'true',
			'autoplayinterval'			=> 3000,
			'show_comment_count'		=> 'true',
			'hide_empty_comment_count'	=> 'false',
		), $atts, 'wtpsw_carousel' ) );

		$prefix						= WTPSW_META_PREFIX;
		$supported_post_types 		= wtpsw_get_option( 'post_types', array() );
		$unique						= wtpsw_get_unique();
		$limit 						= (!empty($limit) && is_numeric($limit)) 	? $limit 			: 10;
		$view_by					= !empty($view_by)							? $view_by 			: 'views';
		$post_type 					= ( !empty($post_type) && in_array($post_type, $supported_post_types) ) ? $post_type : '';
		$order 						= ($order == 'DESC')						? 'DESC'			: 'ASC';
		$orderby 					= (!empty($orderby))						? $orderby			: 'date';
		$slides_to_show				= (!empty($slides_to_show))					? $slides_to_show	: 3;
		$slides_to_scroll			= (!empty($slides_to_scroll))				? $slides_to_scroll	: 1;
		$speed						= (!empty($speed))							? $speed			: 300;
		$autoplayinterval			= (!empty($autoplayinterval)) 				? $autoplayinterval : 3000;
		$hide_empty_comment_count 	= ($hide_empty_comment_count == 'true') 	? true 				: false;

		// If no valid post type is found
		if(empty($post_type) ) {
			return $content;
		}

		// Slider configuration
		$slider_conf = compact('dots', 'arrows', 'autoplay', 'autoplayinterval', 'speed', 'slides_to_show', 'slides_to_scroll', 'rtl');

		// Order By
		if( $view_by == 'comment' ){
			$orderby = 'comment_count';
		} elseif ( $view_by == 'views' ) {
			$orderby = 'meta_value_num';
		}

		$wtpsw_view_by = $orderby; // Assign to global variable for query filter

		$post_args = array(
							'post_type'			=> $post_type,
							'posts_per_page'	=> $limit,
							'order'				=> $order,
							'orderby'			=> $orderby
						);

		if( $view_by == 'views' ) {
			$post_args['meta_key'] = $prefix.'views';
		}

		// Filter to change query where condition
		add_filter( 'posts_where', array($this->model, 'wtpsw_query_where') );

		// Query to get post
		$wtpsw_posts = $this->model->wtpsw_get_posts( $post_args );

		// Remove Filter for change query where condition
		remove_filter( 'posts_where', array($this->model, 'wtpsw_query_where') );

		ob_start();

		if( $wtpsw_posts->have_posts() ){
			include( WTPSW_DIR . '/templates/carousel/design-1.php' );
		}

		$content .= ob_get_clean();

		return $content;
	}

	/**
	 * Handles Popuplar Post Gridbox
	 * 
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function wtpsw_popular_post_grid( $atts, $content ){

		global $wtpsw_options, $wtpsw_view_by, $post;

		// Enqueue required script
		wp_enqueue_script('wpos-slick-jquery');

		// Shortcode attributes
		extract( shortcode_atts( array(	
			'limit' 					=> 5,
			'post_type'					=> 'post',
			'view_by'					=> 'views',
			'order'						=> 'DESC',
			'orderby'					=> 'meta_value_num',
			'design'					=> 'design-1',
			'showdate'					=> 'true',
			'showauthor'				=> 'true',
			'showcontent'				=> 'false',
			'words_limit'				=> '40',
			'show_comment_count'		=> 'true',
			'hide_empty_comment_count'	=> 'false'
		), $atts, 'wtpsw_gridbox' ) );

		$prefix						= WTPSW_META_PREFIX;
		$supported_post_types 		= wtpsw_get_option( 'post_types', array() );
		$limit 						= (!empty($limit) && is_numeric($limit)) 	? $limit 		: 10;
		$view_by					= !empty($view_by)							? $view_by 		: 'views';
		$post_type 					= (!empty($post_type) && in_array($post_type, $supported_post_types) ) ? $post_type : '';
		$order 						= ($order == 'DESC')						? 'DESC'		: 'ASC';
		$orderby 					= (!empty($orderby))						? $orderby		: 'date';
		$hide_empty_comment_count	= ($hide_empty_comment_count == 'true') 	? true 			: false;

		// If no valid post type is found
		if( empty($post_type) ) {
			return $content;
		}

		// Order By
		if( $view_by == 'comment' ) {
			$orderby = 'comment_count';
		} elseif ( $view_by == 'views' ) {
			$orderby = 'meta_value_num';
		}

		$wtpsw_view_by = $orderby; // Assign to global variable for query filter

		$post_args = array(
							'post_type'			=> $post_type,
							'posts_per_page'	=> $limit,
							'order'				=> $order,
							'orderby'			=> $orderby
						);

		if( $view_by == 'views' ) {
			$post_args['meta_key'] = $prefix.'views';
		}

		// Filter to change query where condition
		add_filter( 'posts_where', array($this->model, 'wtpsw_query_where') );

		// Query to get post
		$wtpsw_posts = $this->model->wtpsw_get_posts( $post_args );

		// Remove Filter for change query where condition
		remove_filter( 'posts_where', array($this->model, 'wtpsw_query_where') );

		ob_start();

		if( $wtpsw_posts->have_posts() ){
			include( WTPSW_DIR . '/templates/grid-box/design-1.php' );
		}

		$content .= ob_get_clean();

		return $content;
	}
}

$wtpsw_shortcode = new Wtpsw_Shortcode();