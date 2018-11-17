<?php get_header(); 
wp_reset_query(); ?>

<div class="page-default">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</div>

<?php get_footer(); ?>
