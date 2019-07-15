jQuery(document).ready(function() {
    let validation_home_page = function(){
        jQuery('#myText').attr('disabled', 'disabled').css("opacity", "0.7"); 
            jQuery('#dropssl').change(function() {
                (jQuery(this).val() != 'null') ? jQuery('#myText').removeAttr('disabled').css("opacity", "") : jQuery('#myText').attr('disabled', 'disabled').css("opacity", "0.7");
            });
        jQuery('#myText2').attr('disabled', 'disabled').css("opacity", "0.6"); 
            jQuery('#myText').change(function(){
                (jQuery(this).val() != '')?jQuery('#myText2').removeAttr('disabled').css("opacity", ""):jQuery('#myText2').attr('disabled', 'disabled').css("opacity", "0.7");
            });
        jQuery('#Event').attr('disabled', 'disabled').css("opacity", "0.5"); 
        jQuery('#myText2').change(function(){ 
            if (jQuery(this).val != ''){
                jQuery('#Event').removeAttr('disabled').css("opacity", "");
            }
        });
    }
    validation_home_page();

    let ApiUrl_Session = function(){
        let Apiurl = localStorage.getItem("url_local")
        if (Apiurl !== 'undefined' && Apiurl !== null){
            jQuery("#Event_tag").html(localStorage.getItem("title_local"));
            jQuery("#Event_url_url").html(localStorage.getItem("url_local"));
            jQuery("#daynamic_Event").css('display','block');
        }else{
            jQuery("#daynamic_Event").css('display','none');
        }
    }
    ApiUrl_Session();
     
    jQuery("#Event_btn").click(function () {
        if (jQuery("#dropssl").val() == "null"){
                Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33'});
                        let shake = "#dropssl";
                        animation_style(shake);
            return false;
        }else if (jQuery("#myText").val() == ""){
                Swal.fire({ title: 'Oops', html: "<b> Enter Value </b>", type: 'warning', cancelButtonColor: '#d33'});
                        let shake = "#myText";
                        animation_style(shake);
            return false;
        }else if (jQuery("#myText2").val() == ""){
                Swal.fire({ title: 'Oops', html: "<b> Enter Value </b>", type: 'warning', cancelButtonColor: '#d33'});
                        let shake = "#myText2";
                        animation_style(shake);
            return false;
        }
        jQuery("#dropssl,#myText,#myText2").css({'border-style':'','border-width':'','border-color':''});
debugger;
// Button click Event
        let ssl = jQuery("#dropssl").val();
        let Server = jQuery("#myText").val();
        let API_File = jQuery("#myText2").val();
        let API_Token = jQuery("#myText1").val();
        let slash = jQuery("#slash").val();

        jQuery("#daynamic_Event").css('display', 'block');
        jQuery("#Event_tag").html("API URL :");
        jQuery("#Event_url_url").html(ssl + Server + slash + API_File + slash + API_Token)
        jQuery('#drop_method').removeAttr('disabled').css("opacity", "");
        
        jQuery("#pop_url").html("API URL : " + ssl + Server + slash + API_File + slash + API_Token);        //  popup

        let url_local = ssl + Server + slash + API_File + slash + API_Token
            localStorage.setItem("title_local","API URL :");
            localStorage.setItem("url_local", url_local);
    });

    jQuery("#remove_url_btn").click(function () {
debugger;        
        localStorage.removeItem("title_local");
        localStorage.removeItem("url_local");

        jQuery("#dropssl").val("null");
        jQuery("#myText").val("");
        jQuery("#myText2").val("");
        jQuery("#myText1").val("");
        jQuery("#Event_tag").html("");
        jQuery("#Event_url_url").html("");
        jQuery("#daynamic_Event").css('display', 'none');
        jQuery("#pop_url").text("");
    });

let More_Events_Show = function(){
    var plugin_url = jQuery("#url_plugin").val();
    var i=1;  
    jQuery('#add').click(function(){  
            i++;  
                if(i >11){
                    alert("Only 10 textboxes allow");
                    return false;
                }    
    jQuery('#dynamic_field').append('<div class="row" id="row'+i+'" style="padding:5px;">'+
                                    '<div class="col-md-2">'+
                                    '<input type="text" name="nametext" placeholder="Event Name" class="form-control name_list bl" id="label_button'+i+'" />'+
                                    '</div>'+
                                    '<div class="col-md-3" id="drop_re_'+i+'">'+											
                                    '<select class="drop_api1 bl" name="dropdown_button'+i+'" id="dropdown_button'+i+'">'+
                                        '<option value=""> Select </option>'+
                                        '<option value="CheckCustomerStatus">CheckCustomerStatus</option>'+
                                        '<option value="CheckPreRegisteredUser">CheckPreRegisteredUser</option>'+
                                        '<option value="CheckSpidioAdAvailability">CheckSpidioAdAvailability</option>'+
                                        '<option value="CheckSpidioPlanOption">CheckSpidioPlanOption</option>'+
                                        '<option value="CheckUserWithSameMobilenumber">CheckUserWithSameMobilenumber</option>'+
                                        '<option value="DisconnectUser">DisconnectUser</option>'+
                                        '<option value="DoFreeRenewal">DoFreeRenewal</option>'+
                                        '<option value="Doaddonplan">Doaddonplan</option>'+
                                        '<option value="ExistBulkUploadUserupdate">ExistBulkUploadUserupdate</option>'+
                                        '<option value="ForgotPasswordOTPGeneration">ForgotPasswordOTPGeneration</option>'+
                                        '<option value="ForgotPasswordOTPVerification">ForgotPasswordOTPVerification</option>'+
                                        '<option value="FreePlanEligibility">FreePlanEligibility</option>'+
                                        '<option value="GenerateOTPForOnlinePayRegistration">GenerateOTPForOnlinePayRegistration</option>'+
                                        '<option value="GenerateOTPForVoucherRegistration">GenerateOTPForVoucherRegistration</option>'+
                                        '<option value="GetAdsList">GetAdsList</option>'+
                                        '<option value="GetApDetail">GetApDetail</option>'+
                                        '<option value="GetCPConfiguration">GetCPConfiguration</option>'+
                                        '<option value="GetConcurrentSession">GetConcurrentSession</option>'+
                                        '<option value="GetConcurrentWithFRAMEIP">GetConcurrentWithFRAMEIP</option>'+
                                        '<option value="GetCountryList">GetCountryList</option>'+
                                        '<option value="GetCustomerDetail">GetCustomerDetail</option>'+
                                        '<option value="GetNearByHotspot">GetNearByHotspot</option>'+
                                        '<option value="GetPaidPlanDetailsOfRetailCustomer">GetPaidPlanDetailsOfRetailCustomer</option>'+
                                        '<option value="GetPlanList">GetPlanList</option>'+
                                        '<option value="GetUserByRequestId">GetUserByRequestId</option>'+
                                        '<option value="HitsCount">HitsCount</option>'+
                                        '<option value="OTPGeneration">OTPGeneration</option>'+
                                        '<option value="OTPVerification">OTPVerification</option>'+
                                        '<option value="PaymentAPI">PaymentAPI</option>'+
                                        '<option value="RegistrationWithOnlinePay">RegistrationWithOnlinePay</option>'+
                                        '<option value="RegistrationWithVoucher">RegistrationWithVoucher</option>'+
                                        '<option value="RenewOnline">RenewOnline</option>'+
                                        '<option value="RenewVoucher">RenewVoucher</option>'+
                                        '<option value="ResendOTP">ResendOTP</option>'+
                                        '<option value="ResendOTPVerification">ResendOTPVerification</option>'+
                                        '<option value="SendSpidioAdScript">SendSpidioAdScript</option>'+
                                        '<option value="SetTimer">SetTimer</option>'+
                                        '<option value="SocialMediaUserValidate">SocialMediaUserValidate</option>'+
                                        '<option value="ViewCurrentPlanDetail">ViewCurrentPlanDetail</option>'+
                                        '<option value="WiFiRegistration">WiFiRegistration</option>'+
                                        '<option value="WiFiRegistrationSpidio">WiFiRegistrationSpidio</option>'+
                                        '<option value="WiFiRegistrationWithRetailHotspotGroup">WiFiRegistrationWithRetailHotspotGroup</option>'+
                                        '<option value="WiFiRegistrationWithSocialMedia">WiFiRegistrationWithSocialMedia</option>'+
                                        '</select>'+	
                                '</div>'+
                                '<div class="col-md-1">'+											
                                    '<input type="button" name="button'+i+'" id="button'+i+'" class="btn_dinamic bd-example-modal-lg bl" value="Verify" onclick="many_button_response(this.id);">'+
                                '</div>'+
                                '<div class="col-md-1">'+
                                    
                                '</div>'+
                                '<div class="col-md-1">'+												
                                    '<p id="dynamic_button'+i+'" class="font-weight-bold text-uppercase pt-1"></p>'+													
                                '</div>'+
                                '<div class="col-md-1">'+
                                    '<img alt="Responsive image" id="pop'+i+'" onclick="loadDocc();" data-toggle="modal" data-target=".bd-example-modal-lg" class="img-fluid info" src="'+plugin_url+'/height8/assets/images/info.png" />'+		

                                    '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">'+
                                        '<div class="modal-dialog modal-lg">'+
                                        '<div class="modal-content">'+
                                            '<div class="modal-header">'+
                                                '<img src="'+plugin_url+'/height8/assets/images/popup/h8-simple-logo.png" class="img-fluid h8image" alt="Responsive image" >&nbsp &nbsp'+      										
                                                '<h5 class="modal-title" id="exampleModalLabel">Information</h5>'+
                                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                                '<span aria-hidden="true">&times;</span>'+
                                                '</button>'+
                                            '</div>'+
                                            '<div class="modal-body">'+	
                                                '<b id="popup_day_url"></b>'+											    
                                                ''+
                                            '</div>'+
                                            '<div class="modal-footer">'+
                                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
                                            '</div>'+
                                        '</div>'+
                                        '</div>'+
                                    '</div>'+

                                '</div>'+										
                                '<div class="col-md-1">'+	
                                    '<div style="width:100%">'+	
                                        '<img alt="Responsive image" class="img-fluid ref" id="'+i+'" src="'+plugin_url+'/height8/assets/images/refrece.png" onclick="reference(this.id)" style="cursor: pointer;" />'+
                                    '</div>'+											
                                '</div>'+
                                '<div class="col-md-1"  style="margin-left:25px;">'+
                                    '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove bl">X</button>'+
                                '</div>'+
                                '<div class="col-md-1">'+
                                '</div>'+
                            '</div>');  
    });  

    jQuery(document).on('click','.btn_remove', function(){
            jQuery('#row'+jQuery(this).attr("id")).remove();  
    });   
}
More_Events_Show();


// Self Care URL
    jQuery('#submit_SelfCareURL').click(function(){
        debugger;
            var SelfCareURL_name = jQuery("#SelfCareURL_text").val();
            var SelfCareURL = jQuery("#SelfCareURL").val();

            if(SelfCareURL == ""){
                let SelfCareURL_id = "#SelfCareURL";
                    animation_style(SelfCareURL_id);
                return false;
            }

            jQuery.ajax({
                type: 'post',
                url: MyAjax.ajaxurl,
                async:false,
                data: {
                    action: 'insert_data_SelfCareURL',
                    SelfCareURL:SelfCareURL,
                    SelfCareURL_name:SelfCareURL_name
                },
                success: function( result ) {
                    debugger;
                    Swal.fire({type: 'success',title: 'record created',showConfirmButton: false,timer: 1300});
                },
                error: function(result){
                    console.log(result);
                }
            });   
    });
    // var mk_mac = jQuery("#mk_mac").val();
    // var mk_ip = jQuery("#mk_ip").val();
    // var mk_link_login = jQuery("#mk_link-login").val();
    // var mk_link_orig = jQuery("#mk_link-orig").val();
    // var mk_error = jQuery("#mk_error").val();
    // var mk_chapid = jQuery("#mk_chapid").val();
    // var mk_chapchallenge = jQuery("#mk_chapchallenge").val();
    // var link_login_only = jQuery("#link-login-only").val();
    // var link_orig_esc = jQuery("#link-orig-esc").val();
    // var interface_name = jQuery("#interface-name").val();
    // var mac_esc = jQuery("#mac-esc").val();
    // var dst = jQuery("#dst").val();
    // var popup = jQuery("#popup").val();

    // var mk_username = jQuery("#mk_username").val();
    // var mk_password = jQuery("#mk_password").val();

        // jQuery.cookie("mk_mac",mk_mac);
        // jQuery.cookie("mk_ip",mk_ip);
        // jQuery.cookie("mk_link_login",mk_link_login);
        // jQuery.cookie("mk_link_orig",mk_link_orig);
        // jQuery.cookie("mk_error",mk_error);
        // jQuery.cookie("mk_chapid",mk_chapid);
        // jQuery.cookie("mk_chapchallenge",mk_chapchallenge);
        // jQuery.cookie("link_login_only",link_login_only);
        // jQuery.cookie("link_orig_esc",link_orig_esc);
        // jQuery.cookie("interface_name",interface_name);
        // jQuery.cookie("mac_esc",mac_esc);
        // jQuery.cookie("dst",dst);
        // jQuery.cookie("popup",popup);

    //     alert(jQuery.cookie('mk_mac'))
});