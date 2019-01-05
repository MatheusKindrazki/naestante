<div class="wtpsw-post-grid <?php echo $design; ?> wtpsw-clearfix">
	
	<?php
	$wtpsw_count = 1;
	while ($wtpsw_posts->have_posts()) : $wtpsw_posts->the_post();
		
		global $post;
		
		$wtpsw_post_stats 	= array();
		$post_id 			= isset($post->ID) ? $post->ID : '';
		$comment_text 		= wtpsw_get_comments_number( $post->ID, $hide_empty_comment_count );
	?>

	<div class="wtpsw-post-gridbox <?php if($wtpsw_count == 1) { echo 'wtpsw-medium-6'; } else { echo 'wtpsw-medium-3'; } ?> wtpswcolumns">
		<a class="wtpsw-link-overlay" href="<?php the_permalink(); ?>"></a>
		<div class="wtpsw-post-list">								
			<div class="wtpsw-post-image-bg">
				<?php the_post_thumbnail(array(500,500)); ?>
				<div class="wtpsw-post-list-content">

					<h4 class="wtpsw-post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>

					<?php if($showdate == 'true' || $showauthor == 'true' || $show_comment_count == 'true') { ?>	
					<div class="wtpsw-post-stats">
						<?php if($showauthor == 'true') {
							$wtpsw_post_stats[] = "<span>".__( 'By', 'wtpsw' )." <a href='".get_author_posts_url( $post->author )."'>".get_the_author()."</a></span>";
						} ?>

						<?php if($showdate == "true") {
							$wtpsw_post_stats[] = "<span>".get_the_date()."</span>";
						} ?>

						<?php if( $show_comment_count == "true" && $comment_text ) {
							$wtpsw_post_stats[] = "<span class='wtpsw-post-comment'>".$comment_text."</span>";
						} ?>

						<?php echo join(' / ', $wtpsw_post_stats); ?>
					</div>
					<?php } ?>
				</div>
			</div>			
		</div>
	</div>

	<?php
		$wtpsw_count++;
		endwhile;

		wp_reset_postdata(); // Reset WP Query
	?>
</div>