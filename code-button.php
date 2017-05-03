<?php
/*
 * Plugin Name: Code Button
 * Plugin URI: https://github.com/
 * Description: Adds a code button to the TinyMCE editor that inserts a code block.
 * Version: 1.0
 * Author: Matthew McCoy
 * Author URI: http://mattmc.co/y
 * License: GPL v2
 * Licence URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// add new buttons
add_filter( 'mce_buttons', 'cb_register_buttons' );

function cb_register_buttons( $buttons ) {
   array_push( $buttons, 'codebutton' );
   return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
add_filter( 'mce_external_plugins', 'cb_register_tinymce_javascript' );

function cb_register_tinymce_javascript( $plugin_array ) {
   $plugin_array['cb'] = plugin_dir_url(__FILE__) . 'code-button-plugin.js';
   return $plugin_array;
}

// add backend stylesheet
add_action( 'admin_init', 'cb_add_code_styles' );

function cb_add_code_styles() {
    add_editor_style( plugin_dir_url(__FILE__) . 'code-button.css' );
}

// add frontend stylesheet
add_action( 'wp_enqueue_scripts', 'cb_add_frontend_styles' );

function cb_add_frontend_styles() {
    wp_enqueue_style( 'code-button-additional-styles', plugin_dir_url( __FILE__ ) . 'additional-styles.css' );
}