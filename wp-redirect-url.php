<?php
/**
 * Plugin Name: WP Redirect url
 * Plugin URI: http://www.kuaniaweb.com
 * Description: This plugin helps you to redirect any url anywhere as per request . 
 * Version: 0.0.1
 * Author: Arafat Rahman Riyad
 * Author URI: Author's website
 */

if (!defined('ABSPATH')) {
  die;
}

define("WPRU_PATH", dirname(__FILE__));
define('WPRU_ASSETS_DIR_URI', plugins_url('assets', __FILE__));

function WPRU_plugin_load() {
    
    if (is_admin()) {
    include_once WPRU_PATH . "/admin/wp-redirect-url-admin.php";
    wpru_admin::Init();
    }
}

WPRU_plugin_load();

add_action('admin_enqueue_scripts', 'wpru_admin_styles');

function wpru_admin_styles() {
    $screen = get_current_screen();
            
    if ('toplevel_page_kau-wp-redirect-url' == $screen->id) {
        
        wp_enqueue_style('wpru_main', plugins_url('assets/css/wpru-main.css', __FILE__), array(), '0.0.1');
       
        
    }
}