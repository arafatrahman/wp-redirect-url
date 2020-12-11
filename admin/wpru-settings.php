<?php

class WPRU_settings {

    public static function wpru_submission($isSaved) {


        if (isset($_POST['wpru-settings-submit'])) {
            
            WPRU_settings::wpru_delete_url();
            
          
            $redirectArray = wpru_sanitize_text_field(wpru_post_value('wpru-redirect-name',$_POST));
            
            if ($redirectArray) {
                
                foreach ($redirectArray as $key => $redirectName) {
                    
                    $name = sanitize_text_field($redirectName);
                    $requestUrl = esc_url_raw(wpru_post_value('wpru-request-url',$_POST)[$key]);
                    $destinationUrl = esc_url_raw(wpru_post_value('wpru-destination-url',$_POST)[$key]);                    
                    self::wpru_update_url($name, $requestUrl, $destinationUrl);
                }
            }
            
            echo '<div class="notice notice-success is-dismissible"><p class=" text-success "><strong> Settings Saved!</strong> Your Settings Successfully Saved</p></div>';
        }
    }


    public static function wpru_delete_url() {

        global $wpdb;
        $wpruSQL = "DELETE FROM wpru_dbtable";
        $wpdb->query($wpruSQL);
    }

    public static function wpru_update_url($name, $requestUrl, $destinationUrl) {

        global $wpdb;
        $wpruSQL  = $wpdb->prepare("INSERT INTO wpru_dbtable (wpru_redirect_name, wpru_request_url, wpru_destination_url) VALUES ('%s', '%s', '%s')", array($name, $requestUrl, $destinationUrl));
        $wpdb->query($wpruSQL );
    }

    public static function wpru_get_fields($id) {

        global $wpdb;
        $wpruSQL  = $wpdb->prepare("SELECT * FROM wpru_dbtable WHERE id = '%s'", array($id));
        $getResult = $wpdb->query($wpruSQL );
        if ($getResult) {
            $wpruFields = array();
            foreach ($wpdb->get_results($wpruSQL ) as $wpruRow) {
                $wpruFields['wpru-redirect-name'] = $wpruRow->wpru_redirect_name;
                $wpruFields['wpru-request-url'] = $wpruRow->wpru_request_url;
                $wpruFields['wpru-destination-url'] = $wpruRow->wpru_destination_url;
            }

            return $wpruFields;
        } else {

            return false;
        }
    }

    public static function wpru_create_fields() {
        global $wpdb;
        $wpruSQL  = "CREATE TABLE wpru_dbtable (id BIGINT(25) PRIMARY KEY AUTO_INCREMENT,wpru_redirect_name TEXT,wpru_request_url TEXT, wpru_destination_url TEXT)";
        $wpdb->query($wpruSQL);
    }

    public static function wpru_check_table() {
        global $wpdb;
        $wpruSQL = "SHOW TABLES LIKE 'wpru_dbtable'";
        $result = $wpdb->query($wpruSQL);
        if ($result != 1) {
            self::wpru_create_fields();
        }
    }

    public static function wpru_get_all() {
        global $wpdb;
        self::wpru_check_table();

        $wpruSQL = "SELECT * FROM wpru_dbtable ORDER by id ASC";
        
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
