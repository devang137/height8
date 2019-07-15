	
<form name="myForm" id="adminhomepage" method="POST" >
<!------------------------------------------------------------------------------------------------------------------------------------->
	<div class="row">
		<div class="col-sm-11 col-md-11 col-lg-11 col-xl-11">
			<label class="titlehome"> <code><b>API Mapping</b></code> </label>	
		</div>
		<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
			<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/default.png' ?>" class="img-fluid h8image" alt="Responsive image" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
		</div>
	</div>	

	<div class="collapse" id="collapseExample">
	<hr>
		<div class="row container-fluid mt-1 mb-1">
			<div class="col-sm-4 col-md-2 col-lg-2 col-xl-2 font-weight-bold">
				<label for="Self Care URL">Self Care URL</label>
				<input type="hidden" name="SelfCareURL_text" id="SelfCareURL_text" value="SelfCareURL">
			</div>
			<div class="col-sm-4 col-md-4 col-lg-3 col-xl-3">
				<input type="text" name="SelfCareURL" id="SelfCareURL" class="textboxx" placeholder="Self Care URL">
			</div>
			<div class="col-sm-1 col-md-4 col-lg-5 col-xl-5" id="SelfCareURL_print">
			</div>
			<div class="col-sm-3 col-md-2 col-lg-2 col-xl-2">
				<button type="button" id="submit_SelfCareURL" class="btn1 ml-4" name="submit_SelfCareURL">Add Setting</button>
			</div>
		</div>
	</div>
<hr>
<!------------------------------------------------------------------------------------------------------------------------------------->
<div class="container-fluid">
	<div class="row mt-1 mb-1">
		<div class="col-sm-4 col-md-2 col-lg-2 col-xl-2 font-weight-bold">
			<label for="SSL Enabled ">SSL Enabled</label>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-3 col-xl-3">
			<select class="dropssl" name="dropssl" id="dropssl" >
				<option value="null">Select</option>
				<option value="http://">Yes</option>
				<option value="">No</option>
			</select>
		</div>
		<div class="col-sm-4 col-md-6 col-lg-7 col-xl-7">
		</div>
	</div>
<!------------------------------------------------------------------------------------------------------------------------------------->
	<div class="row mt-1 mb-1">
		<div class="col-sm-4 col-md-2 col-lg-2 col-xl-2 font-weight-bold">
			<label for="Server URL">Server URL </label>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-3 col-xl-3">
			<input type="text" name="serverurl" id="myText" class="textboxx" placeholder="Enter Server URL" >
		</div>
		<div class="col-sm-4 col-md-6 col-lg-7 col-xl-7">
		</div>
	</div>
<!------------------------------------------------------------------------------------------------------------------------------------->
	<div class="row mt-1 mb-1">
		<div class="col-sm-4 col-md-2 col-lg-2 col-xl-2 font-weight-bold">
			<label for="API File">API File</label>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-3 col-xl-3">	
			<input type="text" name="apifile" id="myText2" class="textboxx" placeholder="Enter API">
		</div>
		<div class="col-sm-4 col-md-6 col-lg-7 col-xl-7"></div>
	</div>
<!------------------------------------------------------------------------------------------------------------------------------------->
	<div class="row mt-1 mb-1">
		<div class="col-sm-4 col-md-2 col-lg-2 col-xl-2 font-weight-bold">	
			<label for="API Token">API Token</label>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-3 col-xl-3">	
			<input type="text" name="apitoken" id="myText1" class="textboxx" placeholder="Enter Token">	
		</div>
		<div class="col-sm-4 col-md-6 col-lg-7 col-xl-7"></div>
	</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
	<div class="row mt-1 mb-1">
		<div class="col-sm-4 col-md-2 col-lg-2 col-xl-2 font-weight-bold">	
			<label for="Method">Method</label>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-3 col-xl-3">	
			<select class="drop_method" name="drop_method" id="drop_method" >
				<option value=""> Select </option>
				<option value="GET">GET</option>
				<option value="POST">POST</option>
			</select>
		</div>
		<div class="col-sm-1 col-md-4 col-lg-5 col-xl-5"></div>
		<div class="col-sm-3 col-md-2 col-lg-2 col-xl-2">
			<button type="button" id="Event_btn" class="btn1" name="save_url">Save Setting</button>
		</div>
	</div>
<!------------------------------------------------------------------------------------------------------------------------------------->
	<div id="daynamic_Event" style="display:none">
		<div class="row font-weight-bold mt-1">
			<div class="col-sm-3 col-md-2 col-lg-2 col-xl-2"> 	
				<code><label id="Event_tag"></label></code>
			</div>
			<div class="col-sm-9 col-md-8 col-lg-8 col-xl-8">
				<code><label id="Event_url_url" ></label></code>	
			</div>
			<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">	
				<button type="button" id="remove_url_btn" class="remove_btn_responce">Remove</button>
			</div>
		</div>
	</div>
<!-- ---------------------------------------------------------------------------------------------------------------------------------->
	<div class="row mt-1  font-weight-bold">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">	
			<label class="event text-info">Event Name</label>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">	
			<label class="apiname text-info">Mapping Function</label> 
		</div>
		<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7"></div>
	</div>
	<hr>
<!------------------------------------------------------------------------------------------------------------------------------------->
<div class="row mt-1">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<input type="text" name="Event_Name" placeholder="Event Name" id="Event_Name" class="textboxx texbox_eventname" />
		</div>
		<div class="col-sm-2 col-md-3 col-lg-3 col-xl-3">	
				<select class="drop_api" name="drop_api" id="drop_api">
					<option value=""> Select </option>
					<option value="CheckCustomerStatus">CheckCustomerStatus</option>
					<option value="CheckPreRegisteredUser">CheckPreRegisteredUser</option>
					<option value="CheckSpidioAdAvailability">CheckSpidioAdAvailability</option>
					<option value="CheckSpidioPlanOption">CheckSpidioPlanOption</option>
					<option value="CheckUserWithSameMobilenumber">CheckUserWithSameMobilenumber</option>
					<option value="DisconnectUser">DisconnectUser</option>
					<option value="DoFreeRenewal">DoFreeRenewal</option>
					<option value="Doaddonplan">Doaddonplan</option>
					<option value="ExistBulkUploadUserupdate">ExistBulkUploadUserupdate</option>
					<option value="ForgotPasswordOTPGeneration">ForgotPasswordOTPGeneration</option>
					<option value="ForgotPasswordOTPVerification">ForgotPasswordOTPVerification</option>
					<option value="FreePlanEligibility">FreePlanEligibility</option>
					<option value="GenerateOTPForOnlinePayRegistration">GenerateOTPForOnlinePayRegistration</option>
					<option value="GenerateOTPForVoucherRegistration">GenerateOTPForVoucherRegistration</option>
					<option value="GetAdsList">GetAdsList</option>
					<option value="GetApDetail">GetApDetail</option>
					<option value="GetCPConfiguration">GetCPConfiguration</option>
					<option value="GetConcurrentSession">GetConcurrentSession</option>
					<option value="GetConcurrentWithFRAMEIP">GetConcurrentWithFRAMEIP</option>
					<option value="GetCountryList">GetCountryList</option>
					<option value="GetCustomerDetail">GetCustomerDetail</option>
					<option value="GetNearByHotspot">GetNearByHotspot</option>
					<option value="GetPaidPlanDetailsOfRetailCustomer">GetPaidPlanDetailsOfRetailCustomer</option>
					<option value="GetPlanList">GetPlanList</option>
					<option value="GetUserByRequestId">GetUserByRequestId</option>
					<option value="HitsCount">HitsCount</option>
					<option value="OTPGeneration">OTPGeneration</option>
					<option value="OTPVerification">OTPVerification</option>
					<option value="PaymentAPI">PaymentAPI</option>
					<option value="RegistrationWithOnlinePay">RegistrationWithOnlinePay</option>
					<option value="RegistrationWithVoucher">RegistrationWithVoucher</option>
					<option value="RenewOnline">RenewOnline</option>
					<option value="RenewVoucher">RenewVoucher</option>
					<option value="ResendOTP">ResendOTP</option>
					<option value="ResendOTPVerification">ResendOTPVerification</option>
					<option value="SendSpidioAdScript">SendSpidioAdScript</option>
					<option value="SetTimer">SetTimer</option>
					<option value="SocialMediaUserValidate">SocialMediaUserValidate</option>
					<option value="ViewCurrentPlanDetail">ViewCurrentPlanDetail</option>
					<option value="WiFiRegistration">WiFiRegistration</option>
					<option value="WiFiRegistrationSpidio">WiFiRegistrationSpidio</option>
					<option value="WiFiRegistrationWithRetailHotspotGroup">WiFiRegistrationWithRetailHotspotGroup</option>
					<option value="WiFiRegistrationWithSocialMedia">WiFiRegistrationWithSocialMedia</option>
				</select>
			</div>
			<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<button type="button" id="verifyevent" class="btn_dinamic" name="verifyevent" onclick="response_file();">Verify</button>
			</div>	
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">					
				<p id="responce_print" class="font-weight-bold text-uppercase pt-1"></p>				
			 </div>
			 <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">	
			    <img src="<?php echo HEIGHT8_URL.'/height8/assets/images/info.png' ?>" class="img-fluid info" alt="Responsive image" data-toggle="modal" data-target=".bd-example-modal-lg">	
		<!--Information Popup-->
			 		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/popup/h8-simple-logo.png' ?>" class="img-fluid h8image" alt="Responsive image" >&nbsp &nbsp      										
						        <h5 class="modal-title" id="exampleModalLabel">Information</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						        	<span aria-hidden="true">&times;</span>
						        </button>
						     </div>
						     <div class="modal-body">	
						     	<div class="row">
						     		<div class="col-sm-12 col-md-12">
								     <b id="pop_url"></b>											    
							     	</div>
							    </div>
							    <div class="row">
							    	<div class="col-sm-12 col-md-12">
							    	</div>
							    </div>
						     </div>
							 <div class="modal-footer">
							 	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							 </div>
						</div>
						</div>
					</div>
			 </div>

			 <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">		 
			 	<div title="Reference page" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Whan you click here than your response will be refresh">
			 		<img alt="Responsive image" class="img-fluid ref" id="reloder" src="<?php echo HEIGHT8_URL."/height8/assets/images/refrece.png" ?>" style="cursor: pointer;" />
			 	</div>
			</div>
			<div class="col-sm-3 col-md-2 col-lg-2 col-xl-2">						
				<button type="button" name="add" id="add" class="add bl">Add More</button>	
				<div class="chkkk">
					<label class="switch">
						  <input type="checkbox" id="group1" class="tog_chack">
						  <span class="slider round"></span>
					</label>
				</div>				
			</div>
		</div>
	<!-- + Icon new Row -->
		<div class="row mt-1">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				<div id="dynamic_field" id="add_name">                             
					
				</div>
			</div>
		</div>
<!-- ---------------------------------------------------------------------------------------------------------------------------- -->
</form>
<hr>
<?php include_once HEIGHT8_DIR_PATH."/admin/tabs/action/savevant.php"; ?>	

<div class="row mt-1">
	<div class="col-md-12">						
		<input type="hidden" id="slash" value="/" class="slash" name="slash">
		<input type="hidden" id="url_plugin" value="<?php echo HEIGHT8_URL ?>" class="url_plugin" name="url_plugin">
		<input type="hidden" id="url_captive" value="<?php echo url ?>" class="url_captive" name="url_captive">
		<div id="datata"></div>
	</div>
</div>
<!------------------------------------------------------------------------------------------------------------------------------------->
</div>

<?php

// global $wpdb;
// $table_name_aap_config = $wpdb->prefix.'height8_aap_config';

// $DBP_results = $wpdb->get_results("SELECT * FROM $table_name_aap_config WHERE Name='SelfCareURL' ");

// foreach($DBP_results as $DBP_row){    
// 	$id = $DBP_row->id;                        
// 	$Name = $DBP_row->Name;
// 	$value = $DBP_row->Value;

// 	echo $id.$Name.$value;
// 	echo "<br>";
// }

?>