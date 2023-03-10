<?php
/**
 * Plugin Name:     Whatsapp Button
 * Plugin URI:      http://adanzilla.com/whatsapp-button
 * Description:     Adds a fixed WhatsApp button to you WordPress
 * Author:          adanzilla
 * Author URI:      http://adanzilla.com
 * Text Domain:     whatsapp-button
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Whatsapp_Button
 */

// Your code starts here.

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}


define( 'WABUTTON_VERSION', '1.0.0' );
define( 'WABUTTON_MINIMUM_WP_VERSION', '4.5' );
define( 'WABUTTON_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WABUTTON_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WABUTTON_DELETE_LIMIT', 100000 );
define( 'WABUTTON_SRC_LOGO', WABUTTON_PLUGIN_URL . 'img/whatsapp.png' );

require_once( WABUTTON_PLUGIN_DIR . 'class.WAButton.php' );

add_action( 'init', [ 'WAButton', 'init' ] );


add_action( 'wp_footer', [ "WAButton", 'enqueue_scripts' ] );
add_action( 'wp_footer', [ "WAButton", 'enqueue_styles' ] );
add_action( 'wp_footer', [ "WAButton", 'localize_script' ] );

add_action( 'customize_register', [ "WAButton", 'customize_register' ] );