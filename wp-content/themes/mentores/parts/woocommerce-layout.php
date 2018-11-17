<?php if( have_rows('listagem', 'option') ): ?>
	<div class="home-layout">
		<div class="container">
			<?php 
			$main_count = 1;
			while ( have_rows('listagem', 'option') ) : the_row(); ?>
				<?php if(get_row_layout() == 'produtos_novidades'): 
						// Produtos Novidades
						$current_query = new WP_Query(array( 'post_type' => 'product', 'posts_per_page' => (get_sub_field('tipo_de_listagem') == 'Sem Carousel') ? 4 : get_sub_field('quantidade_de_itens') ));
					elseif(get_row_layout() == 'mais_vendidos'): 
						// Produtos Mais Vendidos
						$current_query = new WP_Query(array( 'post_type' => 'product', 'posts_per_page' => (get_sub_field('tipo_de_listagem') == 'Sem Carousel') ? 4 : get_sub_field('quantidade_de_itens'), 'meta_key' => 'total_sales', 'orderby' => 'meta_value_num', 'order' => 'DESC' ));
					elseif(get_row_layout() == 'produtos_em_oferta'):
						// Produtos On Sale
						$current_query = new WP_Query(array( 'post_type' => 'product', 'posts_per_page' => (get_sub_field('tipo_de_listagem') == 'Sem Carousel') ? 4 : get_sub_field('quantidade_de_itens'), 'post__in' => wc_get_product_ids_on_sale()));
					elseif(get_row_layout() == 'produtos_destacados'):
						// Produtos Featured
						$current_query = new WP_Query(array( 'post_type' => 'product', 'posts_per_page' => (get_sub_field('tipo_de_listagem') == 'Sem Carousel') ? 4 : get_sub_field('quantidade_de_itens'), 'tax_query' => array( array( 'taxonomy' => 'product_visibility', 'field' => 'name','terms' => 'featured'),)));
					elseif(get_row_layout() == 'categoria_selecionada'):
						// Por product_cat 
						$current_query = new WP_Query(array( 'post_type' => 'product', 'posts_per_page' => (get_sub_field('tipo_de_listagem') == 'Sem Carousel') ? 4 : get_sub_field('quantidade_de_itens'), 'tax_query' => array( array( 'taxonomy' => 'product_cat', 'field' => 'id','terms' => get_sub_field('categoria_selecionada')),)));
					elseif(get_row_layout() == 'produtos_especificos'):
						// Por produtos selecionados
						$current_query = new WP_Query(array( 'post_type' => 'product', 'posts_per_page' => (get_sub_field('tipo_de_listagem') == 'Sem Carousel') ? 4 : get_sub_field('quantidade_de_itens'), 'post__in' => (get_sub_field('tipo_de_listagem') == 'Sem Carousel') ? get_sub_field('produtos_carousel') : get_sub_field('produtos_sem_carousel')));
					elseif(get_row_layout() == 'categorias_produto'):
						$product_cat_to_show = get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false, 'number' => get_sub_field('quantidade')));
						include 'loop-woocommerce-layout-category.php';
						continue;
					endif; $main_count++;
					include 'loop-woocommerce-layout.php';
			endwhile; ?>
		</div>
	</div>
<?php endif; ?>