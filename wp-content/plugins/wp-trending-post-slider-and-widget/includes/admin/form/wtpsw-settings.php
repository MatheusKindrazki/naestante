<?php
/**
 * Settings Page
 *
 * @package WP Trending Post Slider and Widget
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) )  
	exit;

$reg_post_types 		= wtpsw_get_post_types();
$tp_support_post_types 	= wtpsw_get_option( 'post_types', array() );

?>

<div class="wrap wtpsw-settings">

<h2><?php _e( 'Trending Post - Settings', 'wtpsw' ); ?></h2><br />

<?php
if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {
	echo '<div id="message" class="updated notice notice-success is-dismissible">
			<p>'.__("Your changes saved successfully.", "wtpsw").'</p>
		  </div>';
}
?>

<form action="options.php" method="POST" id="wtpsw-settings-form" class="wtpsw-settings-form">
	
	<?php
		settings_fields( 'wtpsw_plugin_options' );
		global $wtpsw_options;
	?>

	<div id="wtpsw-general-settings" class="post-box-container wtpsw-general-settings">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div id="general" class="postbox">

					<button class="handlediv button-link" type="button"><span class="toggle-indicator"></span></button>

						<!-- Settings box title -->
						<h3 class="hndle">
							<span><?php _e( 'General Settings', 'wtpsw' ); ?></span>
						</h3>

						<div class="inside">

						<table class="form-table wtpsw-general-settings-tbl">
							<tbody>

								<tr>
									<th scope="row">
										<label for="wtpsw-post-within"><?php _e('Post Within', 'wtpsw'); ?></label>
									</th>
									<td>
										<select id="wtpsw-post-within" class="wtpsw-post-within" name="wtpsw_options[post_range]">
											<option value=""><?php _e('All Time', 'wtpsw'); ?></option>
											<option value="daily" <?php selected( $wtpsw_options['post_range'], 'daily' ); ?>><?php _e('Today', 'wtpsw'); ?></option>
											<option value="last_day" <?php selected( $wtpsw_options['post_range'], 'last_day' ); ?>><?php _e('Last Day', 'wtpsw'); ?></option>
											<option value="last_week" <?php selected( $wtpsw_options['post_range'], 'last_week' ); ?>><?php _e('Last 7 Days', 'wtpsw'); ?></option>
											<option value="last_month" <?php selected( $wtpsw_options['post_range'], 'last_month' ); ?>><?php _e('Last Month', 'wtpsw'); ?></option>
										</select><br/>
										<span class="description"><?php _e('Select time range for post visibility. Note: The post published within this time range will be visible.', 'wtpsw'); ?></span>
									</td>
								</tr>

								<tr>
									<th>
										<label for="select-post-type"><?php _e('Select Post Types', 'wtpsw'); ?></label>
									</th>
									<td>
										<?php if( !empty($reg_post_types) ) {
											foreach ($reg_post_types as $post_key => $post_label) { ?>
												<div class="ftpp-post-type-wrap">
													<label>
														<input type="checkbox" id="ftpp-tp-post-<?php echo $post_key; ?>" value="<?php echo $post_key; ?>" name="wtpsw_options[post_types][]" <?php checked( in_array($post_key, $tp_support_post_types), true );  ?> />
														<?php echo $post_label; ?>( <?php echo __('Post Type','wtpsw').' : '.$post_key; ?> )
													</label>
												</div>
										<?php }
										} ?>
										<span class="description"><?php _e('Select post type box for trending post. You can enter post type name in shortcode parameter.', 'wtpsw'); ?></span> <br/>
									</td>
								</tr>

								<tr>
									<td colspan="2" valign="top" scope="row">
										<input type="submit" id="wtpsw-settings-submit" name="wtpsw-settings-submit" class="button button-primary right" value="<?php _e('Save Changes','wtpsw');?>" />
									</td>
								</tr>
							</tbody>
						 </table>

					</div><!-- .inside -->
				</div><!-- #general -->
			
			</div><!-- .meta-box-sortables ui-sortable -->
		</div><!-- .metabox-holder -->
	</div><!-- #wtpsw-general-settings -->

</form><!-- end .wtpsw-settings-form -->

</div><!-- end .wtpsw-settings -->