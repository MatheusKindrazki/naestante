<?php if( have_rows('listagem_blog', 'option') ): ?>
	<div class="blog-layout">
		<div class="container">
			<?php 
			$main_count = 1;
			while ( have_rows('listagem_blog', 'option') ) : the_row(); ?>
				<?php if(get_row_layout() == 'ultimos_posts'): 
						// Ultimos Posts
						$current_query = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => (get_sub_field('tipo_de_listagem') == 'Sem Carousel') ? 4 : get_sub_field('quantidade_de_itens'), 'order' => 'DESC', 'orderby' => 'date' ));
					elseif(get_row_layout() == 'por_categoria'):
						// Por categoria
						$current_query = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => (get_sub_field('tipo_de_listagem') == 'Sem Carousel') ? 4 : get_sub_field('quantidade_de_itens'), 'cat'	=> get_sub_field('categoria_selecionada') ));
					endif; 
					$main_count++;
					include 'loop-blog-layout.php';
			endwhile; ?>
		</div>
	</div>
<?php endif; ?>