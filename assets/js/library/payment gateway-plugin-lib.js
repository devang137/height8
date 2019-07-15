// ----------------------------------------------------------
//   Paid pack button click event
// ----------------------------------------------------------
jQuery(document).ready(function () {
    jQuery("#paid_pack_btn").click(function(){
        jQuery('.fas fa-angle-left glyphicon-chevron-left history_back').css({"background-color": "yellow", "cursor": "grab"});
        var api = jQuery("#url").val();
        var Country = document.getElementById("loginCountry");
        var loginCountry = Country.options[Country.selectedIndex].value;
        var loginCountryname = Country.options[Country.selectedIndex].text;
        var mobileNo = jQuery("#username").val();
debugger;
            var blank_field = jQuery('.animation').filter(function(){
                return !this.value;
            });
            blank_field.addClass('animated shake');

            setTimeout(function(){
                blank_field.removeClass('animated shake');
            },1000);

        if (loginCountry == ""){                                            //     Country option
            swal.fire({
                title: "Please Select Country !",
                type: "warning",
            });
                setInterval(function() {
                    jQuery('#loginCountry').animate({'border':'2px solid red','border-radius':'15px','color':'#b73e41'}, 300)
                    .animate({'border':'5px solid red','border-radius':'10px'}, 300);
                }, 1000);
            return false;
        }else if (mobileNo == ""){                                          //     Mobile no null
            swal.fire({
                title: "Please Enter Mobile Number !",
                type: "warning",
            });
            jQuery("#username").css({"border":"1px solid #b73e41","border-radius": "12px"});
            return false;
        }else if (mobileNo.length < 6 || mobileNo.length > 12){             //     Mobile no 6 to 12
            swal.fire({
                title: "Please Enter number 6 to 12 digits !",
                type: "warning",
            });
            jQuery("#username").css({"color":"red"});
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
            sessionStorage.setItem("username", loginCountry + mobileNo);
        var getapdetail = GL_GetApDetail_obj;
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
                let CheckCustomerStatuss_Response = JSON.stringify(data);
                let Customers_response = data.d.Response;
             
                    if (Customers_response == "Invalid Username or Password!" || Customers_response == "User Does not exists !" || Customers_response == "New - Activation Pending") {
                        // sessionStorage.setItem("Customers", Customers_response);
                        jQuery('#CheckCustomerStatus_pay').attr('value', Customers_response);
                        jQuery('#username_pay').attr('value', loginCountry + mobileNo);  
                        jQuery('#loginCountryname').attr('value',loginCountryname);

                        jQuery('div[id="mobile_number"]').css('display','none');    
                        jQuery('div[id="verify_number"]').css('display','none');
                        jQuery('form[id="showplans"]').css('display','none');
                        jQuery('form[id="showpurchaseplans"]').css('display','block');

                    }else if (Customers_response == "Inactive") {
                        // sessionStorage.setItem("Customers", Customers_response);
                        jQuery('#CheckCustomerStatus_pay').attr('value', Customers_response); 
                        jQuery('#username_pay').attr('value', loginCountry + mobileNo); 
                        jQuery('#loginCountryname').attr('value',loginCountryname);
                        
                        jQuery('div[id="mobile_number"]').css('display','none');    
                        jQuery('div[id="verify_number"]').css('display','none');
                        jQuery('form[id="showplans"]').css('display','none');
                        jQuery('form[id="showpurchaseplans"]').css('display','block');

                    }else{
                        swal.fire({
                            title: " " + Customers_response,
                            type: "error",
                        });
                    }
                },
                error: function (data) {
                    swal.fire({
                        title: "CheckCustomerStatus Fail",
                        html: data.responseJSON.Message,
                        type: "error",
                    });
                }
        })          //  CheckCustomerStatus over
});

// ----------------------------------------------------------
//   Payment getway...enter otp
// ----------------------------------------------------------

jQuery("#btn_verfiy_payment").click(function(){
    debugger;
    var parameters = new URL(window.location).searchParams;                 // get value in querry string
    var qr_username = parameters.get('username_pay');                      
    var qr_customerstatus = parameters.get('CheckCustomerStatus_pay');     
    var qr_planid = parameters.get('plan');                                
    var api = sessionStorage.getItem("url");                               //http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx
    var getapdetail = sessionStorage.getItem("getapdetail");  
    var pay_password =  jQuery("#text_payment").val();

    var obj = jQuery.parseJSON(getapdetail);
    var getapdetail = {};                                           // Array
        getapdetail.ID = obj.d.ID;
        getapdetail.LocationID = obj.d.LocationID;
        getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
        getapdetail.hid = obj.d.hid;
        getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
        getapdetail.SSIDconfig = obj.d.SSIDconfig;

    if (qr_customerstatus == "Inactive") {   
        var ResendOTPVerification = {};
            ResendOTPVerification.mobileNo = qr_username;
            ResendOTPVerification.otp = pay_password;
    debugger;
        const ResendOTPVerification_first_time = "{'request':{'mobileNo':'" + ResendOTPVerification.mobileNo + "','otp':'" + ResendOTPVerification.otp + "'}}";
        jQuery.ajax({
            type: "POST",
            url: api + "/ResendOTPVerification",
            data: ResendOTPVerification_first_time,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: false,
            success: function (data) {
    debugger;
                var ResendOTPVerification_Response = JSON.stringify(data);
                var ResendOTPVerification_user = data.d.Response;
                    if(ResendOTPVerification_user == "Success"){
                            var RenewOnline_function = RenewOnline();
                            var RenewOnline_function_functionstring = JSON.stringify(RenewOnline_function);
                            var RenewOnline_functionobj = JSON.parse(RenewOnline_function_functionstring);
                        debugger;
                        var RenewOnline_functionobj_Array = {};
                            RenewOnline_functionobj_Array.readyState = RenewOnline_functionobj.readyState;
                            RenewOnline_functionobj_Array.ResponseCode = RenewOnline_functionobj.responseText;
                            RenewOnline_functionobj_Array.status = RenewOnline_functionobj.status;
                            RenewOnline_functionobj_Array.statusText = RenewOnline_functionobj.statusText;    
                            RenewOnline_functionobj_Array.responseJSON = RenewOnline_functionobj.responseJSON.d.Response;
                            RenewOnline_functionobj_Array.reqid = RenewOnline_functionobj.responseJSON.d.reqid;

                            if(RenewOnline_functionobj_Array.readyState == 4 && RenewOnline_functionobj_Array.status == 200){
                                if(RenewOnline_functionobj_Array.responseJSON == "Success"){
                                    var CheckCustomerStatus_pay_function = CheckCustomerStatus_pay();
                                    var CheckCustomerStatus_pay_functionstring = JSON.stringify(CheckCustomerStatus_pay_function);
                                    var CheckCustomerStatus_pay_functionobj = JSON.parse(CheckCustomerStatus_pay_functionstring);
                            debugger;
                                    var CheckCustomerStatus_pay_functionobj_Array = {};
                                        CheckCustomerStatus_pay_functionobj_Array.readyState = CheckCustomerStatus_pay_functionobj.readyState;
                                        CheckCustomerStatus_pay_functionobj_Array.ResponseCode = CheckCustomerStatus_pay_functionobj.responseText;
                                        CheckCustomerStatus_pay_functionobj_Array.status = CheckCustomerStatus_pay_functionobj.status;
                                        CheckCustomerStatus_pay_functionobj_Array.statusText = CheckCustomerStatus_pay_functionobj.statusText;    
                                        CheckCustomerStatus_pay_functionobj_Array.responseJSON = CheckCustomerStatus_pay_functionobj.responseJSON.d.Response;

                                        if(CheckCustomerStatus_pay_functionobj_Array.readyState == 4 && CheckCustomerStatus_pay_functionobj_Array.status == 200){
                                            if(CheckCustomerStatus_pay_functionobj_Array.responseJSON == "Trial"){
                                                PaymentAPI(RenewOnline_functionobj_Array.reqid);    //  redirect to payment gateway
                                            }else{
                                                Swal.fire({ title: 'Oops', html: "<b>"+ CheckCustomerStatus_pay_functionobj_Array.responseJSON +"</b>", type: 'warning', cancelButtonColor: '#d33', });
                                            }
                                        }else{
                                            Swal.fire({ title: 'Oops', html: "<b> Readystate : "+ CheckCustomerStatus_pay_functionobj_Array.readyState +"<br> status : "+ CheckCustomerStatus_pay_functionobj_Array.status +" </b>", type: 'warning', cancelButtonColor: '#d33', });
                                        }  
                                }else{
                                    Swal.fire({ title: 'Oops', html: "<b>"+ RenewOnline_functionobj_Array.responseJSON +"</b>", type: 'warning', cancelButtonColor: '#d33', });                                        
                                }
                            }else{
                                Swal.fire({ title: 'Oops', html: "<b> readyState : "+ RenewOnline_functionobj_Array.readyState +"<br> status : "+ RenewOnline_functionobj_Array.status +" </b>", type: 'warning', cancelButtonColor: '#d33', });
                            }
                    }else{
                        Swal.fire({ title: 'Oops', html: "<b>"+ ResendOTPVerification_user +"</b>", type: 'warning', cancelButtonColor: '#d33', });
                    }
            },
            error: function (data) {
                swal.fire({
                    title: " " + data,
                    type: "error",
                });
            }
        })       //  ResendOTPVerification
    }else if (qr_customerstatus == "Terminated" || qr_customerstatus == "Suspended") {
        Swal.fire({ title: 'Oops', html: "<b>"+ qr_customerstatus +"</b>", type: 'warning', cancelButtonColor: '#d33', });
    }else if (qr_customerstatus == "Active") {
        Swal.fire({ title: 'Oops', html: "<b>"+ qr_customerstatus +"</b>", type: 'warning', cancelButtonColor: '#d33', });
    }else if (qr_customerstatus == "Invalid Username or Password!" || qr_customerstatus == "User Does not exists !" || qr_customerstatus == "New - Activation Pending"){
        var OTPVerification = {};
            OTPVerification.mobileNo = qr_username;
            OTPVerification.otp = pay_password;
    debugger;
        const OTPVerification_payment_time = "{'request':{'mobileNo':'" + OTPVerification.mobileNo + "','OTP':'" + OTPVerification.otp + "'}}";
        return jQuery.ajax({
            type: "POST",
            url: api + "/OTPVerification",
            data: OTPVerification_payment_time,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: false,
            success: function (data) {
    debugger;
                var OTPVerification_Response = JSON.stringify(data);
                var OTPVerification_payment = data.d.Response;

                    if(OTPVerification_payment == "Success"){
                    debugger;
                        var registration_Invalid_function = RegistrationWithOnlinePay();
                        var registration_Invalid_functionstring = JSON.stringify(registration_Invalid_function);
                        var registration_Invalid_functionobj = JSON.parse(registration_Invalid_functionstring);
                    debugger;
                        var registration_Invalid_functionobj_Array = {};
                            registration_Invalid_functionobj_Array.readyState = registration_Invalid_functionobj.readyState;
                            registration_Invalid_functionobj_Array.ResponseCode = registration_Invalid_functionobj.responseText;
                            registration_Invalid_functionobj_Array.status = registration_Invalid_functionobj.status;
                            registration_Invalid_functionobj_Array.statusText = registration_Invalid_functionobj.statusText;    
                            registration_Invalid_functionobj_Array.responseJSON = registration_Invalid_functionobj.responseJSON.d.Response;
                            registration_Invalid_functionobj_Array.reqid = registration_Invalid_functionobj.responseJSON.d.reqid;

                            if(registration_Invalid_functionobj_Array.readyState == 4 && registration_Invalid_functionobj_Array.status == 200){
                                if(registration_Invalid_functionobj_Array.responseJSON == "Success"){
                                        var CheckCustomerStatus_pay_function = CheckCustomerStatus_pay();
                                        var CheckCustomerStatus_pay_functionstring = JSON.stringify(CheckCustomerStatus_pay_function);
                                        var CheckCustomerStatus_pay_functionobj = JSON.parse(CheckCustomerStatus_pay_functionstring);
                                debugger;
                                        var CheckCustomerStatus_pay_functionobj_Array = {};
                                            CheckCustomerStatus_pay_functionobj_Array.readyState = CheckCustomerStatus_pay_functionobj.readyState;
                                            CheckCustomerStatus_pay_functionobj_Array.ResponseCode = CheckCustomerStatus_pay_functionobj.responseText;
                                            CheckCustomerStatus_pay_functionobj_Array.status = CheckCustomerStatus_pay_functionobj.status;
                                            CheckCustomerStatus_pay_functionobj_Array.statusText = CheckCustomerStatus_pay_functionobj.statusText;    
                                            CheckCustomerStatus_pay_functionobj_Array.responseJSON = CheckCustomerStatus_pay_functionobj.responseJSON.d.Response;

                                            if(CheckCustomerStatus_pay_functionobj_Array.readyState == 4 && CheckCustomerStatus_pay_functionobj_Array.status == 200){
                                                if(CheckCustomerStatus_pay_functionobj_Array.responseJSON == "Trial"){
                                                    PaymentAPI(registration_Invalid_functionobj_Array.reqid);    //  redirect to payment gateway
                                                }else{
                                                    Swal.fire({ title: 'Oops', html: "<b>"+ CheckCustomerStatus_pay_functionobj_Array.responseJSON +"</b>", type: 'warning', cancelButtonColor: '#d33', });
                                                }
                                            }else{
                                                Swal.fire({ title: 'Oops', html: "<b> Readystate : "+ CheckCustomerStatus_pay_functionobj_Array.readyState +"<br> status : "+ CheckCustomerStatus_pay_functionobj_Array.status +" </b>", type: 'warning', cancelButtonColor: '#d33', });
                                            }  
                                }else{
                                    Swal.fire({ title: 'Oops', html: "<b>"+ registration_Invalid_functionobj_Array.responseJSON +"</b>", type: 'warning', cancelButtonColor: '#d33', });
                                }
                            }else{
                                Swal.fire({ title: 'Oops', html: "<b> readyState : "+ registration_Invalid_functionobj_Array.readyState +"<br> status : "+registration_Invalid_functionobj_Array.status+" </b>", type: 'warning', cancelButtonColor: '#d33', });
                            }
                    }else{
                        Swal.fire({ title: 'Oops', html: "<b>"+ OTPVerification_payment +"</b>", type: 'warning', cancelButtonColor: '#d33', });
                    }
            },
            error: function (data) {
                swal.fire({title: " " + data,type: "error",});
            }
        })    
    }else {
        swal.fire({title: " " + qr_customerstatus,type: "error",});
    }
  });

});  