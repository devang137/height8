<?php
function vocher_form(){
    $GetAp_LocationID = $_SESSION["GetAp_LocationID"];			//	4
    $GetAp_hid = $_SESSION["GetAp_hid"];				         		//	1
    $mobileNumber = $_SESSION["user"];
    $button_name = $_SESSION["plan_button_id"];
    $status_customer =  $_SESSION["packs_checkstatus"];

?>
<script type="text/javascript">
    jQuery( "h1" ).remove();

    function goBack_planview() {
    window.history.back();
    }
</script>
<form method="GET">
    <div style="text-align:center;" onclick="goBack_planview()">
        <i class="fas fa-angle-left glyphicon-chevron-left history_back"></i>
    </div>
<div class="row">
    <div class="btn_margin col-md-12 col-sm-12 col-xs-12" role="group" style="text-align:center;" id="dvvoucherbtn">
        <button type="button" class="btn btn-primary vcr_btn"><img src="<?php echo HEIGHT8_URL.'/height8/assets/images/VOUCHER.png'?>"><b>  VOCHER</b></button>
    </div>  
</div>
  <div class="row mb-2">
    <div class="col-sm-1 col-md-1"></div>
    <div class="col-sm-1 col-md-1"></div>   
    <div class="col-sm-4 col-md-4">
      <input type="tel" class="voucher_pin" id="text_payment" name="text_payment" placeholder="Enter Voucher Pin" maxlength="10" required>
    </div>
    <div class="col-sm-3 col-md-3">
      <input type="submit" class="otp_send voc_btn" id="btn_verfiy_payment" name="btn_verfiy_payment" value="Login">
    </div>
    <div class="col-sm-1 col-md-1"></div>
    <div class="col-sm-1 col-md-1"></div>
    <div class="col-sm-1 col-md-1"></div>
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
</form>

<?php
}  // function close
add_shortcode('vocher','vocher_form');
?>