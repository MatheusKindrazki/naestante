<?php 
get_header();
global $searched;
// $searched = get_search_query();

$researched = $_GET['s'];

$args = array(
	's'         		=> $researched,
	'posts_per_page'	=> -1
);

$searched = new WP_query($args); ?>

<div class="search-results">
	<div class="container-fluid">

		<div class="top">
			<?php if( ! empty($_GET['s'])): ?>
				<h1 class="title-2" class="title-2 text-center"><?php _e('Resultado da Busca','mentores'); ?><?php if (is_paged()) echo ' <small>(Página '.get_query_var('paged').')</small>' ?></h1>
			<?php else: ?>
				<h1 class="title-2" class="title-2 text-center"><?php _e('Faça sua pesquisa','mentores'); ?></h1>
			<?php endif; ?>
			<div class="pesquisa">
				<?php get_search_form(); ?>
			</div>

			<div class="results-found">
				<?php if( ! empty($researched)): ?>
					<?php if ($searched->found_posts>1) : ?>
						<p><?php _e('Foram encontrados '.$searched->found_posts.' resultados nesta pesquisa.','mentores'); ?></p>
					<?php elseif ($searched->found_posts==1) : ?>
						<p><?php _e('Foi encontrado '.$searched->found_posts.' resultado nesta pesquisa.','mentores'); ?></p>
					<?php else : ?>
						<p><?php _e('Não foi encontrado nenhum resultado nesta pesquisa.','mentores'); ?></p>
					<?php endif;
				else: ?>
					<?php if( ! empty($_GET['s'])): ?>
						<span><?php _e('Não foi encontrado nenhum resultado nesta pesquisa'); ?></span>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="middle">
			<div class="row">
				<?php while($searched->have_posts()): $searched->the_post(); ?>
					<div class="col-md-4 col-lg-3">
						<div class="search-item">
							<div class="picture">
								<a href="<?php echo the_permalink();?>" style="background-image: url('<?php the_post_thumbnail_url('large')?>');">
									<span class="sr-only"><?php the_title(); ?></span>
								</a>
							</div>
							<div class="content">
								<?php if($post->post_type == 'post'): ?>
									<span class="status">Blog</span>
								<?php elseif($post->post_type == 'cursos'): ?>
									<span class="status cursos">Cursos</span>
								<?php endif; ?>
								<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
							</div>
						</div>
					</div>		
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
