<div class="wrap">
	<div class="title">
		<img src="<?php echo HEIGHT8_URL.'/height8/assets/images/logo.png' ?>" class="img-fluid" alt="Responsive image" height="60px"; width="15%";>
	</div>
</div>
<div class="wrap">
	<ul class="nav nav-tabs">
		<li class="active font-weight-bold text-center"><a href="#tab-1">Manage Settings</a></li>
		<li class="font-weight-bold text-center"><a href="#tab-2">Flow configuration</a></li>	
		<li class="font-weight-bold text-center"><a href="#tab-3">Form</a></li>
	</ul>
	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
			<?php include_once HEIGHT8_DIR_PATH."/admin/tabs/home.php"; ?>			 
		</div>
		<div id="tab-2" class="tab-pane">
			<?php include_once HEIGHT8_DIR_PATH."/admin/tabs/flow_configuration.php"; ?>
		</div>
		<div id="tab-3" class="tab-pane">
		<?php 
			global $wpdb;
				$mytables=$wpdb->get_results("SHOW TABLES");
				foreach ($mytables as $mytable)
				{
					foreach ($mytable as $t) 
					{       
						echo $t . "<br>";
					}
				}
		?>
		</div>
	</div>
</div>