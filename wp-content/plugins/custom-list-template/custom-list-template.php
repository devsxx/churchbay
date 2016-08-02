<?php
/*
 * Plugin Name: Custom List Template.
 * Plugin URI: https://wpadverts.com/
 * Description: This plugin replaces default WPAdverts templates/list.php file with list.php file inside this directory.
 * Author: Greg Winiarski
 */

add_action("adverts_template_load", "custom_list_template");
function custom_list_template( $tpl ) {
    // $tpl is an absolute path to a file, for example
    // /home/simpliko/public_html/wp-content/plugins/wpadverts/templates/list.php

    $basename = basename( $tpl );
    // $basename is just a filename for example list.php

     if( $basename == "list.php" ) {
        // return path to list.php file in custom-list-template directory
        return dirname( __FILE__ ) . "/list.php";
     } else {
        return $tpl;
     }
}
