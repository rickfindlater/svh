// JS Bits and pieces

$(document).ready(function(){
	//scroll to contact form on homepage
	$("#scroll-contact-form").click(function() {
		$('html, body').animate({
			scrollTop: $("#contact-form-anchor").offset().top
		}, 800);
	});



	function fadeHero(){
		$(".hp-hero-inner").fadeIn();
	}
	setTimeout(fadeHero, 1000);

});