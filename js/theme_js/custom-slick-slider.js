jQuery(document).ready(function($){
	$('#testimonial_slider').css("visibility", "visible");
	$('#testimonial_slider').slick({
		dots: false,
		arrows: false,
		lazyLoad: 'ondemand',
		fade: true,
		autoplay: true,
		autoplaySpeed: 8000,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1
	}); 
	
});

