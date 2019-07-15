<?php
function insert_data_SelfCareURL(){
	global $wpdb;
	$height8_defaulturl = $wpdb->prefix . "height8_aap_config";

	$SelfCareURL = $_REQUEST['SelfCareURL'];
	$SelfCareURLname = $_REQUEST['SelfCareURL_name'];

	$wpdb->insert($height8_defaulturl,
				array(
					'Name'=>$SelfCareURLname,
					'Value'=>$SelfCareURL
				),
				array(
					'%s',
					'%s'
				)
	);
	die();
}
add_action('wp_ajax_insert_data_SelfCareURL', 'insert_data_SelfCareURL');
// -----------------------------------------------------------------

function my_delete_post(){
	global $wpdb;
	$table_datadelte = $wpdb->prefix . "height8";

	$eventname = $_REQUEST['id'];                    

	$wpdb->delete($table_datadelte,
				array(
					'id'=>$eventname
				),
				array(
					'%s'
				)
	);
	
	die();
}
add_action('wp_ajax_my_delete_post', 'my_delete_post');
// -----------------------------------------------------------------

function delete_flow_tab(){	
	global $wpdb;
			
	$table_datadelte = $wpdb->prefix . "height8_flow";
	$eventname = $_REQUEST['id'];                    

	$wpdb->delete($table_datadelte,
				array(
					'id'=>$eventname
				),
				array(
					'%s'
				)
	);
	
	die();
}
add_action('wp_ajax_delete_flow_tab', 'delete_flow_tab');
// -----------------------------------------------------------------

function insert_data_tab(){	
	global $wpdb;

	$table_insert_apimapping = $wpdb->prefix . "height8";

	$eventname = $_REQUEST['Event_Name'];
	$eventurl = $_REQUEST['mapingurl'];
	$api_name = $_REQUEST['drop_api'];
	$api_url = $_REQUEST['Eventapiurl'];
	$drop_method = $_REQUEST['drop_method'];
	
	$wpdb->insert($table_insert_apimapping,
		array(
				'event_name'=> $eventname,
				'mapping_url'=>$eventurl,
				'Event_url'=>$api_url,
				'Method_name'=>$drop_method,
				'Api_name'=>$api_name
		),
		array(
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
		)
	);  
	
	die();
}
add_action('wp_ajax_insert_data_tab', 'insert_data_tab');
// -----------------------------------------------------------------

function flow_tab_data_insert(){	
	global $wpdb;
                
	$table_flowdata = $wpdb->prefix . "height8_flow";
	
	$Flow_Name = $_REQUEST['Flow_Name'];
	$FlowStatus = $_REQUEST['FlowStatus'];
	$ControlEvent = $_REQUEST['ControlEvent'];
	$controlid = $_REQUEST['ControlID'];
	$Flowcaptiveurl = $_REQUEST['Flowcaptiveurl'];
	$EventNameapi = $_REQUEST['EventNameapi'];
	$code = $_REQUEST['jqcode'];

	$wpdb->insert($table_flowdata,
			array(
					'FlowName' => $Flow_Name,
					'FlowStatus' => $FlowStatus,
					'ControlEvent' => $ControlEvent,
					'ControlID' => $controlid,
					'EventName' => $Flowcaptiveurl,
					'Api_name' => $EventNameapi,
					'Code' => $code
			),
			array(
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'	
			)
		);  
	
	die();
}
add_action('wp_ajax_flow_tab_data_insert', 'flow_tab_data_insert');
// -----------------------------------------------------------------

function submit_button_id(){
	global $wpdb;
                
	$table_flowdata = $wpdb->prefix . "height8_flow";
	
	$Flow_Name = $_REQUEST['Flow_Name'];
	$FlowStatus = $_REQUEST['FlowStatus'];
	$ControlEvent = $_REQUEST['ControlEvent'];
	$controlid = $_REQUEST['ControlID'];
	$hide = $_REQUEST['hide'];
	$show = $_REQUEST['show'];
	$code = $_REQUEST['code'];

	$wpdb->insert($table_flowdata,
			array(
					'FlowName' => $Flow_Name,
					'FlowStatus' => $FlowStatus,
					'ControlEvent' => $ControlEvent,
					'ControlID' => $controlid,
					'Hide' => $hide,
					'Show' => $show,
					'Code' => $code
			),
			array(
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'	
			)
		);  
	
	die();
}
add_action('wp_ajax_submit_button_id', 'submit_button_id');

?>