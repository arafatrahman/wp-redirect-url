<div class="wpru-container" style="padding:60px;">

    <div class="wpru-heading">
        <h1><?php esc_html_e('WP Redirect URL', 'wp-redirect-url'); ?></h1>
        <h3><?php esc_html_e('Now you can easily redirect any wp url and manage 301 redirects ', 'wp-redirect-url'); ?></h3>
    </div>

    <div class="wpru-alert">
        <?php
        WPRU_settings::wpru_submission($_POST);
        ?>        
    </div>

    <form action="" method="post">
        <input type="hidden" name="wpru-settings-submit" value="true">

        <div class="kau-action-name-row">
            <div class="wpru-name"><?php esc_html_e('Name', 'wp-redirect-url'); ?></div> 
            <div class="wpru-ru"><?php esc_html_e('Request url', 'wp-redirect-url'); ?></div>
            <div class="wpru-du"><?php esc_html_e('Destination url', 'wp-redirect-url'); ?></div>  
            <div class="wpru-action"><?php esc_html_e('Action', 'wp-redirect-url'); ?></div>
        </div>

        <?php
        $custom_redirects = WPRU_settings::wpru_get_all();

        if ($custom_redirects) {
            foreach (WPRU_settings::wpru_get_all() as $wpruId) {

                $wpruFields = WPRU_settings::wpru_get_fields($wpruId);
               
                ?>

                <div id="wpruFields<?php echo $wpruId; ?>" class="kau-action-field-row">
                    <div class="wpru-name"><input type="text" placeholder="Name of Redirection" name="wpru-redirect-name[]"  value="<?php echo $wpruFields['wpru-redirect-name']; ?>"/></div> 
                    <div class="wpru-ru-field"><input type="text" placeholder="input Your Request url" name="wpru-request-url[]" required value="<?php echo $wpruFields['wpru-request-url']; ?>"/></div>
                    <div class="wpru-du-field"><input type="text" placeholder="Your Destination url Goes Here" name="wpru-destination-url[]" required value="<?php echo $wpruFields['wpru-destination-url']; ?>"/></div>  
                    <div class="wpru-action-field"><a  class="delete-wpru" href="#" data-id="<?php echo $wpruId; ?>"><button type="button" class="block">Remove URL</button></a></div>
                </div>



                <?php
            }
        } else {
            ?>

            <div class="kau-no-request">
                <div class="notice notice-warning is-dismissible">
                    <p class=" text-success "><strong> <?php esc_html_e('You dont have any request right now!','wp-redirect-url') ?> </strong> <?php esc_html_e('You can redirection request by click','wp-redirect-url') ?>  <strong><?php esc_html_e('ADD REQUEST','wp-redirect-url') ?> </strong> <?php esc_html_e('button','wp-redirect-url') ?> </p>
                </div>
            </div>

        <?php }
        ?>

        <div id="addWPRU" class="kau-wpru-btn">
            <div class="kau-wpru-submit"><a><button type="submit" class="block-submit" ><?php esc_html_e('Save Settings', 'wp-redirect-url'); ?> </button></a></div> 
            <div class="wpru-ex"></div>
            <div class="kau-wpru-add"><a id="addwpruRow" class="" href="#"><button type="button" class="block-remove" ><?php esc_html_e('Add Request', 'wp-redirect-url'); ?></button></a></div> 

        </div>


    </form>

</div>