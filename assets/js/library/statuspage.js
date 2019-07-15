debugger;

function statuspage(){
debugger;
	setInterval(function(){
		ViewCurrentPlanDetail();
	}, 800);
}

jQuery(document).ready(function(){
debugger;
	jQuery('#show_passwordd').on('click', function(){  
		debugger;
		var passwordField = jQuery('#passwordotp');  
		var passwordFieldType = passwordField.attr('type');
			if(passwordFieldType == 'password'){  
				passwordField.attr('type', 'text');  					
				jQuery("#show_passwordd").attr("title","Hide Password");  

			}else{  
				passwordField.attr('type', 'password');  
				jQuery("#show_passwordd").attr("title","Show Password");  
			}
	});  
});