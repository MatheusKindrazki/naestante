<?php
/**
 * Functions File
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Update default settings
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_default_settings(){ 
	
	global $wtpsw_options;
	
	$wtpsw_options = array(
							'post_range' 	=>	'',
							'post_types' 	=> array( 'post' ),
						);
	
	$default_options = apply_filters('wtpsw_options_default_values', $wtpsw_options );
	
	// Update default options
	update_option( 'wtpsw_options', $default_options );
	
	// Overwrite global variable when option is update
	$wtpsw_options = wtpsw_get_settings();
}

/**
 * Get Settings From Option Page
 * 
 * Handles to return all settings value
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_get_settings() {
	
	$options = get_option('wtpsw_options');

	$settings = is_array($options) 	? $options : array();
	
	return $settings;
}

/**
 * Get an option
 * Looks to see if the specified setting exists, returns default if not
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0
 */
function wtpsw_get_option( $key = '', $default = false ) {
	global $wtpsw_options;

	$value = ! empty( $wtpsw_options[ $key ] ) ? $wtpsw_options[ $key ] : $default;
	$value = apply_filters( 'wtpsw_get_option', $value, $key, $default );
	return apply_filters( 'wtpsw_get_option_' . $key, $value, $key, $default );
}

/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package  WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_escape_attr($data) {
	return esc_attr( stripslashes($data) );
}
	
/**
 * Strip Slashes From Array
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_slashes_deep($data = array(), $flag = false) {
		
	if($flag != true) {
		$data = $this->wtpsw_nohtml_kses($data);
	}
	$data = stripslashes_deep($data);
	return $data;
}

/**
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_nohtml_kses($data = array()) {
	
	if ( is_array($data) ) {
		
		$data = array_map(array($this,'wtpsw_nohtml_kses'), $data);
		
	} elseif ( is_string( $data ) ) {
		
		$data = wp_filter_nohtml_kses($data);
	}
	
	return $data;
}

/**
 * Convert Object To Array
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_object_to_array($result) {
	
	$array = array();

	foreach ($result as $key=>$value) {
		if (is_object($value)) {
			$array[$key] = wtpsw_object_to_array($value);
		} else {
			$array[$key] = $value;
		}
	}
	return $array;
}

/**
 * Function to unique number value
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_get_unique() {
	static $unique = 0;
	$unique++;

	return $unique;
}

/**
 * Function to get post excerpt
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_get_post_excerpt( $post_id = null, $content = '', $word_length = '55', $more = '...' ) {

	$word_length = !empty($word_length) ? $word_length : '55';

	// If post id is passed
	if( !empty($post_id) ) {
		if (has_excerpt($post_id)) {
			$content = get_the_excerpt();
		} else {
			$content = !empty($content) ? $content : get_the_content();
		}
	}

	if( !empty($content) ) {
		$content = strip_shortcodes( $content ); // Strip shortcodes
		$content = wp_trim_words( $content, $word_length, $more );
	}

	return $content;
}

/**
 * Function to get registered post types
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_get_post_types( $args = array() ) {
	
	// Taking defaults
	$all_post_types = array();
	$post_types		= array();

	$args = array(
					'public' => !empty($args['public']) ? $args['public'] : 'true'
				);

	$all_post_types = get_post_types( $args, 'object' );
	$exclude_post   = array('attachment');

	foreach ($all_post_types as $post_type_key => $post_data) {
		if( !in_array( $post_type_key, $exclude_post) ) {
			$post_types[$post_type_key] = !empty($post_data->label) ? $post_data->label : $post_type_key;
		}
	}

	return apply_filters('wtpsw_get_post_types', $post_types );
}

/**
 * Function to get comment count text
 * 
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_get_comments_number( $post_id = '', $hide_empty = false ) {

	$comment_text = '';

	if( !empty($post_id) ) {

		$comment_number = get_comments_number( $post_id );

		if ( $comment_number == 0 && empty($hide_empty) ) {
			$comment_text = __('0 Comments', 'wtpsw');
		} elseif ( $comment_number > 1 ) {
			$comment_text = $comment_number . __(' Comments', 'wtpsw');
		} elseif ( $comment_number == 1 ) {
			$comment_text = __('1 Comment', 'wtpsw');
		}
	}

	return $comment_text;
}