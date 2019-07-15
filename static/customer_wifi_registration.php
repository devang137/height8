<?php

function wifi_registration()
{
	$GetAp_LocationID = $_SESSION["GetAp_LocationID"];
	$GetAp_hid = $_SESSION["GetAp_hid"];
	$mobilenumber1 = $_SESSION["user"];
	$mobileotp = $_SESSION["mb_otp"];

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptiveportalService.asmx/WiFiRegistration",
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
	  								'name':'',
	  								'emailID':'',
	  								'country':'',
	  								'password':'$mobileotp',
	  								'mac':'',
	  								'rId':'',
	  								'hId':'$GetAp_hid',
	  								'PId':'',
	  								'locationid':'',
	  								'isExistUser':false,
	  								'hotspotgroup':'',
	  								'SSIDconfig':''
	  							}
	  						}",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "content-type: application/json",
	    "postman-token: 3db0d183-c6f5-ba3d-27eb-ace71195eb6a"
	  ),
	));

	$response_WiFiRegistration = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
			// echo "<br>";
			// echo $response_WiFiRegistration . " <- WiFiRegistration";
			// echo "<br>";
			// echo $mobilenumber1 . " <- WiFimobilenumber1";
			// echo "<br>";
			// echo $mobileotp . " <- WiFimobileotp";
			// echo "<br>";
			// echo $GetAp_hid . " <- WiFiGetAp_hid";
			// echo "<br>";
			
	    $obj_WiFiRegistration = json_decode($response_WiFiRegistration);
			$response_WiFiRegistration = array();

			$response_WiFiRegistration["WiFiRegistration"] = $obj_WiFiRegistration->d->Response;	//Invalid Username or Password! , Active , Inactive
			$json_response1 = json_encode($response_WiFiRegistration); 														// Invalid Username or Password! , Active , Inactive

				if ($response_WiFiRegistration["WiFiRegistration"] == "Success" )
				{
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
													'mobileNo':'$mobilenumber1',
													'otp':'',
													'LocationId':'$GetAp_LocationID',
													'mac':'',
													'hotspotgroup':'',
													'chkexistuser':'',
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

				$response_chack_new_user = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);

				if ($err) {
					echo "cURL Error #:" . $err;	
				} 
				else 
				{
					// echo "<br>";
					// echo $response_chack_new_user . " <- response_chack_new_user";
					// echo "<br>";

					$obj_new_user = json_decode($response_chack_new_user);	// OTPVerification Success - Fial
					$response_chack_new_user = array();											// OTPVerification Success - Fial

					$response_data_new_user["response_chack_new_user"] = $obj_new_user->d->Response;	
					$json_response_otp = json_encode($response_data_new_user);
					
						if ($response_data_new_user["response_chack_new_user"] == "Active") 
						{
							echo '<BODY onLoad="myFunctionnn()">';
?>
							<script type="text/javascript">
								function myFunctionnn(){			
									document.sendin.submit();
									Swal.fire({type: 'success',title: 'Good job!',text: 'you are logged in',showConfirmButton: false,timer: 1300});
								}
							</script>
<?php
						}
				}

			}elseif ($response_WiFiRegistration["WiFiRegistration"] == "Free plan not Found. Please Contact to Administrator" ){
				echo "<script type='text/javascript'>";		
				echo "Swal.fire({type:'error',title: 'Oops...',html: '<b>Free plan not Found. Please Contact to Administrator</b>',footer: ''});";
				echo "</script>";
			}else{
				echo $response_WiFiRegistration;
			}

	}
}

?>