(function(){

	var menu = {
				'id':'top-menu'
				};

	jQuery('#' + menu.id + ' li').on('hover', function(){
		if( jQuery(this).has('ul.sub-menu').length > 0 ){ 
			var li_id = jQuery(this).attr('id');
			jQuery('#'+ menu.id + ' li#' + li_id + ' ul.sub-menu').toggleClass('show');
		}
	});

}(jQuery));