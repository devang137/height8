<?php
function status_page(){
	ob_start();

		$aa =$_SESSION["user"];
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/ViewCurrentPlanDetail",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{'request':{'mobileNo':'$aa','hotspotgroup':''}}",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "content-type: application/json"		    
		  ),
		));

		$ViewCurrentPlanDetail = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  // echo $ViewCurrentPlanDetail;
		  	$obj = json_decode($ViewCurrentPlanDetail);
			$ViewCurrentPlanDetail = array();

			$ViewCurrentPlanDetail["PlanName"] = $obj->d->PlanName;
			$ViewCurrentPlanDetail["ActivationDate"] = $obj->d->ActivationDate;
			$ViewCurrentPlanDetail["UsedMB"] = $obj->d->UsedMB;	
			$ViewCurrentPlanDetail["RemainMB"] = $obj->d->RemainMB;
			$ViewCurrentPlanDetail["UsedTimeMin"] = $obj->d->UsedTimeMin;	
			$ViewCurrentPlanDetail["SpeedLimite"] = $obj->d->SpeedLimite;
			$ViewCurrentPlanDetail["ResponseCode"] = $obj->d->ResponseCode;
			$ViewCurrentPlanDetail["Response"] = $obj->d->Response;

			$ViewCurrentPlanDetail1 = json_encode($ViewCurrentPlanDetail);
	
			// echo $ViewCurrentPlanDetail1;
			}
		?>
<form name="logout" method="POST" action="<?php echo $_REQUEST['link-logout']; ?>">
	<input type="hidden" name="dst" value="<?php echo $_REQUEST['link-orig'] ?>" />
	<input type="hidden" name="popup" value="false" />
<!-- </form>
<form > -->
	<table class="table table-striped" id="night_tabel" border="0">
	<tbody>
<!------------------------------------------------------------------------------------------------------------------------------->
	<tr id="marquee_hidden">
	      <th scope="row" colspan="2" >
	      	<div class="alert alert-danger alert-dismissible" role="alert" id="baner_Color">
				<button type="button" id="sr-only" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<strong><i class="fa fa-warning"></i> Height8 Wifi</strong> 
				<marquee style="font-family: Impact; font-size: 18pt">WELCOME To <?php echo $_SESSION["user"]; ?></marquee>
			</div>
	      </th>
    </tr>
<!------------------------------------------------------------------------------------------------------------------------------->
	<tr>
	      <th scope="row" colspan="2">
	      	<div class="row">
	      	<div class="col-sm-10 col-md-10">
				<div class="pos-f-t">
				  <div class="collapse" id="navbarToggleExternalContent">
				    <div class="p-4">
				    	<div class="row mb-3">
				    		<div class="col-sm-10 col-md-10">
				    			<h4 class="text-white">Option</h4>
				    		</div>
				    		<div class="col-sm-2 col-md-2" style="cursor: pointer;">
				    			<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/night/night_icon.png' ?>" id="night_mode_on" name="night_mode_on" class="img-fluid" alt="Responsive image" >
				    			<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/night/moon.png' ?>" id="night_mode_off" class="img-fluid" alt="Responsive image" >
				    		</div>
				    	</div>
				        <div class="row">
				      		<span class="text-muted pb-1 pl-1"><button type="button" class="btn btn-sm" id="plan">Plans</button></span>
				      		<span class="text-muted pb-1 pl-1"><button type="button" class="btn btn-sm" id="quick_recharge">Quick Recharge</button></span>
				        </div>
				    </div>
				  </div>	
				  <!-- <nav class="navbar navbar-dark"> -->
				</div>
			</div>

			<div class="col-sm-2 col-md-2 mt-1">
			    <button class="navbar navbar-dark navbar-toggler" id="menu_hide_data" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" >
			      <span class="navbar-toggler-icon"></span>
			    </button>
			  <!-- </nav> -->
			</div>			
			</div>	
	      </th>
    </tr>
<!------------------------------------------------------------------------------------------------------------------------------->			
	<tr id="plans_hide">
		<th scope="row" colspan="2">
<!------------------------------------------------------------------------------------------------------------------------------->
			<div class="row">
				<div class="col-md-4">
					<div id="accordion">
					  	<div class="card">
					  		<div class="btn btn-link card-header bg-danger text-white" data-toggle="collapse" data-target="#collapseplanone" aria-expanded="true" aria-controls="collapseplanone">
					   		  	BSNL WIFI 50          
					    	</div>
					    </div>
					</div>
				</div>	
				<div class="col-md-4">
					<div class="card">
				  		<div class="btn btn-link card-header bg-warning text-white" data-toggle="collapse" data-target="#collapseplantwo" aria-expanded="false" aria-controls="collapseplantwo">		    
					          	BSNL WIFI 90          
					    </div>
					 </div>
				</div>
				<div class="col-md-4">
					<div class="card">
				  		<div class="btn btn-link card-header bg-success text-white"data-toggle="collapse" data-target="#collapseplanThree" aria-expanded="false" aria-controls="collapseplanoneThree">		    
					          BSNL WIFI 500
					    </div>
					 </div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div id="collapseplanone" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
							<div class="row"><div class="col-md-12"><center><h1>RS 40</h1></center></div></div>
							<div class="row"><div class="col-md-12"><center>8 Day</center></div></div>
							<div class="row"><div class="col-md-12"><center>8 GB</center></div></div>
							<hr>
							<div class="row"><div class="col-md-12"><center><button class="btn bg-danger text-white">BUY NOW</button></center></div></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
					    <div id="collapseplantwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					    	<div class="card-body">
							    <div class="row"><div class="col-md-12"><center><h1>RS 90</h1></center></div></div>
								<div class="row"><div class="col-md-12"><center>14 DAY </center></div></div>
								<div class="row"><div class="col-md-12"><center>15 GB </center></div></div>
								<hr>
								<div class="row"><div class="col-md-12"><center><button class="btn bg-warning text-white">BUY NOW</button></center></div></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
				  	<div class="card">
					    <div id="collapseplanThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
					        <div class="card-body">
						        <div class="row"><div class="col-md-12"><center><h1>RS 500</h1></center></div></div>
								<div class="row"><div class="col-md-12"><center>28 DAY </center></div></div>
								<div class="row"><div class="col-md-12"><center>30 GB </center></div></div>
								<hr>
								<div class="row"><div class="col-md-12"><center><button class="btn bg-success text-white">BUY NOW</button></center></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!------------------------------------------------------------------------------------------------------------------------------->
		</th>	
	</tr>
<!------------------------------------------------------------------------------------------------------------------------------->
	<tr id="quick_hide">
		<th colspan="2">
		 	<div class="row">
				<div class="col-md-4">
					<div id="accordion1">
					  	<div class="card">
					  		<div class="btn btn-link card-header bg-danger text-white" data-toggle="collapse" data-target="#collapse_vou" aria-expanded="true" aria-controls="collapse_vou">
					   			PREPAID VOUCHER		   
					    	</div>
					    </div>
					</div>
				</div>	
				<div class="col-md-4">
					<div class="card">
				  		<div class="btn btn-link card-header bg-warning text-white" data-toggle="collapse" data-target="#collapse_renew" aria-expanded="false" aria-controls="collapse_renew">		    
					          RENEW ONLINE	          
					    </div>
					 </div>
				</div>
				<div class="col-md-4">
					<div class="card">
				  		<div class="btn btn-link card-header bg-success text-white"data-toggle="collapse" data-target="#collapse_free" aria-expanded="false" aria-controls="collapse_free">		    
					          Free plan     
					    </div>
					 </div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div id="collapse_vou" class="collapse" aria-labelledby="headingOne" data-parent="#accordion1">
							<div class="card-body">
								<div class='row'><div class='col-md-12'><b><code class="text-danger"><label>PREPAID VOUCHE</label></code></b></div></div>
								<div class='row'><div class='col-md-12'><input type='text' id='VOUCHE_mb' placeholder='VOUCHE CODE' class="border-danger"></div></div><br>
								<div class='row'><div class='col-md-12'><button type='button' id='voucher_btn' class="btn bg-danger text-white">Submit voucher</button></div></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
					    <div id="collapse_renew" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
					    	<div class="card-body">
							    <div class='row'><div class='col-md-12'><b><code class="text-warning"><label>RENEW ONLINE</label></code></b></div></div>
								<div class='row'><div class='col-md-12'><input type='text' id='renew_mb' placeholder='Mobile Number' class="border-warning"></div></div><br>
								<div class='row'><div class='col-md-12'><button type='button' id="renew_btn" class="btn bg-warning text-white">RENEW</button></div></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
				  	<div class="card">
					    <div id="collapse_free" class="collapse" aria-labelledby="headingThree" data-parent="#accordion1">
					        <div class="card-body">
						        <div class='row'><div class='col-md-12'><b><code class="text-success"><label>Free Plans</label></code></b></div></div>
								<div class='row'><div class='col-md-12'><input type='text' id='free_mb' placeholder='Mobile Number' class="border-success"></div></div><br>
								<div class='row'><div class='col-md-12'><button type='button' id="free_btn" class="btn bg-success text-white" >Free plan</button></div></div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</th>
	</tr>
<!------------------------------------------------------------------------------------------------------------------------------->
    <tr>
	      <th scope="row"><label for="Mobile Number">Mobile Number</label></th>
	      <td><spam id="refrece_mb"><?php echo $_SESSION["user"]; ?></spam>
	      	<input type="hidden" name="user_session_num" id="user_session_num" value="<?php echo $_SESSION["user"]; ?>">
	      </td>
    </tr>
    <tr>
	      <th scope="row"><label for="Plan name">Plan name</label></th>
	      <td><spam id="refrece_plan_name"><?php echo  $ViewCurrentPlanDetail["PlanName"] ?></spam></td>
    </tr>
    <tr>
	      <th scope="row"><label for="Activation Date">Activation Date</label></th>
	      <td><spam id="refrece_activition_date"><?php echo  $ViewCurrentPlanDetail["ActivationDate"] ?></spam> </td>
    </tr>
    <tr>
	      <th scope="row"><label for="Plan Speed">Plan Speed</label></th>
	      <td> <spam id="refrece_paln_speed">
		    <?php
		    	switch ($ViewCurrentPlanDetail["SpeedLimite"]) {
				    case "":
				    	echo "";
				        break;
				    case $ViewCurrentPlanDetail["SpeedLimite"] != "":
				        if (1024 <= $ViewCurrentPlanDetail["SpeedLimite"]) {
									$mb = $ViewCurrentPlanDetail["SpeedLimite"] / 1024;
									echo $mb . ' Mbps';
								}
								else{
									$kb = $ViewCurrentPlanDetail["SpeedLimite"];
									echo $kb . ' kb';
								}
				        break;
				    default:
				        echo "error";
				}
		  	?>
		  	</spam>
		  </td>
    </tr>
    <tr>
	      <th scope="row"><b><label for="Used MB">Used MB</label></b></th>
	      <td><spam id="refrece_used_mb"><?php echo $ViewCurrentPlanDetail["UsedMB"] ?></spam></td>
    </tr>
    <tr>
	      <th scope="row"><b><label for="Remain MB">Remain MB</label></b></th>
	      <td><spam id="refrece_remain_mb"><?php echo  $ViewCurrentPlanDetail["RemainMB"] ?></spam></td>
    </tr>
    <tr>
	      <th scope="row"><b><label for="Used Time(Min)">Used Time(Min)</label></b></th>
	      <td><spam id="used_time"><?php echo  $ViewCurrentPlanDetail["UsedTimeMin"] ?></spam></td>
    </tr>
     <tr>
	      <th scope="row"><b><label for="ResponseCode">ResponseCode</label></b></th>
	      <td><spam id="refrece_code"><?php echo  $ViewCurrentPlanDetail["ResponseCode"] ?></spam>
	      </td>
    </tr>
     <tr>
	      <th scope="row"><b><label for="Response">Response</label></b></th>
	      <td><spam id="refrece_responce"><?php echo  $ViewCurrentPlanDetail["Response"] ?></spam></td>
    </tr>
    <tr>
	      <th colspan="2" class="text-center"><input type="submit" name="log_captive" id="log_captive" value="LOG OUT" class="btn">
	      	<input type="hidden" name="interface-name" id="interface-name" value="<?php echo $_REQUEST['interface-name'] ?>" />
	      </th>
	</tr>
	<tr class="d-none">
	      <th colspan="2">
	     
		</th>
	</tr>
	<tr >
	      <th colspan="2"><p id="ses"></p></th>
	</tr>
	</tbody>
</table>
	<script type="text/javascript">
		jQuery(document).ready(function(){								    		
	    	var auto_refresh = setInterval(function(){
	    		// jQuery('#refrece_mb').load(' #refrece_mb').fadeIn("slow");
	    		// jQuery('#refrece_plan_name').load(' #refrece_plan_name').fadeIn("slow");
	    		// jQuery('#refrece_activition_date').load(' #refrece_activition_date').fadeIn("slow");
	    		// jQuery('#refrece_paln_speed').load(' #refrece_paln_speed').fadeIn("slow");
	    		jQuery('#refrece_used_mb').load(' #refrece_used_mb').fadeIn("slow");
	    		// jQuery('#refrece_remain_mb').load(' #refrece_remain_mb').fadeIn("slow");
	    		// jQuery('#used_time').load(' #used_time').fadeIn("slow");
	    		// jQuery('#refrece_responce').load(' #refrece_responce').fadeIn("slow");

    			var user_ses = jQuery("#user_session_num").val().toString()
    				const online_sesstion ="{'request':{'mobileNo':"+ user_ses +",'hotspotgroup':''}}";

    				jQuery.ajax({
    						type: "POST",
        					url: "http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx/GetConcurrentSession",
        					data: online_sesstion,
        					contentType: "application/json; charset=utf-8",
        					dataType: "json",

        					success: function(data) {			        		
        						// var start_sesstion_final = JSON.stringify(data);
        						var start_sesstion_final = JSON.stringify(data, null, '\t');
			                   	document.getElementById("ses").innerHTML = start_sesstion_final;
        					},
        					error:function(data){
        					}
    				})
    		}, 1000);
		});

		// setInterval(function (){	
		// 	jQuery('#refre').load(' #refre').fadeIn("slow");
		// }, 1000);

	</script>
</form>

<?php
		// if (isset($_REQUEST["log_captive"])  && !empty( session_id() ) )
		if (isset($_REQUEST["log_captive"]) )
		{
			$_REQUEST['link-orig'];
			unset($_SESSION["user"]);
			session_destroy();
				// echo "<script language='javascript'>";
				// echo "window.location.href = 'http://192.168.1.17/wordpress/'";
				// echo "</script>";
		}

	$status_page = ob_get_clean();
	return $status_page;
}
add_shortcode('status_page', 'status_page');
?>