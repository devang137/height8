<!-- ---------------------------------------------------------- -->
<!-- Inactive User Payment flow -->
<!-- ---------------------------------------------------------- -->
<?php
function verify_form_plan(){
    $GetAp_LocationID = $_SESSION["GetAp_LocationID"];			//	4
    $GetAp_hid = $_SESSION["GetAp_hid"];				         		//	1
    $mobileNumber = $_SESSION["user"];
    $button_name = $_SESSION["plan_button_id"];
    $status_customer =  $_SESSION["packs_checkstatus"];
?>
<script type="text/javascript">
    jQuery( "h1" ).remove();

    function goBack_planview() {
    window.history.back();
}
</script>
<form method="GET">
    <div style="text-align:center;" onclick="goBack_planview()">
        <i class="fas fa-angle-left glyphicon-chevron-left history_back"></i>
    </div>
  <div class="row">
    <div class="col-sm-1 col-md-1 mb-2"></div>
    <div class="col-sm-11 col-md-11">
      <b><label for="Enter OTP :"> Enter PIN * </label></b>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-sm-1 col-md-1"></div>
    <div class="col-sm-4 col-md-4">
      <input type="tel" class="form-control" id="text_payment" name="text_payment" placeholder="Enter PIN" maxlength="10" required>
    </div>
    <div class="col-sm-1 col-md-1"></div>
    <div class="col-sm-3 col-md-3">
      <input type="submit" class="otp_send form-control btn-primary" id="btn_verfiy_payment" name="btn_verfiy_payment" style="display: block;" value="Login">
    </div>
    <div class="col-sm-3 col-md-3"></div>
  </div>
  <div class="row mb-2">
    <div class="col-sm-1 col-md-1"></div>
    <div class="col-sm-11 col-md-11">
      <label><b>PIN has Been sent to <a href="#"><?php echo $mobileNumber ?></a></b></label>
      <input type="hidden" name="username" id="username" value="<?php echo $mobileNumber ?>" />
    </div>
  </div>
  <div class="row mb-2">
		<input type="hidden" name="mac" id="mk_mac" value="<?php echo $_REQUEST['mac'] ?>" />
		<input type="hidden" name="ip" id="mk_ip" value="<?php echo $_REQUEST['ip'] ?>" />
		<input type="hidden" name="link-login" id="mk_link-login" value="<?php echo $_REQUEST['link-login'] ?>" />
		<input type="hidden" name="link-orig" id="mk_link-orig" value="<?php echo $_REQUEST['link-orig'] ?>" />
		<input type="hidden" name="mk_error" id="mk_error" value="<?php echo $_REQUEST['mk_error'] ?>" />
		<input type="hidden" name="chap-id" id="mk_chapid" value="<?php echo $_REQUEST['chap-id'] ?>" />
		<input type="hidden" name="chap-challenge" id="mk_chapchallenge" value="<?php echo $_REQUEST['chap-challenge'] ?>" />
		<input type="hidden" name="link-login-only" id="link-login-only" value="<?php echo $_REQUEST['link-login-only'] ?>" />
		<input type="hidden" name="link-orig-esc" id="link-orig-esc" value="<?php echo $_REQUEST['link-orig-esc'] ?>" />
		<input type="hidden" name="mac-esc" id="mac-esc" value="<?php echo $_REQUEST['mac-esc'] ?>" />
		<input type="hidden" name="interface-name" id="interface-name" value="<?php echo $_REQUEST['interface-name'] ?>" />

		<input type="hidden" name="dst" id="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
		<input type="hidden" name="popup" id="popup" value="false" />
		<input type="hidden" runat="server" id="hdnVals" name="vals" value="" />
	</div>
  <div class="row mb-1">
    <div class="col-sm-1 col-md-1"></div>
    <div class="col-sm-11 col-md-11">
        <label><b> Didn't receive PIN ? </b></label>
        <button type="button" class="btn btn-link" name="btn_Resend" id="btn_Resend">Resend PIN</button>
    </div>
  </div>		
  <script type="text/javascript">
      jQuery(document).ready(function(){

        jQuery("#btn_Resend").click(function(){
        var user_resend = jQuery("#username").val();
        const CheckCustomerStatus_ResendOTP = "{'request':{'mobileNo':"+ user_resend +",'hId':'','LocationId':'','hotspotgroup':''}}";

          jQuery.ajax({
              type: "POST",
              url: "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/ResendOTP",
              data: CheckCustomerStatus_ResendOTP,
              contentType: "application/json; charset=utf-8",
              dataType: "json",

              success: function(data){
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
</form>
<?php
	if (isset($_REQUEST['btn_verfiy_payment'])){

      $_SESSION["otp_payment"] = $_REQUEST['text_payment'];	    	//	Session for OTP
      $mobileotp = $_REQUEST['text_payment'];															

    if ($status_customer == "Inactive"){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/ResendOTPVerification",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",    
        CURLOPT_POSTFIELDS => "{
                                    'request':
                                    {
                                        'mobileNo':'$mobileNumber',
                                        'otp':'$mobileotp',
                                        'hId':''						
                                    }
                                }",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json"
            ),
        ));
        $response_verfy_payment = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err){
            echo "cURL Error #:" . $err;	
        } else {		
            // echo $response_verfy_payment;	//	Aakho responce
            $obj_verfy_payment = json_decode($response_verfy_payment);
            $response_verfy_payment = array();

            $response_verfy_payment1["ResendOTP_Verify"] = $obj_verfy_payment->d->Response;		//	ResendOTP Success - FAIL
            $json_response__verfy_payment = json_encode($response_verfy_payment1);	    	//	ResendOTP Success - FAIL
            
            if ($response_verfy_payment1["ResendOTP_Verify"] == "Success") {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/RenewOnline",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "{
                                          'request':
                                          {
                                            'mobileNo':'$mobileNumber',
                                            'PlanId':'$button_name',
                                            'rId':'',
                                            'hId':'',
                                            'PId':'',
                                            'LocationId':'$GetAp_LocationID',
                                            'hotspotgroup':'',
                                            'mac':'',
                                            'country':''
                                          }
                                        }",
                  CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: application/json"
                    ),
                ));

                $response_RenewOnline_inactive = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;	
                } else {
                  // echo $response_paid_form_checkstatus;

                  $obj_RenewOnline_inactive = json_decode($response_RenewOnline_inactive);
                  $response_RenewOnline_inactive = array();
        
                  $response_RenewOnline_inactive["RenewOnline_active"] = $obj_RenewOnline_inactive->d->Response;	//Invalid Username or Password! , Active , Inactive
                  $response_RenewOnline_inactive["RenewOnline_active_reqid"] = $obj_RenewOnline_inactive->d->reqid;
                  $json_response_RenewOnline_inactive = json_encode($response_RenewOnline_inactive); 							// Invalid Username or Password! , Active , Inactive
                 
                  // echo $response_RenewOnline_inactive["RenewOnline_active"];

                  $reqid =$response_RenewOnline_inactive["RenewOnline_active_reqid"];

                      if ($response_RenewOnline_inactive["RenewOnline_active"] == "Success"){
                          $curl = curl_init();
                          curl_setopt_array($curl, array(
                            CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/CheckCustomerStatus",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => "{
                                                    'request':
                                                      {
                                                        'mobileNo':'$mobileNumber',
                                                        'otp':'',
                                                        'LocationId':'$GetAp_LocationID',
                                                        'mac':'',
                                                        'hotspotgroup':'',
                                                        'chkexistuser':'1',
                                                        'client_mac':'',
                                                        'AccessCode':'',
                                                        'HotspotId':'$GetAp_hid',
                                                        'devicedesc':''
                                                      }
                                                  }",
                            CURLOPT_HTTPHEADER => array(
                              "cache-control: no-cache",
                              "content-type: application/json"
                            ),
                          ));
                          
                          $response_paid_form_checkstatus = curl_exec($curl);
                          $err = curl_error($curl);
                          curl_close($curl);
                          
                          if ($err) {
                            echo "cURL Error #:" . $err;
                          } else {
                              // echo $response_paid_form_checkstatus;
                              $obj_paid_checkstatus = json_decode($response_paid_form_checkstatus);
                              $response_paid_form_checkstatus = array();

                              $response_paid_form_checkstatus["CustomerStatus_payment_time"] = $obj_paid_checkstatus->d->Response;	//Invalid Username or Password! , Active , Inactive
                              $json_paid_form_checkstatus = json_encode($response_paid_form_checkstatus); 						            	// Invalid Username or Password! , Active , Inactive
                              // echo $response_paid_form_checkstatus["CustomerStatus_payment_time"];

                            if ($response_paid_form_checkstatus["CustomerStatus_payment_time"] == "Trial"){
                              $curl = curl_init();
                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/PaymentAPI",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "{
                                                        'request':
                                                        {
                                                          'ReqId':'$reqid'
                                                        }
                                                      }",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: application/json"
                                ),
                              ));

                              $response_PaymentAPI = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                // echo $response_PaymentAPI;
                                $obj_PaymentAPI = json_decode($response_PaymentAPI);
                                $response_PaymentAPI = array();
                
                                $response_PaymentAPI1["PaymentAPI"] = $obj_PaymentAPI->d->ReqId;		//	ResendOTP Success - FAIL
                                $json_response_pay1 = json_encode($response_PaymentAPI1);   	    	//	ResendOTP Success - FAIL

                                $Payment_url =  $response_PaymentAPI1["PaymentAPI"];
                                // echo $Payment_url;

                                echo "<script>";
                                echo "window.open('$Payment_url');";
                                echo "</script>";
                              }
                            }else{
                              echo "<script type='text/javascript'>";		
                              echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... ".$response_paid_form_checkstatus["CustomerStatus_payment_time"]."</b>',footer: ''});";
                              echo "</script>";
                            }          
                          }   //RenewOnline
                      }else{
                        echo "<script type='text/javascript'>";		
                        echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... ".$response_RenewOnline_inactive["RenewOnline_active"]."</b>',footer: ''});";
                        echo "</script>";
                      }   
                }    // CheckCustomerStatus 
            }else{  
                echo "<script type='text/javascript'>";		
                echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... ".$response_verfy_payment1["ResendOTP_Verify"]."</b>',footer: ''});";
                echo "</script>";
            }
        }
    }elseif ($status_customer == "Invalid Username or Password!" ){

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/OTPVerification",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{
                                  'request':
                                          {
                                            'mobileNo':'$mobileNumber',
                                            'OTP':'$mobileotp' 
                                          }
                                  }",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));
        
        $response_OTPVerification = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          // echo $response_OTPVerification;

          $obj_OTPVerification = json_decode($response_OTPVerification);
          $response_OTPVerification = array();

          $response_OTPVerification["OTPVerification"] = $obj_OTPVerification->d->Response;		//	ResendOTP Success - FAIL
          $json_OTPVerification = json_encode($response_OTPVerification);	                     	//	ResendOTP Success - FAIL

          if ($response_OTPVerification["OTPVerification"] == "Success") {	
            
                $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/RegistrationWithOnlinePay",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "{
                                          'request':
                                              {
                                                'mobileNo':'$mobileNumber',
                                                'PlanId':'$button_name',
                                                'rId':'',
                                                'hId':'',
                                                'PId':'',
                                                'LocationId':'$GetAp_LocationID',
                                                'hotspotgroup':'',
                                                'mac':'',
                                                'country':''
                                              }
                                        }",
                  CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: application/json"
                  ),
                ));

                $response_RegistrationWithOnlinePay = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  echo $response_RegistrationWithOnlinePay;

                  $obj_RegistrationWithOnlinePay = json_decode($response_RegistrationWithOnlinePay);	// OTPVerification Success - Fial
                  $response_RegistrationWithOnlinePay = array();				                    					// OTPVerification Success - Fial
    
                  $response_RegistrationWithOnlinePay["RegistrationWithOnlinePay"] = $obj_RegistrationWithOnlinePay->d->Response;
                  $response_RegistrationWithOnlinePay["RegistrationWithOnlinePay_reqid"] = $obj_RegistrationWithOnlinePay->d->reqid;
                  $json_RegistrationWithOnlinePay = json_encode($response_RegistrationWithOnlinePay);

                  $reqid =$response_RegistrationWithOnlinePay["RegistrationWithOnlinePay_reqid"];

                  if ($response_RegistrationWithOnlinePay["RegistrationWithOnlinePay"] == "Success"){
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/CheckCustomerStatus",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "{
                                                'request':
                                                  {
                                                    'mobileNo':'$mobileNumber',
                                                    'otp':'',
                                                    'LocationId':'$GetAp_LocationID',
                                                    'mac':'',
                                                    'hotspotgroup':'',
                                                    'chkexistuser':'1',
                                                    'client_mac':'',
                                                    'AccessCode':'',
                                                    'HotspotId':'$GetAp_hid',
                                                    'devicedesc':''
                                                  }
                                              }",
                        CURLOPT_HTTPHEADER => array(
                          "cache-control: no-cache",
                          "content-type: application/json"
                        ),
                      ));

                      $response_CheckCustomerStatus_new = curl_exec($curl);
                      $err = curl_error($curl);

                      curl_close($curl);

                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {
                        $response_CheckCustomerStatus_new;

                        $obj_CheckCustomerStatus_new = json_decode($response_CheckCustomerStatus_new);	  // OTPVerification Success - Fial
                        $response_CheckCustomerStatus_new = array();				                    					// OTPVerification Success - Fial
          
                        $response_CheckCustomerStatus_new["RegistrationWithOnlinePay"] = $obj_CheckCustomerStatus_new->d->Response;	
                        $json_CheckCustomerStatus_new = json_encode($response_CheckCustomerStatus_new);

                        if ($response_CheckCustomerStatus_new["RegistrationWithOnlinePay"] == "Trial"){
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                              CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/PaymentAPI",
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => "",
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 30,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => "POST",
                              CURLOPT_POSTFIELDS => "{
                                                      'request':
                                                            {
                                                              'ReqId':'$reqid'
                                                            }
                                                    }",
                              CURLOPT_HTTPHEADER => array(
                                "cache-control: no-cache",
                                "content-type: application/json"
                              ),
                            ));

                            $response_PaymentAPI_new = curl_exec($curl);
                            $err = curl_error($curl);
                            curl_close($curl);

                            if ($err){
                              echo "cURL Error #:" . $err;
                            }else{
                              echo $response_PaymentAPI_new;
                              
                              $obj_PaymentAPI_new = json_decode($response_PaymentAPI_new);
                              $response_PaymentAPI_new = array();
              
                              $response_PaymentAPI_new["PaymentAPI_new"] = $obj_PaymentAPI_new->d->ReqId;		//	ResendOTP Success - FAIL
                              $json_PaymentAPI_new = json_encode($response_PaymentAPI_new);	    	          //	ResendOTP Success - FAIL

                              $Payment_url =  $response_PaymentAPI_new["PaymentAPI_new"];
                              // echo $Payment_url;
                              echo "<script>";
                              echo "window.open('$Payment_url');";
                              echo "</script>";
                            }   //  PaymentAPI
                        }else{
                          echo "<script type='text/javascript'>";		
                          echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... ".$response_CheckCustomerStatus_new["RegistrationWithOnlinePay"]."</b>',footer: ''});";
                          echo "</script>";
                        }
                      }   //  CheckCustomerStatus
                  }else{
                    echo "<script type='text/javascript'>";		
                    echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... ".$response_RegistrationWithOnlinePay["RegistrationWithOnlinePay"]."</b>',footer: ''});";
                    echo "</script>";
                  }
                }   //  RegistrationWithOnlinePay
          }else{
            echo "<script type='text/javascript'>";		
            echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... ".$response_OTPVerification["OTPVerification"]."</b>',footer: ''});";
            echo "</script>";
          }  //  OTPVerification
        }
    }else{
      echo "<script type='text/javascript'>";		
      echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... something is missing</b>',footer: ''});";
      echo "</script>";
    }    
  }  // 1st btn_verfiy_payment click
?>
<?php
}   // function close
add_shortcode('payplans','verify_form_plan');
?>