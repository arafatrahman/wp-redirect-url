<?php

class wpru_admin extends wpru_settings {

    public static function Init() {
        add_action("admin_menu", array(__CLASS__, "add_wpru_menu"));
    }   

    public static function add_wpru_menu() {
        add_menu_page('WP Redirect url', 'WP Redirect url', 'manage_options', 'kau-wp-redirect-url', array(__CLASS__, "wpru_main_menu"));
    }

    public static function wpru_main_menu() {
        include_once WPRU_PATH . "/views/wpru-settings-view.php";
    }

}
