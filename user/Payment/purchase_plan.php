<form method="GET" id="showpurchaseplans" class="animated bounceInRight" style="display:none;"> 
    <div style="text-align:center;">
        <i class="fas fa-angle-left glyphicon-chevron-left history_back" onclick="backbuttonshowplans()"></i>
    </div>
    <div class="row">
        <div class="viewplans_banar">
            <label class="viewplans_banar_label">Available Paid Packs</label>
        </div>
    </div>
    <div class="row" style="display:none;visibility:hidden">
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
    <div class="row" style="display:none;visibility:hidden">
        <div class="col-sm-12 col-md-12">
            <input type="hidden" id="username_pay" name="username_pay" value="" />
            <input type="hidden" id="CheckCustomerStatus_pay" name="CheckCustomerStatus_pay" value="" />
            <input type="hidden" id="loginCountryname" name="loginCountryname" value="" />      
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="clearfix">
                <!--  loop-->
                <?php 
                    include_once HEIGHT8_DIR_PATH."/user/api_library/GetApDetail.php";
                    getApMac();
                    $GetAp_ID = $_SESSION["packs_ID"];
                    $GetAp_hid = $_SESSION["packs_hid"];
                    $GetAp_LocationID = $_SESSION["packs_LocationID"];
                    $GetAp_Response = $_SESSION["packs_Response"];                    

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/GetPlanList",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{'request':{'HotspotId':'". $GetAp_hid ."','SSIDconfig':''}}",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: application/json"
                    ),
                    ));
                    $GetPlanList_response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);

                    if ($err) {
                    echo "cURL Error #:" . $err;
                    } else {
                      //  echo $GetPlanList_response;

                      $obj_GetPlanList = json_decode($GetPlanList_response);
                      $GetPlanList_response = array();

                      $response_GetPlanList["GetPlanList_Response"] = $obj_GetPlanList->d->PaidPlanList ;
                      $json_GetPlanList_Response = json_encode($response_GetPlanList["GetPlanList_Response"]); 
                      // echo $json_GetPlanList_Response;
                    }
                    foreach ($response_GetPlanList["GetPlanList_Response"] as $value){
                ?>        
                    <div class="img-container mb-3 mr-2 card">
                        <div><?php $value->ID; ?></div>
                        <div class="pal-col text-center text-white font-weight-bold pt-3 pb-1"><label><?php echo $value->NAME; ?></label> </div>
                        <mark> <div class="text-center font-weight-bold pt-3"><label style="font-size: 30px;"><?php echo $value->MRP ?></label></div>
                        <div class="text-center"><label style="font-size: 19px;"><?php echo $value->VALIDITY ?></label></div>
                        <!-- <div class="text-center"><label for="">2 GB</label></div> -->
                    <hr>
                        <div class="text-center">
                        <button type="submit" name="plan" value="<?php echo $value->ID; ?>" id="<?php echo $value->ID; ?>" class="pal-col btn font-weight-bold text-center mb-2">Buy Plan</button>
                        </div></mark>  
                    </div>  
                <?php } ?>
<!-- loop end -->
      </div>
    </div>
  </div>
</form>

<?php
 include_once HEIGHT8_DIR_PATH."/user/api_library/GetApDetail.php";
 getApMac();
 $GetAp_ID = $_SESSION["packs_ID"];
 $GetAp_hid = $_SESSION["packs_hid"];
 $GetAp_LocationID = $_SESSION["packs_LocationID"];
 $GetAp_Response = $_SESSION["packs_Response"];
 
if (isset($_REQUEST['plan']))
{ 
    $mobileNumber = $_REQUEST['username_pay'];
      $_SESSION["username"] = $mobileNumber;

    $CheckCustomerStatus = $_REQUEST['CheckCustomerStatus_pay'];
      $_SESSION["CheckCustomerStatus"] = $CheckCustomerStatus;

      $_SESSION["GetAp_hid"] = $_REQUEST['plan'];
    $button_name = $_REQUEST['plan'];

    if ($CheckCustomerStatus == "Invalid Username or Password!" || $CheckCustomerStatus == "User Does not exists !" || $CheckCustomerStatus == "New - Activation Pending"){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => url ."/OTPGeneration",
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
                                        'emailId':'',
                                        'name':'',
                                        'planid':0,
                                        'isExistUser':false,
                                        'GetOTPPayOnline':false,
                                        'GetOTPlogin':false,
                                        'PartnerID':1,
                                        'resellerId':0,
                                        'hotspot':'1',
                                        'hotspotgroup':'',
                                        'Sendexistingpassword':1
                                      }
                                  }",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));
        
        $response_OTPGeneration_newuser = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err){
          echo "cURL Error #:" . $err;
        }else{
          // echo $response_OTPGeneration_newuser;
          
          $obj_OTPGeneration_newuser = json_decode($response_OTPGeneration_newuser);
          $response_OTPGeneration_newuser = array();

          $response_OTPGeneration_newuser1["OTPGeneration_newuser"] = $obj_OTPGeneration_newuser->d->Response;		//	ResendOTP Success - FAIL
          $jsonresponse_OTPGeneration_newuser = json_encode($response_OTPGeneration_newuser1);	    	            //	ResendOTP Success - FAIL

          if ($response_OTPGeneration_newuser1["OTPGeneration_newuser"] == "Success"){	
              verify_planform();
            // $paid_pack = HEIGHT8_URL_WORDPRESS."/payplans";
            // echo "<script>";
            // echo "window.location='$paid_pack';";
            // echo "</script>";
          }else{
            echo "<script type='text/javascript'>";		
            echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... ".$response_OTPGeneration_newuser1["OTPGeneration_newuser"]."</b>',footer: ''});";
            echo "</script>";
          }
      }    
    }elseif ($CheckCustomerStatus == "Inactive" || $CheckCustomerStatus == "Trial"){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL =>  url ."/ResendOTP",
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
                                      'hId':'$GetAp_hid',
                                      'LocationId':'$GetAp_LocationID',
                                      'hotspotgroup':''									                                
                                  }
                                }",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));

        $response_ResendOTP_pay = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err){
            echo "cURL Error #:" . $err;
        }else{
            // echo $response_ResendOTP_pay;

            $obj1 = json_decode($response_ResendOTP_pay);
            $response_ResendOTP_pay = array();

            $response_data_pay1["ResendOTP_send"] = $obj1->d->Response;		//	ResendOTP Success - FAIL
            $json_response_pay1 = json_encode($response_data_pay1);	    	//	ResendOTP Success - FAIL

            if ($response_data_pay1["ResendOTP_send"] == "Success") {	
                verify_planform();
                // $paid_pack = HEIGHT8_URL_WORDPRESS."/payplans";
                // echo "<script>";	
                // echo "window.location='$paid_pack';";
                // echo "</script>";
            }
            else{
              echo "<script type='text/javascript'>";		
              echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... ".$response_data_pay1['ResendOTP_send']."</b>',footer: ''});";
              echo "</script>";
            }
        }
    }elseif ($CheckCustomerStatus == "Active" || $CheckCustomerStatus == "Userame Already Exist."){
      echo "<script>";		
      echo "Swal.fire({type: 'error',title: 'Oops...',html: '<b> You are ". $CheckCustomerStatus . "</b>',footer: ''});";
      echo "</script>";
    }else{
      echo "<script>";		
      echo "Swal.fire({type: 'error',title: 'Oops...',html: '<b>" . $CheckCustomerStatus . "</b>',footer: ''});";
      echo "</script>";
    }
}   // Click plan button
?>