jQuery(document).ready(function(){
debugger;   
    jQuery("#submite_flow_code").click(function () {
        if (jQuery("#Flow_Name").val() == ""){
            Swal.fire({ title: 'Oops', html: "<b> Enter Value </b>", type: 'warning', cancelButtonColor: '#d33', });
                let shake = "#Flow_Name";
                    animation_style(shake);
            return false;
        }else if (jQuery("#flowStatus").val() == ""){
            Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
                let shake = "#flowStatus";
                    animation_style(shake);
            return false;
        }else if (jQuery("#Control_Event").val() == ""){
            Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
                let shake = "#Control_Event";
                    animation_style(shake);
            return false;
        }else if (jQuery("#Control_ID").val() == ""){
            Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
                let shake = "#Control_ID";
                    animation_style(shake);
            return false;
        }else if (jQuery("#Flow_captive_url").val() == ""){
            Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
                let shake = "#Flow_Event_Name";
                    animation_style(shake);
            return false;
        }

        let Flow_Name = jQuery("#Flow_Name").val();
        let FlowStatus = jQuery("#flowStatus").val();
        let ControlEvent = jQuery("#Control_Event").val();
        let ControlID = jQuery("#Control_ID").val(); 
        let Flowcaptiveurl = jQuery("#Flow_captive_url").val();
        let Eventname = jQuery("#Flow_captive_url").children("option:selected").text();
        let plugin_url = jQuery("#url_plugin").val();
        let margefunction = jQuery("#margefunction").val();
        let Return_Code_Authenticate = jQuery("#Return_Code_Authenticate").val();

            jQuery("#"+jQuery(this).attr("ID")).attr("disabled", true);
            setTimeout(function(){
                jQuery("#submite_flow_code").attr("disabled", false);
            },1000);

        let allparamiter = addparamiter_switch(Eventname);

        var databashcode = 'jQuery(document).ready(function(){  \n '+
                            'jQuery("'+ControlID+'")'+ControlEvent+'(function () { \n '+
                            'debugger; \n'+
                                'jQuery.ajax({ \n'+
                                    'type: "POST", \n '+	   
                                    'url: "'+Flowcaptiveurl+'", \n '+
                                    'data: "'+allparamiter+'", \n '+
                                    'contentType: "application/json; charset=utf-8", \n '+
                                    'dataType: "json", \n '+
                                    'success: function(data) { \n '+
                                    'debugger; \n '+
                                        'alert(data.d.Response); \n '+
                                        'debugger; \n'+
                                        'jQuery("#username").attr("value",jQuery("'+ Parameter_mobile +'").val()); \n'+
                                        'jQuery("#password").attr("value",jQuery("'+ Parameter_otp +'").val()); \n'+
                                            'if (data.d.ResponseCode == '+ Return_Code_Authenticate +') { \n'+
                                                margefunction+'\n'+
                                            '}else{\n'+
                                                'console.log('+ Return_Code_Authenticate +'); \n'+
                                            '}\n'+
                                        'return false \n'+
                                    '}, \n '+
                                    'error: function(data){ \n '+
                                    'debugger; \n '+
                                        'alert("error"); \n '+
                                    '} \n '+
                                '}); \n '+
                            'return false; }); \n '+
                        '}); \n ';
debugger;
            jQuery.ajax({
                type: 'post',
                url: MyAjax.ajaxurl,
                data: {
                    action: 'flow_tab_data_insert',
                    Flow_Name: Flow_Name,
                    FlowStatus:FlowStatus,
                    ControlEvent:ControlEvent,
                    ControlID:ControlID,
                    Flowcaptiveurl:Flowcaptiveurl,
                    jqcode:databashcode,    
                    EventNameapi:Eventname
                },
                async:false,
                success: function( result ) {
                    debugger;   
                    jQuery("#flowdata_refrece").load(" #flowdata_refrece");                    
                }
            });
    });

        

// Event Name
    jQuery("select#Flow_captive_url").change(function(){
        var dropdoweventname = jQuery(this).children("option:selected").text();

        switch(dropdoweventname) {
            case "CheckCustomerStatus":
debugger;
                jQuery('#param').html("");      //  paramiter tabal tr
                    var i=1; 
                    var arrayparam = ["mobileNo", "otp", "LocationId", "mac","hotspotgroup","chkexistuser","client_mac","AccessCode","HotspotId","devicedesc"];
                        arrayparam.forEach(function(item){
debugger;                  
                            i++;
                            var printparam = '<tr><td><b id="'+ item +'">'+ item +'</b></td>'+
                                             '<td><input type="text" value="" id="'+ item + i +'" name="'+ item + i +'"></td></tr>';
                                                jQuery("#param").append(printparam);
                        });
                        jQuery("#LocationId4").val(getapdetail_LocationID).css({"background-color": "#dddddd"});
                        jQuery("#hotspotgroup6").val(getapdetail_Hotspotgroup).css({"background-color": "#dddddd"});
                        jQuery("#HotspotId10").val(getapdetail_hid).css({"background-color": "#dddddd"});
                break;
            case "OTPGeneration": 
debugger;
                    jQuery('#param').html("");
                    var i=1; 
                    var arrayparam = ["mobileNo", "emailId","name","planid","isExistUser","GetOTPPayOnline","GetOTPlogin","PartnerID","resellerId","hotspot","hotspotgroup","Sendexistingpassword"];
                        arrayparam.forEach(function(item){
                          
                            i++;
                            var printparam = '<tr><td>'+item+'</td><td><input type="text" value="" id="'+ item + i +'" name="'+ item + i +'"></td></tr>';
                                jQuery("#param").append(printparam);
                        });
                            jQuery("#hotspot11").val(getapdetail_hid).css({"background-color": "#dddddd"});
                            jQuery("#hotspotgroup12").val(getapdetail_Hotspotgroup).css({"background-color": "#dddddd"});
                            jQuery("#isExistUser6 ,#GetOTPPayOnline7 ,#GetOTPlogin8").val("false").css({"background-color": "#dddddd"});
                break;
            case "OTPVerification": 
debugger;
                jQuery('#param').html("");
                var i=1; 
                var arrayparam = ["mobileNo", "OTP"];
                    arrayparam.forEach(function(item){
                        
                        i++;
                        var printparam = '<tr><td>'+item+'</td><td><input type="text" value="" id="'+ item + i +'" name="'+ item + i +'"></td></tr>';
                            jQuery("#param").append(printparam);
                    });
            break;
            case "ResendOTP": 
debugger;
                    jQuery('#param').html("");
                    var i=1; 

                    var arrayparam = ["mobileNo", "hId","LocationId","hotspotgroup"];
                        arrayparam.forEach(function(item){
                          
                            i++;
                            var printparam = '<tr><td>'+item+'</td><td><input type="text" value="" id="'+ item + i +'" name="'+ item + i +'"></td></tr>';
                                jQuery("#param").append(printparam);
                        });
                        jQuery("#hId3").val(getapdetail_hid).css({"background-color": "#dddddd"});
                        jQuery("#LocationId4").val(getapdetail_LocationID).css({"background-color": "#dddddd"});
                        jQuery("#hotspotgroup5").val(getapdetail_Hotspotgroup).css({"background-color": "#dddddd"});
                break;
            case "ResendOTPVerification": 
debugger;
                    jQuery('#param').html("");
                    var i=1; 
                    var arrayparam = ["mobileNo","otp"];
                        arrayparam.forEach(function(item){
                            i++;
                            var printparam = '<tr><td>'+item+'</td><td><input type="text" value="" id="'+ item + i +'" name="'+ item + i +'"></td></tr>';
                                jQuery("#param").append(printparam);
                        });
                break;
            case "CheckPreRegisteredUser": 
debugger;
                    jQuery('#param').html("");
                    var i=1; 
                    var arrayparam = ["mobileNo", "hotspotgroup","hotspot"];
                        arrayparam.forEach(function(item){
                           
                            i++;
                            var printparam = '<tr><td>'+item+'</td><td><input type="text" value="" id="'+ item + i +'" name="'+ item + i +'"></td></tr>';
                                jQuery("#param").append(printparam);
                        }); 
                break;
            case "RenewVoucher":
debugger;
                jQuery('#param').html("");
                var i=1; 
                var arrayparam = ["mobileNo", "vPin","vPassword","Hotspotgroup","hid","LocationID"];
                    arrayparam.forEach(function(item){
debugger;
                        i++;
                        var printparam = '<tr><td>'+item+'</td><td><input type="text" value="" id="'+ item + i +'" name="'+ item + i +'"></td></tr>';
                            jQuery("#param").append(printparam);
                    }); 
                    jQuery("#Hotspotgroup5").val(getapdetail_Hotspotgroup).css({"background-color": "#dddddd"});
                    jQuery("#hid6").val(getapdetail_hid).css({"background-color": "#dddddd"});
                    jQuery("#LocationID7").val(getapdetail_LocationID).css({"background-color": "#dddddd"});
            break;
            case "RegistrationWithVoucher": 
debugger;
                jQuery('#param').html("");
                var i=1; 
                var arrayparam = ["mobileNo", "password","vPin","vPassword","hId","locationid","mac","rId","PId","isExistUser","name","emailId","country","hotspotgroup"];
                    arrayparam.forEach(function(item){                        
                        i++;
                        var printparam = '<tr><td>'+item+'</td><td><input type="text" value="" id="'+ item + i +'" name="'+ item + i +'"></td></tr>';
                            jQuery("#param").append(printparam);
                    }); 
                    jQuery("#hId6").val(getapdetail_hid).css({"background-color": "#dddddd"});
                    jQuery("#locationid7").val(getapdetail_LocationID).css({"background-color": "#dddddd"});
                    jQuery("#rId9").val(getapdetail_Resellerid).css({"background-color": "#dddddd"});
                    jQuery("#PId10").val(getapdetail_Partnerid).css({"background-color": "#dddddd"});
                    jQuery("#hotspotgroup15").val(getapdetail_Hotspotgroup).css({"background-color": "#dddddd"});
                    jQuery("#isExistUser11").val("false").css({"background-color": "#dddddd"});
                    break;
            default:
                    jQuery("#param").html("");
            }
    });



    jQuery("#submite_button_flow").click(function () {
        debugger;
        if (jQuery("#button_flowname").val() == ""){
            Swal.fire({ title: 'Oops', html: "<b> Enter Value </b>", type: 'warning', cancelButtonColor: '#d33', });
                let shake = "#button_flowname";
                    animation_style(shake);
            return false;
        }else if (jQuery("#buttonflowStatus").val() == ""){
            Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
                let shake = "#buttonflowStatus";
                    animation_style(shake);
            return false;
        }else if (jQuery("#button_Control_Event").val() == ""){
            Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
                let shake = "#button_Control_Event";
                    animation_style(shake);
            return false;
        }else if (jQuery("#button_Control_ID").val() == ""){
            Swal.fire({ title: 'Oops', html: "<b> Select Value </b>", type: 'warning', cancelButtonColor: '#d33', });
                let shake = "#button_Control_ID";
                    animation_style(shake);
            return false;
        }

        let flowname_second = jQuery("#button_flowname").val();
        let flowstatus_second = jQuery("#buttonflowStatus").val();
        let controlevent_second = jQuery("#button_Control_Event").val();
        let controlid_second = jQuery("#button_Control_ID").val();

            jQuery("#"+jQuery(this).attr("ID")).attr("disabled", true);
            setTimeout(function(){
                jQuery("#submite_button_flow").attr("disabled", false);
            },1000);

        if(jQuery("#submit_form_name").val() != ""){
        debugger;
            let Submitform_name = jQuery("#submit_form_name").val(); 
            
            switch(Submitform_name) {
                case "HidenandShow":
                    debugger;
                    var hideid = jQuery("#hide_ui_id").val();
                    var showid = jQuery("#show_ui_id").val();
                    var hide_display = `jQuery("`+showid+`").hide();`;
                    var submit_function = `jQuery("`+showid+`").show(); \n jQuery("`+hideid+`").hide();`;

                    var databashcode_second = `jQuery(document).ready(function(){
                                                    debugger;
                                                    `+hide_display+`
                                                    jQuery("`+controlid_second+`")`+controlevent_second+`(function () {
                                                        debugger;
                                                        `+submit_function+`
                                                        return false;
                                                    });
                                                }); `;
                break;
                case "Redirect":
                    debugger;
                    var Redirect = jQuery("#Redirect_url").val();
                    var submit_function = `window.location.href = "`+Redirect+`?mac="+jQuery("#mk_mac").val()+
                                                                                "&ip="+jQuery("#mk_ip").val()+
                                                                                "&link-login="+jQuery("#mk_link-login").val()+
                                                                                "&link-orig="+jQuery("#mk_link-orig").val()+
                                                                                "&mk_error="+jQuery("#mk_error").val()+
                                                                                "&chap-id="+jQuery("#mk_chapid").val()+
                                                                                "&chap-challenge="+jQuery("#mk_chapchallenge").val()+
                                                                                "&link-login-only="+jQuery("#link-login-only").val()+
                                                                                "&link-orig-esc="+jQuery("#link-orig-esc").val()+
                                                                                "&interface-name="+jQuery("#interface-name").val()+
                                                                                "&mac-esc="+jQuery("#mac-esc").val()+
                                                                                "&dst="+jQuery("#dst").val()+
                                                                                "&popup="+jQuery("#popup").val()+
                                                                                "&mac-esc="+jQuery("#mac-esc").val()`

                    var databashcode_second = `jQuery(document).ready(function(){
                                                debugger;
                                                    jQuery("`+controlid_second+`")`+controlevent_second+`(function () {
                                                        debugger;
                                                        `+submit_function+`
                                                        return false;
                                                    });
                                                }); `;
                break;
                case "logout":
                    debugger;
                        var submit_function = `sclogout()`;
                        var databashcode_second = `jQuery(document).ready(function(){   \n  debugger;
                                                    jQuery("`+controlid_second+`")`+controlevent_second+`(function () { \n  debugger;
                                                        `+submit_function+`
                                                    });
                                                }); `;
                            databashcode_second = databashcode_second.replace(/ /g,'');
                    break;
                default:
                    debugger;
                        console.log('error'+Submitform_name);
            }
        }

            jQuery.ajax({
                type: 'post',
                url: MyAjax.ajaxurl,
                async:false,
                data: {
                    action: 'submit_button_id',
                    Flow_Name: flowname_second,
                    FlowStatus:flowstatus_second,
                    ControlEvent:controlevent_second,
                    ControlID:controlid_second,
                    hide:hideid,
                    show:showid,
                    code:databashcode_second
                },
                success: function( result ) {
                    debugger;
                    jQuery("#flowdata_refrece").load(" #flowdata_refrece");
                },
                error: function(result){
                    console.log(result);
                }
            }); 
    });

    
    jQuery("select#submit_form_name").change(function(){
        debugger;
        var dropdoweventnames = jQuery(this).children("option:selected").val();
            if(dropdoweventnames == "HidenandShow"){
                jQuery("#redirect").hide();
                jQuery("#hidedata").show();
            }else if(dropdoweventnames == "Redirect"){
                jQuery("#hidedata").hide();
                jQuery("#redirect").show();
            }else{
                jQuery("#hidedata").hide();
                jQuery("#redirect").hide();
            }
    });















});
