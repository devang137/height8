jQuery(document).ready(function () {
    var GL_Customers_response;

    jQuery("#paid_voucher").click(function () {
        var api = sessionStorage.getItem("url");
        var Country = document.getElementById("loginCountry");
        var loginCountry = Country.options[Country.selectedIndex].value;
        var loginCountryname = Country.options[Country.selectedIndex].text;
        var mobileNo = jQuery("#username").val();
    debugger;

        if (loginCountry == "") {                                            //     Country option
            swal.fire({
                title: "Please Select Country !",
                type: "warning",
            });
            setInterval(function () {
                jQuery('#loginCountry').animate({ 'border': '2px solid red', 'border-radius': '15px', 'color': '#b73e41' }, 300)
                    .animate({ 'border': '5px solid red', 'border-radius': '10px' }, 300);
            }, 100);
                var blank_field = jQuery('.animation').filter(function(){
                    return !this.value;
                });
                blank_field.addClass('animated shake');
            
                setTimeout(function(){
                    blank_field.removeClass('animated shake');
                },1000);
            return false;
        } else if (mobileNo == "") {                                          //     Mobile no null
            swal.fire({
                title: "Please Enter Mobile Number !",
                type: "warning",
            });
            jQuery("#username").css({ "border": "1px solid #b73e41", "border-radius": "12px" });
            return false;
        } else if (mobileNo.length < 6 || mobileNo.length > 12) {             //     Mobile no 6 to 12
            swal.fire({
                title: "Please Enter number 6 to 12 digits !",
                type: "warning",
            });
            jQuery("#username").css({ "color": "red" });
            return false;
        }else if (!/^[0-9]+$/.test(mobileNo)) { 
            swal.fire({
                title:"Please only enter numeric characters!",
                html: "Allowed input:0-9 !",
                type: "warning",
            });
            jQuery("#username").css({ "color": "red" });
            return false;
        }
debugger;
        sessionStorage.setItem("Username", loginCountry + mobileNo);                           //  session storege
        var getapdetail = sessionStorage.getItem("getapdetail");
        var getapdetail_obj = JSON.parse(getapdetail);
        
        var getapdetail = {};
            getapdetail.ID = getapdetail_obj.d.ID;
            getapdetail.hid = getapdetail_obj.d.hid;
            getapdetail.LocationID = getapdetail_obj.d.LocationID;
            getapdetail.SSIDconfig = getapdetail_obj.d.SSIDconfig;
            getapdetail.Response = getapdetail_obj.d.Response;
            getapdetail.Hotspotgroup = getapdetail_obj.d.Hotspotgroup;

        var CheckCustomerStatuss = {};
            CheckCustomerStatuss.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
            CheckCustomerStatuss.otp = jQuery("#password").val() != null ? jQuery("#password").val() : "";
            CheckCustomerStatuss.LocationId = getapdetail.LocationID != null ? getapdetail.LocationID : "";
            CheckCustomerStatuss.mac = jQuery("#mk_mac").val() != null ? jQuery("#mk_mac").val() : "";
            CheckCustomerStatuss.hotspotgroup = getapdetail.Hotspotgroup != null ? getapdetail.Hotspotgroup : "";
            CheckCustomerStatuss.chkexistuser = "1";
            CheckCustomerStatuss.client_mac = "";
            CheckCustomerStatuss.AccessCode = "";
            CheckCustomerStatuss.HotspotId = getapdetail.hid != null ? getapdetail.hid : "";
            CheckCustomerStatuss.devicedesc = "";
        debugger;
        const CheckCustomerStatuss_json = "{'request':{'mobileNo':'" + CheckCustomerStatuss.mobileNo + "','otp':'" + CheckCustomerStatuss.otp + "','LocationId':'" + CheckCustomerStatuss.LocationId + "','mac':'" + CheckCustomerStatuss.mac + "','hotspotgroup':'" + CheckCustomerStatuss.hotspotgroup + "','chkexistuser':'" + CheckCustomerStatuss.chkexistuser + "','client_mac':'','AccessCode':'','HotspotId':'" + CheckCustomerStatuss.HotspotId + "','devicedesc':''}}";
        return jQuery.ajax({
            type: "POST",
            url: api + "/CheckCustomerStatus",
            data: CheckCustomerStatuss_json,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: false,
            success: function (data) {
                debugger;
                var CheckCustomerStatuss_Response = JSON.stringify(data);
                GL_Customers_response = data.d.Response;                // Global varibal

                if (GL_Customers_response == "Invalid Username or Password!" || GL_Customers_response == "User Does not exists !" || GL_Customers_response == "New - Activation Pending") {

                    var blank_field = jQuery('div[id="mobile_number"],div[id="verify_number"],form[id="showplans"],form[id="showpurchaseplans"],form[id="paymentverifyform"]').css('display', 'none');
                        blank_field.addClass('animated bounceInRight');
                    jQuery('form[id="vocher_purchase"]').css('display', 'block');

                } else if (GL_Customers_response == "Inactive") {

                    var blank_field = jQuery('div[id="mobile_number"],div[id="verify_number"],form[id="showplans"],form[id="showpurchaseplans"],form[id="paymentverifyform"]').css('display', 'none');
                        blank_field.addClass('animated bounceInRight');
                    jQuery('form[id="vocher_purchase"]').css('display', 'block');

                } else if (GL_Customers_response == "Active") {

                    var blank_field = jQuery('div[id="mobile_number"],div[id="verify_number"],form[id="showplans"],form[id="showpurchaseplans"],form[id="paymentverifyform"]').css('display', 'none');
                        blank_field.addClass('animated bounceInRight');
                    jQuery('form[id="vocher_purchase"]').css('display', 'block');

                } else {
                    swal.fire({
                        title: " " + GL_Customers_response,
                        type: "error",
                    });
                    return false;
                }
            },
            error: function (data) {
                var msg = data.d.Response;
                swal.fire({
                    title: " " + msg,
                    type: "error",
                });
                return false;
            }
        })          //  CheckCustomerStatus over
    });             //  paid_voucher btn click event

    // --------------------------------------------------------------------------------------------------------------------------------

    jQuery("#btn_verfiy_vocher").click(function () {
        var voucher_pin = jQuery("#voucher_pin").val();

        if (voucher_pin == "") {
            swal.fire({
                title: "Enter Voucher PIN !",
                type: "warning",
            });
            var blank_field = jQuery("#voucher_pin").css({ "border": "1px solid #b73e41", "border-radius": "12px" });
                blank_field.addClass('animated shake');

            setTimeout(function () {
                blank_field.removeClass('animated shake');
                jQuery("#voucher_pin").css({ "height": "35px"});
            }, 1000);
            return false;
        }

        if (GL_Customers_response == "Invalid Username or Password!" || GL_Customers_response == "User Does not exists !" || GL_Customers_response == "New - Activation Pending") {
            debugger;
            openvoucherpage();
            var voucher_function = GenerateOTPForVoucherRegistration();
            var voucher_function_string = JSON.stringify(voucher_function);
            var voucher_functionn_obj = jQuery.parseJSON(voucher_function_string);

            var voucher_functionn_obj_Array = {};
                voucher_functionn_obj_Array.readyState = voucher_functionn_obj.readyState;
                voucher_functionn_obj_Array.ResponseCode = voucher_functionn_obj.responseText;
                voucher_functionn_obj_Array.status = voucher_functionn_obj.status;
                voucher_functionn_obj_Array.statusText = voucher_functionn_obj.statusText;    
                voucher_functionn_obj_Array.responseJSON = voucher_functionn_obj.responseJSON.d.Response;

                if(voucher_functionn_obj_Array.readyState == 4 && voucher_functionn_obj_Array.status == 200){
                    if (voucher_functionn_obj_Array.responseJSON == "Success") {
                        openvoucherpage();
                    } else {
                        Swal.fire({ title: 'Oops', html: "<b>" + voucher_functionn_obj_Array.responseJSON + "</b>", type: 'warning', cancelButtonColor: '#d33', })
                        return false;
                    }
                }else{
                    Swal.fire({title: 'Oops',html: "<b> ReadyState :"+ voucher_functionn_obj_Array.readyState +"<br> ReadyStatus :"+ voucher_functionn_obj_Array.status +"</b>",type: 'warning',cancelButtonColor: '#d33',});
                    return false;
                }
        } else if (GL_Customers_response == "Inactive" || GL_Customers_response == "Active") {
            debugger;
            openvoucherpage();
                var voucher_function = ResendOTP_Voucher();
                var voucher_function_string = JSON.stringify(voucher_function);
                var voucher_function_obj = JSON.parse(voucher_function_string);

            debugger;
                var voucher_function_obj_Array = {};
                    voucher_function_obj_Array.readyState = voucher_function_obj.readyState;
                    voucher_function_obj_Array.ResponseCode = voucher_function_obj.responseText;
                    voucher_function_obj_Array.status = voucher_function_obj.status;
                    voucher_function_obj_Array.statusText = voucher_function_obj.statusText;    
                    voucher_function_obj_Array.responseJSON = voucher_function_obj.responseJSON.d.Response;

                if(voucher_function_obj_Array.readyState == 4 && voucher_function_obj_Array.status == 200){
                    if(voucher_function_obj_Array.responseJSON == "Success"){
                        openvoucherpage();
                    }else{
                        swal.fire({title: " " + GL_Customers_response,type: "warning",});
                    }
                }else{
                    Swal.fire({ title: 'Oops', html: "<b> Readystate : "+ voucher_function_obj_Array.readyState +"<br> status : "+ voucher_function_obj_Array.status +" </b>", type: 'warning', cancelButtonColor: '#d33', });
                }
        } else {
            swal.fire({ title: " " + GL_Customers_response, type: "error", });
        }
    });

// --------------------------------------------------------------------------------------------------------------------------------
    jQuery("#btn_verfiy_otp").click(function () {
        debugger;
        var api = sessionStorage.getItem("url");
        var voucher_pin = jQuery("#voucher_pin").val();
        var voucher_otp = jQuery("#voucher_otp").val();
            jQuery("#mk_username").val(jQuery("#username").val());
            jQuery("#mk_password").val(jQuery("#voucher_otp").val());
        if (voucher_otp == "") {
            swal.fire({
                title: "Enter OTP PIN !",
                type: "warning",
            });
            var blank_field = jQuery("#voucher_otp").css({ "border": "1px solid #b73e41", "border-radius": "12px" });
            blank_field.addClass('animated shake');

            setTimeout(function () {
                blank_field.removeClass('animated shake');
                jQuery("#voucher_pin").css({ "height": "35px", });
            }, 1000);
            return false;
        }

        if (GL_Customers_response == "Invalid Username or Password!" || GL_Customers_response == "User Does not exists !" || GL_Customers_response == "New - Activation Pending") {
            var voucher_otpverify_function = OTPVerification_Voucher();
            var voucher_otpverify_function_string = JSON.stringify(voucher_otpverify_function);
            var voucher_otpverify_function_obj = JSON.parse(voucher_otpverify_function_string);

            debugger;
            var voucher_otpverify_Array = {};
                voucher_otpverify_Array.readyState = voucher_otpverify_function_obj.readyState;
                voucher_otpverify_Array.ResponseCode = voucher_otpverify_function_obj.responseText;
                voucher_otpverify_Array.status = voucher_otpverify_function_obj.status;
                voucher_otpverify_Array.statusText = voucher_otpverify_function_obj.statusText;
                voucher_otpverify_Array.responseJSON = voucher_otpverify_function_obj.responseJSON.d.Response;

            if (voucher_otpverify_Array.readyState == 4 && voucher_otpverify_Array.status == 200) {
                if (voucher_otpverify_Array.responseJSON == "Success") {
                    var RegistrationWithVoucher_function = RegistrationWithVoucher();
                    var RegistrationWithVoucher_function_string = JSON.stringify(RegistrationWithVoucher_function);
                    var RegistrationWithVoucher_function_obj = JSON.parse(RegistrationWithVoucher_function_string);

                    debugger;
                    var RegistrationWithVoucher_Array = {};
                        RegistrationWithVoucher_Array.readyState = RegistrationWithVoucher_function_obj.readyState;
                        RegistrationWithVoucher_Array.ResponseCode = RegistrationWithVoucher_function_obj.responseText;
                        RegistrationWithVoucher_Array.status = RegistrationWithVoucher_function_obj.status;
                        RegistrationWithVoucher_Array.statusText = RegistrationWithVoucher_function_obj.statusText;
                        RegistrationWithVoucher_Array.responseJSON = RegistrationWithVoucher_function_obj.responseJSON.d.Response;

                    if (RegistrationWithVoucher_Array.readyState == 4 && RegistrationWithVoucher_Array.status == 200) {
                        if (RegistrationWithVoucher_Array.responseJSON == "Success") {
                            var CheckCustomerStatus_user_function = CheckCustomerStatus_user_Voucher();
                            var CheckCustomerStatus_user_function_string = JSON.stringify(CheckCustomerStatus_user_function);
                            var CheckCustomerStatus_user_function_obj = JSON.parse(CheckCustomerStatus_user_function_string);
                            debugger;
                            var CheckCustomerStatus_voucher_Array = {};
                            CheckCustomerStatus_voucher_Array.readyState = CheckCustomerStatus_user_function_obj.readyState;
                            CheckCustomerStatus_voucher_Array.ResponseCode = CheckCustomerStatus_user_function_obj.responseText;
                            CheckCustomerStatus_voucher_Array.status = CheckCustomerStatus_user_function_obj.status;
                            CheckCustomerStatus_voucher_Array.statusText = CheckCustomerStatus_user_function_obj.statusText;
                            CheckCustomerStatus_voucher_Array.responseJSON = CheckCustomerStatus_user_function_obj.responseJSON.d.Response;

                            if (CheckCustomerStatus_voucher_Array.readyState == 4 && CheckCustomerStatus_voucher_Array.status == 200) {
                                if (CheckCustomerStatus_voucher_Array.responseJSON == "Active") {
                                    mikrotiklogin();
                                } else {
                                    swal.fire({ title: " " + CheckCustomerStatus_voucher_Array.responseJSON, type: "warning", });
                                }
                            } else {
                                Swal.fire({ title: 'Oops', html: "<b> Readystate : " + CheckCustomerStatus_voucher_Array.readyState + "<br> status : " + CheckCustomerStatus_voucher_Array.status + " </b>", type: 'warning', cancelButtonColor: '#d33', });
                            }
                        } else {
                            swal.fire({ title: " " + RegistrationWithVoucher_Array.responseJSON, type: "warning", });
                        }
                    } else {
                        Swal.fire({ title: 'Oops', html: "<b> Readystate : " + RegistrationWithVoucher_Array.readyState + "<br> status : " + RegistrationWithVoucher_Array.status + " </b>", type: 'warning', cancelButtonColor: '#d33', });
                    }
                } else {
                    swal.fire({ title: " " + voucher_otpverify_Array.responseJSON, type: "warning", });
                }
            } else {
                Swal.fire({ title: 'Oops', html: "<b> Readystate : " + voucher_otpverify_Array.readyState + "<br> status : " + voucher_otpverify_Array.status + " </b>", type: 'warning', cancelButtonColor: '#d33', });
            }

        } else if (GL_Customers_response == "Active" || GL_Customers_response == "Inactive") {
            var ResendOTPVerification_function = ResendOTPVerification_Voucher();
            var ResendOTPVerification_function_string = JSON.stringify(ResendOTPVerification_function);
            var ResendOTPVerification_function_obj = JSON.parse(ResendOTPVerification_function_string);
debugger;
            var ResendOTPVerification_Array = {};
            ResendOTPVerification_Array.readyState = ResendOTPVerification_function_obj.readyState;
            ResendOTPVerification_Array.ResponseCode = ResendOTPVerification_function_obj.responseText;
            ResendOTPVerification_Array.status = ResendOTPVerification_function_obj.status;
            ResendOTPVerification_Array.statusText = ResendOTPVerification_function_obj.statusText;
            ResendOTPVerification_Array.responseJSON = ResendOTPVerification_function_obj.responseJSON.d.Response;

            if (ResendOTPVerification_Array.readyState == 4 && ResendOTPVerification_Array.status == 200) {
                if (ResendOTPVerification_Array.responseJSON == "Success") {
                    var RenewVoucher_function = RenewVoucher();
                    var RenewVoucher_function_string = JSON.stringify(RenewVoucher_function);
                    var RenewVoucher_function_obj = JSON.parse(RenewVoucher_function_string);
                    debugger;
                    var RenewVoucher_Array = {};
                        RenewVoucher_Array.readyState = RenewVoucher_function_obj.readyState;
                        RenewVoucher_Array.ResponseCode = RenewVoucher_function_obj.responseText;
                        RenewVoucher_Array.status = RenewVoucher_function_obj.status;
                        RenewVoucher_Array.statusText = RenewVoucher_function_obj.statusText;
                        RenewVoucher_Array.responseJSON = RenewVoucher_function_obj.responseJSON.d.Response;

                        if (RenewVoucher_Array.readyState == 4 && RenewVoucher_Array.status == 200) {
                            if (RenewVoucher_Array.responseJSON == "Success") {
                                var CheckCustomerStatus_user_function = CheckCustomerStatus_user_Voucher();
                                var CheckCustomerStatus_user_function_string = JSON.stringify(CheckCustomerStatus_user_function);
                                var CheckCustomerStatus_user_function_obj = JSON.parse(CheckCustomerStatus_user_function_string);
                            debugger;
                                var CheckCustomerStatus_voucher_Array = {};
                                    CheckCustomerStatus_voucher_Array.readyState = CheckCustomerStatus_user_function_obj.readyState;
                                    CheckCustomerStatus_voucher_Array.ResponseCode = CheckCustomerStatus_user_function_obj.responseText;
                                    CheckCustomerStatus_voucher_Array.status = CheckCustomerStatus_user_function_obj.status;
                                    CheckCustomerStatus_voucher_Array.statusText = CheckCustomerStatus_user_function_obj.statusText;
                                    CheckCustomerStatus_voucher_Array.responseJSON = CheckCustomerStatus_user_function_obj.responseJSON.d.Response;

                                if (CheckCustomerStatus_voucher_Array.readyState == 4 && CheckCustomerStatus_voucher_Array.status == 200) {
                                    if (CheckCustomerStatus_voucher_Array.responseJSON == "Active") {
                                        mikrotiklogin();
                                    } else {
                                        swal.fire({ title: " " + CheckCustomerStatus_voucher_Array.responseJSON, type: "warning", });
                                    }
                                } else {
                                Swal.fire({ title: 'Oops', html: "<b> Readystate : " + CheckCustomerStatus_voucher_Array.readyState + "<br> status : " + CheckCustomerStatus_voucher_Array.status + " </b>", type: 'warning', cancelButtonColor: '#d33', });
                            }
                        } else {
                            swal.fire({ title: " " + RenewVoucher_Array.responseJSON, type: "warning", });
                        }
                    } else {
                        Swal.fire({ title: 'Oops', html: "<b> Readystate : " + RenewVoucher_Array.readyState + "<br> status : " + RenewVoucher_Array.status + " </b>", type: 'warning', cancelButtonColor: '#d33', });
                    }
                } else {
                    swal.fire({ title: " " + ResendOTPVerification_Array.responseJSON, type: "warning", });
                }
            } else {
                Swal.fire({ title: 'Oops', html: "<b> Readystate : " + ResendOTPVerification_Array.readyState + "<br> status : " + ResendOTPVerification_Array.statuss + " </b>", type: 'warning', cancelButtonColor: '#d33', });
            }
        } else {
            swal.fire({ title: " " + GL_Customers_response, type: "error", });
        }
    });


});