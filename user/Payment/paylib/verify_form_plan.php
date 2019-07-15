<?php
function verify_planform(){
  // $GetAp_ID = $_SESSION["packs_ID"];
  // $GetAp_hid = $_SESSION["packs_hid"];
  // $GetAp_LocationID = $_SESSION["packs_LocationID"];
  // $GetAp_Response = $_SESSION["packs_Response"];
  $mobileNumber = $_SESSION["username"];
  // $CheckCustomerStatus = $_SESSION["CheckCustomerStatus"];
  // $button_name = $_SESSION["GetAp_hid"];
  ?>
  <script>
    jQuery('div[id="mobile_number"]').css('display', 'none');
    jQuery('div[id="verify_number"]').css('display', 'none');
    jQuery('form[id="showplans"]').css('display', 'none');
    jQuery('form[id="showpurchaseplans"]').css('display', 'none');
    jQuery("h1").remove();
  </script>  
<form method="GET" id="paymentverifyform">  
  <div style="text-align:center;">
      <i class="fas fa-angle-left glyphicon-chevron-left history_back" onclick="backbutton()"></i>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 mb-2">
      <input type="hidden" id="username_pay" name="username_pay" value="" />
      <input type="hidden" id="CheckCustomerStatus_pay" name="CheckCustomerStatus_pay" value="" />  
      <input type="hidden" id="loginCountryname" name="loginCountryname" value="" />      
    </div>
  </div>
  <div class="row">
    <div class="col-sm-1 col-md-1 mb-2"></div>
    <div class="col-sm-11 col-md-11">
      <b><label for="Enter OTP :"> Enter PIN * </label></b>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-sm-1 col-md-1 mb-1"></div>
    <div class="col-sm-4 col-md-4 mb-1">
      <input type="tel" class="form-control" id="text_payment" name="text_payment" placeholder="Enter PIN" maxlength="10" required>
    </div>
    <div class="col-sm-1 col-md-1 mb-1"></div>
    <div class="col-sm-3 col-md-3 mb-1">
      <input type="button" class="otp_send form-control btn-primary" id="btn_verfiy_payment" name="btn_verfiy_payment" style="display: block;" value="Login">
    </div>
    <div class="col-sm-3 col-md-3 mb-1"></div>
  </div>
  <div class="row mb-2">
    <div class="col-sm-1 col-md-1 mb-1"></div>
    <div class="col-sm-11 col-md-11 mb-1">
      <label><b>PIN has Been sent to <a href="#"><?php echo $mobileNumber ?></a></b></label>
      <input type="hidden" name="username" id="username" value="<?php echo $mobileNumber ?>" />
    </div>
  </div>
  <div class="row mb-2">
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
  <div class="row mb-1">
    <div class="col-sm-1 col-md-1"></div>
    <div class="col-sm-11 col-md-11">
        <label><b> Didn't receive PIN ? </b></label>
        <button type="button" class="btn btn-link" name="btn_Resend" id="btn_Resend">Resend PIN</button>
    </div>
  </div>		
</form>
<?php
}   // function close
add_shortcode('planform','verify_planform');
?>