<?php
function login_otp()
{	
	ob_start();
?>
<!-- Router Hidden Filde -->
<form name="sendin" action="<?php echo $_REQUEST['link-login-only'] ?>" method="POST">
	<input type="hidden" name="mac" id="mk_mac" value="<?php echo $_REQUEST['mac'] ?>" />
	<input type="hidden" name="ip" id="mk_ip" value="<?php echo $_REQUEST['ip'] ?>" />
	<input type="hidden" name="mk_username" id="mk_username" value="" />
	<input type="hidden" name="mk_password" id="mk_password" value="" />
	<input type="hidden" name="link-login" id="mk_link-login" value="<?php echo $_REQUEST['link-login'] ?>" />
	<input type="hidden" name="link-orig" id="mk_link-orig" value="<?php echo $_REQUEST['link-orig'] ?>" />
	<input type="hidden" name="mk_error" id="mk_error" value="<?php echo $_REQUEST['mk_error'] ?>" />
	<input type="hidden" name="chap-id" id="mk_chapid" value="<?php echo $_REQUEST['chap-id'] ?>" />
	<input type="hidden" name="chap-challenge" id="mk_chapchallenge" value="<?php echo $_REQUEST['chap-challenge'] ?>" />
	<input type="hidden" name="link-login-only" id="link-login-only" value="<?php echo $_REQUEST['link-login-only'] ?>" />
	<input type="hidden" name="link-orig-esc" id="link-orig-esc" value="<?php echo $_REQUEST['link-orig-esc'] ?>" />
	<input type="hidden" name="interface-name" id="interface-name" value="<?php echo $_REQUEST['interface-name'] ?>" />

	<input type="hidden" name="mac-esc" id="mac-esc" value="<?php echo $_REQUEST['mac-esc'] ?>" />		

	<input type="hidden" name="dst" id="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
	<input type="hidden" name="popup" id="popup" value="false" />
	<input type="hidden" runat="server" id="hdnVals" name="vals" value="" />
</form>
<!-- PHONE NUMBER ENTER FORM -->
<form id="formform" name="formform" method='GET' class="animated bounceInDown">
	<div id="mobile_number">
		<div class="row animated swing">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 mb-3">
				<!-- <label class="user-tag"> Mobile : </label> -->	
				<label class="user-tag"> <?php echo get_theme_mod('Home_label_Name'); ?> </label>
			</div>
			<div class="search col-sm-4 col-md-4 col-lg-4 col-xs-4 mb-3">
				<select class="country animation" id="loginCountry" name="loginCountry">
					<option selected value="" class="country_select">Please Select country</option>
					<option value="91" class="india">India</option>
					<option value="1" class="Canada">Canada</option><option value="86" class="China">China</option><option value="33">France</option><option value="49">Germany</option><option value="81">Japan</option><option value="92">Pakistan</option><option value="44">United Kingdom</option><option value="1">United States</option><option value="7840">Abkhazia</option><option value="7940">Abkhazia</option><option value="93">Afghanistan</option><option value="355">Albania</option><option value="213">Algeria</option><option value="1684">American Samoa</option><option value="376">Andorra</option><option value="244">Angola</option><option value="1264">Anguilla</option><option value="1268">Antigua and Barbuda</option><option value="54">Argentina</option><option value="374">Armenia</option><option value="297">Aruba</option><option value="247">Ascension</option><option value="61">Australia</option><option value="672">Australian External Territories</option><option value="43">Austria</option><option value="994">Azerbaijan</option><option value="1242">Bahamas</option><option value="973">Bahrain</option><option value="880">Bangladesh</option><option value="1246">Barbados</option><option value="1268">Barbuda</option><option value="375">Belarus</option><option value="32">Belgium</option><option value="501">Belize </option><option value="229">Benin </option><option value="1441">Bermuda</option><option value="975">Bhutan</option><option value="591">Bolivia</option><option value="387">Bosnia and Herzegovina </option><option value="267">Botswana</option><option value="55">Brazil</option><option value="246">British Indian Ocean Territory</option><option value="1284">British Virgin Islands</option><option value="673">Brunei</option><option value="359">Bulgaria</option><option value="226">Burkina Faso </option><option value="257">Burundi </option><option value="855">Cambodia </option><option value="237">Cameroon </option><option value="1">Canada </option><option value="238">Cape Verde</option><option value="345">Cayman Islands</option><option value="236">Central African Republic</option><option value="235">Chad</option><option value="56">Chile</option><option value="86">China </option><option value="61">Christmas Island</option><option value="61">Cocos-Keeling Islands </option><option value="57">Colombia</option><option value="269">Comoros </option><option value="242">Congo </option><option value="243">Congo, Dem. Rep. of </option><option value="682">Cook Islands</option><option value="506">Costa Rica</option><option value="225">Ivory Coast </option><option value="385">Croatia </option><option value="53">Cuba </option><option value="599">Curacao </option><option value="537">Cyprus </option><option value="420">Czech Republic</option><option value="45">Denmark </option><option value="246">Diego Garcia </option><option value="253">Djibouti</option><option value="1767">Dominica </option><option value="1809">Dominican Republic </option><option value="1829">Dominican Republic</option><option value="1849">Dominican Republic</option><option value="670">East Timor</option><option value="56">Easter Island</option><option value="593">Ecuador</option><option value="20">Egypt</option><option value="503">El Salvador</option><option value="240">Equatorial Guinea </option><option value="291">Eritrea</option><option value="372">Estonia</option><option value="251">Ethiopia </option><option value="500">Falkland Islands</option><option value="298">Faroe Islands </option><option value="679">Fiji </option><option value="358">Finland</option><option value="351">Portugal</option><option value="596">French Antilles</option><option value="594">French Guiana</option><option value="689">French Polynesia</option><option value="241">Gabon </option><option value="220">Gambia </option><option value="995">Georgia </option><option value="233">Ghana </option><option value="350">Gibraltar</option><option value="30">Greece </option><option value="299">Greenland </option><option value="1473">Grenada </option><option value="590">Guadeloupe</option><option value="1671">Guam</option><option value="502">Guatemala</option><option value="224">Guinea</option><option value="245">Guinea-Bissau</option><option value="595">Guyana </option><option value="509">Haiti </option><option value="504">Honduras </option><option value="852">Hong Kong SAR China </option><option value="36">Hungary </option><option value="354">Iceland </option><option value="91">India </option><option value="62">Indonesia</option><option value="98">Iran </option><option value="964">Iraq </option><option value="353">Ireland </option><option value="972">Israel </option><option value="39">Italy </option><option value="1876">Jamaica </option><option value="81">Japan </option><option value="962">Jordan</option><option value="77">Kazakhstan</option><option value="76">Kazakhstan</option><option value="254">Kenya </option><option value="686">Kiribati </option><option value="850">North Korea </option><option value="82">South Korea </option><option value="965">Kuwait </option><option value="996">Kyrgyzstan</option><option value="856">Laos </option><option value="371">Latvia </option><option value="961">Lebanon </option><option value="266">Lesotho </option><option value="231">Liberia </option><option value="218">Libya</option><option value="423">Liechtenstein</option><option value="370">Lithuania </option><option value="352">Luxembourg</option><option value="853">Macau SAR China</option><option value="389">Macedonia </option><option value="261">Madagascar </option><option value="265">Malawi </option><option value="60">Malaysia </option><option value="960">Maldives</option><option value="223">Mali </option><option value="356">Malta </option><option value="692">Marshall Islands </option><option value="596">Martinique </option><option value="222">Mauritania </option><option value="230">Mauritius </option><option value="262">Mayotte </option><option value="52">Mexico </option><option value="691">Micronesia </option><option value="1808">Midway Island </option><option value="373">Moldova</option><option value="377">Monaco </option><option value="976">Mongolia</option><option value="382">Montenegro </option><option value="1664">Montserrat </option><option value="212">Morocco </option><option value="95">Myanmar </option><option value="264">Namibia </option><option value="674">Nauru </option><option value="977">Nepal </option><option value="31">Netherlands</option><option value="599">Netherlands Antilles </option><option value="1869">Nevis </option><option value="687">New Caledonia </option><option value="64">New Zealand </option><option value="505">Nicaragua </option><option value="227">Niger </option><option value="234">Nigeria </option><option value="683">Niue </option><option value="672">Norfolk Island </option><option value="1670">Northern Mariana Islands </option><option value="47">Norway </option><option value="968">Oman </option><option value="92">Pakistan </option><option value="680">Palau </option><option value="970">Palestinian Territory </option><option value="507">Panama </option><option value="675">Papua New Guinea </option><option value="595">Paraguay </option><option value="51">Peru </option><option value="63">Philippines </option><option value="48">Poland </option><option value="1939">Puerto Rico </option><option value="974">Qatar </option><option value="262">Reunion </option><option value="40">Romania </option><option value="7">Russia </option><option value="250">Rwanda </option><option value="685">Samoa </option><option value="378">San Marino </option><option value="966">Saudi Arabia </option><option value="221">Senegal </option><option value="381">Serbia </option><option value="248">Seychelles </option><option value="232">Sierra Leone </option><option value="65">Singapore </option><option value="421">Slovakia </option><option value="386">Slovenia </option><option value="677">Solomon Islands </option><option value="27">South Africa </option><option value="500">South Georgia &amp;amp; Sandwich Islands </option><option value="34">Spain </option><option value="94">Sri Lanka </option><option value="249">Sudan </option><option value="597">Suriname </option><option value="268">Swaziland </option><option value="46">Sweden </option><option value="41">Switzerland </option><option value="963">Syria </option><option value="886">Taiwan </option><option value="992">Tajikistan </option><option value="255">Tanzania </option><option value="66">Thailand </option><option value="670">Timor Leste </option><option value="228">Togo </option><option value="690">Tokelau </option><option value="676">Tonga </option><option value="1868">Trinidad and Tobago </option><option value="216">Tunisia </option><option value="90">Turkey </option><option value="993">Turkmenistan </option><option value="1649">Turks and Caicos Islands </option><option value="688">Tuvalu </option><option value="256">Uganda </option><option value="380">Ukraine </option><option value="971">United Arab Emirates </option><option value="44">United Kingdom </option><option value="1">United States </option><option value="598">Uruguay </option><option value="1340">U.S. Virgin Islands </option><option value="998">Uzbekistan </option><option value="678">Vanuatu </option><option value="58">Venezuela </option><option value="84">Vietnam </option><option value="1808">Wake Island </option><option value="681">Wallis and Futuna </option><option value="967">Yemen </option><option value="260">Zambia </option><option value="255">Zanzibar </option><option value="263">Zimbabwe </option>
				</select>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4 mb-3">
				<input type='tel' name='username' id='username' class="form-input-username" maxlength="12" placeholder="<?php echo get_theme_mod('Home_textbox_placeholder') ?>">	
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4 mb-3">
				<input type='button' name='otp_send' id='otp_send' value='<?php echo get_theme_mod('Home_login_button') ?>' class="otp_send form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1 col-md-1 col-lg-1 col-xs-1 mb-1">
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3 col-xs-3 mb-3">
				<button type="button" name="paid_btn" id="paid_btn" class="btn-cs paid_btn">
					<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/output-onlinepngtools.png'?>" height="25" width="25"><b class="button_plans">
					<?php echo get_theme_mod('Home_button1') ?></b>
					<!-- <b>PLANS</b> -->
				</button>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3 col-xs-3 mb-3">
				<button type="button" name="paid_pack_btn" id="paid_pack_btn" class="btn-cs paid_pack_btn">
					<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/PAID_PACK.png' ?>" height="20" width="20"><b class="button_paid_pack">
					<?php echo get_theme_mod('Home_button2') ?></b>	 
						<!-- <b>PAID PACK</b>	 -->
				</button>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3 col-xs-3 mb-3">
				<button type="button" name="paid_voucher" id="paid_voucher" class="btn-cs paid_voucher">
					<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/VOUCHER.png'?>" height="43" width="30"><b class="button_VOCHER"> 
					<?php echo get_theme_mod('Home_button3') ?></b>	 
						<!-- <b>VOCHER</b> -->
				</button>
			</div>	
			<div class="col-sm-2 col-md-2 col-lg-2 col-xs-2 mb-3">
				<?php echo do_shortcode('[gtranslate]'); ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 mb-3">
			<img src="<?php echo get_theme_mod('image_upload') ?>">
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
			<input type="hidden" name="url"id="url" value="<?php echo url; ?>">
			<input type="hidden" name="verifypage" id="verifypage" value="<?php echo HEIGHT8_URL_WORDPRESS; ?>">	<!-- http://localhost/wordpress    -->
			<input type="hidden" name="verifypagepl" id="verifypagepl" value="<?php echo HEIGHT8_URL; ?>">		<!-- http://localhost/wordpress/wp-content/plugins -->

			<input type="hidden" name="dst" id="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
			<input type="hidden" name="popup" id="popup" value="false" />
			<input type="hidden" runat="server" id="hdnVals" name="vals" value="" />
		</div>
	</div>
	<div class="row" style="display:none;">
		<div style="display:none;"></div>
		<div id="data-display" value="" style="display:none;"></div>
		<div id="OTPGeneration" value="" style="display:none;"></div>
		<div id="OTPVerification" value="" style="display:none;"></div>
		<div id="ResendOTPVerification" value="" style="display:none;"></div>
		<div id="CheckCustomerStatus" value="" style="display:none;"></div>
		<div id="WiFiRegistration" value="" style="display:none;"></div>
		<div id="GetCustomerDetail" value="" style="display:none;"></div>
		<div id="GetPlanList" value="" style="display:none;"></div>
		<div id="RegistrationWithOnlinePay" value="" style="display:none;"></div>
		<div id="RenewOnline" value="" style="display:none;"></div>
		<div id="PaymentAPI" value="" style="display:none;"></div>
		<div id="ResendOTP" value="" style="display:none;"></div>

		<div id="OTPGeneration_function" value="" style="display:none;"></div>
		<div id="ResendOTP_function" value="" style="display:none;"></div>
		<div id="Verification_function" value="" style="display:none;"></div>
		<div id="WiFiRegistration_function" value="" style="display:none;"></div>
		<div id="ResendOTPVerification_function" value="" style="display:none;"></div>
		<div id="dologintry" value="" style="display:none;"></div>
		<div id="test" value=""></div>
	</div>

	<!-- verification form -->
	<div id="verify_number" style="display:none;" class="animated bounceInRight">	
		<div style="text-align:center;">
			<!-- <i class="fas fa-angle-left glyphicon-chevron-left history_back" onclick="backbuttonshowplans()"></i> -->
			<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/solid.svg' ?>" class="glyphicon-chevron-left" height="20" width="20" onclick="backbuttonshowplans()">
		</div>
		<div class="row">
			<div class="col-sm-2 col-md-2 mb-2"></div>
			<div class="col-sm-10 col-md-10">
				<b><label for="Enter OTP :" class="" >Enter OTP :</label></b>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2 col-md-2 mb-2"></div>
			<div class="col-sm-4 col-md-4 mb-3">
				<input type="tel" name="password" id="password" placeholder="Enter PIN" maxlength="10" class="form-control"uired>
			</div>
			<div class="col-sm-3 col-md-3 mb-2">
				<input type="button" name="submit_password" id="submit_password" class="otp_send form-control btn-primary" value="Verify OTP">
			</div>
			<div class="col-sm-3 col-md-3 mb-2"></div>
		</div>
		<div class="row">
			<div class="col-sm-2 col-md-2 mb-1"></div>
			<div class="col-sm-10 col-md-10 mb-1">
				<label class=""><b>PIN has Been sent to </b><label>
				<a href="#"><p id="customer_number" value=""></p></a>				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2 col-md-2 mb-1"></div>
			<div class="col-sm-10 col-md-10 mb-1">
				<label><b class="didnt_receive_pin"> Didn't receive PIN ? </b></label>
				<input type="hidden" name="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
				<button type="button" class="btn btn-link" name="Resend" id="Resend">Resend PIN</button>
			</div>
		</div>
	</div>
	<?php 
	// echo do_shortcode('[gtranslate]'); 
	?>
</form>		
<!-- <select id="languagee" class="languagee" >
		<option value="" class="Select_language">Select</option>
		<option value="en">English</option>
		<option value="gu">Gujrati</option>
		<option value="hi">हिंदी</option>
	</select> -->
	
	<!-- close verification form -->
	<!-- <script>
		jQuery(document).ready(function () {
			var pat = jQuery("#verifypagepl").val();
						jQuery.MultiLanguage(pat +'/height8/assets/js/language/language.json');

			jQuery("#languagee").on("change", function() {
				debugger;
				var lan = jQuery("#languagee option:selected").val();
				var pat = jQuery("#verifypagepl").val();
						jQuery.MultiLanguage(pat +'/height8/assets/js/language/language.json', lan);
			});
		});
  </script>  -->
<?php
	include_once HEIGHT8_DIR_PATH."/user/Payment/viewplans.php";
	include_once HEIGHT8_DIR_PATH."/user/Payment/purchase_plan.php";		
	vocher();

	$login = ob_get_clean();
	return $login;
}
add_shortcode('login','login_otp');
?>