// JS Bits and pieces

$(document).ready(function(){

	if (Function('/*@cc_on return document.documentMode===10@*/')()){
		document.documentElement.className+=' ie';
	}

	function fadeHero(){
		$(".home .off-canvas-wrap").css('background', 'none');
	}
	setTimeout(fadeHero, 1000);

	if(WURFL.is_mobile) {
		$('body').addClass('mobile');
	}
});