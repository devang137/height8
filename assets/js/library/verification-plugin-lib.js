jQuery(document).ready(function(){
    jQuery("#submit_password").click(function(){
debugger;   
        if (jQuery("#password").val() == "") {
            swal.fire({
                title: "Please Enter OTP !",
                type: "warning",
            });
            jQuery("#password").css({ "border": "1px solid #b73e41", "border-radius": "12px" });
            return false;   
        }
        if (CheckCustomerStatus_Response == "Invalid Username or Password!" || CheckCustomerStatus_Response == "User Does not exists !" || CheckCustomerStatus_Response == "New - Activation Pending") {    
            var ResponseCodeOTPVerification =  OTPVerification();
            var ResponseCodeOTPVerificationstring = JSON.stringify(ResponseCodeOTPVerification);
            var ResponseCodeOTPVerificationobj = jQuery.parseJSON(ResponseCodeOTPVerificationstring);

                jQuery("#ResendOTPVerification_function").html(ResponseCodeOTPVerificationstring);
            var ResponseCodeOTPVerificationobj_Array = {};
                ResponseCodeOTPVerificationobj_Array.readyState = ResponseCodeOTPVerificationobj.readyState;
                ResponseCodeOTPVerificationobj_Array.ResponseCode = ResponseCodeOTPVerificationobj.responseText;
                ResponseCodeOTPVerificationobj_Array.status = ResponseCodeOTPVerificationobj.status;
                ResponseCodeOTPVerificationobj_Array.statusText = ResponseCodeOTPVerificationobj.statusText;    
                ResponseCodeOTPVerificationobj_Array.responseJSON = ResponseCodeOTPVerificationobj.responseJSON.d.Response;

                    if(ResponseCodeOTPVerificationobj_Array.readyState == 4 && ResponseCodeOTPVerificationobj_Array.status == 200){
                            if(ResponseCodeOTPVerificationobj_Array.responseJSON == "Success"){
debugger;
                                const Toast = Swal.mixin({toast: true,showConfirmButton: false,timer: 1400});
                                      Toast.fire({type: 'success',title: 'OTP verification successfully'});

                                    var ResponseCodeWiFiRegistration = WiFiRegistration();
debugger;
                                    var ResponseCodeWiFiRegistrationstring = JSON.stringify(ResponseCodeWiFiRegistration);
                                    var ResponseCodeWiFiRegistrationobj = jQuery.parseJSON(ResponseCodeWiFiRegistrationstring);

                                    jQuery("#WiFiRegistration_function").html(ResponseCodeOTPVerificationstring);
                                    var ResponseCodeWiFiRegistrationobj_Array = {};
                                        ResponseCodeWiFiRegistrationobj_Array.readyState = ResponseCodeWiFiRegistrationobj.readyState;
                                        ResponseCodeWiFiRegistrationobj_Array.ResponseCode = ResponseCodeWiFiRegistrationobj.responseText;
                                        ResponseCodeWiFiRegistrationobj_Array.status = ResponseCodeWiFiRegistrationobj.status;
                                        ResponseCodeWiFiRegistrationobj_Array.statusText = ResponseCodeWiFiRegistrationobj.statusText;   
                                        ResponseCodeWiFiRegistrationobj_Array.responseJSON = ResponseCodeWiFiRegistrationobj.responseJSON.d.Response; 

                                    if(ResponseCodeWiFiRegistrationobj_Array.readyState == 4 && ResponseCodeWiFiRegistrationobj_Array.status == 200){
                                            if (ResponseCodeWiFiRegistrationobj_Array.responseJSON == "Success") {
                                                doLogin();                                                     
                                            } else {
                                                Swal.fire({ title: 'Oops', html: "<b>" + ResponseCodeWiFiRegistrationobj_Array.responseJSON + "</b>", type: 'warning', cancelButtonColor: '#d33', })
                                                return false;
                                            }
                                    }else{
                                        Swal.fire({title: 'Oops',html: "Error <b> ReadyState : "+ ResponseCodeWiFiRegistrationobj_Array.readyState + "<br> Status : " + ResponseCodeWiFiRegistrationobj_Array.status + " </b>",type: 'warning',cancelButtonColor: '#d33',});
                                        return false;
                                    }
                            }else{
                                jQuery("#password").css({"border":"1px solid #b73e41","border-radius": "12px"});
                                Swal.fire({title: 'Oops',html: "<b>"+ ResponseCodeOTPVerificationobj_Array.responseJSON +"</b><br> ",type: 'warning',cancelButtonColor: '#d33',});
                                return false;
                            }
                    }else{
                        jQuery("#password").css({"border":"1px solid #b73e41","border-radius": "12px"});
                        Swal.fire({title: 'Oops',html: "<b> ReadyState :"+ ResponseCodeOTPVerificationobj_Array.readyState +"<br> ReadyStatus :"+ ResponseCodeOTPVerificationobj_Array.status +"</b>",type: 'warning',cancelButtonColor: '#d33',});
                    }
            return false;
        }else if(CheckCustomerStatus_Response == "Inactive"){
            Swal.fire({ title: 'Oops', html: "Oops you are <b>" + CheckCustomerStatus_Response + "</b> Purchase Plan", type: 'warning', cancelButtonColor: '#d33', });
            backbutton();                               //  GO Back function
            return false;
        }else if(CheckCustomerStatus_Response == "Active" || CheckCustomerStatus_Response == "Userame Already Exist."){
            var ResponseCodeResendOTPVerification =  ResendOTPVerification();
debugger;
            var ResponseCodeResendOTPVerificationstring = JSON.stringify(ResponseCodeResendOTPVerification);
            var ResponseCodeResendOTPVerificationobj = jQuery.parseJSON(ResponseCodeResendOTPVerificationstring);
                // jQuery("#ResendOTPVerification_function").html(ResponseCodeResendOTPVerificationstring);
            var ResponseCodeResendOTPVerificationnobj_Array = {};
                ResponseCodeResendOTPVerificationnobj_Array.readyState = ResponseCodeResendOTPVerificationobj.readyState;
                ResponseCodeResendOTPVerificationnobj_Array.ResponseCode = ResponseCodeResendOTPVerificationobj.responseText;
                ResponseCodeResendOTPVerificationnobj_Array.status = ResponseCodeResendOTPVerificationobj.status;
                ResponseCodeResendOTPVerificationnobj_Array.statusText = ResponseCodeResendOTPVerificationobj.statusText;    
                ResponseCodeResendOTPVerificationnobj_Array.responseJSON = ResponseCodeResendOTPVerificationobj.responseJSON.d.Response;
debugger;            
                    if(ResponseCodeResendOTPVerificationnobj_Array.readyState == 4 && ResponseCodeResendOTPVerificationnobj_Array.status == 200){
                        if(ResponseCodeResendOTPVerificationnobj_Array.responseJSON == "Success"){
                            doLogin();
                        }else{
                            Swal.fire({title: 'Oops',html: "Oops...<b> "+ ResponseCodeResendOTPVerificationnobj_Array.responseJSON +"</b>",type: 'warning',cancelButtonColor: '#d33',})
                            return false;
                        }
                    }else{
                        Swal.fire({title: 'Oops',html: "Oops...error<b> ReadyState :"+ ResponseCodeResendOTPVerificationnobj_Array.readyState +"<br> ReadyStatus :"+ ResponseCodeResendOTPVerificationnobj_Array.status +"</b>",type: 'warning',cancelButtonColor: '#d33',});
                        return false;
                    }
            return false;
        }else {
            swal.fire({title:"Oops...",type:"error",html:"<b>Oops... "+ CheckCustomerStatus_Response +"</b>"}); 
            return false;   
        }
    });        
});
