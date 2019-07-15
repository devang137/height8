<?php
function ApMac(){

	// $_REQUEST['interface-name'] = "ether5-Hotspot";
	$_REQUEST['interface-name'] = "99test";
	
	$interface_name = $_REQUEST['interface-name'];
	// echo $_REQUEST['interface-name'] . '<- interface_name';
	echo "<br>";
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
		    "content-type: application/json",
		    "postman-token: 4abd4eca-9371-d435-4e27-9d96dae548e7"
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
		}
}
?>