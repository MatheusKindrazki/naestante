<div id="wtpsw-carousel-<?php echo $unique; ?>" class="wtpsw-post-carousel-<?php echo $unique; ?> wtpsw-post-carousel <?php echo $design; ?>" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>">

	<?php while ($wtpsw_posts->have_posts()) : $wtpsw_posts->the_post();
		
		global $post;

		$wtpsw_post_stats 	= array();
		$post_id 			= isset($post->ID) ? $post->ID : '';
		$comment_text 		= wtpsw_get_comments_number( $post->ID, $hide_empty_comment_count );
	?>

	<div class="wtpsw-post-carousel-slides">	
		<div class="wtpsw-medium-12 wtpswcolumns">

			<div class="wtpsw-post-image-bg">
				<?php the_post_thumbnail(array(500,500)); ?>
			</div>

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

			<?php if($showcontent == "true") {  ?>
			<div class="wtpsw-post-content">
				<div class="wtpsw-sub-content"><?php echo wtpsw_get_post_excerpt( get_the_content(), '', $words_limit); ?></div>
			</div>
			<?php } ?>
		</div>
	</div>

	<?php
		endwhile;
		wp_reset_postdata();	// Reset WP Query
	?>
</div>