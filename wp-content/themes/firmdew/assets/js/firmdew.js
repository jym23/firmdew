jQuery(function(){

	if(jQuery('#homesliders').is(':visible')){

		jQuery('#homesliders').before('<div class="slider-nav"><a href="#" id="prev"><i class="fa fa-chevron-left"></i></a><a href="#" id="next"><i class="fa fa-chevron-right"></i></a></div>').cycle({
			fx: 'scrollHorz',
			delay: -2000,
			timeout: 3000,
			fit: 1,
			slideResize: true,
			next: '#next',
			prev: '#prev',
			pause:   1
		});
		
	}

});