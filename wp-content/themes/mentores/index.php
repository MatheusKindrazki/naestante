<?php 
get_header(); 

if(get_field('banner')): ?>
	<div class="banner-top" style="background-image: url('<?php echo get_field('banner')['sizes']['large']; ?>');"></div>
<?php endif; ?>

<div class="container">
	<div class="archive-blog">
		<div class="list-blog">
			<div class="row">
				<?php while(have_posts()): the_post(); ?>
					<div class="col-4">
						<div class="card card-post mb-5">
							<div class="card-img-top">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100')); ?>
								</a>
							</div>
							<div class="card-body">
								<small class="posted d-block mb-2 text-secondary">Postado em <strong><?php the_date('d \d\e F \d\e Y'); ?></strong> às <strong><?php the_time('H:i'); ?></strong> por <strong><?php the_author(); ?></strong></small>
	
								<ul class="categories d-flex list-unstyled">
									<?php
									$cats = get_the_category();
									foreach($cats as $cat): ?>
										<li class="mr-1">
											<a class="badge badge-primary text-white" href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
										</li>
									<?php endforeach; ?>
								</ul>
	
								<h2 class="h4 font-weight-bold">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
								<p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>

								<a class="m-auto btn btn-sm btn-primary" href="<?php the_permalink(); ?>">Leia Mais</a>
							</div>
	
							<div class="card-footer">
								<div class="row d-flex align-items-center">
									<div class="col">
										<ul class="tags d-flex flex-wrap list-unstyled">
											<?php
											$tags = get_the_tags();
											foreach($tags as $tag): ?>
												<li class="mr-1 mb-1">
													<a class="badge badge-pill badge-secondary text-white" href="<?php echo get_category_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="col">
										<span class="float-right">
											<small class="font-weight-bold text-secondary">Comentários:</small> <span class="badge badge-secondary">9</span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>

		<div class="d-flex justify-content-center">
			<?php get_template_part('parts/pagination'); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
