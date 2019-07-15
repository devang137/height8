/*************************************
Integration with Mikrotik
**************************************/
var eIP;
var eMAC;
var authStatusCheck;
var authCheckCnt = 0;

function getParameterByName(name) {
    name = name.replace(/[\\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function getTimeout() {
    var rez = window.location.search.match(/c_timeout=(\d+)/)
    if (rez && rez.length == 2) {
        return parseInt(rez[1], 10)
    }
    return -1;  // No timeout found
}

jQuery(document).ready(function () {
    // debugger;
    if (document.sendin != null && document.sendin.mk_error != null && document.sendin.mk_error.value != "") {
        eventFire(document.getElementById('click'), 'click');

        Swal.fire({
            title: document.sendin.mk_error.value,
            type: "error",
        });
        openLogin();
    } else {
        if (jQuery("#linkSurfURL").attr("href") != undefined) {
            if (jQuery("#linkSurfURL").attr("href").indexOf("cpOLPay") >= 0) {
                window.location = jQuery("#linkSurfURL").attr("href");
            }
        }
        //No errr message

        // IF Success login
        // Gets the timeout from the URL
        /*  c_timeout = getTimeout();
          if (c_timeout != -1) {
              // Login Success
              if (status == "Trial") {
                  window.location = document.getElementById('hndPortalURL').value + "/Customer/PayRequest.aspx?src=cpOLPay&" + onlinePurchaseReciept;
              } else {
                  swal({
                      title: "You have been logged in successfully, Enjoy wifi.",
                      type: "success",
                  });
                  //settimer();
                  LoginOpen();
                  openStatus();
                  eventFire(document.getElementById('click'), 'click');
                  document.getElementById('dvStatus').style.display = 'block';
              }
          }*/
    }
});

function Authenticate() {
    eIP = jQuery("#hdnIPAddress").val();
    eMAC = jQuery("#hdnMACAddress").val();
    status = jQuery("#custStatus").val();
    var chapid = document.sendin.mk_chapid.value;
    var chapchallenge = document.sendin.mk_chapchallenge.value;
        onlinePurchaseReciept = jQuery("#onlinePurchaseReciept").val();
        if (onlinePurchaseReciept != '')
            document.sendin.dst.value = document.getElementById('hndPortalURL').value + "/Customer/PayRequest.aspx?src=cpOLPay&" + onlinePurchaseReciept;
        // url: 'ScIntegration.ashx?Auth=1&eIP=' + eIP + '&eMAC=' + eMAC + '&username=' + $("#loginCountry").val() + $("#username").val() + '&password=' + $("#password").val(),
            document.sendin.mk_username.value = jQuery("#username").val();
        if (chapid != null && chapid != "") {
            document.sendin.mk_password.value = hexMD5(chapid + jQuery("#password").val() + chapchallenge);
        }
        else {
            document.sendin.mk_password.value = jQuery("#password").val();
        }
        document.sendin.submit();

    return false;
}

function checkAuthStatus() {
    jQuery.ajax({
            type: 'POST',
            url: 'ScIntegration.ashx?checkAuthStatus=1&eIP=' + eIP + '&eMAC=' + eMAC,
            dataType: 'json',
            success: function (responseData, textStatus, jqXHR) {
                var value = responseData.ResponseCode + " : " + responseData.ReplyMessage;
                value = responseData.ReplyMessage;
                if (responseData.ResponseCode == 201) {
                    //success 
                    openStatus();
                    Swal.fire({
                            title: value,
                            type: "success",
                        });
                    //sweetAlert(value);
                } else if (responseData.ResponseCode == 101) {
                    openStatus();
                } else if (responseData.ResponseCode == 202) {
                    if (authCheckCnt < 5) {
                        authStatusCheck = setTimeout(checkAuthStatus, 1000);
                    } else {
                        authCheckCnt = 0;
                        Swal.fire({
                            title: "Status check timeout please login again.",
                            type: "warning",
                        });
                        //sweetAlert("Status check timeout please login again.");
                        openLogin();
                    }
                    authCheckCnt++;
                    return;;// check status continue;
                } else {
                    openLogin();
                    Swal.fire({
                            title: value,
                            type: "warning",
                    });
                    //sweetAlert(value);
                }
                clearTimeout(authStatusCheck);
            },
            error: function (responseData, textStatus, errorThrown) {
                swal({
                    title: 'POST failed.' + responseData,
                    type: "error",
                });
                //sweetAlert('POST failed.' + responseData);
            }
        });
}

function sclogout() {
    /*
     // url: 'ScIntegration.ashx?Auth=1&eIP=' + eIP + '&eMAC=' + eMAC + '&username=' + $("#loginCountry").val() + $("#username").val() + '&password=' + $("#password").val(),
     document.sendin.mk_username.value = $("#loginCountry").val() + $("#username").val();
     if (chapid != null && chapid != "") {
         document.sendin.mk_password.value = hexMD5(chapid + $("#password").val() + chapchallenge);
     }
     else {
         document.sendin.mk_password.value = $("#password").val();
     }*/
    document.logout.submit();
    return false;

}
