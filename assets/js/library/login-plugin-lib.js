var CheckCustomerStatus_Response;

jQuery(document).ready(function () {
    jQuery("#otp_send").click(function () {
    debugger;
        var api = jQuery("#url").val();
        var Country = document.getElementById("loginCountry");
        var loginCountry = Country.options[Country.selectedIndex].value;
        var mobileNo = jQuery("#username").val();
            getapdetail;
            var blank_field = jQuery('.animation').filter(function(){
                return !this.value;
            });
            blank_field.addClass('animated shake');
            
            setTimeout(function(){
                blank_field.removeClass('animated shake');
            },1000);

        if (loginCountry == "") {                                            //     Country option
            swal.fire({
                title: "Please Select Country !",
                type: "warning",
            });
            setInterval(function () {
                jQuery('#loginCountry').animate({ 'border': '2px solid red', 'border-radius': '15px', 'color': '#b73e41' }, 300)
                    .animate({ 'border': '5px solid red', 'border-radius': '10px' }, 300);
            }, 1000);
            return false;
        } else if (mobileNo == "") {                                          //     Mobile no null
            swal.fire({
                title: "Please Enter Mobile Number !",
                type: "warning",
            });
            var blank_field = jQuery("#username").css({ "border": "1px solid #b73e41", "border-radius": "12px" });
                blank_field.addClass('animated shake');
                    setTimeout(function(){
                        blank_field.removeClass('animated shake');
                    },1000);
            return false;
        } else if (mobileNo.length < 6 || mobileNo.length > 12) {             //     Mobile no 6 to 12
            swal.fire({
                title: "Please Enter number 6 to 12 digits !",
                type: "warning",
            });
            jQuery("#username").css({ "color": "red" });
            return false;
        } else if (!/^[0-9]+$/.test(mobileNo)) { 
            swal.fire({
                title:"Please only enter numeric characters!",
                html: "Allowed input:0-9 !",
                type: "warning",
            });
            jQuery("#username").css({ "color": "red" });
            return false;
        }

        //  GetApDetail object
        var getapdetail = GL_GetApDetail_obj;
        var apobj = jQuery.parseJSON(getapdetail);

        var getapdetail = {};
            getapdetail_ID = apobj.d.ID;
            getapdetail_LocationID = apobj.d.LocationID;
            getapdetail_hid = apobj.d.hid;
            getapdetail_SSIDconfig = apobj.d.SSIDconfig;
            getapdetail_Partnerid = apobj.d.Partnerid;
            getapdetail_Resellerid = apobj.d.Resellerid;
            getapdetail_Hotspotgroup = apobj.d.Hotspotgroup;

        //  CheckCustomerStatus  
        var CheckCustomerStatus = {};
            CheckCustomerStatus.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
            CheckCustomerStatus.otp = jQuery("#password").val() != null ? jQuery("#password").val() : "";
            CheckCustomerStatus.LocationId = getapdetail_LocationID != null ? getapdetail_LocationID : "";
            CheckCustomerStatus.mac = jQuery("#mk_mac").val() != null ? jQuery("#mk_mac").val() : "";
            CheckCustomerStatus.hotspotgroup = getapdetail_Hotspotgroup != null ? getapdetail_Hotspotgroup : "";
            CheckCustomerStatus.chkexistuser = "1";
            CheckCustomerStatus.client_mac = "";
            CheckCustomerStatus.AccessCode = "";
            CheckCustomerStatus.HotspotId = getapdetail_hid != null ? getapdetail_hid : "";
            CheckCustomerStatus.devicedesc = "";
            sessionStorage.setItem("username", CheckCustomerStatus.mobileNo);              // number save session 
        debugger;
        const CheckCustomerStatus_first_time = "{'request':{'mobileNo':'" + CheckCustomerStatus.mobileNo + "','otp':'','LocationId':'" + CheckCustomerStatus.LocationId + "','mac':'" + CheckCustomerStatus.mac + "','hotspotgroup':'" + CheckCustomerStatus.hotspotgroup + "','chkexistuser':'" + CheckCustomerStatus.chkexistuser + "','client_mac':'','AccessCode':'','HotspotId':'" + CheckCustomerStatus.HotspotId + "','devicedesc':''}}";
        jQuery.ajax({
            type: "POST",
            url: api + "/CheckCustomerStatus",
            data: CheckCustomerStatus_first_time,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                var Customers_Response = JSON.stringify(data);
                    CheckCustomerStatus_Response = data.d.Response;
                
                jQuery("#CheckCustomerStatus").html(Customers_Response);
                debugger;
                if (CheckCustomerStatus_Response == "Invalid Username or Password!" || CheckCustomerStatus_Response == "User Does not exists !" || CheckCustomerStatus_Response == "New - Activation Pending") {
                    var ResponseCodeOTP = OTPGeneration();
                    var ResponseCodeOTPstring = JSON.stringify(ResponseCodeOTP);
                    var ResponseCodeOTPobj = jQuery.parseJSON(ResponseCodeOTPstring);
                        
                        jQuery("#OTPGeneration_function").html(ResponseCodeOTPstring);
                    var ResponseCodeOTPobj_Array = {};
                        ResponseCodeOTPobj_Array.readyState = ResponseCodeOTPobj.readyState;
                        ResponseCodeOTPobj_Array.ResponseCode = ResponseCodeOTPobj.responseText;
                        ResponseCodeOTPobj_Array.status = ResponseCodeOTPobj.status;
                        ResponseCodeOTPobj_Array.statusText = ResponseCodeOTPobj.statusText;
                        ResponseCodeOTPobj_Array.responseJSON = ResponseCodeOTPobj.responseJSON.d.Response;

                    if (ResponseCodeOTPobj_Array.readyState == 4 && ResponseCodeOTPobj_Array.status == 200) {
                        if (ResponseCodeOTPobj_Array.responseJSON == "Success") {
                            jQuery('div[id="mobile_number"]').css('display', 'none');
                            jQuery('div[id="verify_number"]').css('display', 'block');

                            const Toast = Swal.mixin({ toast: true, showConfirmButton: false, timer: 1400 });
                            Toast.fire({ type: 'success', title: 'OTP Send successfully' });
debugger;   
                            jQuery("#customer_number").val(CheckCustomerStatus.mobileNo);       // resend otp store mob no
                            jQuery("#customer_number").html(CheckCustomerStatus.mobileNo);  
                        }else {
                            jQuery('div[id="verify_number"]').css('display', 'none');
                            Swal.fire({ title: 'Oops', html: "<b>" + ResponseCodeOTPobj_Array.responseJSON + "</b>", type: 'warning', cancelButtonColor: '#d33', });
                            return false;
                        }
                    } else {
                        jQuery('div[id="verify_number"]').css('display', 'none');
                        Swal.fire({ title: 'Oops', html: "Oops...<b> ReadyState error" + ResponseCodeOTPobj_Array.readyState + "<br> ReadyState error" + ResponseCodeOTPobj_Array.status + "</b>", type: 'warning', cancelButtonColor: '#d33', });
                        return false;   
                    }
                } else if (CheckCustomerStatus_Response == "Inactive") {
                    Swal.fire({ title: 'Oops', html: "Oops you are <b>" + CheckCustomerStatus_Response + "</b> Purchase Plan", type: 'warning', cancelButtonColor: '#d33', })
                    return false;
                } else if (CheckCustomerStatus_Response == "Active" || CheckCustomerStatus_Response == "Userame Already Exist.") {
debugger;
                    var ResponseCodeResendOTP = ResendOTP();           //  Resend OTP Send
debugger;
                    var ResponseCodeResendOTPstring = JSON.stringify(ResponseCodeResendOTP);
                    var ResponseCodeResendOTPobj = jQuery.parseJSON(ResponseCodeResendOTPstring);

                        jQuery("#ResendOTP_function").html(ResponseCodeOTPstring);

                    var ResponseCodeResendOTPobj_Array = {};
                        ResponseCodeResendOTPobj_Array.readyState = ResponseCodeResendOTPobj.readyState;
                        ResponseCodeResendOTPobj_Array.ResponseCode = ResponseCodeResendOTPobj.responseText;
                        ResponseCodeResendOTPobj_Array.status = ResponseCodeResendOTPobj.status;
                        ResponseCodeResendOTPobj_Array.responseJSON = ResponseCodeResendOTPobj.responseJSON.d.Response;

                    if (ResponseCodeResendOTPobj_Array.readyState == 4 && ResponseCodeResendOTPobj_Array.status == 200) {
                        if (ResponseCodeResendOTPobj_Array.responseJSON == "Success") {
                            jQuery('div[id="mobile_number"]').css('display', 'none');
                            jQuery('div[id="verify_number"]').css('display', 'block');

                            const Toast = Swal.mixin({ toast: true, showConfirmButton: false, timer: 1400 });
                            Toast.fire({ type: 'success', title: 'OTP Send successfully' });

                            jQuery("#customer_number").html(CheckCustomerStatus.mobileNo);  
                        }
                        else {
                            jQuery('div[id="verify_number"]').css('display', 'none');
                            Swal.fire({ title: 'Oops', html: "<b>"+ ResponseCodeResendOTPobj_Array.responseJSON + "</b>", type: 'warning', cancelButtonColor: '#d33', });
                            return false;
                        }
                    } else {
                        jQuery('div[id="verify_number"]').css('display', 'none');
                        Swal.fire({ title: 'Oops', html: "<b> ReadyState error" + ResponseCodeResendOTPobj_Array.readyState + "<br> ReadyState error" + ResponseCodeResendOTPobj_Array.status + "</b>", type: 'warning', cancelButtonColor: '#d33', });
                        return false;
                    }
                    return false;
                } else {
                    swal.fire({ title: "Oops...", type: "error", html: "<b>Oops... " + CheckCustomerStatus_Response + "</b>" });
                    return false;
                }
            },
            error: function (data) {
                swal.fire({
                    title: "CheckCustomerStatus Fail",
                    html: data.responseJSON.Message,
                    type: "error",
                });
                return false;
            }
        })         //  CheckCustomerStatus finish
        return false;
    });
});
