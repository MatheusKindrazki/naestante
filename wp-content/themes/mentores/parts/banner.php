<?php
$args = array(
	'post_type'	=> 'banners'
);
$banners = new WP_Query($args);
?>

<?php if($banners->have_posts()): ?>
	<div class="main-banner">
		<div class="owl-carousel owl-theme">
			<?php while($banners->have_posts()): $banners->the_post(); ?>
				<?php if(get_field('tipo_de_banner') == 'Imagem'): ?>
					<div class="item">
						<div class="item-inside d-none d-md-flex" style="background-image: url('<?php echo get_field('imagem_do_banner')['sizes']['large']; ?>');">
							<div class="container">
								<?php if(get_field('titulo_do_banner')): ?>
									<h2 class="<?php echo get_field('alinhamento_do_titulo'); ?> <?php echo get_field('cor_do_texto'); ?>">
										<?php echo get_field('titulo_do_banner'); ?>
									</h2>
								<?php endif; ?>
								<?php if(get_field('texto_do_banner')): ?>
									<h5 class="<?php echo get_field('alinhamento_do_titulo'); ?> <?php echo get_field('cor_do_texto'); ?>">
										<?php echo get_field('texto_do_banner'); ?>
									</h5>
								<?php endif;
								if(get_field('texto_botao') && get_field('url_do_botao')): ?>
									<a class="banner-link btn-primary <?php echo get_field('alinhamento_do_titulo'); ?>" href="<?php echo get_field('url_do_botao'); ?>">
										<?php echo get_field('texto_botao'); ?>
									</a>
								<?php endif;?>
							</div>
						</div>
						<div class="item-inside d-flex d-md-none" style="background-image: url('<?php echo get_field('imagem_do_banner_mobile')['sizes']['medium']; ?>');">
							<div class="container">
								<?php if(get_field('titulo_do_banner')): ?>
									<h2 class="<?php echo get_field('alinhamento_do_titulo'); ?> <?php echo get_field('cor_do_texto'); ?>">
										<?php echo get_field('titulo_do_banner'); ?>
									</h2>
								<?php endif;
								if(get_field('texto_botao') && get_field('url_do_botao')): ?>
									<a class="banner-link btn-primary <?php echo get_field('alinhamento_do_titulo'); ?>" href="<?php echo get_field('url_do_botao'); ?>">
										<?php echo get_field('texto_botao'); ?>
									</a>
								<?php endif;?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>