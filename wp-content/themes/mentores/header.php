<?php get_template_part('parts/head');
$frontpage_id = get_option( 'page_on_front' );
?>
<header class="header">
	<div id="header-sroll">
		<div class="logo">
			<h1>
				<a href="<?php bloginfo('url'); ?>">
					<?php if(get_field('logotipo', 'options')): ?>
						<img src="<?php echo get_field('logotipo', 'options')['sizes']['large']; ?>" alt="<?php bloginfo('name'); ?>">
					<?php else : ?>
						<?php bloginfo('name'); ?>
					<?php endif; ?>
				</a>
			</h1>
		</div>
		<div class="menu">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'nav', 'container_class' => 'menu-principal', 'menu_class' => 'menu list-unstyled' ) ); ?>
			<div class="form">
				<div id="form-container">
					<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="text" value="" autocomplete="off" placeholder="Pesquise_" name="s" id="s" placeholder="<?php _e( 'Pesquisar', 'mentores' ); ?>" />
						<label for="s">
							<i class="fas fa-search"></i>
						</label>
					</form>
				</div>
			</div>
		</div>
		<div class="social">
			<?php if(have_rows('redes_social', 'option')): ?>
				<ul>
					<?php while (have_rows('redes_social', 'option')) : the_row(); ?>
						<li>
							<a class="" href="<?php echo get_sub_field('url'); ?>">
								<i class="fab fa-<?php echo get_sub_field('qual_rede'); ?>"></i>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</header>