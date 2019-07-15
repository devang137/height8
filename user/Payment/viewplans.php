<form method="GET" id="showplans" class="animated bounceInRight" style="display:none;"> 
  <div style="text-align:center;">
      <!-- <i class="fas fa-angle-left glyphicon-chevron-left history_back" onclick="backbuttonshowplans()"></i> -->
      <img src="<?php echo HEIGHT8_URL.'/height8/assets/images/solid.svg' ?>" class="glyphicon-chevron-left" height="20" width="20" onclick="backbuttonshowplans()">
  </div>
  <div class="row">
    <div class="viewplans_banar">
        <label class="viewplans_banar_label animated tada">Available Paid Packs</label>
    </div>
  </div>
  <div class="row animated fadeInLeftBig">
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
      CURLOPT_URL => url."/GetPlanList",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{'request':{'HotspotId':'". $GetAp_ID ."','SSIDconfig':''}}",
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
      <div class="plan_container">
          <div class="bg-war">
              <div class="prize">  	
                  <div id="PLAN_NAME"><?php $value->ID; ?></div>
                  <div id="PLAN_MRP"><?php $value->NAME; ?></div>
                    <img src="<?php echo HEIGHT8_URL.'/height8/assets/images/rupee-indian_2.png' ?>" height="10" width="10">
                  <h2><?php echo $value->MRP ?></h2>
              </div> 
              <div class="plan">    
                  <h3>300 MB</h3>   
                  <h5><?php echo $value->VALIDITY ?></h5> 
              </div>
          </div>
      </div>
<?php } ?>
<!-- loop end -->
      </div>
    </div>
  </div>
</form>