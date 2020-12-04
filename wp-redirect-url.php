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
    include_once WPRU_PATH . "/admin/wpru-settings.php";
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
        wp_enqueue_script('wpru_main_script', plugins_url('assets/js/wpru-main.js', __FILE__), array(), '0.0.1');
    }
}

add_action('send_headers', 'wpru_redirect');

function wpru_redirect() {

    $getSiteurl = get_bloginfo('url');
    $getAllRedirects = wpru_settings::wpruGetAll();

    if ($getAllRedirects) {
        foreach ($getAllRedirects as $wpruId) {
            $wpruRedirectFields = wpru_settings::wpruGetFields($wpruId);
            $wpruRequestUrl = $wpruRedirectFields ['requestUrl'];
            $destinationUrl = $wpruRedirectFields ['destinationUrl'];
            $requestUrl = str_replace($getSiteurl, "", $wpruRequestUrl);
            $mainLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if ($mainLink == $getSiteurl . $requestUrl) {
                wp_redirect($destinationUrl, 301);
                die();
            }
        }
    }
}




add_action( 'activated_plugin', 'wpru_activation' );
function wpru_activation() {
 exit( wp_redirect(admin_url('admin.php?page=kau-wp-redirect-url')));
}

function delete_wpru_database() {
    global $wpdb;
    $wpruTable = 'kau_wp_redirects_url';
    $sql = "DROP TABLE IF EXISTS $wpruTable";
    $wpdb->query($sql);
}

register_deactivation_hook(__FILE__, 'delete_wpru_database');
