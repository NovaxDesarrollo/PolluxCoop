(function( $ ) {
    'use strict';

    jQuery(document).ready(function(){
        wgl_verify_init();
        wgl_notice_init();
        wgl_accordion();
    });

    function wgl_verify_init(){
        var wait_load = false;
        jQuery(document).on('click', '.activate-license', function(e){
            e.preventDefault();
            if ( wait_load ) return;
            wait_load = true;
            var security, purchase_item, user_email;
            security = jQuery(this).closest('.wgl-purchase').find('#security').val();    
            user_email = jQuery(this).closest('.wgl-purchase').find('input[name="user_email"]').val();    
            purchase_item = jQuery(this).closest('.wgl-purchase').find('input[name="purchase_item"]').val();    

            var btn = jQuery(this);
            jQuery(btn).closest('.wgl-purchase').find('.notice-validation').remove();
            jQuery.ajax({
                type : "post", 
                cache: false,
                async: true,
                url : ajaxurl,
                dataType: "json",
                data : {
                    action: "purchase_activation",        
                    security: security,
                    purchase_code: purchase_item,
                    email: user_email,
                },
                beforeSend: function() {
                    // setting a timeout
                    btn.addClass('loading');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                success: function(response) {    
                    if(response.error == 1){
                        var node_str = '<div class="notice-validation notice notice-error error" style="display: none;">';
                        node_str += response.message;
                        node_str  += '</div>';
                        jQuery(btn).closest('.wgl-purchase').append(node_str);
                        jQuery('.notice-validation').fadeIn();
                    }
                    
                    if(response.success == 1){
                        var node_str = '<div class="notice-validation notice notice-success success" style="display: none;">';
                        node_str += response.message;
                        node_str  += '</div>';
                        jQuery(btn).closest('.wgl-purchase').append(node_str);
                        jQuery('.notice-validation').fadeIn();
                        setTimeout(function(){
                            window.location.reload();
                        }, 400);
                    }

                    btn.removeClass('loading');
                    wait_load = false;    
                },
            });        
        });        
    }

    function wgl_notice_init(){
        jQuery(document).on('click', '.dismiss_notices', function(e){
            e.preventDefault();
            var notice = jQuery(this).closest('.notice').fadeOut();
            jQuery.ajax({
                type : "post", 
                cache: false,
                async: true,
                url : ajaxurl,
                data : {
                    action    : 'dismissed_notice',
                    nonce    : wgl_verify.ajax_nonce,
                },
                error: function(jqXHR, textStatus, errorThrown) {},
                success: function(response) {},
            });    
        });
    }

})( jQuery );

function wgl_accordion(){
    jQuery('body').on('click', '.wgl_accordion_heading', function(e){
        e.preventDefault();
        var parent = jQuery(this).parent('.wgl_accordion_wrapper');
        var body =  jQuery(parent).children('.wgl_accordion_body');

        if(jQuery(parent).hasClass('open'))
        {
            jQuery(body).slideUp('fast');
            jQuery(parent).removeClass('open').addClass('close');
        } else {
            jQuery(body).slideDown('fast');
            jQuery(parent).removeClass('close').addClass('open');
        }
    });
}
