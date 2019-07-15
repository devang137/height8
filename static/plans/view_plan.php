<?php 
function view_plan_only(){
    ob_start();
?>
<?php 
	// $GetAp_LocationID = $_SESSION["GetAp_LocationID"];			//	4
  // $GetAp_hid = $_SESSION["GetAp_hid"];	
  $username = $_SESSION["user"];
  $GetAp_hid = "10105";

  // $a = "'$username'";
  
  $d='{
    "request":
    {
      "HotspotId":"'.$GetAp_hid.'",
      "SSIDconfig":""
    }
  }';

$curl = curl_init();  
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/GetPlanList",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $d,
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
    // echo $GetPlanList_response;
    echo "<br>";

    // Object start
    $obj_GetPlanList = json_decode($GetPlanList_response);
    $GetPlanList_response = array();

    $response_GetPlanList["GetPlanList_Response"] = $obj_GetPlanList->d->PaidPlanList ;	//	ResendOTPVerification Success - Fail
    $json_GetPlanList_Response = json_encode($response_GetPlanList["GetPlanList_Response"]); 
    // echo $json_GetPlanList_Response;
    // $response_GetPlanList["GetPlanList_Response"][0]->ID;
// ------------------------------------------------------------------------------------------------------------
?>
<div style="text-align:center;" onclick="goBack_planview()">
    <i class="fas fa-angle-left glyphicon-chevron-left history_back"></i>
</div>
<script>
function goBack_planview() {
  window.history.back();
}
</script>

<div class="row">
    <div class="viewplans_banar">
        <label class="viewplans_banar_label">Available Paid Packs</label>
    </div>
</div>
<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="clearfix">
<?php
      foreach ($response_GetPlanList["GetPlanList_Response"] as $value)
      {
?>    
        <div class="plan_container">
            <div class="bg-war">
                <div class="prize">  	
                    <div><?php $value->ID; ?></div>
                    <div><?php $value->NAME; ?></div>
                    <img src="<?php echo HEIGHT8_URL.'/height8/assets/images/rupee-indian_2.png' ?>" height="10" width="10">
                    <h2><?php echo $value->MRP ?></h2>
                </div> 
                <div class="plan">    
                    <h3>300 MB</h3>   
                    <h5><?php echo $value->VALIDITY ?></h5> 
                </div>
            </div>
        </div>
<?php 
      }
    }
?>
        </div>
    </div>
</div>
<?php
    $view_purchase = ob_get_clean();
	return $view_purchase;
}
add_shortcode('viewplans','view_plan_only');
?>