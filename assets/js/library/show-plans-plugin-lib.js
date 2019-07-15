jQuery(document).ready(function(){
    jQuery("#paid_btn").click(function(){

        var blank_field = jQuery('div[id="mobile_number"],div[id="verify_number"]').css('display','none');    
        blank_field.addClass('animated fadeInLeftBig');

        jQuery('form[id="showplans"]').css('display','block');

    });        
});
