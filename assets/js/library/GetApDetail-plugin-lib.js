var GL_GetApDetail_obj;
var GL_obj;

jQuery(document).ready(function () {
    // sessionStorageclear();
    debugger;                 
    var api = jQuery("#url").val();
        sessionStorage.setItem("url", api);                             //  http://172.16.0.2/dvoishp/api/CaptivePortalService.asmx
    // var apdetail = jQuery("#interface-name").val();
    var apdetail =  "ether5-Hotspot";
    // var apdetail = "99test"

    const GetApDetail = "{'request':{'ApMac':'" + apdetail + "','SSID':''}}";
    jQuery.ajax({
        type: "POST",
        url: api + "/GetApDetail",
        data: GetApDetail,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            var getapdetail_obj = GL_GetApDetail_obj = JSON.stringify(data);
            var apdetail_Response = data.d.Response;
                sessionStorage.setItem("getapdetail", getapdetail_obj);
                                    // jQuery("#data-display").html(obj);              // Print data in home page
            var obj = GL_obj = jQuery.parseJSON(getapdetail_obj);
        debugger;
            getapdetail = {};                                       
            getapdetail.ID = obj.d.ID;
            getapdetail.LocationID = obj.d.LocationID;
            getapdetail.Hotspotgroup = obj.d.Hotspotgroup;
            getapdetail.hid = obj.d.hid;
            getapdetail.CpDesignID = obj.d.CpDesignID;
            getapdetail.Plan_Details = obj.d.Plan_Details;            
            getapdetail.Locationlevel = obj.d.Locationlevel;
            getapdetail.Partnerid = obj.d.Partnerid;                        
            getapdetail.SSIDconfig = obj.d.SSIDconfig;
            getapdetail.ResponseCode = obj.d.ResponseCode;
            getapdetail.Response = obj.d.Response;

            CheckHotspotAvaiable();
        },
        error: function (data) {
            jQuery("#data-display").html(data);
                // swal.fire({
                //     title: " " + data,
                //     type: "error",
                // });
            return false;
        }
    })
});