<?php get_header();

	get_template_part('parts/banner'); ?>
	<div class="recent_post">
		<?php get_template_part('parts/recent_post'); ?>
	</div>
	<div class="related_post">
		<?php //if ( dynamic_sidebar('rodape_widgets') ) : else : endif; ?>
		<?php echo do_shortcode('[wtpsw_gridbox]'); ?>
	</div>
<?php get_footer(); ?>

