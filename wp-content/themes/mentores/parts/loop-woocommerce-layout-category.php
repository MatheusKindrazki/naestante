<div class="product-cat-to-show">
	<h3><?php echo get_sub_field('titulo_da_sessao'); ?></h3>
	<div class="row">
		<?php foreach($product_cat_to_show as $cat_to_show): ?>
			<div class="col-sm-3">
				<div class="product-cat-to-show-item">
					<h3>
						<a href="<?php echo get_term_link($cat_to_show); ?>"><?php echo $cat_to_show->name; ?></a>
					</h3>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>