<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_action( 'widgets_init', 'wtpsw_post_list_widget' );

/**
 * Register trending post vertical slider widget
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */
function wtpsw_post_list_widget() {
	register_widget( 'Wtpsw_Post_List_Widget' );
}

/**
 * Vertical Scrolling Post Widget Class
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' )) exit;

class Wtpsw_Post_List_Widget extends WP_Widget {

	var $model, $defaults;

	function __construct() {
		
		global $wtpsw_model;
		$this->model = $wtpsw_model;

		// Widget settings
		$widget_ops = array( 'classname' => 'wtpsw_post_list_widget', 'description' => __( 'Display most popular trending post on your blog.', 'wtpsw' ) );

		// Create the widget
		parent::__construct( 'wtpsw-post-list-widget', __( 'Trending Posts', 'wtpsw' ), $widget_ops );

		$this->defaults = array( 
				'title' 					=> __( 'Trending Posts', 'wtpsw' ),
				'limit'						=> 5,
				'post_type'					=> 'post',
				'show_content'				=> 'false',
				'show_thumb'				=> 'true',
				'show_author'				=> 'true',
				'show_date'					=> 'true',
				'order'						=> 'DESC',
				'view_by'					=> 'views',
				'content_length'			=> 20,
				'show_comment_count'		=> 'true',
				'hide_empty_comment_count' 	=> 'false'
			);
	}

	/**
	 * Updates the widget control options
	 *
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		
		// Input fields
		$instance['title'] 						= strip_tags( $new_instance['title'] );
		$instance['limit']						= ( empty($new_instance['limit']) || ($new_instance['limit'] < -1) ) ? 5 : $new_instance['limit'];
		$instance['post_type']					= $new_instance['post_type'];
		$instance['view_by']					= $new_instance['view_by'];
		$instance['order']						= (isset($new_instance['order']) && $new_instance['order'] == 'ASC') ? 'ASC' : 'DESC';
		$instance['show_author']				= ( isset($new_instance['show_author']) ) 	? 'true' : 'false';
		$instance['show_comment_count']			= ( isset($new_instance['show_comment_count']) ) 	? 'true' : 'false';
		$instance['show_content']				= ( isset($new_instance['show_content']) ) 	? 'true' : 'false';
		$instance['show_thumb']					= ( isset($new_instance['show_thumb']) ) 	? 'true' : 'false';
		$instance['show_date']					= ( isset($new_instance['show_date']) ) 	? 'true' : 'false';
		$instance['content_length']				= ( !empty($new_instance['content_length']) ) ? $new_instance['content_length'] : 20;
		$instance['hide_empty_comment_count'] 	= ( isset($new_instance['hide_empty_comment_count']) ) ? 'true' : 'false';

		return $instance;
	}

	/**
	 * Displays the widget form in widget area
	 *
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function form( $instance ) {
		
		$instance 			= wp_parse_args( (array) $instance, $this->defaults );
		$post_types         = wtpsw_get_post_types();
		$support_post_types = wtpsw_get_option( 'post_types', array() );
		$sel_post_type      = (!empty($instance['post_type']) && in_array($instance['post_type'], $support_post_types)) ? $instance['post_type']    : '';
	?>

		<!-- Title Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'wtpsw'); ?>:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Post type  -->
        <p>
            <label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e( 'Post Type', 'wtpsw' ); ?>:</label>
            <select class="widefat ftpp-reg-post-types" id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" >
            	<option value="" selected ><?php _e( 'Select Post Type', 'wtpsw'); ?></option>
                <?php
                if( !empty($post_types) ) {
                    foreach ($post_types as $post_key => $post_value) {
                        if(in_array($post_key, $support_post_types)) {
                            echo '<option value="'.$post_key.'" '.selected($post_key, $instance['post_type']).'>'.$post_value.'</option>';
                        }
                    }
                }
                ?>
            </select>
        </p>
		
		<!-- View By Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'view_by' ); ?>"><?php _e( 'Post List By', 'wtpsw'); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'view_by' ); ?>" name="<?php echo $this->get_field_name( 'view_by' ); ?>">
				<option value="views" <?php selected( $instance['view_by'], 'views' ); ?> ><?php _e('Total Views', 'wtpsw') ?></option>
				<option value="comment" <?php selected( $instance['view_by'], 'comment' ); ?>><?php _e('Comments Count', 'wtpsw'); ?></option>
			</select>
		</p>

		<!-- Number of Items Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Number of Items', 'wtpsw'); ?>:</label> 
			<input class="widefat" min="-1" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" value="<?php echo $instance['limit']; ?>" />
		</p>

		<!-- Order Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Order', 'wtpsw'); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
				<option value="ASC" <?php selected( $instance['order'], 'ASC' ); ?> ><?php _e('ASC', 'wtpsw') ?></option>
				<option value="DESC" <?php selected( $instance['order'], 'DESC' ); ?>><?php _e('DESC', 'wtpsw'); ?></option>
			</select>
		</p>

		<!-- Show Content Field -->
		<p>
			<input type="checkbox" value="1" id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>" <?php checked( $instance['show_content'], 'true' ); ?>>
			<label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Show Post Content', 'wtpsw'); ?></label><br/>
			<span class="description"><em><?php _e('If your post has excerpt then it will take it else post content will be taken.', 'wtpsw'); ?></em></span>
		</p>

		<!-- Show Post Content Word Limit -->
		<p>
			<label for="<?php echo $this->get_field_id( 'content_length' ); ?>"><?php _e( 'Post Content Length', 'wtpsw'); ?>:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'content_length' ); ?>" name="<?php echo $this->get_field_name( 'content_length' ); ?>" type="number" min="1" value="<?php echo $instance['content_length']; ?>" />
			<span class="description"><em><?php _e('Enter number of words to display in post content.', 'wtpsw'); ?></em></span>
		</p>

		<!-- Show Thumbnail Field -->
		<p>
			<input type="checkbox" value="1" id="<?php echo $this->get_field_id( 'show_thumb' ); ?>" name="<?php echo $this->get_field_name( 'show_thumb' ); ?>" <?php checked( $instance['show_thumb'], 'true' ); ?>>
			<label for="<?php echo $this->get_field_id( 'show_thumb' ); ?>"><?php _e( 'Show Thumbnail', 'wtpsw'); ?></label>
		</p>

		<!-- Show Author Field -->
		<p>
			<input type="checkbox" value="1" id="<?php echo $this->get_field_id( 'show_author' ); ?>" name="<?php echo $this->get_field_name( 'show_author' ); ?>" <?php checked( $instance['show_author'], 'true' ); ?>>
			<label for="<?php echo $this->get_field_id( 'show_author' ); ?>"><?php _e( 'Show Author', 'wtpsw'); ?></label>
		</p>

		<!-- Show Date Field -->
		<p>
			<input type="checkbox" value="1" id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" <?php checked( $instance['show_date'], 'true' ); ?>>
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Show Date', 'wtpsw'); ?></label>
		</p>

		<!-- Show Comment Field -->
		<p>
			<input type="checkbox" value="1" id="<?php echo $this->get_field_id( 'show_comment_count' ); ?>" name="<?php echo $this->get_field_name( 'show_comment_count' ); ?>" <?php checked( $instance['show_comment_count'], 'true' ); ?>>
			<label for="<?php echo $this->get_field_id( 'show_comment_count' ); ?>"><?php _e( 'Show Comment Count', 'wtpsw'); ?></label>
		</p>

		<!-- Show Comment Field -->
		<p>
			<input type="checkbox" value="1" id="<?php echo $this->get_field_id( 'hide_empty_comment_count' ); ?>" name="<?php echo $this->get_field_name( 'hide_empty_comment_count' ); ?>" <?php checked( $instance['hide_empty_comment_count'], 'true' ); ?>>
			<label for="<?php echo $this->get_field_id( 'hide_empty_comment_count' ); ?>"><?php _e( 'Hide Empty Comment Count', 'wtpsw'); ?></label><br/>
			<span class="description"><em><?php _e('Hide comment count if it is empty.', 'wtpsw'); ?></em></span>
		</p>

	<?php
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @package WP Trending Post Slider and Widget
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		
		global $wtpsw_options, $wtpsw_view_by;

		$instance = wp_parse_args( (array) $instance, $this->defaults );
		extract( $args );

		$support_post_types     	= wtpsw_get_option('post_types', array());
		$post_type              	= (!empty($instance['post_type']) && in_array($instance['post_type'], $support_post_types)) ? $instance['post_type']    : '';
		$prefix						= WTPSW_META_PREFIX;
		$title 						= $instance['title'];
		$limit 						= $instance['limit'];
		$show_date 					= $instance['show_date'];
		$show_author 				= $instance['show_author'];
		$show_comment_count			= $instance['show_comment_count'];
		$show_thumb 				= $instance['show_thumb'];
		$show_content 				= $instance['show_content'];
		$view_by 					= $instance['view_by'];
		$order 						= $instance['order'];
		$post_type              	= (!empty($instance['post_type']) && in_array($instance['post_type'], $support_post_types)) ? $instance['post_type']    : '';
		$content_length 			= $instance['content_length'];
		$hide_empty_comment_count 	= ($instance['hide_empty_comment_count'] == 'true') ? true : false;
		
		// If no valid post type is found
		if( empty($post_type) ) {
			return;			
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

		echo $before_widget;

		if ( $title ) {
            echo $before_title . $title . $after_title;
        }

		if( $wtpsw_posts->have_posts() ) {
			include( WTPSW_DIR . '/templates/wtpsw-post-lists.php' );
		}

		echo $after_widget;
	}
}