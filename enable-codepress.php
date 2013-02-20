<?php
/* 
Plugin Name: Enable CodePress
Plugin URI: http://www.itsananderson.com/plugins/enable-codepress
Description: CodePress syntax highlighting was added in 2.7, then removed in 2.8.1. Enable CodePress adds it back
Author: Will Anderson
Version: 1.0
Author URI: http://www.itsananderson.com/
 */

function enable_codepress() {
    // Get the name of the page being accessed
    $current_page = $_SERVER['REQUEST_URI'];
    // If the current page is the theme or plugin editor, queue the needed CodePress JS
    if ( strstr($current_page, 'plugin-editor.php') !== FALSE || strstr($current_page, 'theme-editor.php') !== FALSE ) {
        wp_enqueue_script('codepress');
        add_action('admin_print_footer_scripts', 'codepress_footer_js');
    }
}

add_action('admin_init', 'enable_codepress');
?>
