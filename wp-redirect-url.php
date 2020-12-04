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