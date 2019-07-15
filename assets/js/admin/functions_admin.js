// tab 1        
var Parameter_mobile;
var Parameter_otp;
debugger;
function response_file(){
debugger;
if (jQuery("#Event_Name").val() == ""){
    Swal.fire({ title: 'Oops', html: "<b> Enter Value </b>", type: 'warning', cancelButtonColor: '#d33', });
        let shake = "#Event_Name";
            animation_style(shake);
    return false;
}else if (jQuery("#drop_api").val() == ""){
    Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
        let shake = "#drop_api";
            animation_style(shake);
    return false;
}else if (jQuery("#drop_method").val() == ""){
    Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
        let shake = "#drop_method";
            animation_style(shake);
    return false;
}
jQuery("#Event_Name,#drop_api,#drop_method").css({"border-style":"","border-width":"","border-color":""});  

let Event_name_labal = jQuery("#Event_Name").val();
let Event_name_drop = jQuery("#drop_api").val();
let method_name = jQuery("#drop_method").val();
let Eventapiurl = jQuery("#Event_url_url").text();
let final_url = jQuery("#Event_url_url").text() + Event_name_drop;
let plugin_url = jQuery("#url_plugin").val();

debugger;
    switch (method_name) {
    case "GET":
        jQuery.ajax({
            type: "GET",				   
            url: final_url,
            data: '{"request":{"mobileNo":"918238281155","otp":"4394","LocationId":0,"mac":"False","hotspotgroup":"","chkexistuser":false,"client_mac":"","AccessCode":0,"HotspotId":0,"devicedesc":""}}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async:false,
            success: function(data) {	
            debugger;			        
                document.getElementById("responce_print").innerHTML = "success";                 
                jQuery.ajax({
                    type: 'post',
                    url: MyAjax.ajaxurl,
                    data: {
                        action: 'insert_data_tab',
                        Event_Name:Event_name_labal,
                        drop_api:Event_name_drop,
                        Eventapiurl: Eventapiurl,
                        drop_method: method_name,
                        mapingurl:final_url,
                    },
                    async:false,
                    success: function( result ) {
                        debugger;
                        jQuery("#refrece_event_after_Delte").load(" #refrece_event_after_Delte");
                    },
                    error: function(result){
                        console.log(result);
                    }
                });
            },
            error: function(data){				        
                document.getElementById("responce_print").innerHTML = "fail";
            }
        });
    break;
    case "POST":				
        jQuery.ajax({
            type: "POST",
            url: final_url,
            data: '{"request":{"mobileNo":"918238281155","otp":"4394","LocationId":0,"mac":"False","hotspotgroup":"","chkexistuser":false,"client_mac":"","AccessCode":0,"HotspotId":0,"devicedesc":""}}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async:false,
            success: function(data) {	        
debugger;
                document.getElementById("responce_print").innerHTML = "success";            
                jQuery.ajax({
                    type: 'post',
                    url: MyAjax.ajaxurl,
                    data: {
                        action: 'insert_data_tab',
                        Event_Name:Event_name_labal,
                        drop_api:Event_name_drop,
                        Eventapiurl: Eventapiurl,
                        drop_method: method_name,
                        mapingurl:final_url,
                    },
                    async:false,
                    success: function( result ) {
                        debugger;
                        jQuery("#refrece_event_after_Delte").load(" #refrece_event_after_Delte");
                    },
                    error: function(result){
                        console.log(result);
                    }
                });
            },
            error: function(data){
                document.getElementById("responce_print").innerHTML = "Fail";
            }
        });
    break;
    }
}

function many_button_response(clicked_id){
debugger;
    var Daynamic_Event_Name = jQuery("#label_"+clicked_id).val();		//	Event name
    var Daynamic_Dropdown = jQuery("#dropdown_"+clicked_id).val();		//	dropdown
    var method_name = jQuery("#drop_method").val();
    var Eventapiurl = jQuery("#Event_url_url").text(); 
    var final_url = jQuery("#Event_url_url").text() + Daynamic_Dropdown;
    var plugin_url = jQuery("#url_plugin").val();
    var slash = jQuery("#slash").val();

    if (Daynamic_Event_Name == ""){
            swal.fire({title: "Enter Value",type: "warning",});
            var shake = "#label_"+clicked_id;
            animation_style(shake);
        return false;
    }else if (Daynamic_Dropdown == ""){
        swal.fire({title: "Select Event",type: "warning",});
        Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
            var shake = "#dropdown_"+clicked_id;
            animation_style(shake);
        return false;
    }else if (method_name == ""){
        Swal.fire({ title: 'Oops', html: "<b> Select Method </b>", type: 'warning', cancelButtonColor: '#d33', });
            var shake = "#drop_method";
            animation_style(shake);
        return false;
    }
    
    jQuery("#label_"+clicked_id).css({"border-style":"","border-width":"","border-color":""});
    jQuery("#dropdown_"+clicked_id).css({"border-style":"","border-width":"","border-color":""});   
    jQuery("#drop_method").css({"border-style":"","border-width":"","border-color":""});   
    
    jQuery("#popup_day_url").html("API URL : " + final_url);        //  popup

debugger;
    switch (method_name) {
        case 'GET':
            jQuery.ajax({
                type: "GET",	   
                url: final_url,
                data: '{"request":{"mobileNo":"8735901198","emailId":"Test@test.com","name":"Dhaval","isExistUser":"False","GetOTPPayOnline":"False","GetOTPlogin":"True","PartnerID":0,"resellerId":0,"planid":"1","hotspot":"1","hotspotgroup":"1","Sendexistingpassword":"1"}}',
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(data) {				        
                    debugger;
                    document.getElementById("dynamic_"+clicked_id).innerHTML = "success";

                    jQuery.ajax({
                        type: 'post',
                        url: MyAjax.ajaxurl,
                        data: {
                            action: 'insert_data_tab',
                            Event_Name:Daynamic_Event_Name,
                            drop_api:Daynamic_Dropdown,
                            Eventapiurl: Eventapiurl,
                            drop_method: method_name,
                            mapingurl:final_url,
                        },
                        async:false,
                        success: function( result ) {
                            debugger;
                            jQuery("#refrece_event_after_Delte").load(" #refrece_event_after_Delte");
                        },
                        error: function(result){
                            console.log(result);
                        }
                    });
                },
                error: function(data){				        
                    document.getElementById("dynamic_"+clicked_id).innerHTML = "fail";
                }
            });
        break;
        case 'POST':				
            jQuery.ajax({
                type: "POST",
                url: final_url,
                data: '{"request":{"mobileNo":"918238281155","otp":"4394","LocationId":0,"mac":"False","hotspotgroup":"","chkexistuser":false,"client_mac":"","AccessCode":0,"HotspotId":0,"devicedesc":""}}',
                contentType: "application/json; charset=utf-8",
                dataType: "json",    
                success: function(data) {				
debugger;        
                    document.getElementById("dynamic_"+clicked_id).innerHTML = "success";
                    
                    var Event_DROP = jQuery("#dropdown_"+clicked_id).val();
                    json_databash_height8 = {"event_name": Daynamic_Event_Name,"event_url": final_url,"insertdaat":"daynamic","api_name": Daynamic_Dropdown,"Eventapiurl":Eventapiurl,"drop_method":method_name};
debugger;                   
                    jQuery.ajax({
                        type: 'post',
                        url: MyAjax.ajaxurl,
                        data: {
                            action: 'insert_data_tab',
                            Event_Name:Daynamic_Event_Name,
                            drop_api:Daynamic_Dropdown,
                            Eventapiurl: Eventapiurl,
                            drop_method: method_name,
                            mapingurl:final_url,
                        },
                        async:false,
                        success: function( result ) {
                            debugger;
                            jQuery("#refrece_event_after_Delte").load(" #refrece_event_after_Delte");
                        },
                        error: function(result){
                            console.log(result);
                        }
                    });
                },
                error: function(data){
                    document.getElementById("dynamic_"+clicked_id).innerHTML = "Fail";
                }
            });
        break;
    }
}
 
function deletevent(clicked_id) {
    jQuery.ajax({
        type: 'post',
        url: MyAjax.ajaxurl,
        data: {
            action: 'my_delete_post',
            id: clicked_id
        },
        async:false,
        success: function( result ) {
            debugger;   
            animation_style("#row"+clicked_id);

                jQuery("#row"+clicked_id).load(" #row"+clicked_id);
                jQuery("#refrece_event_after_Delte").load(" #refrece_event_after_Delte");
        },
        error: function(result){
            console.log(result)
        }
    });
}

//tab 2
function addparamiter_switch(dropdoweventname){
    commonparams = ",'LocationId':'" + getapdetail_LocationID + "','mac':'','hotspotgroup':'" + getapdetail_Hotspotgroup + "','chkexistuser':'FALSE','client_mac':'','AccessCode':'','HotspotId':'" + getapdetail_hid + "','devicedesc':''";
    switch(dropdoweventname) {
            case "CheckCustomerStatus":
            debugger;
                Parameter_mobile = jQuery("#mobileNo2").val();
                Parameter_otp = jQuery("#otp3").val();
                var golbal_res_para = "{'request':{'mobileNo':\"+ jQuery('"+ Parameter_mobile +"').val() +\",'otp':\"+ jQuery('"+ Parameter_otp +"').val() +\""+ commonparams +"}}";
            break;
            case "OTPGeneration":
                debugger;
                        Parameter_mobile = jQuery("#mobileNo2").val();
                    let par_emailId_og = jQuery("#emailId3").val();
                    let par_name_og = jQuery("#name4").val();
                    let par_planid_og = jQuery("#planid5").val();                                   // not string
                    let par_PartnerID_og = jQuery("#PartnerID9").val();                             // not string
                    let par_resellerId_og = jQuery("#resellerId10").val();                          // not string            
                    let par_Sendexistingpassword_og = jQuery("#Sendexistingpassword13").val();      // not string
    
                    var golbal_res_para = "{'request':{'mobileNo':\"+ jQuery('"+ Parameter_mobile +"').val() +\",'emailId':'"+ par_emailId_og +"','name':'" + par_name_og + "','planid':"+ par_planid_og +",'isExistUser':'false','GetOTPPayOnline':'false','GetOTPlogin':'false','PartnerID':"+ par_PartnerID_og +",'resellerId':"+ par_resellerId_og +",'hotspot':'"+ getapdetail_hid +"','hotspotgroup':'"+ getapdetail_Hotspotgroup +"','Sendexistingpassword':"+ par_Sendexistingpassword_og+"}}";
                break;  
            case "OTPVerification":
                debugger;
                        Parameter_mobile = jQuery("#mobileNo2").val();
                        Parameter_otp = jQuery("#OTP3").val();
                    var golbal_res_para = `{'request':{'mobileNo':"+jQuery('`+jQuery("#mobileNo2").val()+`').val()+",'OTP':"+jQuery('`+jQuery("#OTP3").val()+`').val()+"}}`;
                break;
            case "ResendOTP":
                debugger;
                        Parameter_mobile = jQuery("#mobileNo2").val();
                    var golbal_res_para = `{'request':{'mobileNo':"+jQuery('`+jQuery("#mobileNo2").val()+`').val()+",'hId':'`+jQuery("#hId3").val()+`','LocationId':'`+jQuery("#LocationId4").val()+`','hotspotgroup':'`+jQuery("#hotspotgroup5").val()+`'}}`;
                break;  
            case "ResendOTPVerification":
                debugger;
                        Parameter_mobile = jQuery("#mobileNo2").val();
                        Parameter_otp = jQuery("#otp3").val();
                    var golbal_res_para = `{'request':{'mobileNo':"+jQuery('`+jQuery("#mobileNo2").val()+`').val()+",'OTP':"+jQuery('`+jQuery("#otp3").val()+`').val()+"}}`;
                break;
            case "RenewVoucher":
                debugger;
                        Parameter_mobile = jQuery("#mobileNo2").val();
                        Parameter_otp = jQuery("#vPin3").val();
                    var golbal_res_para =`{'request':{'mobileNo':"+jQuery('`+jQuery("#mobileNo2").val()+`').val()+",'vPin':"+jQuery('`+jQuery("#vPin3").val()+`').val()+",'vPassword':'`+jQuery("#vPassword4").val()+`','Hotspotgroup':'`+jQuery("#Hotspotgroup5").val()+`','hid':'`+jQuery("#hid6").val()+`','LocationID':'`+jQuery("#LocationID7").val()+`'}}`;
                break;
            case "RegistrationWithVoucher":
                    debugger;              
                        Parameter_mobile = jQuery("#mobileNo2").val();
                        Parameter_otp = jQuery("#vPin4").val();
                    var golbal_res_para =`{'request':{'mobileNo':"+jQuery('`+jQuery("#mobileNo2").val()+`').val()+",'password':'`+jQuery("#password3").val()+`','vPin':"+jQuery('`+jQuery("#vPin4").val()+`').val()+",'vPassword':'`+jQuery("#vPassword5").val()+`','hId':'`+jQuery("#hId6").val()+`','locationid':'`+jQuery("#locationid7").val()+`','mac':'`+jQuery("#mac8").val()+`','rId':'`+jQuery("#rId9").val()+`','PId':'`+jQuery("#PId10").val()+`','isExistUser':'`+jQuery("#isExistUser11").val()+`','name':'`+jQuery("#name12").val()+`','emailId':'`+jQuery("#emailId13").val()+`','country':'`+jQuery("#country14").val()+`','hotspotgroup':'`+jQuery("#hotspotgroup15").val()+`'}}`;
                break;
            default:
                jQuery("#param").html("");
                console.log(dropdoweventname);
        }
        return golbal_res_para;
}

function remove_data(dataid){
// flow tabal
    debugger;
    jQuery.ajax({
        type: 'post',
        url: MyAjax.ajaxurl,
        data: {
            action: 'delete_flow_tab',
            id: dataid
        },
        async:false,
        success: function( result ) {
            debugger;
            location.reload();
        },
        error: function(result){
            console.log(result);
        }
    });
}





function reference(clicked_id){
debugger;
    jQuery("#label_button"+clicked_id).val("");
    jQuery("#dropdown_button"+clicked_id).val("");
    jQuery("#dynamic_button"+clicked_id).text("");
    // jQuery("#dynamic_button"+clicked_id).load(" #dynamic_button"+clicked_id);
}

function animation_style(paramet){
    debugger;
        jQuery(paramet).css({'border-style':'solid','border-width':'1px 1px 1px 1px','border-color':'red'});
    
        blank_field = jQuery(paramet).filter(function(){
            return !this.value;
        });
        blank_field.addClass('animated shake');
        
        setTimeout(function(){
            blank_field.removeClass('animated shake');
        },1000);
}

jQuery(document).ready(function(){
    jQuery("#reloder").click(function(){
        jQuery('#responce_print').load(' #responce_print');
        jQuery("#Event_Name").val("");
        jQuery("#drop_api").val("");
        // jQuery("#dynamic_button"+clicked_id).text("");
    });
});

// Disabal all daynamic fild
jQuery(function() {enable_cb();
    jQuery("#group1").click(enable_cb);
    });
    jQuery("#group1").click(enable_cb); function enable_cb() {
    if (this.checked) {
            jQuery("input.bl").attr("disabled", true);
            jQuery("select.bl").attr("disabled", true);
            jQuery("button.bl").attr("disabled", true).css("opacity","0.5");
    } else {
        jQuery("input.bl").removeAttr("disabled");
        jQuery("select.bl").removeAttr("disabled");
        jQuery("button.bl").removeAttr("disabled").css("opacity","");
    }
}