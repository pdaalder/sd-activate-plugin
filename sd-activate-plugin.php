<?php

/**
 * Plugin Name: SD Activate Plugin
 * Description: A MU plugin to activate another plugin
 * Version: 1.0
 * Author: Pieter Daalder
 * License: GPLv2
 */

 /**
  * General settings for this plugin.
  * $plugin_file : the file needed to activate the plugin.
  * $notify : Boolean value, use true for sending an e-mail after the run of this plugin.
  * $notify_mail : address used for notification if $notify is set to true.
  */

function sd_activate_plugin() {

    $plugin_file = "plugin-folder/plugin-file.php";
    $notify = true;
    $notify_mail = "your@email.com";

    $result = activate_plugin( $plugin_file );
    if ( is_wp_error( $result ) ) {
        $status = false;
    } else {
        $status = true;
    }

    if ( $notify ) {
        if ($status ){
            $subject = 'Plugin activated';
            $body = 'Plugin ' .$plugin_file .' succesfully activated.';
        } else {
            $subject = 'Plugin was not activated';
            $body = 'Plugin ' .$plugin_file .' not activated, something went wrong';
        }
        wp_mail( $notify_mail, $subject, $body );
    }

    unlink(__FILE__);
}

add_action( 'admin_init', 'sd_activate_plugin' );

?>