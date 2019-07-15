<?php
function initial_form(){
    ob_start();
?>
	<input type="hidden" name="user" id="username" value="" />
	<input type="hidden" name="pass" id="password" value="" />
		
	<form name="sendin" id="sendin" action="<?php echo $_REQUEST['link-login-only'] ?>" method="POST">
		<input type="hidden" name="username" id="mk_username" value="" />
		<input type="hidden" name="password" id="mk_password" value="" />
		<input type="hidden" name="mac" id="mk_mac" value="<?php echo $_REQUEST['mac'] ?>" />
		<input type="hidden" name="ip" id="mk_ip" value="<?php echo $_REQUEST['ip'] ?>" />
		<input type="hidden" name="link-login" id="mk_link-login" value="<?php echo $_REQUEST['link-login'] ?>" />
		<input type="hidden" name="link-orig" id="mk_link-orig" value="<?php echo $_REQUEST['link-orig'] ?>" />
		<input type="hidden" name="mk_error" id="mk_error" value="<?php echo $_REQUEST['mk_error'] ?>" />
		<input type="hidden" name="chap-id" id="mk_chapid" value="<?php echo $_REQUEST['chap-id'] ?>" />
		<input type="hidden" name="chap-challenge" id="mk_chapchallenge" value="<?php echo $_REQUEST['chap-challenge'] ?>" />
		<input type="hidden" name="link-login-only" id="link-login-only" value="<?php echo $_REQUEST['link-login-only'] ?>" />
		<input type="hidden" name="link-orig-esc" id="link-orig-esc" value="<?php echo $_REQUEST['link-orig-esc'] ?>" />
		<input type="hidden" name="interface-name" id="interface-name" value="<?php echo $_REQUEST['interface-name'] ?>" />
		<input type="hidden" name="hndPortalURL" id="hndPortalURL" value="">

		<input type="hidden" name="mac-esc" id="mac-esc" value="<?php echo $_REQUEST['mac-esc'] ?>" />		

		<input type="hidden" name="dst" id="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
		<input type="hidden" name="popup" id="popup" value="false" />
		<input type="hidden" runat="server" id="hdnVals" name="vals" value="" />

		<input type="hidden" id="url_captive" value="http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx" class="url_captive" name="url_captive">
	</form>

	<form name="logout" method="POST" action="<?php echo $_REQUEST['link-logout']; ?>">
		<input type="hidden" name="dst" id="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
		<input type="hidden" name="popup" id="popup" value="false" />	
	</form>	
<?php

    $initial = ob_get_clean();
    return $initial;
}
add_shortcode('initial', 'initial_form');


