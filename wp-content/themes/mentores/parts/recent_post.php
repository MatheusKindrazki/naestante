<!-- <div class="titulo">
    <h3 class="title-1">Últimos posts</h3>
</div> -->
<?php
	wp_reset_query();
	$post_number = 8;
	if ( wp_is_mobile() ) {
		$post_number = 4;
	}
    $cont = 1;
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
    $recent_posts = new WP_Query(array(
        'post_type' => 'post',
		'order'   => 'DESC',
		'orderby' => 'publish_date',
		'posts_per_page' => $post_number,
        'paged' => $paged
    )); 
    ?>
		<?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
			<div class="card-post number-<?php echo $cont; ?>">
			<div class="image-full" style="background-image:url('<?php the_post_thumbnail_url('list-image', array('class' => 'img-fluid')); ?>')"></div>
						<a class='full' href="<?php the_permalink(); ?>">
							<p class="title-3"><?php the_title(); ?></p>
						</a>
                        <div class="btn-category">
							<?php 
							$category_detail = get_the_category(); 
							foreach( $category_detail as $cd ){ ?>
								<a href=" <?php echo get_category_link($cd->term_id); ?>" class="btn">
									<?php echo $cd->name; ?>
								</a>
							<?php }; ?>
                        </div>
							<div class="description">
								<?php $row  = the_excerpt() ; ?>
								<?php echo substr($row, 0, 250); ?>
							</div>
						<?php $cont++; ?>
					</li>
				<div class="mask-card"></div>
			</div>
		<?php endwhile; ?>

<?php
$big = 999999999; // need an unlikely integer
$args = array(
	'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format'		=> '/pagina/%#%',
	'current' 		=> max( 1, $paged ),
	'total'			=> $recent_posts->max_num_pages,
	'prev_text'		=> __('<i class="fa fa-angle-left mr-1" aria-hidden="true"></i>anterior'),
	'next_text'		=> __('próximo<i class="fa fa-angle-right ml-1" aria-hidden="true"></i>'),
	'type'			=> 'list',
);
?>
<div class="post_paginate">
	<div class="paginate mb-5 clear">
		<?php echo paginate_links( $args ); ?>
	</div>
</div>

    