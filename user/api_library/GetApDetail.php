<?php
function getApMac(){
	// $_REQUEST['interface-name'] = "99test";
	// $_REQUEST['interface-name'] = "ether5-Hotspot";
	
	$interface_name = $_REQUEST['interface-name'];
	// echo $_REQUEST['interface-name'] . '<- interface_name';
	// echo "<br>";
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/GetApDetail",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{
			  						'request':
		  							{
		  								'ApMac':'$interface_name',
		  								'SSID':''
		  							}
								}",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response_GetApDetail = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  	echo "cURL Error #:" . $err;
		} else {
		  	// echo  $response_GetApDetail;
			  $_SESSION["apmac"] = $response_GetApDetail;

			  	$Getapdetail_decode = json_decode($response_GetApDetail);
				$response_GetApDetail = array();

				$response_GetApDetail["packs_ID"] = $Getapdetail_decode->d->ID;	//Invalid Username or Password! , Active , Inactive
				$response_GetApDetail["packs_LocationID"] = $Getapdetail_decode->d->LocationID;
				$response_GetApDetail["packs_hid"] = $Getapdetail_decode->d->hid;
				$response_GetApDetail["packs_Response"] = $Getapdetail_decode->d->Response;
				$response_GetApDetail["packs_ResponseCode"] = $Getapdetail_decode->d->ResponseCode;

				$json_response_GetApDetail = json_encode($response_GetApDetail); 		// Invalid Username or Password! , Active , Inactive

				$_SESSION["packs_ID"] = $response_GetApDetail["packs_ID"];				// session active or inactive
				$_SESSION["packs_LocationID"] = $response_GetApDetail["packs_LocationID"];
				$_SESSION["packs_hid"] = $response_GetApDetail["packs_hid"];
				$_SESSION["packs_Response"] = $response_GetApDetail["packs_Response"];

		}
}
?>