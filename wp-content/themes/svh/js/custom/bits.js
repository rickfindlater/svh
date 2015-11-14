// JS Bits and pieces

(function($) {

	//scroll to contact form on homepage
	$("#scroll-contact-form").click(function() {
		$('html, body').animate({
			scrollTop: $("#contact-form-anchor").offset().top
		}, 800);
	});

})(jQuery);