<?php

class wpru_settings {
    

    public static function wpruSubmission($isSaved) {


        if (isset($_POST['wpru_settings_submit'])) {

            wpru_settings::wpruDeleteUrl();

            if (!empty(kaupost('name',$_POST))) {
                
                $redirectArray = kaupost('name',$_POST);
                
                foreach ($redirectArray as $key => $redirectName) {
                    
                    $name = sanitize_text_field($redirectName);
                    $requestUrl = kaupost('requestUrl',$_POST)[$key];
                    $destinationUrl = kaupost('destinationUrl',$_POST)[$key];                    
                    self::wpruUpdateUrl($name, $requestUrl, $destinationUrl);
                }
            }

            echo '<div class="notice notice-success is-dismissible">
            <p class=" text-success "><strong> Settings Saved!</strong> Your Settings Successfully Saved</p>
        </div>';
        }
    }


    public static function wpruDeleteUrl() {

        global $wpdb;
        $sql = "DELETE FROM kau_wp_redirects_url";
        $wpdb->query($sql);
    }

    public static function wpruUpdateUrl($name, $requestUrl, $destinationUrl) {

        global $wpdb;
        $sql = $wpdb->prepare("INSERT INTO kau_wp_redirects_url (name, requestUrl, destinationUrl) VALUES ('%s', '%s', '%s')", array($name, $requestUrl, $destinationUrl));
        $wpdb->query($sql);
    }

    public static function wpruGetFields($id) {

        global $wpdb;
        $sql = $wpdb->prepare("SELECT * FROM kau_wp_redirects_url WHERE id = '%s'", array($id));
        $getResult = $wpdb->query($sql);
        if ($getResult) {
            $wpruFields = array();
            foreach ($wpdb->get_results($sql) as $row) {
                $wpruFields['name'] = $row->name;
                $wpruFields['requestUrl'] = $row->requestUrl;
                $wpruFields['destinationUrl'] = $row->destinationUrl;
            }

            return $wpruFields;
        } else {

            return false;
        }
    }

    public static function wpruCreateTable() {
        global $wpdb;
        $sql = "CREATE TABLE kau_wp_redirects_url (id BIGINT(25) PRIMARY KEY AUTO_INCREMENT,name TEXT,requestUrl TEXT, destinationUrl TEXT)";
        $wpdb->query($sql);
    }

    public static function checkWpruTable() {
        global $wpdb;
        $sql = "SHOW TABLES LIKE 'kau_wp_redirects_url'";
        $result = $wpdb->query($sql);
        if ($result != 1) {
            self::wpruCreateTable();
        }
    }

    public static function wpruGetAll() {
        global $wpdb;
        self::checkWpruTable();

        $sql = "SELECT * FROM kau_wp_redirects_url ORDER by id ASC";
        
        if ($wpdb->query($sql)) {
            $wpruId = array();
            foreach ($wpdb->get_results($sql) as $row) {
                $wpruId[] = $row->id;
            }
            return $wpruId;
        } else {

            return false;
        }
    }

   

}
