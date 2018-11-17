<?php
$categories = get_categories();
$tags = get_tags();
$users = new WP_User_Query(array(
	'has_published_posts' => true,
));
?>

<div class="sidebar-blog">
	<div class="search-sibebar mb-5">
		<h3 class="h5 font-weight-bold">Pesquisa</h3>
		<?php echo get_search_form(); ?>
	</div>
	<div class="categories-sibebar mb-5">
		<h3 class="h5 font-weight-bold">Categorias</h3>
		<ul class="list-group">
			<?php foreach($categories as $category): ?>
				<li class="list-group-item d-flex align-items-center bg-light">
					<a class="d-flex w-100 justify-content-between" href="<?php echo get_category_link($category->term_id); ?>">
						<?php echo $category->name; ?>
						<span class="badge badge-primary badge-pill"><?php echo $category->count; ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="authors-sibebar mb-5">
		<h3 class="h5 font-weight-bold">Autores</h3>
		<ul class="list-group">			
			<?php foreach($users->get_results() as $user): ?>
				<li class="list-group-item d-flex align-items-center bg-light">
					<a class="d-flex w-100 justify-content-between" href="<?php echo get_author_posts_url($user->ID); ?>">
						<?php echo $user->user_nicename; ?>
						<span class="badge badge-primary badge-pill"><?php echo count_user_posts($user->ID); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="tags-sibebar mb-5">
		<h3 class="h5 font-weight-bold">Tags</h3>
		<ul class="list-unstyled">
			<?php foreach($tags as $tag): ?>
				<li class="badge-pill badge badge-primary mb-1">
					<a class="text-white" href="<?php echo get_category_link($tag->term_id); ?>">
						<?php echo $tag->name; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>