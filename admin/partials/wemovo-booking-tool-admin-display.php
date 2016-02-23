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
 $partner_id = $options['partner_id'];
 $partner_token = $options['partner_token'];



?>
<h1>Wemovo plugin settings</h1>
<hr/>

<table width="100%">
    <tr>
        <td class="wbt-block">

            <p>To include the Wemovo booking tool into your pages use this shortcode: <strong>[wemovo_search_form]</strong></p>
            <p>or your can place the booking tool into your sidebar by drag-and-droping the widget called "Wemovo booking tool"</p>
            <br/>
            <hr/>
            <form method="post" name="wbt_options" action="options.php">
                <?php settings_fields($this->plugin_name); ?>
                <p><strong>Your partner ID provided by Wemovo:</strong><br/>
                    <input type="text" name="<?php echo $this->plugin_name; ?>[partner_id]" style="width:100%;" value="<?php if(!empty($partner_id)) echo $partner_id ?>" />
                </p>
                <p><strong>Your Token provided by Wemovo:</strong><br/>
                    <input type="text" name="<?php echo $this->plugin_name; ?>[partner_token]" style="width:100%;" value="<?php if(!empty($partner_token)) echo $partner_token ?>" />
                </p>
                <p style="display: none;"><strong>Additional CSS:</strong><br/>
                    <textarea  rows="9"  style="width:100%;" ></textarea>
                </p>
                <p>
 <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>                </p>
            </form>
        </td>
        <td style="vertical-align: top;">
            <img style="margin-left: 65px;" src="<?php echo plugins_url( 'img/wemovo_logo_main.png', dirname(__FILE__) ) ?>" />
        </td>
    </tr>
</table>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
