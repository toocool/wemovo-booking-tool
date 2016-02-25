<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.wemovo.com
 * @since      1.0.0
 *
 * @package    Wemovo_Booking_Tool
 * @subpackage Wemovo_Booking_Tool/admin/partials
 */
 $options = get_option($this->plugin_name);
 $partner_token = $options['partner_token'];
 $api_url = $options['api_url'];
 $redirect_url = $options['redirect_url'];
 $active = $options['active'];

?>
<h1>Wemovo plugin settings</h1>
<hr/>

<table width="100%">
    <tr>
        <td class="wbt-block">
            <div class="information_text">
                <p>To include the Wemovo booking tool into your pages use this shortcode: <strong>[wemovo_search_form]</strong></p>
                <p>or your can place the booking tool into your sidebar by drag-and-droping the widget called "Wemovo booking tool"</p>
            </div>

            <form method="post" name="wbt_options" action="options.php">
                <?php settings_fields($this->plugin_name); ?>
                <p><strong>Status:</strong>
                    <?php echo ($active == 1) ? '<span style="color: #05D805;">Active</span>' : '<span style="color: red;">Not active</span>'; ?>
                </p>
                <strong>Your API key provided by Wemovo:</strong><br/>
                    <div style="width:40%; float: left;">
                        <input type="text" id="partner_token"  name="<?php echo $this->plugin_name; ?>[partner_token]" style="width:100%;padding: 3px;" value="<?php if(!empty($partner_token)) echo $partner_token ?>" />
                    </div>
                        <input type="hidden" id="api_url" name="<?php echo $this->plugin_name; ?>[api_url]"  value="<?php if(!empty($api_url)) echo $api_url ?>" />
                        <input type="hidden" id="redirect_url" name="<?php echo $this->plugin_name; ?>[redirect_url]"  value="<?php if(!empty($redirect_url)) echo $redirect_url ?>" />
                        <input type="hidden" id="active" name="<?php echo $this->plugin_name; ?>[active]"  value="<?php if(!empty($active)) echo $active ?>" />
                    <div style="width:60%; display: inline-block">
                        <button  class="button button-default" id="activate" >Check</button>
                    </div>

                    <br/><br/>
                <?php submit_button('Save changes', 'primary','submit', FALSE); ?>
            </form>

        </td>
        <td style="vertical-align: top;">
            <img style="margin-left: 65px;" src="<?php echo plugins_url( 'img/wemovo_logo_main.png', dirname(__FILE__) ) ?>" />
        </td>
    </tr>
    <tr>
        <td>
            <div class="updated error hide" style="margin: 5px 0px 2px">
                <p>The API key you entered in the field above is not valid, please try again</p>
            </div>
            <div class="updated success hide" style="margin: 5px 0px 2px">
                <p>The API key you entered is successfully validated, click the <strong>save changes</strong> button to save your settings</p>
            </div>
        </td>
        <td>
            <!-- available space under the logo, could be used in the future -->
        </td>
    </tr>
</table>

<script type="text/javascript">
//Make an API call to GDS and check if token is valid
jQuery(document).ready(function($) {
    jQuery('input[type="submit"]').prop('disabled', true);
    jQuery("#activate").click(function(e){
        var partner_token = jQuery('#partner_token').val();
        e.preventDefault();
            jQuery.get( "/wordpress/wp-content/plugins/wemovo-booking-tool/public/api/bus_op_urls.php", { token: partner_token })
              .done(function(data) {
                  console.log(data);

                  if(typeof data.api_url === "undefined" || typeof data.api_url === "undefined"){
                      jQuery("#api_url").val('');
                      jQuery("#redirect_url").val('');
                      jQuery("#active").val(0);

                      jQuery(".error").removeClass('hide');
                      jQuery(".success").addClass('hide');
                      jQuery('input[type="submit"]').prop('disabled', true);
                  }
                  else{
                      jQuery("#api_url").val(data.api_url);
                      jQuery("#redirect_url").val(data.redirect_url);
                      jQuery("#active").val(1);

                      jQuery(".error").addClass('hide');
                      jQuery(".success").removeClass('hide');
                      jQuery('input[type="submit"]').prop('disabled', false);

                  }

              })
              .fail(function() {
                  alert( "Server error please contact Wemovo GmbH" );
              })
    });
});
</script>
