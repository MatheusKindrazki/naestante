<?php
$big = 999999999; // need an unlikely integer
$args = array(
	'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format'		=> '/pagina/%#%',
	'current' 		=> max( 1, get_query_var('paged') ),
	'total'			=> $wp_query->max_num_pages,
	'prev_text'		=> __('<i class="fa fa-angle-left mr-1" aria-hidden="true"></i>anterior'),
	'next_text'		=> __('próximo<i class="fa fa-angle-right ml-1" aria-hidden="true"></i>'),
	'type'			=> 'list',
);
?>
<div class="paginate mb-5">
	<?php echo paginate_links( $args ); ?>
</div>