<?php

/**
 * Plugin Name: SD Activate Plugin
 * Description: A MU plugin to activate another plugin
 * Version: 0.1
 * Author: Pieter Daalder
 * License: GPLv2
 */

 // General settings go here

 $plugin_file = "plugin-folder/plugin-file.php";
 $notify = true;
 $notify_mail = "your@email.com";

 // That's it! No more setup, just enjoy the ride.

 $result = activate_plugin( $plugin_file );
if ( is_wp_error( $result ) ) {
    $status = false;
} else {
    $status = true;
}

if ( $notify ) {
    if ($status ){
        $subject = 'Plugin activated';
        $body = 'Plugin succesfully activated.';
    } else {
        $subject = 'Plugin was not activated';
        $body = 'Plugin not activated, something went wrong';
    }
    wp_mail( $notify_mail, $subject, $body );
}
?>