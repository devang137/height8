<?php
function resend_otp(){
	$Plans = HEIGHT8_URL_WORDPRESS."/viewplans";
	echo "<script>";
	echo "window.location='$Plans';";
	echo "</script>";
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('form[id="formform"]').remove();	

	jQuery("#btn").click(function(){
	var user_resend = jQuery("#username").val();
	const CheckCustomerStatus_ResendOTP = "{'request':{'mobileNo':"+ user_resend +",'hId':'','LocationId':'','hotspotgroup':''}}";

		jQuery.ajax({
				type: "POST",
				url: "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/ResendOTP",
				data: CheckCustomerStatus_ResendOTP,
				contentType: "application/json; charset=utf-8",
				dataType: "json",

				success: function(data) {
					// var obj = JSON.stringify(data);
    				// document.getElementById("demo").innerHTML = obj;
                   	// var a = document.getElementById("demo1").innerHTML = data.d.Response;
                   	var a = data.d.Response;
                   	if (a == 'Success') {
                   		const Toast = Swal.mixin({toast: true,showConfirmButton: false,timer: 1400});
						Toast.fire({type: 'success',title: 'OTP Resend Send successfully'})
                   	}else{
                   		const Toast = Swal.mixin({toast: true,showConfirmButton: false,timer: 1400});
                   		Toast.fire({type: 'success',title: '<b>Permitted limit of PIN request is reached, please try after 1 hour</b>'})
                   	}
				},
				error:function(data){
					 alert("error");	
				}
		})
	});
});
</script>

<?php	
}
?>