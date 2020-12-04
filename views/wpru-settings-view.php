<div class="wpru-container" style="padding:60px;">

    <div class="wpru-heading">
        <h1>WP Redirect URL</h1>
    <h2>Helps you to redirect any url anywhere as per request</h2>
    </div>

    <div class="wpru-alert">
               
    </div>

    <form action="" method="post">
        <input type="hidden" name="wpru_settings_submit" value="true">

        <div class="kau-action-name-row">
            <div class="wpru-name">Name</div> 
            <div class="wpru-ru">Request url</div>
            <div class="wpru-du">Destination url</div>  
            <div class="wpru-action">Action</div>
        </div>

       

                <div id="wpruFields" class="kau-action-field-row">
                    <div class="wpru-name"><input type="text" class="form__field" placeholder="Name of Redirection" name="name[]" /></div> 
                    <div class="wpru-ru-field"><input type="text" class="form__field" placeholder="input Your Request url" name="requestUrl[]" /></div>
                    <div class="wpru-du-field"><input type="text" placeholder="Your Destination url Goes Here" name="destinationUrl[]" class="form__field" /></div>  
                    <div class="wpru-action-field"><a  class="delete-wpru" href="#" ><button type="button" class="block">Remove URL</button></a></div>
                </div>
        
                

       

        <div id="addWPRU" class="kau-wpru-btn">
            <div class="kau-wpru-submit"><button type="submit" class="block-submit" >Save Settings </button></div> 
            <div class="wpru-ex"></div>
            <div class="kau-wpru-add"><button type="button" class="block-remove" >Add Request</button></div> 
            
        </div>

        
    </form>

</div>    
