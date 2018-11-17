<div id="blog-layout-box-<?php echo $main_count; ?>" class="blog-layout-box">
	<h2><?php echo get_sub_field('titulo_da_sessao'); ?></h2>
	<?php if(get_sub_field('tipo_de_listagem') == 'Sem Carousel'): ?>
		<div class="row">
			<?php while($current_query->have_posts()): $current_query->the_post(); ?>
				<div class="col-sm-3">
					<div class="card-blog-item">
						<h3>
							<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
						</h3>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php else: ?>
		<div class="owl-carousel owl-theme">
			<?php while($current_query->have_posts()): $current_query->the_post(); ?>
				<div class="item">
					<div class="card-blog-item">
						<h3>
							<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
						</h3>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<script>
			jQuery(document).ready(function(){
				jQuery('#blog-layout-box-<?php echo $main_count; ?> .owl-carousel').owlCarousel({
					loop: false,
					margin: 10,
					nav: true,
					mouseDrag: false,
					responsive:{
						0:{
							items: 1
						},
						576:{
							items: 3
						},
						992:{
							items: 4
						}
					}
				});
			});
		</script>
	<?php endif; ?>
</div>