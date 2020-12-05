<div class="wpru-container" style="padding:60px;">

    <div class="wpru-heading">
        <h1><?php esc_html_e('WP Redirect URL', 'wp-redirect-url'); ?></h1>
    <h2><?php esc_html_e('Helps you to redirect any url anywhere as per request', 'wp-redirect-url'); ?></h2>
    </div>

    <div class="wpru-alert">
        <?php
        wpru_settings::wpruSubmission($_POST);
        ?>        
    </div>

    <form action="" method="post">
        <input type="hidden" name="wpru_settings_submit" value="true">

        <div class="kau-action-name-row">
            <div class="wpru-name"><?php esc_html_e('Name', 'wp-redirect-url'); ?></div> 
            <div class="wpru-ru"><?php esc_html_e('Request url', 'wp-redirect-url'); ?></div>
            <div class="wpru-du"><?php esc_html_e('Destination url', 'wp-redirect-url'); ?></div>  
            <div class="wpru-action"><?php esc_html_e('Action', 'wp-redirect-url'); ?></div>
        </div>

        <?php
        $custom_redirects = wpru_settings::wpruGetAll();

        if ($custom_redirects) {
            foreach (wpru_settings::wpruGetAll() as $wpruId) {

                $fields = wpru_settings::wpruGetFields($wpruId);
                ?>

                <div id="wpruFields<?php echo $wpruId; ?>" class="kau-action-field-row">
                    <div class="wpru-name"><input type="text" class="form__field" placeholder="Name of Redirection" name="name[]" value="<?php echo $fields['name']; ?>"/></div> 
                    <div class="wpru-ru-field"><input type="text" class="form__field" placeholder="input Your Request url" name="requestUrl[]" value="<?php echo $fields['requestUrl']; ?>"/></div>
                    <div class="wpru-du-field"><input type="text" placeholder="Your Destination url Goes Here" name="destinationUrl[]" class="form__field" value="<?php echo $fields['destinationUrl']; ?>"/></div>  
                    <div class="wpru-action-field"><a  class="delete-wpru" href="#" data-id="<?php echo $wpruId; ?>"><button type="button" class="block">Remove URL</button></a></div>
                </div>
        
                

                <?php
            } 
        }
        ?>

        <div id="addWPRU" class="kau-wpru-btn">
            <div class="kau-wpru-submit"><a><button type="submit" class="block-submit" ><?php esc_html_e('Save Settings', 'wp-redirect-url'); ?> </button></a></div> 
            <div class="wpru-ex"></div>
            <div class="kau-wpru-add"><a id="addwpruRow" class="" href="#"><button type="button" class="block-remove" ><?php esc_html_e('Add Request', 'wp-redirect-url'); ?></button></a></div> 
            
        </div>

        
    </form>

</div>