<footer class="bg-dark pt-3 pb-3">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
			</div>
		</div>
	</div>
</footer>


<div class="sub-footer bg-primary pt-2 pb-2">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-6">
				<p class="mb-0">Blog <?php echo date("Y"); ?>®, <?php _e('All rights reserved', 'mentores'); ?></p>
			</div>
			<div class="col-sm-6">
				<div class="new-mentores float-right">
					<p class="mb-0"><?php _e('Developed by', 'mentores'); ?> <a class="text-white" href="https://mentores.com.br/" target="_BLANK">Mentores <span class="sr-only">- Branding Digital em Curitiba</span></a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

<?php get_template_part('parts/codigos-externos'); ?>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Owl Carousel JS -->
<script src="<?php bloginfo('template_directory'); ?>/assets/js/owl.carousel.min.js"></script>
<!-- jQuery Mask -->
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.mask.js"></script>
<!-- Theme JS -->
<script src="<?php bloginfo('template_directory'); ?>/assets/js/functions.js"></script>

<script id="dsq-count-scr" src="//blog-8irjrahahj.disqus.com/count.js" async></script>
</body>
</html>
