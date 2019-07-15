<?php 
/**
*Plugin Name: height8
*Description: This is just an example plugin
*Author: Devang
*version: 1.0
**/
	session_start();
	error_reporting(0);
	defined('ABSPATH') || die("Hey, You can't access this file!");
	define("HEIGHT8_DIR_PATH", plugin_dir_path(__FILE__));	
	define("HEIGHT8_URL", plugins_url());										//	http://localhost/wordpress/wp-content/plugins  
	define("PLUGIN_VERSION","1.0.0");
	define("HEIGHT8_URL_WORDPRESS", get_site_url()); 							//	http://localhost/wordpress
	define("url","http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx");	//	http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx

// work in ui and admin
	// add_action("init","custom_plugin_assets");
	// function custom_plugin_assets(){ 		
	// 	wp_enqueue_style("cpl_style",HEIGHT8_URL."/height8/assets/css/style.css",'',PLUGIN_VERSION);
	// 	wp_enqueue_script("cpl_script",HEIGHT8_URL."/height8/assets/js/scripts.js",array('jquery'),PLUGIN_VERSION);
	// 		wp_localize_script( 'cpl_script', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	// }
if(!class_exists('height8')):
class height8{
	public function __construct(){
		add_action("init","custom_plugin_assets");
		add_action('admin_enqueue_scripts','admin_style');
		add_action('wp_enqueue_scripts','user_style');
	}
	public function custom_plugin_assets(){ 		
		wp_enqueue_style("cpl_style",HEIGHT8_URL."/height8/assets/css/style.css",'',PLUGIN_VERSION);
		wp_enqueue_script("cpl_script",HEIGHT8_URL."/height8/assets/js/scripts.js",array('jquery'),PLUGIN_VERSION);
			wp_localize_script( 'cpl_script', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}
	public function admin_style(){
		wp_enqueue_style("cpl_style_1",HEIGHT8_URL."/height8/assets/css/bootstrap/bootstrap.css",'',PLUGIN_VERSION);
		wp_enqueue_style("cpl_style_2",HEIGHT8_URL."/height8/assets/css/jquery_popup/jquery.modal.min.css",'',PLUGIN_VERSION);
		wp_enqueue_style("cpl_style_3",HEIGHT8_URL."/height8/assets/css/animate/animate.css",'',PLUGIN_VERSION);

		wp_enqueue_script("cpl_script_1",HEIGHT8_URL."/height8/assets/js/bootstrap/bootstrap.js",'',PLUGIN_VERSION,true);
		wp_enqueue_script("cpl_script_2",HEIGHT8_URL."/height8/assets/js/bootstrap/bootstrap.bundle.js",'',PLUGIN_VERSION,true);
		wp_enqueue_script("cpl_script_3",HEIGHT8_URL."/height8/assets/js/form/popper.min.js",'',PLUGIN_VERSION,true);
		wp_enqueue_script("cpl_script_5",HEIGHT8_URL."/height8/assets/js/jquery_popup/jquery.modal.min.js",'',PLUGIN_VERSION,true);
		// wp_enqueue_script("cpl_script_6",HEIGHT8_URL."/height8/assets/js/jquery_popup/jquery.cookie.js",'',PLUGIN_VERSION,true);

		// wp_enqueue_script("admin_script_0",HEIGHT8_URL."/height8/assets/js/admin/GetApDetail.js",'',PLUGIN_VERSION,true);
		wp_enqueue_script("admin_script_1",HEIGHT8_URL."/height8/assets/js/admin/Managesetting_tab.js",'',PLUGIN_VERSION,true);
		wp_enqueue_script("admin_script_2",HEIGHT8_URL."/height8/assets/js/admin/functions_admin.js",'',PLUGIN_VERSION,true);
		wp_enqueue_script("admin_script_3",HEIGHT8_URL."/height8/assets/js/admin/flow_configuration.js",'',PLUGIN_VERSION,true);

		wp_enqueue_script("cpl_script_4",HEIGHT8_URL."/height8/assets/js/sweet/sweetalert2.js",'',PLUGIN_VERSION,true);
	}
	function user_style(){
		wp_enqueue_script("cpl_script_17",HEIGHT8_URL."/height8/assets/js/library/scintegrationMtk.js",'','PLUGIN_VERSION',true);
		// wp_enqueue_script("cpl_script_9",HEIGHT8_URL."/height8/assets/js/library/GetApDetail-plugin-lib.js",'','PLUGIN_VERSION');
		// wp_enqueue_script("cpl_script_10",HEIGHT8_URL."/height8/assets/js/library/functions-plugin-lib.js",'','PLUGIN_VERSION');
		// wp_enqueue_script("cpl_script_11",HEIGHT8_URL."/height8/assets/js/library/login-plugin-lib.js",'','PLUGIN_VERSION');
		// wp_enqueue_script("cpl_script_12",HEIGHT8_URL."/height8/assets/js/library/verification-plugin-lib.js",'','PLUGIN_VERSION');
		// wp_enqueue_script("cpl_script_13",HEIGHT8_URL."/height8/assets/js/library/show-plans-plugin-lib.js",'','PLUGIN_VERSION');
		// wp_enqueue_script("cpl_script_14",HEIGHT8_URL."/height8/assets/js/library/payment gateway-plugin-lib.js",'','PLUGIN_VERSION');
		// wp_enqueue_script("cpl_script_15",HEIGHT8_URL."/height8/assets/js/library/vocher-plugin-lib.js",'','PLUGIN_VERSION');
		// wp_enqueue_script("cpl_script_16",HEIGHT8_URL."/height8/assets/js/library/statuspage.js",'','PLUGIN_VERSION');
	}
}
$height8 = new height8();
$height8->custom_plugin_assets();
$height8->admin_style();
$height8->user_style();
endif;

	add_action('admin_menu','admin_menu1');
	function admin_menu1(){
		add_menu_page('Height8',   				//page_title
					  'Height8',				//Menu_title
					  'manage_options',			//Capability

					  'h8-admin-menu',			//Menu_slug
					  'h8_scripts_page',		//function
					  'dashicons-smiley',		//icon_url
					  200);						//position 

		add_submenu_page('h8-admin-menu', 			//parent slug
						 'Height8', 				//page_title
						 'Height8',	 				//Menu_title			
						 'manage_options', 			//Capability
						 'h8-admin-menu', 			//Menu_slug
						 'h8_scripts_page');		//sub function

		add_submenu_page('h8-admin-menu', 			//parent slug
						 'Height8', 				//page_title
						 'Settings', 				//Menu_title			
						 'manage_options', 			//Capability
						 'h8-admin-setting', 		//Menu_slug
						 'my_setting_function');	//sub function
	}
	
	function custom_plugin_tables(){
		global $wpdb;
	// Table 1
		 $DBP_tb_name=$wpdb->prefix . "height8";

		 $sql_query_to_create_table = "CREATE TABLE $DBP_tb_name (
								 id int(11) NOT NULL AUTO_INCREMENT,
								 event_name varchar(255) DEFAULT NULL,
								 Method_name varchar(255) DEFAULT NULL,
								 Api_name varchar(255) DEFAULT NULL,
								 Event_url varchar(255) DEFAULT NULL, 
								 mapping_url varchar(255) DEFAULT NULL,
								 PRIMARY KEY (id)
								) ENGINE=InnoDB DEFAULT CHARSET=latin1"; 

	// Tabel 2
		$DBP_flow_tb_name=$wpdb->prefix . "height8_flow";

		$sql_query_to_create_flow_tb = "CREATE TABLE $DBP_flow_tb_name ( 
										`id` INT(255) NOT NULL AUTO_INCREMENT ,
										`FlowName` VARCHAR(255) NOT NULL , 
										`FlowStatus` VARCHAR(255) NOT NULL , 
										`ControlEvent` VARCHAR(255) NOT NULL , 
										`ControlID` VARCHAR(255) NOT NULL ,
										`Api_name` VARCHAR(255),
										`EventName` VARCHAR(255), 
										`Code` Text NOT NULL ,
										`Hide` VARCHAR(255) ,
										`Show` VARCHAR(255) ,
										PRIMARY KEY (`id`)
										) ENGINE = InnoDB;"; 

	// Tabel 4
		$DBP_flow_tb_defaulturl =	$wpdb->prefix . "height8_Aap_config";

		$sql_query_to_create_defaulturl = "CREATE TABLE $DBP_flow_tb_defaulturl ( 
									`id` INT(255) NOT NULL AUTO_INCREMENT ,
									`Name` VARCHAR(255) NOT NULL ,
									`Value` VARCHAR(255) NOT NULL ,
									PRIMARY KEY (`id`)
									) ENGINE = InnoDB;"; 

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

			dbDelta($sql_query_to_create_table);
			dbDelta($sql_query_to_create_flow_tb);
			dbDelta($sql_query_to_create_defaulturl);
	} 
	register_activation_hook(__FILE__,'custom_plugin_tables');
	
	function deactivate_table(){
		global $wpdb;

		$DBP_tb_name=$wpdb->prefix . "height8";
		$wpdb->query("DROP table IF Exists $DBP_tb_name");

		$DBP_flow_tb_name = $wpdb->prefix . "height8_flow";
		$wpdb->query("DROP table IF Exists $DBP_flow_tb_name");

		$DBP_height8_Aap_config = $wpdb->prefix . "height8_Aap_config";
		$wpdb->query("DROP table IF Exists $DBP_height8_Aap_config");

	}	
	register_uninstall_hook(__FILE__,'deactivate_table');

	// register_deactivation_hook(__FILE__,'deactivate_table');

	// function deactivate_table_rem(){
	// 	global $wpdb;

	// 	$DBP_height8_Aap_config = $wpdb->prefix . "height8_Aap_config";
	// 	$wpdb->query("DROP table IF Exists $DBP_height8_Aap_config");
		
	// }
	// register_deactivation_hook(__FILE__,'deactivate_table_rem');

function h8_scripts_page(){
	include_once HEIGHT8_DIR_PATH."/admin/key_form.php";	
}	
function my_setting_function(){
	include_once HEIGHT8_DIR_PATH."/admin/setting.php";	
}
include_once HEIGHT8_DIR_PATH."/admin/tabs/action/initial_form.php";	
include_once HEIGHT8_DIR_PATH."/library/ajaxcode.php";
/* ------------------ */
/* Daynamic Shortcode */	
/* ------------------ */
	function button_shortcode_flow( $atts, $content = null ) {
		global $wpdb;
		$table_name = $wpdb->prefix.'height8_flow';
		$atts=shortcode_atts( array(
				'id' => '',
				'bar' => ''
			), $atts );
		extract($atts);
		$DBP_results = $wpdb->get_results("SELECT * FROM $table_name WHERE id=$id");

		foreach($DBP_results as $DBP_row){                            
			$code = $DBP_row->Code;
			$codeset = str_replace('\"','"',$code);
			$output_code = str_replace("\'","'",$codeset);	
				echo "<script>";
					echo $output_code;
				echo "</script>";
		}	
	}
	add_shortcode('h8', 'button_shortcode_flow');
// ------------------------------------------------------------------------------------------------------------------------
//  User Page PHP
		// include_once HEIGHT8_DIR_PATH."/static/otp.php";
		// include_once HEIGHT8_DIR_PATH."/static/quck/quck.php";
		// include_once HEIGHT8_DIR_PATH."/static/quck/paln.php";
		// include_once HEIGHT8_DIR_PATH."/static/customer_status.php";
		// include_once HEIGHT8_DIR_PATH."/static/plans/payment/plans_inactive.php";
		// include_once HEIGHT8_DIR_PATH."/static/plans/payment/newuser_payment.php";
		// include_once HEIGHT8_DIR_PATH."/static/plans/view_plan.php";
		// include_once HEIGHT8_DIR_PATH."/static/plans/verify_form_plan.php";
		// include_once HEIGHT8_DIR_PATH."/static/resend.php";
		// include_once HEIGHT8_DIR_PATH."/static/vocher/vocher_form.php";
//  USER pages js
		// include_once HEIGHT8_DIR_PATH."/user/login.php";
		// include_once HEIGHT8_DIR_PATH."/user/verification.php";
		// include_once HEIGHT8_DIR_PATH."/user/vocher/vocher.php";
		// include_once HEIGHT8_DIR_PATH."/user/statuspage.php";
		// include_once HEIGHT8_DIR_PATH."/user/Payment/paylib/verify_form_plan.php";
	
		// include_once HEIGHT8_DIR_PATH."/library/customizing.php";

?>