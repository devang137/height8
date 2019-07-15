<div id="refrece_event_after_Delte">

<?php
global $wpdb;
$table_event_admin = $wpdb->prefix.'height8';
$DBP_results = $wpdb->get_results("SELECT * FROM $table_event_admin");
    foreach($DBP_results as $DBP_row){
        $event_id = $DBP_row->id;
        $event_name = $DBP_row->event_name;
        $Method_Name = $DBP_row->Method_name;
        $event_mapping = $DBP_row->mapping_url;
        $Event_url = $DBP_row->Event_url;
        $api_name = $DBP_row->Api_name;
?>	
    
<div class="row mb-1 pt-1" id="row<?php echo $event_id ?>">
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mb-1">
        <input type="text" name="nametext" placeholder="Event Name" class="form-control name_list bl" id="label_button<?php echo $event_id ?>" value="<?php echo $event_name ?>" />
    </div>
    <div class="col-sm-2 col-md-3 col-lg-3 col-xl-3 mb-1" id="drop_re_<?php echo $event_id ?>">											
        <select class="drop_api1 bl" name="dropdown_button<?php echo $event_id ?>" id="dropdown_button<?php echo $event_id ?>">
            <option value="<?php echo $api_name ?>"><?php echo $api_name ?></option>
        </select>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mb-1">											
       <input type="button" name="button_verify<?php echo $event_id ?>" id="button_verify<?php echo $event_id ?>" class="btn_dinamic bl" value="Verify">
    </div>
    <!-- <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 mb-1"></div> -->
    <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 mb-1">												
        <p id="dynamic_button<?php echo $event_id ?>" class="font-weight-bold text-uppercase pt-1"></p>													
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 mb-1">  
    <img src="<?php echo HEIGHT8_URL.'/height8/assets/images/info.png' ?>" class="img-fluid info" alt="Responsive image" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $event_id ?>">

        <div class="modal fade bd-example-modal-lg<?php echo $event_id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="<?php echo HEIGHT8_URL.'/height8/assets/images/popup/h8-simple-logo.png' ?>" class="img-fluid info" alt="Responsive image" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $event_id ?>">	
                        <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2 font-weight-bold">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <label for="API URL :">API URL :</label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <?php echo $event_mapping ?>
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <label for="Event Name :">Event Name :</label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <?php echo $event_name ?>
                            </div>
                        </div>
                        <div class="row font-weight-bold">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <label for="Event Name :">Method :</label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <?php echo $Method_Name ?>
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
    <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 mb-1">	
        <div style="width:100%">	
            <img alt="Responsive image" class="img-fluid ref" id="reloder" src="<?php echo HEIGHT8_URL."/height8/assets/images/refrece.png" ?>" style="cursor: pointer;" />
        </div>											
    </div>
        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 mb-1"  style="margin-left:25px;">
            <button type="button" name="<?php echo $event_id ?>" id="<?php echo $event_id ?>" class="btn btn-danger bl" onclick="onclick=deletevent(this.id);">X</button>
        </div>
        <div class="col-sm-2 col-md-1 col-lg-1 col-xl-1 mb-1"></div>
</div>

<?php
    }
?>

</div>