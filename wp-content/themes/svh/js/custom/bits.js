// JS Bits and pieces

$(document).ready(function(){

	if (Function('/*@cc_on return document.documentMode===10@*/')()){
		document.documentElement.className+=' ie';
	}

	//scroll to contact form on homepage
	$("#scroll-contact-form").click(function() {
		$('html, body').animate({
			scrollTop: $("#contact-form-anchor").offset().top
		}, 800);
	});

	function fadeHero(){
		$(".home .off-canvas-wrap").css('background', 'none');
	}
	setTimeout(fadeHero, 1000);

	if(WURFL.is_mobile) {
		$('body').addClass('mobile');
	}
});