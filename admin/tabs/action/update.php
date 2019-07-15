<?php
	$DBP_id = $_GET['id'];

	DBP_update_form($DBP_id);

	function DBP_update_form($DBP_id){
		global $wpdb;
		$table_name = $wpdb->prefix.'height8_form';

		DBP_update($DBP_id);
		$DBP_results = $wpdb->get_results("SELECT * FROM $table_name WHERE id=$DBP_id");
		foreach($DBP_results as $DBP_row)
		{
			$id = $DBP_row->id;
			$form = $DBP_row->form;
			$label = $DBP_row->label;
	
?>
<form method="POST">
<div class="container-fluid">
	<div class="wrap">
		<div class="row">
			<div class="col-md-12 h8form">
			 	<label for="Update">Update</label>	
			</div>
		</div>
			<div class="row key_form">
				<div class="col-md-1">
					<label for="title">Title</label>
				</div>
				<div class="col-md-11">
					<input type="text" name="up_title" value="<?php echo $id; ?>">
				</div>
			</div>
			<div class="row key_form" style="margin-top: 0px" >
				<div class="col-md-1">
					<label for="id">Form</label>
				</div>
				<div class="col-md-11">
					<!-- <textarea name="up_form" rows="2" cols="100"><?php echo $form; ?></textarea> -->
					<div class="form-group purple-border">
					  <label for="exampleFormControlTextarea4">Form Code</label>
					  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="up_form"><?php echo $form; ?></textarea>
					</div>					
				</div>
			</div>
			<div class="row key_form" style="margin-top: 0px">
				<div class="col-md-1">
					<label for="id">Name</label>
				</div>
				<div class="col-md-11">
					<input type="text" name="up_name" value="<?php echo $label; ?>"> 	
				</div>
			</div>
			<div class="row key_form" style="margin-top: 0px">
				<div class="col-md-10">
					
				</div>
				<div class="col-md-2">
					<button type="submit" name="up_data" class="btn btn-outline-dark">UPDATE</button>
				</div>
			</div>

	</div>
</div>
</form>

<?php
		}
 	}


	function DBP_update($DBP_id){
		global $wpdb;
		$table_name = $wpdb->prefix.'height8_form';

		$id =$_POST['up_title'];
		$form = $_POST['up_form'];
		$label = $_POST['up_name'];

			if (isset($_POST['up_data'])) {

				$wpdb->update($table_name,
						array('id'=>$id,
						 	  'form'=>$form,
						 	  'label'=>$label,
						 	),
						array(
							'id' => $DBP_id
							)
					); 

					$pagecode="<script type='text/javascript'>Swal.fire({position: '',type: 'success',title: 'Your work has been saved',showConfirmButton: false,timer: 1200})</script>";	
					echo "$pagecode";

			}
		

	} 

	?>