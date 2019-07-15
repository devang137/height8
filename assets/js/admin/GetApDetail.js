var GL_obj;
var getapdetail_ID;
var getapdetail_LocationID;
var getapdetail_Hotspotgroup;
var getapdetail_hid;
var getapdetail_Plan_Details;
var getapdetail_Partnerid;
var getapdetail_Resellerid;
var getapdetail_SSIDconfig;

jQuery(document).ready(function () {
debugger;
    var api = jQuery("#url_captive").val();
    var apdetail = jQuery("#interface-name").val();
    // var apdetail =  "ether5-Hotspot";
    // var apdetail = "99test"

    const GetApDetail = "{'request':{'ApMac':'" + apdetail + "','SSID':''}}";
    jQuery.ajax({
        type: "POST",
        url: api + "/GetApDetail",
        data: GetApDetail,
        async:false,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
        debugger;
            var getapdetail_obj = GL_GetApDetail_obj = JSON.stringify(data);
            var obj = GL_obj = jQuery.parseJSON(getapdetail_obj);

            getapdetail_ID = obj.d.ID;
            getapdetail_LocationID = obj.d.LocationID;
            getapdetail_Hotspotgroup = obj.d.Hotspotgroup;
            getapdetail_hid = obj.d.hid;
            getapdetail_Plan_Details = obj.d.Plan_Details;
            getapdetail_Partnerid = obj.d.Partnerid;
            getapdetail_Resellerid = obj.d.Resellerid;
            getapdetail_SSIDconfig = obj.d.SSIDconfig;

            getapdetail = {};
            getapdetail.ResponseCode = obj.d.ResponseCode;
            getapdetail.Response = obj.d.Response;
        },
        error: function (data) {
                console.log(data.responseText);
            return false;
        }
    })
});