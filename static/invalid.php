<?php
function Invalid_Username(){

	$GetAp_LocationID = $_SESSION["GetAp_LocationID"];
	$GetAp_hid = $_SESSION["GetAp_hid"];
	$mobileNumber = $_REQUEST['username'];

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/OTPGeneration",
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
	                                'hotspot':$GetAp_hid,
	                                'hotspotgroup':'',
	                                'Sendexistingpassword':1
	                              }
	                          }",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "content-type: application/json",
	    "postman-token: a8fc2abc-9e6b-d59d-7cff-f7a62deb54ec"
	  ),
	));

	$response_new = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;	
	}else
	{			
		// echo "<div class='row'>";
		// echo $response_new . " <- OTPGeneration";			// Aakho responce
		// echo "<br>";
		// echo $mobileNumber . "<- OTPmobileNumberl";
		// echo "<br>";
		// echo $GetAp_hid . "<- OTPGetAp_hid";
		// echo "</div>";

		$obj10 = json_decode($response_new);
		$response_new = array();

		$response_data20["response_user"] = $obj10->d->Response;		//	OTPGeneration Success
		$json_response20 = json_encode($response_data20);				//	OTPGeneration Success - Fail
// ------------------------------------------------------------------------------------------------------------------------
		if ($response_data20["response_user"] == "Success") {
			echo "<script type='text/javascript'>const Toast = Swal.mixin({toast: true,showConfirmButton: false,timer: 1400});Toast.fire({type: 'success',title: 'OTP Send successfully'})</script>";
?>		

		<form method="POST" id="verif_verify">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<b><label for="Enter OTP :"> Enter OTP : </label></b><br>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5 col-md-5">
					<input type="text" name="verify_otp" id="verify_otp" placeholder="Enter Your OTP" required>
				</div>
				<div class="col-sm-5 col-md-5">
					<input type="submit" name="otp_verify" id="otp_verify" value="Verify OTP" class="btn">
				</div>
				<div class="col-sm-2 col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12 mt-2">
					<label for="PIN has Been sent to"><b>PIN has Been sent to <a href="#"><?php echo $mobileNumber ?></a></b></label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<label for="Didn't receive PIN ?"><b> Didn't receive PIN ?</b></label>
					<input type="hidden" name="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
					<button type="button" class="btn btn-link" name="btn" id="btn">Resend PIN</button>
				</div>
			</div>
		</form>	
<!-------------------------------------------------------------------------------------------------------------------------- -->
<?php
			include_once HEIGHT8_DIR_PATH."/static/resend.php";
			resend_otp();

			$mobilenumber11 = $mobileNumber;
			$mobilenumber1 = "$mobilenumber11";

			if (isset($_REQUEST['otp_verify'])) 
			{	
					$_SESSION["mb_otp"] = $_REQUEST['verify_otp'];		//	Session for OTP
					$mobileotp = $_REQUEST['verify_otp'];															

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
					  									'mobileNo':'$mobilenumber1',
															'OTP':'$mobileotp'					                                  			
					  								}
					  						}",
					  CURLOPT_HTTPHEADER => array(
					    "cache-control: no-cache",
					    "content-type: application/json"
					  	),
					));

					$response_verfy_otp = curl_exec($curl);
					$err = curl_error($curl);

					curl_close($curl);

					if ($err) 
					{
					  echo "cURL Error #:" . $err;	
					} 
					else 
					{
						$_SESSION['User_and_pass'] = $response_verfy_otp;
						// echo "<div class='row'>";			
						// echo $response_verfy_otp . " <- OTPVerification";
						// echo "<br>";
						// echo $mobilenumber1 . " <- OTPmobilenumber1";
						// echo "<br>";
						// echo $mobileotp . " <- OTPmobileotp";
						// echo "</div>";

							$objverify = json_decode($response_verfy_otp);	// OTPVerification Success - Fial
							$response_verfy_otp = array();									// OTPVerification Success - Fial

							$response_data_otp["Responseverify"] = $objverify->d->Response;	
							$json_response_otp = json_encode($response_data_otp);
							// echo $json_response_otp;			
				// ------------------------------------------------------------------------------------------------------------------------
							if ($response_data_otp["Responseverify"] == "Success") 		//	OTPVerification
							{
								include_once HEIGHT8_DIR_PATH."/static/customer_wifi_registration.php";
								wifi_registration();
							}
							else
							{
								echo "<script type='text/javascript'>";		
								echo "Swal.fire({type:'error',title: 'Oops...',html: '<b>PIN does not match</b>',footer: ''});";
								echo "</script>";
							}
					}
				}	// close otp_verify if stat

			}elseif ($response_data20["response_user"] == "Permitted limit of PIN request is reached, please try after 1 DAY") 
			{
				echo "<script type='text/javascript'>";		
				echo "Swal.fire({type:'error',title: 'Oops...',html: '<b>Permitted limit of PIN request is reached, please try after 1 DAY</b>',footer: ''});";
				echo "</script>";
			}
			else 	
			{
				echo $response_new;
			}
		// }
		}	// OTPGeneration else close

}	// function close
?>