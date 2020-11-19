<?php
    // Fix for the wgl page builder: http://www.webgeniuslab.com/wordpress-wgl-page-builder-plugin/
    /** @global string $pagenow */
    if ( has_action( 'ecpt_field_options_' ) ) {
        global $pagenow;
        if ( $pagenow === 'admin.php' ) {

            remove_action( 'admin_init', 'pb_admin_init' );
        }
    }