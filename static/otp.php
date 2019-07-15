	<?php
function form_creation()
{	
?>
<!------------------------------------------------------------------------------------------------------------------------>
<!-- Router Hidden Filde -->
<form name="sendin" action="<?php echo $_REQUEST['link-login-only'] ?>" method="POST">
		<input type="hidden" name="mac" id="mk_mac" value="<?php echo $_REQUEST['mac'] ?>" />
		<input type="hidden" name="ip" id="mk_ip" value="<?php echo $_REQUEST['ip'] ?>" />
		<input type="hidden" name="username" id="mk_username" value="<?php echo $_SESSION["user"] ?>" />
		<input type="hidden" name="link-login" id="mk_link-login" value="<?php echo $_REQUEST['link-login'] ?>" />
		<input type="hidden" name="link-orig" id="mk_link-orig" value="<?php echo $_REQUEST['link-orig'] ?>" />
		<input type="hidden" name="mk_error" id="mk_error" value="<?php echo $_REQUEST['mk_error'] ?>" />
		<input type="hidden" name="chap-id" id="mk_chapid" value="<?php echo $_REQUEST['chap-id'] ?>" />
		<input type="hidden" name="chap-challenge" id="mk_chapchallenge" value="<?php echo $_REQUEST['chap-challenge'] ?>" />
		<input type="hidden" name="link-login-only" id="link-login-only" value="<?php echo $_REQUEST['link-login-only'] ?>" />
		<input type="hidden" name="link-orig-esc" id="link-orig-esc" value="<?php echo $_REQUEST['link-orig-esc'] ?>" />
		<input type="hidden" name="interface-name" id="interface-name" value="<?php echo $_REQUEST['interface-name'] ?>" />

		<input type="hidden" name="password" id="mk_password" value="<?php echo $_REQUEST["verify_otp"] ?>" />
		<input type="hidden" name="mac-esc" id="mac-esc" value="<?php echo $_REQUEST['mac-esc'] ?>" />		

		<input type="hidden" name="dst" id="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
		<input type="hidden" name="popup" id="popup" value="false" />
		<input type="hidden" runat="server" id="hdnVals" name="vals" value="" />
</form>
<!------------------------------------------------------------------------------------------------------------------------>
<!-- PHONE NUMBER ENTER FORM -->
<form id="formform" name="formform" method='GET'>	
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 mb-3">
			<label> Mobile : </label>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4 mb-3">
			<select class="country" id="loginCountry" name="loginCountry">
					<option selected value="">Please Select country</option><option value="91">India</option><option value="1">Canada</option><option value="86">China</option><option value="33">France</option><option value="49">Germany</option><option value="81">Japan</option><option value="92">Pakistan</option><option value="44">United Kingdom</option><option value="1">United States</option><option value="7840">Abkhazia</option><option value="7940">Abkhazia</option><option value="93">Afghanistan</option><option value="355">Albania</option><option value="213">Algeria</option><option value="1684">American Samoa</option><option value="376">Andorra</option><option value="244">Angola</option><option value="1264">Anguilla</option><option value="1268">Antigua and Barbuda</option><option value="54">Argentina</option><option value="374">Armenia</option><option value="297">Aruba</option><option value="247">Ascension</option><option value="61">Australia</option><option value="672">Australian External Territories</option><option value="43">Austria</option><option value="994">Azerbaijan</option><option value="1242">Bahamas</option><option value="973">Bahrain</option><option value="880">Bangladesh</option><option value="1246">Barbados</option><option value="1268">Barbuda</option><option value="375">Belarus</option><option value="32">Belgium</option><option value="501">Belize </option><option value="229">Benin </option><option value="1441">Bermuda</option><option value="975">Bhutan</option><option value="591">Bolivia</option><option value="387">Bosnia and Herzegovina </option><option value="267">Botswana</option><option value="55">Brazil</option><option value="246">British Indian Ocean Territory</option><option value="1284">British Virgin Islands</option><option value="673">Brunei</option><option value="359">Bulgaria</option><option value="226">Burkina Faso </option><option value="257">Burundi </option><option value="855">Cambodia </option><option value="237">Cameroon </option><option value="1">Canada </option><option value="238">Cape Verde</option><option value="345">Cayman Islands</option><option value="236">Central African Republic</option><option value="235">Chad</option><option value="56">Chile</option><option value="86">China </option><option value="61">Christmas Island</option><option value="61">Cocos-Keeling Islands </option><option value="57">Colombia</option><option value="269">Comoros </option><option value="242">Congo </option><option value="243">Congo, Dem. Rep. of </option><option value="682">Cook Islands</option><option value="506">Costa Rica</option><option value="225">Ivory Coast </option><option value="385">Croatia </option><option value="53">Cuba </option><option value="599">Curacao </option><option value="537">Cyprus </option><option value="420">Czech Republic</option><option value="45">Denmark </option><option value="246">Diego Garcia </option><option value="253">Djibouti</option><option value="1767">Dominica </option><option value="1809">Dominican Republic </option><option value="1829">Dominican Republic</option><option value="1849">Dominican Republic</option><option value="670">East Timor</option><option value="56">Easter Island</option><option value="593">Ecuador</option><option value="20">Egypt</option><option value="503">El Salvador</option><option value="240">Equatorial Guinea </option><option value="291">Eritrea</option><option value="372">Estonia</option><option value="251">Ethiopia </option><option value="500">Falkland Islands</option><option value="298">Faroe Islands </option><option value="679">Fiji </option><option value="358">Finland</option><option value="351">Portugal</option><option value="596">French Antilles</option><option value="594">French Guiana</option><option value="689">French Polynesia</option><option value="241">Gabon </option><option value="220">Gambia </option><option value="995">Georgia </option><option value="233">Ghana </option><option value="350">Gibraltar</option><option value="30">Greece </option><option value="299">Greenland </option><option value="1473">Grenada </option><option value="590">Guadeloupe</option><option value="1671">Guam</option><option value="502">Guatemala</option><option value="224">Guinea</option><option value="245">Guinea-Bissau</option><option value="595">Guyana </option><option value="509">Haiti </option><option value="504">Honduras </option><option value="852">Hong Kong SAR China </option><option value="36">Hungary </option><option value="354">Iceland </option><option value="91">India </option><option value="62">Indonesia</option><option value="98">Iran </option><option value="964">Iraq </option><option value="353">Ireland </option><option value="972">Israel </option><option value="39">Italy </option><option value="1876">Jamaica </option><option value="81">Japan </option><option value="962">Jordan</option><option value="77">Kazakhstan</option><option value="76">Kazakhstan</option><option value="254">Kenya </option><option value="686">Kiribati </option><option value="850">North Korea </option><option value="82">South Korea </option><option value="965">Kuwait </option><option value="996">Kyrgyzstan</option><option value="856">Laos </option><option value="371">Latvia </option><option value="961">Lebanon </option><option value="266">Lesotho </option><option value="231">Liberia </option><option value="218">Libya</option><option value="423">Liechtenstein</option><option value="370">Lithuania </option><option value="352">Luxembourg</option><option value="853">Macau SAR China</option><option value="389">Macedonia </option><option value="261">Madagascar </option><option value="265">Malawi </option><option value="60">Malaysia </option><option value="960">Maldives</option><option value="223">Mali </option><option value="356">Malta </option><option value="692">Marshall Islands </option><option value="596">Martinique </option><option value="222">Mauritania </option><option value="230">Mauritius </option><option value="262">Mayotte </option><option value="52">Mexico </option><option value="691">Micronesia </option><option value="1808">Midway Island </option><option value="373">Moldova</option><option value="377">Monaco </option><option value="976">Mongolia</option><option value="382">Montenegro </option><option value="1664">Montserrat </option><option value="212">Morocco </option><option value="95">Myanmar </option><option value="264">Namibia </option><option value="674">Nauru </option><option value="977">Nepal </option><option value="31">Netherlands</option><option value="599">Netherlands Antilles </option><option value="1869">Nevis </option><option value="687">New Caledonia </option><option value="64">New Zealand </option><option value="505">Nicaragua </option><option value="227">Niger </option><option value="234">Nigeria </option><option value="683">Niue </option><option value="672">Norfolk Island </option><option value="1670">Northern Mariana Islands </option><option value="47">Norway </option><option value="968">Oman </option><option value="92">Pakistan </option><option value="680">Palau </option><option value="970">Palestinian Territory </option><option value="507">Panama </option><option value="675">Papua New Guinea </option><option value="595">Paraguay </option><option value="51">Peru </option><option value="63">Philippines </option><option value="48">Poland </option><option value="1939">Puerto Rico </option><option value="974">Qatar </option><option value="262">Reunion </option><option value="40">Romania </option><option value="7">Russia </option><option value="250">Rwanda </option><option value="685">Samoa </option><option value="378">San Marino </option><option value="966">Saudi Arabia </option><option value="221">Senegal </option><option value="381">Serbia </option><option value="248">Seychelles </option><option value="232">Sierra Leone </option><option value="65">Singapore </option><option value="421">Slovakia </option><option value="386">Slovenia </option><option value="677">Solomon Islands </option><option value="27">South Africa </option><option value="500">South Georgia &amp;amp; Sandwich Islands </option><option value="34">Spain </option><option value="94">Sri Lanka </option><option value="249">Sudan </option><option value="597">Suriname </option><option value="268">Swaziland </option><option value="46">Sweden </option><option value="41">Switzerland </option><option value="963">Syria </option><option value="886">Taiwan </option><option value="992">Tajikistan </option><option value="255">Tanzania </option><option value="66">Thailand </option><option value="670">Timor Leste </option><option value="228">Togo </option><option value="690">Tokelau </option><option value="676">Tonga </option><option value="1868">Trinidad and Tobago </option><option value="216">Tunisia </option><option value="90">Turkey </option><option value="993">Turkmenistan </option><option value="1649">Turks and Caicos Islands </option><option value="688">Tuvalu </option><option value="256">Uganda </option><option value="380">Ukraine </option><option value="971">United Arab Emirates </option><option value="44">United Kingdom </option><option value="1">United States </option><option value="598">Uruguay </option><option value="1340">U.S. Virgin Islands </option><option value="998">Uzbekistan </option><option value="678">Vanuatu </option><option value="58">Venezuela </option><option value="84">Vietnam </option><option value="1808">Wake Island </option><option value="681">Wallis and Futuna </option><option value="967">Yemen </option><option value="260">Zambia </option><option value="255">Zanzibar </option><option value="263">Zimbabwe </option>
			</select>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4 mb-3">
			<input type='tel' name='username' id='username' class="form-control" maxlength="12" placeholder="Mobile Number">	
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4 mb-3">
			<input type='submit' name='otp_send' id='otp_send' value='Login' class="otp_send form-control btn-primary">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-1 col-md-1 col-lg-1 col-xs-1 mb-1">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-3 mb-3">
				<button type="submit" name="paid_btn" id="paid_btn" class="btn-cs paid_btn">
				<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/output-onlinepngtools.png'?>" height="25" width="25"><b>PLANS</b></button>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-3 mb-3">
			<button type="submit" name="paid_pack_btn" id="paid_pack_btn" class="btn-cs paid_pack_btn">
				<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/PAID_PACK.png' ?>" height="20" width="20"><b>PAID PACK</b>	
			</button>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-3 mb-3">
			<button type="button" name="paid_voucher" id="paid_voucher" class="btn-cs paid_voucher">
				<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/VOUCHER.png'?>" height="43" width="30"> <b>VOCHER</b>
			</button>
		</div>	
		<div class="col-sm-2 col-md-2 col-lg-2 col-xs-2 mb-3">
		</div>
	</div>
	<div class="row">
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
</form>	
<!------------------------------------------------------------------------------------------------------------------------>
<?php
// ------------------------------------------------------------------------------------------------------------------------
//	GetApDetail.php 
// ------------------------------------------------------------------------------------------------------------------------
			include_once HEIGHT8_DIR_PATH."/static/api_library/GetApDetail.php";
			ApMac();

			$apmac = $_SESSION["apmac"];

			$obj_apmac = json_decode($apmac);
			$apmac = array();

			$apmac["ID"] = $obj_apmac->d->ID;
			$apmac["LocationID"] = $obj_apmac->d->LocationID;
			$apmac["Hotspotgroup"] = $obj_apmac->d->Hotspotgroup;
			$apmac["OrgId"] = $obj_apmac->d->OrgId;
			$apmac["hid"] = $obj_apmac->d->hid;
			$apmac["CpDesignID"] = $obj_apmac->d->CpDesignID;
			$apmac["Plan_Details"] = $obj_apmac->d->Plan_Details;
			$apmac["locID"] = $obj_apmac->d->locID;
			$apmac["Level1Id"] = $obj_apmac->d->Level1Id;
			$apmac["Level2Id"] = $obj_apmac->d->Level2Id;
			$apmac["Level3Id"] = $obj_apmac->d->Level3Id;
			$apmac["Locationlevel"] = $obj_apmac->d->Locationlevel;
			$apmac["ServiceAreaID"] = $obj_apmac->d->ServiceAreaID;
			$apmac["Partnerid"] = $obj_apmac->d->Partnerid;
			$apmac["Resellerid"] = $obj_apmac->d->Resellerid;
			$apmac["APLocationidentifier"] = $obj_apmac->d->APLocationidentifier;
			$apmac["EightSSID"] = $obj_apmac->d->EightSSID;
			$apmac["BackhaulSSID"] = $obj_apmac->d->BackhaulSSID;
			$apmac["RedirectionURl"] = $obj_apmac->d->RedirectionURl;	
			$apmac["SSIDconfig"] = $obj_apmac->d->SSIDconfig;	
			$apmac["ResponseCode"] = $obj_apmac->d->ResponseCode;	
			$apmac["Response"] = $obj_apmac->d->Response;

			$json_response2 = json_encode($apmac);
			// echo "<br>";
			// echo $json_response2;
			// echo "<br>";

				$_SESSION["GetAp_LocationID"] = $apmac["LocationID"];		//	4
				$_SESSION["GetAp_hid"] = $apmac["hid"];									//	1

				$GetAp_LocationID = $_SESSION["GetAp_LocationID"];			//	4
				$GetAp_hid = $_SESSION["GetAp_hid"];										//	1
// ------------------------------------------------------------------------------------------------------------------------
// Button CLick "viewplans"
// ------------------------------------------------------------------------------------------------------------------------
			if (isset($_REQUEST['paid_btn'])){
					$Plans = HEIGHT8_URL_WORDPRESS."/viewplans";
					echo "<script>";
					echo "window.location='$Plans';";
					echo "</script>";
			}
// ------------------------------------------------------------------------------------------------------------------------
// Button CLick "Available Paid Packs"
// ------------------------------------------------------------------------------------------------------------------------
if (isset($_REQUEST['paid_pack_btn']))
{
		if($username_plans != ($_REQUEST['username']))
		{
				$_SESSION["user"] = $_REQUEST['username'];			
				$mobileNumber = $_REQUEST['username'];
			
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

				$response_paid_packs_checkstatus = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);

				if ($err) {
					echo "cURL Error #:" . $err;	
				} 
				else 	// CheckCustomerStatus 
				{
					$response_paid_packs_checkstatus;

					$obj_paid_packs_checkstatus = json_decode($response_paid_packs_checkstatus);
					$response_paid_packs_checkstatus = array();

					$response_packs_checkstatus["packs_checkstatus"] = $obj_paid_packs_checkstatus->d->Response;	//Invalid Username or Password! , Active , Inactive
					$json_response_packs_checkstatus = json_encode($response_packs_checkstatus); 							// Invalid Username or Password! , Active , Inactive
					$_SESSION["packs_checkstatus"] = $response_packs_checkstatus["packs_checkstatus"];				// session active or inactive

								if ($response_packs_checkstatus["packs_checkstatus"] == "Invalid Username or Password!" ){				
									$paid_pack = HEIGHT8_URL_WORDPRESS."/plans";
									echo "<script>";	
									echo "window.location='$paid_pack';";
									echo "</script>";
								}elseif ($response_packs_checkstatus["packs_checkstatus"] == "Inactive"){
									$paid_pack = HEIGHT8_URL_WORDPRESS."/plans";
									echo "<script>";	
									echo "window.location='$paid_pack';";
									echo "</script>";
								}elseif ($response_packs_checkstatus["packs_checkstatus"] == "Active"){
									echo "<script type='text/javascript'>";		
									echo "Swal.fire({type: 'warning',title: 'You are Active	 User...',html: '<b> Your Plan has been already activated <br><br><mark><code> & Enjoy Plans </code></mark></b>',footer: ''});";
									echo "</script>";
								}
								else{
									echo "<script type='text/javascript'>";		
									echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops... something is missing</b>',footer: ''});";
									echo "</script>";
								}
				}
		}
		else{			// 	Button CLick "Available Paid Packs"
				echo "<script type='text/javascript'>";		
				echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Enter Mobile Number</b>',footer: ''});";
				echo "document.getElementById('username').style.borderColor = '#b73e41';";
				echo "document.getElementById('username').style.borderWidth = '2px';";
				echo "</script>";
		}
}
// ------------------------------------------------------------------------------------------------------------------------
// Simple Login Button
// ------------------------------------------------------------------------------------------------------------------------
if (isset($_REQUEST['otp_send']))
{
			$_SESSION["user"] = $_REQUEST['username'];			
			$mobileNumber = $_REQUEST['username'];
		
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

			$response_Check = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;	
			} 
			else 
			{
			//------------------------------------------------------------------------------------------------------------------------
			// echo "<div clas='row'>";
			// echo $response_Check . "<- CheckCustomerStatus";
			// echo "<br>";
			// echo $mobileNumber . "<- mobileNumberl";
			// echo "<br>";
			// echo $GetAp_LocationID . "<- GetAp_LocationID";
			// echo "<br>";
			// echo $GetAp_hid . "<- GetAp_hid";
			// echo "</div>";

				$obj_Check = json_decode($response_Check);
				$response_Check = array();

				$response_data1["CustomerStatus"] = $obj_Check->d->Response;	//Invalid Username or Password! , Active , Inactive
				$json_response1 = json_encode($response_data1); 							// Invalid Username or Password! , Active , Inactive
			// ------------------------------------------------------------------------------------------------------------------------
				if ($response_data1["CustomerStatus"] == "Invalid Username or Password!" ){				
					include_once HEIGHT8_DIR_PATH."/static/invalid.php";
					Invalid_Username();
				}elseif ($response_data1["CustomerStatus"] == "Inactive"){
					include_once HEIGHT8_DIR_PATH."/static/Inactive.php";
					Inactive();
				}else{	
			//------------------------------------------------------------------------------------------------------------------------
						  if ($response_data1["CustomerStatus"] == "Active"){
						  					$curl = curl_init();
												curl_setopt_array($curl, array(
											  CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/ResendOTP",
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
											                                'hId':'',
											                                'LocationId':'$GetAp_LocationID',
											                            		'hotspotgroup':''											                                
											                            }
											                          }",
											  CURLOPT_HTTPHEADER => array(
											    "cache-control: no-cache",
											    "content-type: application/json",
											    "postman-token: a8fc2abc-9e6b-d59d-7cff-f7a62deb54ec"
											  ),
											));

											$response_ResendOTP = curl_exec($curl);
											$err = curl_error($curl);

											curl_close($curl);

											if ($err) {
											  echo "cURL Error #:" . $err;	
											} 
											else 
											{
							// ------------------------------------------------------------------------------------------------------------------------
							// echo "<div>";
							// echo $response_ResendOTP;	
							// echo "</div>";
												$obj1 = json_decode($response_ResendOTP);
												$response_ResendOTP = array();

												$response_data2["Send"] = $obj1->d->Response;			//	ResendOTP Success - FAIL
												$json_response2 = json_encode($response_data2);		//	ResendOTP Success - FAIL
							// ------------------------------------------------------------------------------------------------------------------------
												if ($response_data2["Send"] == "Success"){	
?>
													<script type="text/javascript">
															const Toast = Swal.mixin({toast: true,showConfirmButton: false,timer: 1400});
															Toast.fire({type: 'success',title: 'OTP Send successfully'});	
													</script>
													<form id="verif_verify" method="POST">
														<div class="row">
															<div class="col-sm-12 col-md-12">
																<b><label for="Enter OTP :"> Enter OTP : </label></b>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-5 col-md-5 mb-3">
																<input type="tel" name="verify_otp" id="verify_otp" placeholder="Enter PIN" maxlength="10" required>
															</div>
															<div class="col-sm-5 col-md-5 mb-2">
																<input type="submit" name="otp_verify" id="otp_verify" value="Verify OTP" class="btn">
															</div>
															<div class="col-sm-2 col-md-2 mb-2"></div>
														</div>
														<div class="row">
															<div class="col-sm-12 col-md-12 mb-2">
																<label><b>PIN has Been sent to <a href="#"><?php echo $mobileNumber ?></a></b></label>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-12 col-md-12 mb-2">
																<label><b> Didn't receive PIN ? </b></label>
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
									// ------------------------------------------------------------------------------------------------------------------------
													if (isset($_REQUEST['otp_verify'])){	
															$_SESSION["mb_otp"] = $_REQUEST['verify_otp'];		//	Session for OTP
															$mobileotp = $_REQUEST['verify_otp'];															

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
																															'mobileNo':'$mobilenumber1',
																															'otp':'$mobileotp',
																															'hId':''						
																														}
																											}",
															  CURLOPT_HTTPHEADER => array(
															    "cache-control: no-cache",
															    "content-type: application/json"
															  	),
															));
															$response_verfy = curl_exec($curl);
															$err = curl_error($curl);
															curl_close($curl);

															if ($err){
															  echo "cURL Error #:" . $err;	
															}else{		
																	// echo "<div>";
																	// echo $response_verfy;															//	Aakho responce
																	// echo "</div>";
																	$obj = json_decode($response_verfy);
																	$response_verfy = array();

																	$response_data2["Response1"] = $obj->d->Response;	//	ResendOTPVerification Success - Fail
																	$json_response3 = json_encode($response_data2);		//	ResendOTPVerification Success - Fail
							// ------------------------------------------------------------------------------------------------------------------------
																	if ($response_data2["Response1"] == "Success"){																		
																		echo '<BODY onLoad="myFunctionnn()">';
																	}else{	
																		echo "<script type='text/javascript'>";		
																		echo "Swal.fire({type: 'error',title: 'Oops...',html: '<b>Oops...".$response_data2["Response1"]."</b>',footer: ''});";	// Pin not match
																		echo "</script>";
																	}
															}
														}					//	ResendOTPVerification
?>
														<script type="text/javascript">
																function myFunctionnn() {			
																	document.sendin.submit();
																	Swal.fire({type: 'success',title: 'Good job!',text: 'you are logged in',showConfirmButton: false,timer: 1300})
																}
														</script>
<?php
												}else{														
													echo "<script type='text/javascript'>";		
													echo "Swal.fire({type: 'warning',title: 'Oops...',html: '<b>Oops...".	$response_data2["Send"]."</b>',footer: ''});";
													echo "document.getElementById('username').style.borderColor = '#b73e41';";
													echo "document.getElementById('username').style.borderWidth = '2px';";
													echo "</script>";
												}
											}				
					  }else{
								echo "<script type='text/javascript'>";		
								echo "Swal.fire({type: 'error',title: 'Oops...',html: '<b>Oops...".$response_data1["CustomerStatus"]."</b>',footer: ''});";	// CustomerStatus
								echo "</script>";
					  }

				}	//	ResendOTP
			}
		}	//	CheckCustomerStatus
		// return $content;
}
add_shortcode('otp','form_creation');

?>