<?php
function vocher(){
?>
<form method="GET" id="vocher_purchase" class="animated bounceInRight" style="display:none">
<div class="voucher_form">
      <div style="text-align:center;" class="mb-6">
          <i class="fas fa-angle-left glyphicon-chevron-left history_back" onclick="backbuttonshowplans()"></i>
      </div>
    <div class="row mb-4">
        <div class="btn_margin col-md-12 col-sm-12 col-xs-12" role="group" style="text-align:center;" id="dvvoucherbtn">
            <button type="button" class="btn btn-primary vcr_btn"><img src="<?php echo HEIGHT8_URL.'/height8/assets/images/VOUCHER.png'?>"><b>  VOCHER</b></button>
        </div>  
    </div>
    <div class="row mb-3">
        <div class="col-sm-1 col-md-1 mb-2"></div>
        <div class="col-sm-1 col-md-1 mb-2"></div>   
        <div class="col-sm-4 col-md-4 mb-2">
            <input type="tel" class="voucher_pin voanimation" id="voucher_pin" name="voucher_pin" placeholder="Enter Voucher Pin" maxlength="10" required>
        </div>
        <div class="col-sm-3 col-md-3 mb-2">
          <input type="button" class="otp_send voc_btn" id="btn_verfiy_vocher" name="btn_verfiy_vocher" value="Login">
        </div>
        <div class="col-sm-1 col-md-1 mb-2"></div>
        <div class="col-sm-1 col-md-1 mb-2"></div>
        <div class="col-sm-1 col-md-1 mb-2"></div>
      </div>
  </div>
  <!-- OTP verification -->
  <div class="voucher_otp_form animated bounceInRight" style="display:none">
    <div style="text-align:center;" class="mb-6">
        <i class="fas fa-angle-left glyphicon-chevron-left history_back" onclick="voucher_otp_verify()"></i>
    </div>
    <div class="row">
        <div class="col-sm-2 col-md-2 mb-2"></div>   
        <div class="col-sm-4 col-md-4 mb-2">
            <input type="tel" class="voucher_otp" id="voucher_otp" name="voucher_otp" placeholder="Enter OTP" maxlength="10" required>
        </div>
        <div class="col-sm-3 col-md-3 mb-2">
            <input type="button" class="otp_send voc_btn" id="btn_verfiy_otp" name="btn_verfiy_otp" value="Login">
        </div>
        <div class="col-sm-3 col-md-3 mb-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-2 col-md-2"></div>
        <div class="col-sm-7 col-md-7">
            <label class="resendpin_voucher_label"><b>PIN has Been sent to<label>			
            <a href=""><p id="vocher_numberrr" class="vocher_numberrr"></p></a></b>
        </div>
        <div class="col-sm-3 col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-sm-2 col-md-2"></div>
        <div class="col-sm-7 col-md-7 resendpin_voucher_label">
            <label class=""><b>Didn't receive PIN ? <label>			
            <a href="" onclick=""> Resend PIN</a></b>
        </div>
        <div class="col-sm-3 col-md-3"></div>
    </div>
  </div>
        <div class="row mb-3">
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

<?php
}  // function close

add_shortcode('vocher_page','vocher');
?>