<form class="" id="flow_data_submite">
	<div class="row font-weight-bold container-fluid">
		<h5><code><label for="Button Flow">Event Flow</label></code></h5>
	</div>
	<div class="row font-weight-bold text-capitalize text-justify text-info container-fluid">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<label for="Flow Name">Flow Name</label>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<label for="Status">Status</label>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<label for="Control Event">Control Event</label>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<label for="Control ID">Control ID</label>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<label for="Event Name">Event Name</label>	
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<input type="hidden" id="interface-name" name="interface-name" value="ether5-Hotspot" >
		</div>
	</div>	
	<div class="row container-fluid">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<input type="text" class="flowconfiguration_flowname" placeholder="Enter FlowName" id="Flow_Name" name="Flow_Name">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<select class="design" id="flowStatus" name="flowStatus">
				<option value="">Select</option>
				<option value="Active">Active</option>
				<option value="InActive">Inactive</option>
			</select>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<select class="design" id="Control_Event" name="Control_Event">
				<option value="">Select</option>
				<option value=".click">.click</option>
				<option value=".change">.change</option>
				<option value=".blur">.blur</option>
			</select>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<input type="text" class="flowconfiguration_flowname" id="Control_ID" name="Control_ID" placeholder="Enter Id">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<select class="design" id="Flow_captive_url" name="Flow_captive_url">
					<option value="">Select</option>
				<?php
				global $wpdb;
				$table_event_admin = $wpdb->prefix.'height8';
					$DBP_results = $wpdb->get_results("SELECT * FROM $table_event_admin");
						foreach($DBP_results as $DBP_row){	
							$id = $DBP_row->id;			
							$api_name = $DBP_row->api_name;
							$Method_Name = $DBP_row->Method_Name;
							$api_name = $DBP_row->Api_name;
							$Event_url = $DBP_row->Event_url;
							$mapping_url = $DBP_row->mapping_url;
			?>	
					<option value="<?php echo $Event_url.$api_name ?>" id="<?php echo $api_name ?>"><?php echo $api_name ?></option>
			<?php
				}		
			?>
			</select>
		</div>
		<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
			<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/Parameter.png' ?>" class="img-fluid Parametericon" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
		
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Parameter</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="row">
									<table class="table table-bordered" id="param"></table>
								</div>					
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- ------------------------------------------------------------------ -->
			<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/eventadd.png' ?>" class="img-fluid Parametericon ml-1 pl-1" data-toggle="modal" data-target=".popup_code">

			<div class="modal fade popup_code" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Response Handling</h5>
						</div>
						<div class="modal-body font-weight-bold">
							<table class="table">
								<tr>
									<td><label>ResponseCode</label></td>
									<td><input type="text" id="Return_Code_Authenticate" name="Return_Code_Authenticate" value="0"></td>
									<td>
										<select class="design" id="margefunction">
											<option value="">Select</option>
											<option value="Authenticate()">Authenticate</option>
											<?php
												global $wpdb;
												$table_event_admin = $wpdb->prefix.'height8_flow';
													$DBP_results = $wpdb->get_results("SELECT * FROM $table_event_admin");
														foreach($DBP_results as $DBP_row){			
															$api_name = $DBP_row->Api_name;
											
														if(empty($api_name) || $api_name==""){
															continue;
														}else{
															?><option value="<?php echo $api_name ?>.'()'"><?php echo $api_name ?></option><?php
														}												
												}
											?>
										</select>
									</td>
									<td></td>
									<td></td>
								</tr>
							</table>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
			<input type="button" value="Submit" class="add submite_flow_code" id="submite_flow_code">
		</div>
	</div>
	<hr>
<!-- -------------------------------------------------------------------------------------- -->
	<div class="row font-weight-bold mt-3">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<h5><code><label for="Button Flow">Button Flow</label></code></h5>
		</div>
	</div>
	<div class="row font-weight-bold text-capitalize text-justify text-info container-fluid">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<label for="Flow Name">Flow Name</label>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<label for="Status">Status</label>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<label for="Control Event">Control Event</label>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<label for="Control ID">Control ID</label>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<!-- <label for="Event Name">Event Name</label>	 -->
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
	</div>	
	<div class="row container-fluid">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<input type="text" class="flowconfiguration_flowname" placeholder="Enter FlowName" id="button_flowname" name="button_flowname">
			<!-- <img src="<?php echo HEIGHT8_URL.'/height8/assets/images/default.png' ?>" class="img-fluid h8image" alt="Responsive image" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> -->
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<select class="design" id="buttonflowStatus" name="buttonflowStatus">
				<option value="">Select</option>
				<option value="Active">Active</option>
				<option value="InActive">Inactive</option>
			</select>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<select class="design" id="button_Control_Event" name="button_Control_Event">
				<option value="">Select</option>
				<option value=".click">.click</option>
				<option value=".change">.change</option>
				<option value=".blur">.blur</option>
			</select>
		</div>	
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<input type="text" class="flowconfiguration_flowname" id="button_Control_ID" name="button_Control_ID" placeholder="Enter Button Id">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
		</div>
		<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
			<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/Parameter.png' ?>" class="img-fluid Parametericon" data-toggle="modal" data-target="#exampleModalbutton" data-whatever="@getbootstrap">
		
			<div class="modal fade" id="exampleModalbutton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Manage Event</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="row font-weight-bold text-capitalize text-justify text-info mb-2">
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<label for="Submite Form">Submite Form</label>
									</div>	
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<!-- <label for="Hide Show">Hide Show</label> -->
									</div>	
								</div>
								<div class="row mb-2">
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<select class="design" id="submit_form_name" name="submit_form_name">
											<option value="">Select</option>
											<option value="Redirect">Redirect URL</option>
											<option value="HidenandShow">Hide & Show</option>
											<option value="logout">Log out</option>
										</select>
									</div>	
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
									</div>	
								</div>
								<hr>
							<div id="redirect" style="display:none">
								<div class="row mb-2 font-weight-bold">
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<label for="Redirect">Redirect</label>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<input type="text" id="Redirect_url" name="Redirect_url" class="design">
									</div>
								</div>
							</div>
							<div id="hidedata" style="display:none">
								<div class="row mb-2 font-weight-bold">
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<label for="Hide Control id">Hide Control id</label>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<input type="text" id="hide_ui_id" name="hide_ui_id" class="design">
									</div>
								</div>
								<div class="row mb-2 font-weight-bold">
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<label for="Show Control id">Show Control id</label>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<input type="text" id="show_ui_id" name="show_ui_id" class="design">
									</div>
								</div>
							</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
			<input type="button" value="Submit" class="buttonadd add" id="submite_button_flow">
		</div>

	</div>
<!-- -------------------------------------------------------------------------------------- -->
<hr>











<div class="row font-weight-bold text-capitalize text-justify text-info container-fluid">
	<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
		<label for="Flow Name">Flow Name</label>
	</div>
	<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
		<label for="Status">Status</label>
	</div>
	<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
		<label for="Control Event">Control Event</label>
	</div>
	<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
		<label for="Control ID">Control ID</label>
	</div>
	<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
		<!-- <label for="Event Name">Event Name</label>	 -->
	</div>
	<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
</div>
<div id="flowdata_refrece">
	<?php
		global $wpdb;
		$table_event_admin = $wpdb->prefix.'height8_flow';
			$DBP_results = $wpdb->get_results("SELECT * FROM $table_event_admin");
				foreach($DBP_results as $DBP_row){				
					$id = $DBP_row->id;
					$FlowName = $DBP_row->FlowName;
					$FlowStatus = $DBP_row->FlowStatus;
					$ControlEvent = $DBP_row->ControlEvent;
					$ControlID = $DBP_row->ControlID;
					$EventName = $DBP_row->EventName;
					$Code = $DBP_row->Code;
					$ApiName = $DBP_row->Api_name;
	?>	

	<div class="row container-fluid mt-2 mb-1" id="<?php echo $id; ?>">
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<input type="text" class="flowconfiguration_flowname" value="<?php echo $FlowName; ?>" id="Flow_Name" name="Flow_Name">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<select class="design" id="flowStatus" name="flowStatus">
				<option value="<?php echo $FlowStatus; ?>"><?php echo $FlowStatus; ?></option>
			</select>
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<select class="design" id="flowStatus" name="flowStatus">
				<option value="<?php echo $ControlEvent; ?>"><?php echo $ControlEvent; ?></option>
			</select>		
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
			<input type="text" class="flowconfiguration_flowname" value="<?php echo $ControlID; ?>">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<?php
					if(empty($ApiName) || $ApiName==""){				
						echo "";
					}else{
				?>
					<select class="design" >
						<option value="<?php echo $ApiName; ?>"><?php echo $ApiName; ?></option>
					</select>
				<?php
					}	
				?>	
				<!-- <option value="<?php echo $ApiName; ?>"><?php echo $ApiName; ?></option> -->
		</div>	
		<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
			<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/Parameter.png' ?>" id="<?php echo $id; ?>" class="img-fluid Parametericon" data-toggle="modal" data-target=".flow_popup<?php echo $id; ?>">
		
			<div class="modal fade flow_popup<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Parameter</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<?php 	
										$codeset = str_replace('\"','"',$Code);
										$output_code = str_replace("\'","'",$codeset);	
										echo "<pre>";
											print_r($output_code);
											// var_dump($output_code);
										echo "</pre>";
									?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/removeevent.svg' ?>" class="img-fluid Parametericon pl-1" id="<?php echo $id; ?>" onclick="remove_data(this.id)">
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
			
		</div>


		
	</div>
	<?php
		}		
	?>
</div>	<!--  flowdata refrece -->
</form>