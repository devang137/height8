<?php
function statupage(){
	ob_start();
?>
<form name="logout" method="POST" class="animated bounceInRight" action ="<?php echo $_REQUEST['link-logout']; ?>">
	<input type="hidden" name="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
	<input type="hidden" name="popup" value="false" />

	<div class="row mb-2">
		<input type="hidden" name="mk_username" id="mk_username" value="" />
		<input type="hidden" name="mk_password" id="mk_password" value="<?php echo $_REQUEST['mk_password'] ?>" />
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

		<input type="hidden" name="url"id="url" value="<?php echo url; ?>">
		<input type="hidden" name="verifypage" id="verifypage" value="<?php echo HEIGHT8_URL_WORDPRESS; ?>">	<!-- http://localhost/wordpress    -->
		<input type="hidden" name="verifypagepl" id="verifypagepl" value="<?php echo HEIGHT8_URL; ?>">				<!-- http://localhost/wordpress/wp-content/plugins -->
	</div>
	
	<table class="table table-striped statstable" id="night_tabel" border="0">
		<tr id="marquee_hidden"	>
	    <th scope="row" colspan="2" >
	      <div class="alert alert-danger alert-dismissible" role="alert" id="baner_Color">
					<button type="button" id="sr-only" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
						<span aria-hidden="true">×</span>
						<span class="sr-only">Close</span>
					</button>
					<strong><i class="fa fa-warning"></i> Height8 Wifi</strong>
					<marquee class="marquee_label">WELCOME To <span id="label_username"></span></marquee>
				</div>
	    </th>
    </tr>
    <tr>
	      <td scope="row"><label for="Mobile Number">Mobile Number</label></td>
				<td>
					<span id="Current_mobileno"></span>					
			</td>
		</tr>    
		<tr>
	      <td scope="row"><label for="Mobile Number">OTP</label></td>
				<td>
						<span style="float: right"><i class="fas fa-eye-slash stats_fas" id="show_passwordd" data-toggle="tooltip" data-placement="top" title=""></i></span>
						<input type="password" name="password" id="passwordotp" placeholder="Password" class="form-control" disabled/>
			</td>
		</tr>
    <tr>
	      <td scope="row"><label for="Plan name">Plan name</label></td>
	      <td><span id="current_planname"></span></td>
    </tr>
    <tr>
	      <td scope="row"><label for="Activation Date" class="ActivationDate_label">ActivationDate / ExpiryDate</label></td>
	      <td><span id="current_Activationdate"></span> /	<span id="current_ExpiryDate"></span></td>
		</tr>
    <tr>
	      <td scope="row"><label for="Plan Speed">Plan Speed</label></td>
	      <td> <span id="current_palnspeed"></span>
		  </td>
    </tr>
    <tr>
	      <td scope="row"><label for="Used MB">Used MB</label></td>
	      <td><span id="current_usemb"></span></td>
    </tr>
    <tr>
	      <td scope="row"><label for="Remain MB">TotalMB /	Remain MB </label></td>
				<td><span id="current_TotalMB"></span>	/	<span id="current_remainmb"></span></td>
		</tr>
		<tr>
	      <td scope="row"><label for="Remain MB">Download MB /	Upload MB </label></td>
				<td><span id="current_Download"></span>	/	<span id="current_Upload"></span></td>
    </tr>
     <tr>
	      <td scope="row"><label for="Response">Response</label></td>
	      <td><span id="current_responce"></span></td>
    </tr>
    <tr>
	      <td colspan="2" class="text-center">
					<input type="submit" name="log_captive" id="log_captive" value="LOG OUT" class="btn">
	      </td>
		</tr>
		<tr class="">
				<th colspan="2">
						<!-- <input type="hidden" id="GetConcurrentSessionINPUT" name="CheckCustomerStatuss" value="" />	 -->
						<div id="GetConcurrentSession" value="" style="display:none"></div>
				</th>
		</tr>
</table>
</form>
<script>
	statuspage();
</script>
<?php		
		if (isset($_REQUEST["log_captive"]) ){
			$_REQUEST['link-orig'];
				echo "<script>";
				echo "sessionStorageclear()";
				echo "</script>";
			session_destroy();
		}

	$status_page = ob_get_clean();
	return $status_page;
}
add_shortcode('status', 'statupage');
?>