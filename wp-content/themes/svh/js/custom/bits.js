// JS Bits and pieces

//scroll to contact form on homepage
$("#scroll-contact-form").click(function() {
	$('html, body').animate({
		scrollTop: $("#contact-form-anchor").offset().top
	}, 800);
});
