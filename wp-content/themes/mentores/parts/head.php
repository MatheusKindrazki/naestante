<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="pt-BR">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="pt-BR">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="pt-BR">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html dir="ltr" lang="pt-BR">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(); ?></title>	
	<?php wp_head(); ?>

	<link rel="icon" type="image/png" href="<?php echo get_field('favicon', 'options')['sizes']['thumbnail']; ?>"/>

	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/owl.carousel.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!-- Theme Style -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/style.css">
	<!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/fonts/style.css"> -->

	<!-- Theme Fonts Config -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800" rel="stylesheet">

<style>
@font-face {
    font-family: 'phosphatesolidmedium';
    src: url('phosphatesolid-webfont.woff2') format('woff2'),
        url('phosphatesolid-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}
</style>

</head>
<body <?php body_class(); ?>>
<!-- Custom Admin Theme Config -->
<?php get_template_part('parts/theme-config'); ?>
