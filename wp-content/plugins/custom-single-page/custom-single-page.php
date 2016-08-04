<?php
/*
 * Plugin Name: Custom Single Page Template.
 * Description: This plugin replaces default WPAdverts templates/single.php file with sinle.php file inside this directory.
 */

add_action("adverts_template_load", "custom_single_template");
function custom_single_template( $tpl ) {
    // $tpl is an absolute path to a file, for example
    // /home/simpliko/public_html/wp-content/plugins/wpadverts/templates/list.php

    $basename = basename( $tpl );
    // $basename is just a filename for example single.php

     if( $basename == "single.php" ) {
        // return path to list.php file in custom-list-template directory
        return dirname( __FILE__ ) . "/single.php";
     } else {
        return $tpl;
     }
}
