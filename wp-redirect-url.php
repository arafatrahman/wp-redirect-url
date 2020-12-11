<?php

/**
 * Plugin Name: WP Redirect url
 * Plugin URI: http://www.kuaniaweb.com/wp-redirect-url
 * Description: Make And manage 301 redirects with WP Redirect url plugin . Now you can easily redirect any wp url 
 * Version: 1.0.0
 * Author: Arafat Rahman Riyad
 * Author URI: http://kauniaweb.com/
 * Text Domain:  wp-redirect-url
 * Domain Path: /languages
 */
if (!defined('ABSPATH')) {
    die;
}

define("WPRU_PATH", dirname(__FILE__));
define('WPRU_ASSETS_DIR_URI', plugins_url('assets', __FILE__));

if (!function_exists('wpru_plugin_loaded')) {

    function wpru_plugin_loaded() {
        include_once WPRU_PATH . "/admin/wpru-settings.php";
        if (is_admin()) {
            include_once WPRU_PATH . "/admin/wpru-admin.php";
            WPRU_admin::Init();
        }
    }

}

wpru_plugin_loaded();

add_action('admin_enqueue_scripts', 'wpru_admin_styles');

function wpru_admin_styles() {
    $screen = get_current_screen();
    if ('toplevel_page_wpru-wp-redirect-url' == $screen->id) {
        wp_enqueue_style('wpru_main', plugins_url('assets/css/wpru-main.css', __FILE__), array(), '0.0.1');
        wp_enqueue_script('wpru_main_script', plugins_url('assets/js/wpru-main.js', __FILE__), array(), '0.0.1');
    }
}

add_action('send_headers', 'wpru_redirect_url');

if (!function_exists('wpru_redirect_url')) {

    function wpru_redirect_url() {

        $getSiteurl = get_bloginfo('url');
        $getAllRedirects = WPRU_settings::wpru_get_all();

        if ($getAllRedirects) {
            foreach ($getAllRedirects as $wpruId) {
                $wpruRedirectFields = WPRU_settings::wpru_get_fields($wpruId);
                $wpruRequestUrl = $wpruRedirectFields ['wpru-request-url'];
                $destinationUrl = $wpruRedirectFields ['wpru-destination-url'];
                $requestUrl = str_replace($getSiteurl, "", $wpruRequestUrl);
                $mainLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if ($mainLink == $getSiteurl . $requestUrl) {
                    wp_redirect($destinationUrl, 301);
                    die();
                }
            }
        }
    }

}

if (!function_exists('wpru_post')) {

    function wpru_post($key, $array = false) {
        if ($array) {
            return filter_input(INPUT_POST, $key, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        }
        if (filter_input(INPUT_POST, $key)) {
            return filter_input(INPUT_POST, $key);
        }
        return false;
    }

}

if (!function_exists('wpru_post_value')) {

    function wpru_post_value($key, $array = false) {
        return wpru_post($key, $array);
    }

}


if (!function_exists('wpru_sanitize_text_field')) {

    function wpru_sanitize_text_field($array) {

        if ($array) {
            foreach ($array as $key => &$value) {
                if (is_array($value)) {
                    $value = wpru_sanitize_text_field($value);
                } else {
                    $value = sanitize_text_field($value);
                }
            }
        }

        return $array;
    }

}


if (!function_exists('wpru_delete_database')) {

    function wpru_delete_database() {
        global $wpdb;
        $wpruTable = 'wpru_dbtable';
        $sql = "DROP TABLE IF EXISTS $wpruTable";
        $wpdb->query($sql);
    }

}
register_deactivation_hook(__FILE__, 'wpru_delete_database');
