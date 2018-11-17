<?php get_header(); 
the_post();
?>

<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<small class="posted d-block mb-2 text-secondary">Postado em <strong><?php the_date('d \d\e F \d\e Y'); ?></strong> às <strong><?php the_time('H:i'); ?></strong> por <strong><?php the_author(); ?></strong></small>
			<h1 class="h3 font-weight-bold"><?php the_title(); ?></h1>
			<div class="text-secondary">
				<?php the_excerpt(); ?>
			</div>

			<picture class="d-block mb-2">
				<?php the_post_thumbnail('list-image', array('class' => 'img-fluid')); ?>
			</picture>

			<ul class="categories d-flex list-unstyled">
				<?php
				$cats = get_the_category();
				foreach($cats as $cat): ?>
					<li class="mr-1">
						<a class="badge badge-primary text-white" href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="content mb-5">
				<?php the_content(); ?>
			</div>

			<?php
			$previous = get_previous_post();
			$next = get_next_post();
			?>
			<div class="blog-nav mb-5">
				<div class="row justify-content-between">
					<div class="prev-page col-4">
						<?php if(get_next_post()): ?>
							<a href="<?php echo get_permalink($next->ID); ?>">
								<strong>Anterior</strong>
								<h5 class="h6 hidden-xs hidden-sm"><?php echo get_the_title($next->ID); ?></h4>
							</a>
						<?php endif; ?>
					</div>
					<div class="next-page col-4 text-right">
						<?php if(get_previous_post()): ?>
							<a href="<?php echo get_permalink($previous->ID); ?>">
								<strong>Próximo</strong>
								<h5 class="h6 hidden-xs hidden-sm"><?php echo get_the_title($previous->ID); ?></h4>
							</a>
						<?php endif; ?>	
					</div>
				</div>
			</div>

			<div id="disqus_thread"></div>
		</div>
	</div>
</div>

<script>
	/**
	*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
	*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
	*/
	/*
	var disqus_config = function () {
		this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
		this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
	};
	*/
	(function() {  // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');
		
		s.src = '//blog-8irjrahahj.disqus.com/embed.js';
		
		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
	})();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<?php get_footer(); ?>
