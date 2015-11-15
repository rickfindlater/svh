// JS Bits and pieces

$(document).ready(function(){
	//scroll to contact form on homepage
	$("#scroll-contact-form").click(function() {
		$('html, body').animate({
			scrollTop: $("#contact-form-anchor").offset().top
		}, 800);
	});

	function fadeHero(){
		$(".off-canvas-wrap").css('background', 'none');
	}
	setTimeout(fadeHero, 1000);

});