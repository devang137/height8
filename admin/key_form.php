<?php
	global $wpdb;
		$table_name = $wpdb->prefix.'height8_flow';

		if (isset($_REQUEST['del_btn']) AND isset($_REQUEST['delete'])) {
			for($i=0; $i<count($_REQUEST['delete']); $i++)
			{
				$del_id=$_POST['delete'][$i];

				$wpdb->delete($table_name,
					array(
						'id'=>$del_id
						)
				);
			}
		}

		$DBP_results = $wpdb->get_results("SELECT * FROM $table_name");

	if (isset($_GET['id'])) {
		include_once HEIGHT8_DIR_PATH."/admin/tabs/action/update.php";
	}
	else{
?>
<form method="POST" action="<?php echo admin_url('admin.php?page=h8-admin-menu'); ?>">
<!-- ----------------------------------------------------------------------------------------------------------------- -->
<div class="container-fluid">
	<div class="wrap">
		<div class="row h8form">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<a href="admin.php?page=h8-admin-setting#tab-3" style="color: black">
					<label for="H8 Forms">H8 Forms</label> 
				</a>	
			</div>
		</div>		
<!-- ----------------------------------------------------------------------------------------------------------------- -->
		<div class="row mt-1 pt-1 mb-1 font-weight-bold">
			<div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
				<b><label for="Title"> Title(FlowName)</label></b>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<label for="Shortcode">Shortcode</label>
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
				<button name="del_btn" value="<?php echo $id; ?>" class="btn btn-danger">X</button>
			</div>
		</div>
<!------------------------------------------------------------------------------------------------------------------- -->
		<div class="row mt-1 pt-1 pb-1 mb-1" style="background-color: #E5E7E9;"> 
			<div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 font-weight-bold">
				<label for="Initial Form">Initial Form</label>
			</div>
			<div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
				<label for="[initial]">[initial]</label>
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
		</div>
<!------------------------------------------------------------------------------------------------------------------- -->
<?php 
	foreach($DBP_results as $DBP_row){    
		$FlowName = $DBP_row->FlowName;                        
		$id = $DBP_row->id;
?>
		<div class="row mt-1 pt-1 pb-1 mb-1" style="background-color: #E5E7E9;"> 
			<div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
				<a href="<?php echo admin_url('admin.php?page=h8-admin-menu&id='.$id) ?>"><?php $FlowName; ?></a>
				<label for="<?php echo $FlowName; ?>" class="mt-1 font-weight-bold"><?php echo $FlowName; ?></label>
			</div>
			<div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
				<?php echo "[h8 id=$id]"; ?>
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
				<input type="checkbox" name="delete[]" value="<?php echo $id; ?>">
			</div>
		</div>
<?php }	?>
<!-- ----------------------------------------------------------------------------------------------------------------- -->
		<div class="row mt-2 pt-1 pb-1 mb-1	font-weight-bold">
			<div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
				<b><label for="Title">Title (FlowName)</label></b>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<label for="Shortcode">Shortcode</label>
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
				<button name="del_btn" value="<?php echo $id; ?>" class="btn btn-danger btn_remove">X</button>
			</div>
		</div>
<!-- ----------------------------------------------------------------------------------------------------------------- -->
	</div>
	<input type="hidden" id="url_captive" value="<?php echo url ?>" class="url_captive" name="url_captive">
</div>
</form>
<?php
}



