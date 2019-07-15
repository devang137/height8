function ResendOTP() {
    var api = jQuery("#url").val();
    
    var ResendOTP = {};
        ResendOTP.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
        ResendOTP.hId = GL_obj.d.hid;
        ResendOTP.LocationId = GL_obj.d.LocationID;
        ResendOTP.hotspotgroup = GL_obj.d.hotspotgroup;
    debugger;
    const ResendOTP_first_time = "{'request':{'mobileNo':'" + ResendOTP.mobileNo +
                                    "','hId':'" + ResendOTP.hId +
                                    "','LocationId':'" + ResendOTP.LocationId +
                                    "','hotspotgroup':'" + ResendOTP.hotspotgroup +
                                    "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/ResendOTP",
        data: ResendOTP_first_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var ResendOTP_Response = JSON.stringify(data);
            var objj = jQuery.parseJSON(ResendOTP_Response);
            var ResendOTP_Responsee = {};
            ResendOTP_Responsee.Response = objj.d.Response;

            jQuery("#ResendOTP").html(ResendOTP_Responsee.Response);
        },
        error: function (data) {
            swal.fire({
                title: "ResendOTP Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  ResendOTP
}

function ResendOTPVerification() {
    var api = jQuery("#url").val();
    var ResendOTPVerification = {};
    ResendOTPVerification.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    ResendOTPVerification.otp = jQuery("#password").val();
    debugger;
    const ResendOTPVerification_first_time = "{'request':{'mobileNo':'" + ResendOTPVerification.mobileNo + "','otp':'" + ResendOTPVerification.otp + "'}}";
    return jQuery.ajax({
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
            // document.getElementById("ResendOTPVerification").innerHTML = ResendOTPVerification_Response;

            jQuery('#ResendOTPVerification').attr('value', ResendOTPVerification_Response);
        },
        error: function (data) {
            swal.fire({
                title: "ResendOTPVerification Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  ResendOTPVerification
}

function OTPGeneration() {
    var api = jQuery("#url").val();

    var OTPGeneration = {};
    OTPGeneration.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    OTPGeneration.emailId = "";
    OTPGeneration.name = "";
    OTPGeneration.planid = 0,
        OTPGeneration.isExistUser = true;
    OTPGeneration.GetOTPPayOnline = false
    OTPGeneration.GetOTPlogin = false;
    OTPGeneration.PartnerID = 0;
    OTPGeneration.resellerId = 0;
    OTPGeneration.hotspot = getapdetail_hid != null ? getapdetail_hid : 0;
    OTPGeneration.hotspotgroup = getapdetail_Hotspotgroup != null ? getapdetail_Hotspotgroup : "";
    OTPGeneration.Sendexistingpassword = 1;

    debugger;
    const OTPGeneration_first_time = "{'request':{'mobileNo':'" + OTPGeneration.mobileNo + "','emailId':'" + OTPGeneration.emailId + "','name':'" + OTPGeneration.name + "','planid':" + OTPGeneration.planid + ",'isExistUser':" + OTPGeneration.isExistUser + ",'GetOTPPayOnline':" + OTPGeneration.GetOTPPayOnline + ",'GetOTPlogin':" + OTPGeneration.GetOTPlogin + ",'PartnerID':'" + OTPGeneration.PartnerID + "','resellerId':'" + OTPGeneration.resellerId + "','hotspot':" + OTPGeneration.hotspot + ",'hotspotgroup':'" + OTPGeneration.hotspotgroup + "','Sendexistingpassword':" + OTPGeneration.Sendexistingpassword + "}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/OTPGeneration",
        data: OTPGeneration_first_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var OTPGeneration_Response = JSON.stringify(data);
            var OTPGeneration_user = data.d.Response;
            jQuery("#OTPGeneration").val(OTPGeneration_user);
        },
        error: function (data) {
            swal.fire({
                title: "OTPGeneration Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })                   //  OTPGeneration
}

function OTPVerification() {
    var api = jQuery("#url").val();

    var OTPVerification = {};
        OTPVerification.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
        OTPVerification.otp = jQuery("#password").val();

debugger;
    const OTPVerification_first_time = "{'request':{'mobileNo':'" + OTPVerification.mobileNo + "','OTP':'" + OTPVerification.otp + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/OTPVerification",
        data: OTPVerification_first_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
        debugger;
            var OTPVerification_Response = JSON.stringify(data);
            var OTPVerification_user = data.d.Response;
                jQuery('#OTPVerification').html(OTPVerification_Response);
                jQuery('#OTPVerification').attr('value', OTPVerification_Response);                    // value store
        },
        error: function (data) {
            swal.fire({
                title: "OTPVerification Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  ResendOTP
}

function CheckCustomerStatus_user() {
    var api = jQuery("#url").val();  

    var CheckCustomerStatuss = {};
    CheckCustomerStatuss.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    CheckCustomerStatuss.otp = "";
    CheckCustomerStatuss.LocationId = getapdetail_LocationID != null ? getapdetail_LocationID : "";
    CheckCustomerStatuss.mac = jQuery("#mk_mac").val() != null ? jQuery("#mk_mac").val() : "";
    CheckCustomerStatuss.hotspotgroup = getapdetail_Hotspotgroup != null ? getapdetail_Hotspotgroup : "";
    CheckCustomerStatuss.chkexistuser = "1";
    CheckCustomerStatuss.client_mac = "";
    CheckCustomerStatuss.AccessCode = "";
    CheckCustomerStatuss.HotspotId = getapdetail_hid != null ? getapdetail_hid : "";
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
            var Customerss_response = data.d.Response;
                jQuery("#CheckCustomerStatus").html(CheckCustomerStatuss_Response);
        },
        error: function (data) {
            swal.fire({
                title: "CheckCustomerStatus Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })          //  CheckCustomerStatus over
}

function WiFiRegistration() {
    var api = jQuery("#url").val();
    
    var WiFiRegistration = {};
    WiFiRegistration.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    WiFiRegistration.name = "";
    WiFiRegistration.emailID = "";
    WiFiRegistration.country = jQuery("#loginCountry option:selected").text();
    WiFiRegistration.password = "";
    WiFiRegistration.mac = jQuery("#mk_mac").val() != null ? jQuery("#mk_mac").val() : "";
    WiFiRegistration.rId = getapdetail_Resellerid != null ? getapdetail_Resellerid : "";
    WiFiRegistration.hId = getapdetail_hid != null ? getapdetail_hid : "";
    WiFiRegistration.PId = getapdetail_Partnerid;
    // WiFiRegistration.locationid = getapdetail_LocationID != null ? getapdetail_LocationID : "";
    WiFiRegistration.locationid = "";
    WiFiRegistration.isExistUser = false;
    WiFiRegistration.hotspotgroup = getapdetail_Hotspotgroup != null ? getapdetail_Hotspotgroup : "";
    WiFiRegistration.SSIDconfig = getapdetail_SSIDconfig != null ? getapdetail_SSIDconfig : "";
    debugger;
    const WiFiRegistration_first_time = "{'request':{'mobileNo':'" + WiFiRegistration.mobileNo + "','name':'" + WiFiRegistration.name + "','emailID':'" + WiFiRegistration.emailID + "','country':'" + WiFiRegistration.country + "','password':'" + WiFiRegistration.password + "','mac':'" + WiFiRegistration.mac + "','rId':'" + WiFiRegistration.rId + "','hId':'" + WiFiRegistration.hId + "','PId':'" + WiFiRegistration.PId + "','locationid':'" + WiFiRegistration.locationid + "','isExistUser':" + WiFiRegistration.isExistUser + ",'hotspotgroup':'" + WiFiRegistration.hotspotgroup + "','SSIDconfig':'" + WiFiRegistration.SSIDconfig + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/WiFiRegistration",
        data: WiFiRegistration_first_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var WiFiRegistration_Response = JSON.stringify(data);
            var WiFiRegistration_user = data.d.Response;
            jQuery("#WiFiRegistration").html(WiFiRegistration_Response);
        },
        error: function (data) {
            swal.fire({
                title: "CheckCustomerStatus Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  WiFiRegistration
}

function GetPlanListt() {
    var api = jQuery("#url").val();
    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    debugger;
    var getapdetail = {};
        getapdetail.ID = obj.d.ID;
        getapdetail.hid = obj.d.hid;
        getapdetail_SSIDconfig = obj.d.SSIDconfig;

    var GetPlanList = {};
    // GetPlanList.HotspotId = getapdetail.ID != null ? getapdetail.ID : "";
        GetPlanList.HotspotId = getapdetail.hid != null ? getapdetail.hid : "";
        GetPlanList.SSIDconfig = getapdetail_SSIDconfig != null ? getapdetail_SSIDconfig : "";

    const GetPlanList_first_time = "{'request':{'HotspotId':'" + GetPlanList.HotspotId + "','SSIDconfig':'" + GetPlanList.SSIDconfig + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/GetPlanList",
        data: GetPlanList_first_time,
        contentType: "application/json; charset=utf-8",
        async: false,
        dataType: "json",
        success: function (data) {
            debugger;
            var GetPlanList_Response = JSON.stringify(data);
            var GetPlanList_user = data.d.Response;
                jQuery("#GetPlanList").html(GetPlanList_Response);
        },
        error: function (data) {
            swal.fire({
                title: "GetPlanList Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    });          //  ResendOTP
}

function RegistrationWithOnlinePay() {
    var api = sessionStorage.getItem("url");

    var parameters = new URL(window.location).searchParams;         // get value in querry string
    var qr_username = parameters.get('username_pay');
    var pay_password = jQuery("#text_payment").val();
    var qr_loginCountryname = parameters.get('loginCountryname');
    var qr_planid = parameters.get('plan');

    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    var getapdetail = {};                                           // Array
    getapdetail.ID = obj.d.ID;
    getapdetail.LocationID = obj.d.LocationID;
    getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
    getapdetail.hid = obj.d.hid;
    getapdetail.Partnerid = obj.d.Partnerid;
    getapdetail.Resellerid = obj.d.Resellerid;
    getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
    getapdetail.SSIDconfig = obj.d.SSIDconfig;

    var RegistrationWithOnlinePay = {};
    RegistrationWithOnlinePay.mobileNo = qr_username;
    RegistrationWithOnlinePay.PlanId = qr_planid;
    RegistrationWithOnlinePay.emailID = "";
    RegistrationWithOnlinePay.country = qr_loginCountryname != null ? qr_loginCountryname : "";
    RegistrationWithOnlinePay.password = pay_password != null ? pay_password : "";
    RegistrationWithOnlinePay.mac = jQuery("#mk_mac").val() != null ? jQuery("#mk_mac").val() : "";
    RegistrationWithOnlinePay.rId = getapdetail.Resellerid != null ? getapdetail.Resellerid : "";
    RegistrationWithOnlinePay.hId = getapdetail.hid != null ? getapdetail.hid : "";
    RegistrationWithOnlinePay.PId = getapdetail.Partnerid != null ? getapdetail.Partnerid : "";
    RegistrationWithOnlinePay.locationid = getapdetail.LocationID;
    RegistrationWithOnlinePay.isExistUser = false;
    RegistrationWithOnlinePay.hotspotgroup = getapdetail.Hotspotgroup;
    RegistrationWithOnlinePay.SSIDconfig = getapdetail.SSIDconfig;
    debugger;
    const RegistrationWithOnlinePay_purchase_time = "{'request':{'mobileNo':'" + RegistrationWithOnlinePay.mobileNo + "','PlanId':'" + RegistrationWithOnlinePay.PlanId + "','emailID':'" + RegistrationWithOnlinePay.emailID + "','country':'" + RegistrationWithOnlinePay.country + "','password':'" + RegistrationWithOnlinePay.password + "','mac':'" + RegistrationWithOnlinePay.mac + "','rId':'" + RegistrationWithOnlinePay.rId + "','hId':'" + RegistrationWithOnlinePay.hId + "','PId':'" + RegistrationWithOnlinePay.PId + "','locationid':'" + RegistrationWithOnlinePay.locationid + "','isExistUser':" + RegistrationWithOnlinePay.isExistUser + ",'hotspotgroup':'" + RegistrationWithOnlinePay.hotspotgroup + "','SSIDconfig':'" + RegistrationWithOnlinePay.SSIDconfig + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/RegistrationWithOnlinePay",
        data: RegistrationWithOnlinePay_purchase_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var RegistrationWithOnlinePay_Response = JSON.stringify(data);
            var objj = jQuery.parseJSON(RegistrationWithOnlinePay_Response);
            var RegistrationWithOnlinePay_Responsee = {};                                                           // Array
            RegistrationWithOnlinePay_Responsee.ResponseCode = objj.d.ResponseCode;
            RegistrationWithOnlinePay_Responsee.Response = objj.d.Response;
        },
        error: function (data) {
            swal.fire({
                title: "RegistrationWithOnlinePay Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  RegistrationWithOnlinePay
}

function CheckCustomerStatus_pay() {
    var api = sessionStorage.getItem("url");

    var parameters = new URL(window.location).searchParams;         // get value in querry string
    var qr_username = parameters.get('username_pay');
    var pay_password = jQuery("#text_payment").val();

    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    var getapdetail = {};                                           // Array
    getapdetail.ID = obj.d.ID;
    getapdetail.LocationID = obj.d.LocationID;
    getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
    getapdetail.hid = obj.d.hid;
    getapdetail.Partnerid = obj.d.Partnerid;
    getapdetail.Resellerid = obj.d.Resellerid;
    getapdetail.SSIDconfig = obj.d.SSIDconfig;

    var CheckCustomerStatuss_pay = {};
    CheckCustomerStatuss_pay.mobileNo = qr_username;
    CheckCustomerStatuss_pay.otp = "";
    CheckCustomerStatuss_pay.LocationId = getapdetail.LocationID != null ? getapdetail.LocationID : "";
    CheckCustomerStatuss_pay.mac = jQuery("#mk_mac").val() != null ? jQuery("#mk_mac").val() : "";
    CheckCustomerStatuss_pay.hotspotgroup = getapdetail.Hotspotgroup != null ? getapdetail.Hotspotgroup : "";
    CheckCustomerStatuss_pay.chkexistuser = "1";
    CheckCustomerStatuss_pay.client_mac = "";
    CheckCustomerStatuss_pay.AccessCode = "";
    CheckCustomerStatuss_pay.HotspotId = getapdetail.hid != null ? getapdetail.hid : "";
    CheckCustomerStatuss_pay.devicedesc = "";
    debugger;
    const CheckCustomerStatuss_purchaseplan = "{'request':{'mobileNo':'" + CheckCustomerStatuss_pay.mobileNo + "','otp':'" + CheckCustomerStatuss_pay.otp + "','LocationId':'" + CheckCustomerStatuss_pay.LocationId + "','mac':'" + CheckCustomerStatuss_pay.mac + "','hotspotgroup':'" + CheckCustomerStatuss_pay.hotspotgroup + "','chkexistuser':'" + CheckCustomerStatuss_pay.chkexistuser + "','client_mac':'','AccessCode':'','HotspotId':'" + CheckCustomerStatuss_pay.HotspotId + "','devicedesc':''}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/CheckCustomerStatus",
        data: CheckCustomerStatuss_purchaseplan,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var CheckCustomerStatuss_Response = JSON.stringify(data);
            var Customerss_pay_response = data.d.Response;
        },
        error: function (data) {
            swal.fire({
                title: "CheckCustomerStatus Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })          //  CheckCustomerStatus over
}

function RenewOnline() {
    var api = sessionStorage.getItem("url");

    var parameters = new URL(window.location).searchParams;         // get value in querry string
    var qr_username = parameters.get('username_pay');
    var qr_planid = parameters.get('plan');
    var qr_loginCountryname = parameters.get('loginCountryname');
    var pay_password = jQuery("#text_payment").val();

    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    var getapdetail = {};                                           // Array
    getapdetail.ID = obj.d.ID;
    getapdetail.LocationID = obj.d.LocationID;
    getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
    getapdetail.hid = obj.d.hid;
    getapdetail.Partnerid = obj.d.Partnerid;
    getapdetail.Resellerid = obj.d.Resellerid;
    getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
    getapdetail.SSIDconfig = obj.d.SSIDconfig;

    var RenewOnline = {};
    RenewOnline.mobileNo = qr_username;
    RenewOnline.PlanId = qr_planid;
    RenewOnline.rId = getapdetail.Resellerid != null ? getapdetail.Resellerid : "";
    RenewOnline.hId = getapdetail.hid != null ? getapdetail.hid : "";
    RenewOnline.PId = getapdetail.Partnerid != null ? getapdetail.Partnerid : "";
    RenewOnline.LocationId = getapdetail.LocationID != null ? getapdetail.LocationID : "";
    RenewOnline.hotspotgroup = getapdetail.Hotspotgroup != null ? getapdetail.Hotspotgroup : "";
    RenewOnline.mac = jQuery("#mk_mac").val() != null ? jQuery("#mk_mac").val() : "";
    RenewOnline.country = qr_loginCountryname != null ? qr_loginCountryname : "";

    debugger;
    const RenewOnline_payment_time = "{'request':{'mobileNo':'" + RenewOnline.mobileNo + "','PlanId':'" + RenewOnline.PlanId + "','rId':'" + RenewOnline.rId + "','hId':'" + RenewOnline.hId + "','PId':'" + RenewOnline.PId + "','LocationId':'" + RenewOnline.LocationId + "','hotspotgroup':'" + RenewOnline.hotspotgroup + "','mac':'" + RenewOnline.mac + "','country':'" + RenewOnline.country + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/RenewOnline",
        data: RenewOnline_payment_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            var RenewOnline_Response = JSON.stringify(data);
            var objj = jQuery.parseJSON(RenewOnline_Response);
            var RenewOnline_Responsee = {};
            RenewOnline_Responsee.ResponseCode = objj.d.ResponseCode;
            RenewOnline_Responsee.Response = objj.d.Response;
            RenewOnline_Responsee.Response = objj.d.reqid;
        },
        error: function (data) {
            swal.fire({
                title: "RenewOnline Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  RenewOnline
}

function PaymentAPI(reqid) {
    var api = sessionStorage.getItem("url");
    var PaymentAPI = {};
    PaymentAPI.reqid = reqid;
    debugger;
    const PaymentAPI_first_time = "{'request':{'ReqId':'" + PaymentAPI.reqid + "'}}";
    jQuery.ajax({
        type: "POST",
        url: api + "/PaymentAPI",
        data: PaymentAPI_first_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var PaymentAPI_Response = JSON.stringify(data);
            var PaymentAPI_user = data.d.ReqId;
            window.open(PaymentAPI_user);
        },
        error: function (data) {
            swal.fire({
                title: "PaymentAPI Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       // PaymentAPI
}

function CheckHotspotAvaiable() {
    debugger;
    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    var getapdetail = {};                                           // Array
    getapdetail.hid = obj.d.hid;

    if (getapdetail.hid == null || getapdetail.hid == "") {
        swal.fire({
            title: "Hotspot not registered.",
            type: "error",
        });
        jQuery('input[type="submit"]').attr("disabled", "disabled");
        jQuery('input[type="submit"]').css("cursor", "none");
        jQuery('input[type="button"]').attr("disabled", "disabled");
        jQuery('input[type="button"]').css("cursor", "none");
        jQuery('input[type="text"]').attr("disabled", "disabled");
        jQuery('input[type="text"]').css("cursor", "none");
        jQuery('input[type="tel"]').attr("disabled", "disabled");
        // jQuery('input[type="tel"]').css("cursor", "none");
        // jQuery('button[type="button"]').attr("disabled", "disabled");
        // jQuery('button[type="button"]').css("cursor", "none");
    }
    return false;
}

function doLogin() {
    debugger;
    var api = jQuery("#url").val();                                     //  http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx
 
    CheckHotspotAvaiable(); 
    var mobile = jQuery("#username").val();
    var password = jQuery("#password").val();
    // jQuery("#mk_username").val(jQuery("#username").val());
    // jQuery("#mk_password").val(jQuery("#password").val());

    jQuery('#mk_username').attr('value', mobile);
    jQuery('#mk_password').attr('value', password);

    var final_CheckCustomerStatuss = CheckCustomerStatus_user();
debugger;
    var final_CheckCustomerStatussobj_string = JSON.stringify(final_CheckCustomerStatuss);
    var final_CheckCustomerStatussobj = jQuery.parseJSON(final_CheckCustomerStatussobj_string);
    var final_CheckCustomerStatussobj_Array = {};
    final_CheckCustomerStatussobj_Array.readyState = final_CheckCustomerStatussobj.readyState;
    final_CheckCustomerStatussobj_Array.ResponseCode = final_CheckCustomerStatussobj.responseText;
    final_CheckCustomerStatussobj_Array.status = final_CheckCustomerStatussobj.status;
    final_CheckCustomerStatussobj_Array.statusText = final_CheckCustomerStatussobj.statusText;
    final_CheckCustomerStatussobj_Array.responseJSON = final_CheckCustomerStatussobj.responseJSON.d.Response;
    debugger;
    if (final_CheckCustomerStatussobj_Array.readyState == 4 && final_CheckCustomerStatussobj_Array.status == 200) {
        if (final_CheckCustomerStatussobj_Array.responseJSON == "Inactive") {
            Swal.fire({ title: 'Oops', html: "You are <b>" + final_CheckCustomerStatussobj_Array.responseJSON + "</b> Purchase Plan", type: 'warning', cancelButtonColor: '#d33', });
            return false;
        } else if (final_CheckCustomerStatussobj_Array.responseJSON == "Terminated") {
            Swal.fire({
                title: "Your account is terminated.",
                type: "warning",
            });
            jQuery("#username").removeAttr("disabled");
            jQuery("#password").removeAttr("disabled");
            jQuery("#submit_password").removeAttr("disabled");
            jQuery("#submit_password").val("Login");
            return false;
        } else if (final_CheckCustomerStatussobj_Array.responseJSON == "Suspended") {
            Swal.fire({
                title: "Your account is suspended.",
                type: "warning",
            });
            jQuery("#username").removeAttr("disabled");
            jQuery("#password").removeAttr("disabled");
            jQuery("#submit_password").removeAttr("disabled");
            jQuery("#submit_password").val("Login");
            return false;
        } else if (final_CheckCustomerStatussobj_Array.responseJSON == "Active" || final_CheckCustomerStatussobj_Array.responseJSON == "Trial") {
            debugger;
            document.sendin.submit();
            // mikrotiklogin();
            try {
                // mikrotiklogin();
                Authenticate();
            }
            catch (err) {
                document.getElementById("dologintry").innerHTML = err.message;
                jQuery("#dologintry").html(err.message);
                jQuery("#test").html(err.responseJSON.Message);
            }
        }
    } else {
        Swal.fire({ title: 'Oops', html: "Error...<b> ReadyState " + final_CheckCustomerStatussobj_Array.readyState + "<br> ReadyState" + final_CheckCustomerStatussobj_Array.status + "</b>", type: 'warning', cancelButtonColor: '#d33', });
        return false;
    }

    jQuery("#submit_password").attr("enable", "enable");
    return false;
}

function mikrotiklogin() {
    document.sendin.submit();
    Swal.fire({ type: 'success', title: 'Good job!', text: 'You are logged in', showConfirmButton: false, timer: 1300 });
    // const Toast = Swal.mixin({toast: true,showConfirmButton: false,timer: 1400});
    // Toast.fire({type: 'success',title: 'OTP Send successfully'});	
}

// Stats Page
function ViewCurrentPlanDetail() {
debugger;
    var api = jQuery("#url").val();
    var mobileNo = jQuery("#mk_username").val();            //919727293633
    // var mobileNo = "919727293633"; 

    var getapdetail = GL_GetApDetail_obj;
    var obj = jQuery.parseJSON(getapdetail);

    var getapdetail = {};
        getapdetail.hotspotgroup = obj.d.Hotspotgroup;

    var CurrentPlanDetail = {};
        CurrentPlanDetail.mobileNo = mobileNo;
        CurrentPlanDetail.hotspotgroup = getapdetail.hotspotgroup != null ? getapdetail.hotspotgroup : "";
debugger;
    const ViewCurrentPlanDetail = "{'request':{'mobileNo':'" + CurrentPlanDetail.mobileNo + "','hotspotgroup':'" + CurrentPlanDetail.hotspotgroup + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/ViewCurrentPlanDetail",
        data: ViewCurrentPlanDetail,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var ViewCurrentPlanDetail_Response = JSON.stringify(data);
            var objj = jQuery.parseJSON(ViewCurrentPlanDetail_Response);
            var ViewCurrentPlanDetail_Responsee = {};
            ViewCurrentPlanDetail_Responsee.ResponseCode = objj.d.ResponseCode;
            ViewCurrentPlanDetail_Responsee.Response = objj.d.Response;
            ViewCurrentPlanDetail_Responsee.ActivationDate = objj.d.ActivationDate;
            ViewCurrentPlanDetail_Responsee.ExpiryDate = objj.d.ExpiryDate;
            ViewCurrentPlanDetail_Responsee.UsedMB = objj.d.UsedMB;
            ViewCurrentPlanDetail_Responsee.UsedTimeMin = objj.d.UsedTimeMin;
            ViewCurrentPlanDetail_Responsee.RemainMB = objj.d.RemainMB;
            ViewCurrentPlanDetail_Responsee.TotalMB = objj.d.TotalMB;
            ViewCurrentPlanDetail_Responsee.PlanName = objj.d.PlanName;
            ViewCurrentPlanDetail_Responsee.UsedDownloadMB = objj.d.UsedDownloadMB;
            ViewCurrentPlanDetail_Responsee.UsedUploadMB = objj.d.UsedUploadMB;
            ViewCurrentPlanDetail_Responsee.SpeedLimite = objj.d.SpeedLimite;

            jQuery("#label_username,#Current_mobileno").html(CurrentPlanDetail.mobileNo);
            jQuery("#current_planname").html(ViewCurrentPlanDetail_Responsee.PlanName);
            jQuery("#current_Activationdate").html(ViewCurrentPlanDetail_Responsee.ActivationDate);
            jQuery("#current_ExpiryDate").html(ViewCurrentPlanDetail_Responsee.ExpiryDate);

            jQuery("#current_usemb").html(ViewCurrentPlanDetail_Responsee.UsedMB);
            jQuery("#current_remainmb").html(ViewCurrentPlanDetail_Responsee.RemainMB);
            jQuery("#current_TotalMB").html(ViewCurrentPlanDetail_Responsee.TotalMB);
            jQuery("#current_responce").html(ViewCurrentPlanDetail_Responsee.Response);
            jQuery("#current_Download").html(ViewCurrentPlanDetail_Responsee.UsedMB);
            jQuery("#current_Upload").html(ViewCurrentPlanDetail_Responsee.UsedMB);

            if (ViewCurrentPlanDetail_Responsee.SpeedLimite == '') {
                jQuery("#current_palnspeed").html(ViewCurrentPlanDetail_Responsee.SpeedLimite);
            } else if (ViewCurrentPlanDetail_Responsee.SpeedLimite != '') {
                if (1024 <= ViewCurrentPlanDetail_Responsee.SpeedLimite) {
                    var convert_mb = ViewCurrentPlanDetail_Responsee.SpeedLimite / 1024;
                    jQuery("#current_palnspeed").html(convert_mb + ' MB');
                } else {
                    var convert_mb = ViewCurrentPlanDetail_Responsee.SpeedLimite;
                    jQuery("#current_palnspeed").html(convert_mb + ' kb');
                }
            } else {
                jQuery("#current_palnspeed").html("something wrong");
            }
            debugger;
            GetCustomerDetail();
            GetConcurrentSession();
        },
        error: function (data) {
            swal.fire({
                title: " " + data,
                type: "error",
            });
        }
    })       //  ViewCurrentPlanDetail

}

function GetConcurrentSession() {
debugger;
    var api = jQuery("#url").val();
    var GetConcurrentSession_mobile = jQuery("#mk_username").val();         //919727293633
    // var GetConcurrentSession_mobile = "919727293633"; 

    var getapdetail = GL_GetApDetail_obj;
    var obj = jQuery.parseJSON(getapdetail);
    
    var getapdetail = {};
        getapdetail.hotspotgroup = obj.d.hotspotgroup;

    var GetConcurrentSession_array = {};
    GetConcurrentSession_array.mobile = GetConcurrentSession_mobile;
    GetConcurrentSession_array.Hotspotgroup = getapdetail.hotspotgroup != null ? getapdetail.hotspotgroup : "";
debugger;
    const GetConcurrentSession_first_time = "{'request':{'mobileNo':'" + GetConcurrentSession_array.mobile + "','hotspotgroup':'" + GetConcurrentSession_array.Hotspotgroup + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/GetConcurrentSession",
        data: GetConcurrentSession_first_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
debugger;
            var GetConcurrentSession_Response = JSON.stringify(data);

            var ConcurrentSession_obj = jQuery.parseJSON(GetConcurrentSession_Response);
            var ConcurrentSession = {};                                                           // Array
                ConcurrentSession.FRAMED_IP_ADDRESS = ConcurrentSession_obj.d.FRAMED_IP_ADDRESS;
                ConcurrentSession.CALL_START = ConcurrentSession_obj.d.CALL_START;
                ConcurrentSession.ACCT_SESSION_TIME = ConcurrentSession_obj.d.ACCT_SESSION_TIME;
                ConcurrentSession.ACCT_INPUT_OCTETS = ConcurrentSession_obj.d.ACCT_INPUT_OCTETS;
                ConcurrentSession.ACCT_OUTPUT_OCTETS = ConcurrentSession_obj.d.ACCT_OUTPUT_OCTETS;

            jQuery("#GetConcurrentSession").html(GetConcurrentSession_Response);
        },
        error: function (data) {
            swal.fire({
                title: "GetConcurrentSession Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  GetConcurrentSession
}

function GetCustomerDetail() {  
debugger;
    var api = jQuery("#url").val();
    var mobileNo = jQuery("#mk_username").val();            //919727293633
    // var mobileNo = "919727293633"; 

    var getapdetail = GL_GetApDetail_obj;
    var obj = jQuery.parseJSON(getapdetail);
    
    var getapdetail = {};
        getapdetail.hotspotgroup = obj.d.hotspotgroup;

    var GetCustomerDetail = {};
        GetCustomerDetail.mobileNo = mobileNo;
        GetCustomerDetail.hotspotgroup = getapdetail.hotspotgroup != null ? getapdetail.hotspotgroup : "";
    debugger;
    const GetCustomerDetail_first_time = "{'request':{'mobileNo':'" + GetCustomerDetail.mobileNo + "','hotspotgroup':'" + GetCustomerDetail.hotspotgroup + "'}}";
    jQuery.ajax({
        type: "POST",
        url: api + "/GetCustomerDetail",
        data: GetCustomerDetail_first_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
        debugger;            
            var GetCustomerDetail_Response = JSON.stringify(data);
            var GetCustomerDetail_user = data.d.Response;
                jQuery('#passwordotp').attr("value", data.d.Password);
                jQuery("#GetCustomerDetail").html(GetCustomerDetail_Response);
        },
        error: function (data) {
            swal.fire({
                title: "GetCustomerDetail Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  ResendOTP
    return false;
}

//  screen back button 
function backbutton() {
    window.history.back();
    return false;
}

function backbuttonshowplans() {
    jQuery('div[id="verify_number"]').css('display', 'none');
    jQuery('form[id="showplans"]').css('display', 'none');
    jQuery('form[id="showpurchaseplans"]').css('display', 'none');
    jQuery('form[id="paymentverifyform"]').css('display', 'none');
    jQuery('form[id="vocher_purchase"]').css('display', 'none');
    jQuery('div[id="mobile_number"]').css('display', 'block');
}

function backbuttonenterotp() {
    jQuery('div[id="mobile_number"]').css('display', 'none');
    jQuery('div[id="verify_number"]').css('display', 'none');
    jQuery('form[id="showplans"]').css('display', 'none');
    jQuery('form[id="paymentverifyform"]').css('display', 'none');
    jQuery('form[id="vocher_purchase"]').css('display', 'none');
    jQuery('form[id="showpurchaseplans"]').css('display', 'block');
}

function sessionStorageclear() {
    sessionStorage.removeItem("OTPGeneration");
    sessionStorage.removeItem("CheckCustomerStatus");
    sessionStorage.removeItem("ResendOTP");
    sessionStorage.removeItem("OTPVerification");
    sessionStorage.removeItem("username");
    sessionStorage.removeItem("WiFiRegistration");
    sessionStorage.clear();
    return false;
}




// Voucher verify otp back button
function voucher_otp_verify() {
    jQuery('div[id="verify_number"]').css('display', 'none');
    jQuery('form[id="showplans"]').css('display', 'none');
    jQuery('form[id="showpurchaseplans"]').css('display', 'none');
    jQuery('form[id="paymentverifyform"]').css('display', 'none');
    jQuery('div[id="mobile_number"]').css('display', 'none');

    jQuery('.voucher_otp_form').css('display', 'none');
    jQuery('#vocher_purchase').css('display', 'block');
    jQuery('form[id="vocher_purchase"]').css('display', 'block');
    jQuery('.voucher_form').css('display', 'block');
}

function GenerateOTPForVoucherRegistration() {
    var api = sessionStorage.getItem("url");

    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    debugger;
    var getapdetail = {};
    getapdetail.ID = obj.d.ID;
    getapdetail.hid = obj.d.hid;
    getapdetail.SSIDconfig = obj.d.SSIDconfig;
    getapdetail.Partnerid = obj.d.Partnerid;
    getapdetail.resellerId = obj.d.resellerId;
    getapdetail.Hotspotgroup = obj.d.Hotspotgroup;

    var GenerateOTP_Voucher = {};
    GenerateOTP_Voucher.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    GenerateOTP_Voucher.emailId = "";
    GenerateOTP_Voucher.name = "";
    GenerateOTP_Voucher.planid = 0;
    GenerateOTP_Voucher.isExistUser = false;
    GenerateOTP_Voucher.GetOTPPayOnline = false;
    GenerateOTP_Voucher.GetOTPlogin = false;
    GenerateOTP_Voucher.PartnerID = getapdetail.Partnerid != null ? getapdetail.Partnerid : "";
    GenerateOTP_Voucher.resellerId = getapdetail.resellerId != null ? getapdetail.resellerId : "";
    // GenerateOTP_Voucher.hotspot = getapdetail.hid != null ? getapdetail.hid : "";
    GenerateOTP_Voucher.hotspotgroup = getapdetail.Hotspotgroup != null ? getapdetail.Hotspotgroup : "";
    GenerateOTP_Voucher.Sendexistingpassword = 0;
    GenerateOTP_Voucher.vPin = jQuery("#voucher_pin").val();
    GenerateOTP_Voucher.vPassword = "";

    debugger;
    const GenerateOTPForVoucherRegistration = "{'request':{'mobileNo':'" + GenerateOTP_Voucher.mobileNo +
        "','emailId':'" + GenerateOTP_Voucher.emailId +
        "','name':'" + GenerateOTP_Voucher.name +
        "','planid':'" + GenerateOTP_Voucher.planid +
        "','isExistUser':'" + GenerateOTP_Voucher.isExistUser +
        "','GetOTPPayOnline':'" + GenerateOTP_Voucher.GetOTPPayOnline +
        "','GetOTPlogin':'" + GenerateOTP_Voucher.GetOTPlogin +
        "','PartnerID':'" + GenerateOTP_Voucher.PartnerID +
        "','resellerId':'" + GenerateOTP_Voucher.resellerId +
        // "','hotspot':'" + GenerateOTP_Voucher.hotspot +
        "','hotspotgroup':'" + GenerateOTP_Voucher.hotspotgroup +
        "','Sendexistingpassword':'" + GenerateOTP_Voucher.Sendexistingpassword +
        "','vPin':'" + GenerateOTP_Voucher.vPin +
        "','vPassword':'" + GenerateOTP_Voucher.vPassword +
        "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/GenerateOTPForVoucherRegistration",
        data: GenerateOTPForVoucherRegistration,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var ResendOTP_Response = JSON.stringify(data);
            var objj = jQuery.parseJSON(ResendOTP_Response);
            var ResendOTP_Responsee = {};                                                           // Array
            ResendOTP_Responsee.ResponseCode = objj.d.ResponseCode;
            ResendOTP_Responsee.Response = objj.d.Response;
        },
        error: function (data) {
            swal.fire({
                title: "GenerateOTPForVoucherRegistration Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  GenerateOTPForVoucherRegistration
}

function OTPVerification_Voucher() {
    var api = sessionStorage.getItem("url");
    var OTPVerification = {};
    OTPVerification.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    OTPVerification.otp = jQuery("#voucher_otp").val();
    debugger;
    const OTPVerification_first_time = "{'request':{'mobileNo':'" + OTPVerification.mobileNo + "','OTP':'" + OTPVerification.otp + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/OTPVerification",
        data: OTPVerification_first_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var OTPVerification_Response = JSON.stringify(data);
            var OTPVerification_user = data.d.Response;

            // jQuery('#OTPVerification').attr('value', OTPVerification_Response);                    // value store
        },
        error: function (data) {
            swal.fire({
                title: "OTPVerification Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  ResendOTP verfication
}

function ResendOTP_Voucher() {
    var api = sessionStorage.getItem("url");

    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    debugger;
    var getapdetail_Voucher = {};
    getapdetail_Voucher.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    getapdetail_Voucher.hotspot = obj.d.hid;
    getapdetail_Voucher.LocationId = obj.d.LocationId;
    getapdetail_Voucher.hotspotgroup = obj.d.Hotspotgroup;

    debugger;
    const ResendOTP_first_time = "{'request':{'mobileNo':'" + getapdetail_Voucher.mobileNo + "','HotspotId':'" + getapdetail_Voucher.HotspotId + "','LocationId':'" + getapdetail_Voucher.LocationId + "','hotspotgroup':'" + getapdetail_Voucher.hotspotgroup + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/ResendOTP",
        data: ResendOTP_first_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var ResendOTP_Response = JSON.stringify(data);
            var objj = jQuery.parseJSON(ResendOTP_Response);
            var ResendOTP_Responsee = {};                                                           // Array
            ResendOTP_Responsee.ResponseCode = objj.d.ResponseCode;
            ResendOTP_Responsee.Response = objj.d.Response;

            // jQuery('#ResendOTP').attr('value', ResendOTP_Responsee.Response);                   // value store
        },
        error: function (data) {
            swal.fire({
                title: "ResendOTP Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  ResendVOucherOTP
}

function ResendOTPVerification_Voucher() {
    var api = sessionStorage.getItem("url");

    var ResendOTPVerification = {};
    ResendOTPVerification.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    ResendOTPVerification.otp = jQuery("#voucher_otp").val();

    debugger;
    const ResendOTPVerification_vocher_time = "{'request':{'mobileNo':'" + ResendOTPVerification.mobileNo + "','otp':'" + ResendOTPVerification.otp + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/ResendOTPVerification",
        data: ResendOTPVerification_vocher_time,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var ResendOTPVerification_Response = JSON.stringify(data);
            var ResendOTPVerification_user = data.d.Response;
        },
        error: function (data) {
            swal.fire({
                title: "ResendOTPVerification Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  ResendOTPVerification_vocher
}

function RenewVoucher() {
    var api = sessionStorage.getItem("url");

    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    debugger;
    var getapdetail = {};
    getapdetail.ID = obj.d.ID;
    getapdetail.hid = obj.d.hid;
    getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
    getapdetail.LocationID = obj.d.LocationID;

    var RenewVoucher_Voucher = {};
    RenewVoucher_Voucher.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    RenewVoucher_Voucher.vPin = jQuery("#voucher_pin").val();
    RenewVoucher_Voucher.vPassword = "";
    RenewVoucher_Voucher.Hotspotgroup = getapdetail.Hotspotgroup != null ? getapdetail.Hotspotgroup : "";
    RenewVoucher_Voucher.hid = getapdetail.ID != null ? getapdetail.ID : "";
    RenewVoucher_Voucher.LocationID = getapdetail.LocationID != null ? getapdetail.LocationID : "";

    debugger;
    const RenewVoucherVoucher_json = "{'request':{'mobileNo':'" + RenewVoucher_Voucher.mobileNo +
        "','vPin':'" + RenewVoucher_Voucher.vPin +
        "','vPassword':'" + RenewVoucher_Voucher.vPassword +
        "','Hotspotgroup':'" + RenewVoucher_Voucher.Hotspotgroup +
        "','hid':'" + RenewVoucher_Voucher.hid +
        "','LocationID':'" + RenewVoucher_Voucher.LocationID + "'}}";

    return jQuery.ajax({
        type: "POST",
        url: api + "/RenewVoucher",
        data: RenewVoucherVoucher_json,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var ResendOTP_Response = JSON.stringify(data);
            var objj = jQuery.parseJSON(ResendOTP_Response);
            var ResendOTP_Responsee = {};                                                           // Array
            ResendOTP_Responsee.ResponseCode = objj.d.ResponseCode;
            ResendOTP_Responsee.Response = objj.d.Response;
        },
        error: function (data) {
            swal.fire({
                title: "RenewVoucher Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  RenewVoucher
}

function RegistrationWithVoucher() {
    var api = sessionStorage.getItem("url");

    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    debugger;
    var getapdetail = {};
    getapdetail.hid = obj.d.hid;
    getapdetail.Partnerid = obj.d.Partnerid;
    getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
    getapdetail.Resellerid = obj.d.Resellerid;
    getapdetail.LocationID = obj.d.LocationID;

    var RegistrationWith_Voucher = {};
    RegistrationWith_Voucher.vPin = jQuery("#voucher_pin").val();
    RegistrationWith_Voucher.vPassword = "";
    RegistrationWith_Voucher.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    RegistrationWith_Voucher.name = ""
    RegistrationWith_Voucher.emailId = "";
    // RegistrationWith_Voucher.country = Country.options[Country.selectedIndex].text;
    RegistrationWith_Voucher.country = jQuery("#loginCountry").text();
    RegistrationWith_Voucher.password = jQuery("#voucher_otp").val();
    RegistrationWith_Voucher.mac = jQuery("#mk_mac").val();
    RegistrationWith_Voucher.rId = getapdetail.Resellerid != null ? getapdetail.Resellerid : "";
    RegistrationWith_Voucher.PId = getapdetail.Partnerid != null ? getapdetail.Partnerid : "";
    RegistrationWith_Voucher.isExistUser = false;
    RegistrationWith_Voucher.hotspotgroup = getapdetail.Hotspotgroup != null ? getapdetail.Hotspotgroup : "";
    RegistrationWith_Voucher.locationid = getapdetail.Hotspotgroup != null ? getapdetail.Hotspotgroup : "";
    RegistrationWith_Voucher.hId = getapdetail.hid != null ? getapdetail.hid : "";

    debugger;
    const RegistrationWithVoucher = "{'request':{'vPin':'" + RegistrationWith_Voucher.vPin +
        "','vPassword':'" + RegistrationWith_Voucher.vPassword +
        "','mobileNo':'" + RegistrationWith_Voucher.mobileNo +
        "','name':'" + RegistrationWith_Voucher.name +
        "','emailId':'" + RegistrationWith_Voucher.emailId +
        "','country':'" + RegistrationWith_Voucher.country +
        "','password':'" + RegistrationWith_Voucher.password +
        "','mac':'" + RegistrationWith_Voucher.mac +
        "','rId':'" + RegistrationWith_Voucher.rId +
        "','PId':'" + RegistrationWith_Voucher.PId +
        "','isExistUser':'" + RegistrationWith_Voucher.isExistUser +
        "','hotspotgroup':'" + RegistrationWith_Voucher.hotspotgroup +
        "','locationid':'" + RegistrationWith_Voucher.locationid +
        "','hId':'" + RegistrationWith_Voucher.hId + "'}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/RegistrationWithVoucher",
        data: RegistrationWithVoucher,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var ResendOTP_Response = JSON.stringify(data);
            var objj = jQuery.parseJSON(ResendOTP_Response);
            var ResendOTP_Responsee = {};
            ResendOTP_Responsee.ResponseCode = objj.d.ResponseCode;
            ResendOTP_Responsee.Response = objj.d.Response;
        },
        error: function (data) {
            swal.fire({
                title: "RegistrationWithVoucher Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })       //  RegistrationWithVoucher
}

function openvoucherpage() {
    jQuery("#vocher_purchase").css({ "display": "block" })
    var blank_field = jQuery('.voucher_form').css({ "display": "none" })
    blank_field.addClass('animated bounceInRight');
    jQuery('.voucher_otp_form').css({ "display": "block" })

    // jQuery('#vocher_number').attr('value', jQuery("#loginCountry").val() + jQuery("#username").val()); 
    document.getElementById("vocher_numberrr").innerHTML = jQuery("#loginCountry").val() + jQuery("#username").val();

}

function CheckCustomerStatus_user_Voucher() {
    var api = sessionStorage.getItem("url");

    var getapdetail = sessionStorage.getItem("getapdetail");
    var obj = jQuery.parseJSON(getapdetail);
    var getapdetail = {};                                           // Array
    getapdetail.LocationID = obj.d.LocationID;
    getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
    getapdetail.hid = obj.d.hid;
    getapdetail.SSIDconfig = obj.d.SSIDconfig;

    var CheckCustomerStatuss = {};
    CheckCustomerStatuss.mobileNo = jQuery("#loginCountry").val() + jQuery("#username").val();
    CheckCustomerStatuss.otp = "";
    CheckCustomerStatuss.LocationId = getapdetail.LocationID != null ? getapdetail.LocationID : "";
    CheckCustomerStatuss.mac = jQuery("#mk_mac").val() != null ? jQuery("#mk_mac").val() : "";
    CheckCustomerStatuss.hotspotgroup = getapdetail.Hotspotgroup != null ? getapdetail.Hotspotgroup : "";
    CheckCustomerStatuss.chkexistuser = "1";
    CheckCustomerStatuss.client_mac = "";
    CheckCustomerStatuss.AccessCode = "";
    CheckCustomerStatuss.HotspotId = getapdetail.hid != null ? getapdetail.hid : "";
    CheckCustomerStatuss.devicedesc = "";
    debugger;
    const CheckCustomerStatuss_voucher = "{'request':{'mobileNo':'" + CheckCustomerStatuss.mobileNo + "','otp':'" + CheckCustomerStatuss.otp + "','LocationId':'" + CheckCustomerStatuss.LocationId + "','mac':'" + CheckCustomerStatuss.mac + "','hotspotgroup':'" + CheckCustomerStatuss.hotspotgroup + "','chkexistuser':'" + CheckCustomerStatuss.chkexistuser + "','client_mac':'','AccessCode':'','HotspotId':'" + CheckCustomerStatuss.HotspotId + "','devicedesc':''}}";
    return jQuery.ajax({
        type: "POST",
        url: api + "/CheckCustomerStatus",
        data: CheckCustomerStatuss_voucher,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            debugger;
            var CheckCustomerStatuss_Response = JSON.stringify(data);
            var Customerss_response = data.d.Response;
        },
        error: function (data) {
            swal.fire({
                title: "CheckCustomerStatus Fail",
                html: data.responseJSON.Message,
                type: "error",
            });
        }
    })          // CheckCustomerStatus_user_voucher
}
