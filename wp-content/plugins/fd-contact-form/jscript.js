
var Fd_JScript = {

	init: function(){
		Fd_JScript.placeholder();
		Fd_JScript.sanitize_submit();
	},
	placeholder: function(){

		jQuery('.fd-form [placeholder]').focus(function() {

			var input = jQuery(this); console.log('focus');
			if (input.val() == input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
				input.removeClass("fd-input-invalid");
			}

		}).blur(function() { 

			var input = jQuery(this); 
			if (input.val() == '' || input.val() == input.attr('placeholder') || input.val().length < 1) {
				input.addClass('placeholder'); 
				input.addClass('fd-input-invalid');
				input.val(input.attr('placeholder'));
			}else{
				input.removeClass('fd-input-invalid');
			}
			
			Fd_JScript.validate_email(input.attr("id"), input.val());

		});
	},
	sanitize_submit: function(){
		jQuery("#fd-contact-form #fd-submit-form").click( function(e){

			//

			var validate_result = true;
			jQuery.each( jQuery("#fd-contact-form .required"), function(k,v){
				if( false === Fd_JScript.matcher(v.placeholder,v.value) ){
					jQuery('#'+v.id).addClass("fd-input-invalid");
					return false;
				}
				else if( v.value.length == 0 ){
					jQuery('#'+v.id).addClass("fd-input-invalid");
					return false;
				}else{
					Fd_JScript.validate_email(v.id, v.value);
				}
			});

			if( jQuery("#fd-contact-form .fd-input-invalid").length < 1 ){
				return true;
			}else{
				//false
				e.preventDefault();
			}
			
		});
	},
	matcher: function(key, match){

		if( key === match ){
			return false;
		}else{
			return true;
		}

	},
	validate_email: function(obj_id, obj_value){
		
		if( jQuery('#' + obj_id ).hasClass("email")){
			
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if( false === emailReg.test(obj_value) ){
				jQuery('#'+obj_id).addClass("fd-input-invalid");
				return false;
			}else{
				if( jQuery('#'+obj_id).hasClass("fd-input-invalid") ){
					jQuery('#'+obj_id).removeClass("fd-input-invalid");
				}
				return true;
			}
			
		}
		
	}

};

jQuery(document).ready( Fd_JScript.init );