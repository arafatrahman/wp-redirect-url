<?php

class wpru_settings {
    
            /**
         * Recursive sanitation for an array
         * 
         * @param $array
         *
         * @return mixed
         */
       public static function recursive_sanitize_text_field($array) {
            foreach ( $array as $key => &$value ) {
                if ( is_array( $value ) ) {
                    $value = self::recursive_sanitize_text_field($value);
                }
                else {
                    $value = sanitize_text_field( $value );
                }
            }

            return $array;
        }

    public static function wpruSubmission($isSaved) {


        if (isset($_POST['wpru_settings_submit'])) {
            
            wpru_settings::wpruDeleteUrl();
            
          
            $redirectArray = self::recursive_sanitize_text_field(kaupost('name',$_POST));
            
            if ($redirectArray) {
                
                foreach ($redirectArray as $key => $redirectName) {
                    
                    $name = sanitize_text_field($redirectName);
                    $requestUrl = esc_url_raw(kaupost('requestUrl',$_POST)[$key]);
                    $destinationUrl = esc_url_raw(kaupost('destinationUrl',$_POST)[$key]);                    
                    self::wpruUpdateUrl($name, $requestUrl, $destinationUrl);
                }
            }
            
            echo '<div class="notice notice-success is-dismissible"><p class=" text-success "><strong> Settings Saved!</strong> Your Settings Successfully Saved</p></div>';
        }
    }


    public static function wpruDeleteUrl() {

        global $wpdb;
        $wpruSQL = "DELETE FROM kau_wp_redirects_url";
        $wpdb->query($wpruSQL);
    }

    public static function wpruUpdateUrl($name, $requestUrl, $destinationUrl) {

        global $wpdb;
        $wpruSQL  = $wpdb->prepare("INSERT INTO kau_wp_redirects_url (name, requestUrl, destinationUrl) VALUES ('%s', '%s', '%s')", array($name, $requestUrl, $destinationUrl));
        $wpdb->query($wpruSQL );
    }

    public static function wpruGetFields($id) {

        global $wpdb;
        $wpruSQL  = $wpdb->prepare("SELECT * FROM kau_wp_redirects_url WHERE id = '%s'", array($id));
        $getResult = $wpdb->query($wpruSQL );
        if ($getResult) {
            $wpruFields = array();
            foreach ($wpdb->get_results($wpruSQL ) as $wpruRow) {
                $wpruFields['name'] = $wpruRow->name;
                $wpruFields['requestUrl'] = $wpruRow->requestUrl;
                $wpruFields['destinationUrl'] = $wpruRow->destinationUrl;
            }

            return $wpruFields;
        } else {

            return false;
        }
    }

    public static function wpruCreateTable() {
        global $wpdb;
        $wpruSQL  = "CREATE TABLE kau_wp_redirects_url (id BIGINT(25) PRIMARY KEY AUTO_INCREMENT,name TEXT,requestUrl TEXT, destinationUrl TEXT)";
        $wpdb->query($wpruSQL);
    }

    public static function checkWpruTable() {
        global $wpdb;
        $wpruSQL = "SHOW TABLES LIKE 'kau_wp_redirects_url'";
        $result = $wpdb->query($wpruSQL);
        if ($result != 1) {
            self::wpruCreateTable();
        }
    }

    public static function wpruGetAll() {
        global $wpdb;
        self::checkWpruTable();

        $wpruSQL = "SELECT * FROM kau_wp_redirects_url ORDER by id ASC";
        
        if ($wpdb->query($wpruSQL)) {
            $wpruId = array();
            foreach ($wpdb->get_results($wpruSQL) as $wpruRow) {
                $wpruId[] = $wpruRow->id;
            }
            return $wpruId;
        } else {

            return false;
        }
    }

   

}
