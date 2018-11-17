jQuery('document').ready(function () {

	jQuery(window).scroll(function () {
		var sc = jQuery(window).scrollTop()
		if (sc > 300) {
			jQuery("#header-sroll").addClass("small")
		} else {
			jQuery("#header-sroll").removeClass("small")
		}
	});

	jQuery('.main-banner .owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		nav: true,
		items: 1
	});
	jQuery('.btn-category').owlCarousel({
		loop: false,
		margin: 0,
		nav: false,
		items: 2
	});

});