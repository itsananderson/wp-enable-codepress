<?php
/* 
Plugin Name: WP Enable CodePress
Plugin URI: http://www.itsananderson.com/plugins/enable-codepress
Description: Adds syntax highlighting to theme/plugin editors in WordPress versions 2.8.1 through 2.9.2
Author: Will Anderson
Version: 1.1
Author URI: http://www.itsananderson.com/
 */

class WP_Enable_CodePress {

	public static function start() {
		add_action( 'admin_init', array( __CLASS__, 'enable_codepress' ) );
	}

	public static function enable_codepress() {
		// Get the name of the page being accessed
		$current_page = $_SERVER['REQUEST_URI'];
		// If the current page is the theme or plugin editor, queue the needed CodePress JS
		if ( strstr( $current_page, 'plugin-editor.php' ) !== FALSE
			 || strstr( $current_page, 'theme-editor.php' ) !== FALSE ) {
			wp_enqueue_script( 'codepress' );
			add_action( 'admin_print_footer_scripts', 'codepress_footer_js' );
		}
	}
}

WP_Enable_CodePress::start();