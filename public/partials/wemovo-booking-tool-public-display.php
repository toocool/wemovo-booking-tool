<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://www.wemovo.com
 * @since      1.0.0
 *
 * @package    Wemovo_Booking_Tool
 * @subpackage Wemovo_Booking_Tool/public/partials
 */

 //get the redirect url from plugin
 $options = get_option('wemovo-booking-tool');
 $redirect_url = $options['redirect_url'];
 $active = $options['active'];
 $passenger_types = $options['passenger_types'];

 if($active != 1) {
     echo 'Please activate your plugin by providing the Wemovo API key';
 }else{
     //language code, default is english
    if (defined('ICL_LANGUAGE_CODE'))
        $lang = ICL_LANGUAGE_CODE;
    else
        $lang = 'en';
?>
    <form id="wemovo_search_form" target="_blank" method="GET" action="<?php echo $redirect_url.$lang ?>/search/">
        <select style="width: 100%;" name="place_from_id" id="select_place_from" class="form-control select input-sm" required="required" data-regexp="^[1-9]\d*" data-placeholder="<?php _e('Departure Station','wemovo-booking-tool') ?>"></select>
        <select  style="width:100%" name="place_to_id" id="select_place_to" data-placeholder="<?php _e('Arrival Station','wemovo-booking-tool') ?>" ></select>
        <div class="form-group">
            <input type="text" class="form-control" name="date_from" id="date_from"  placeholder="<?php echo date("d/m/Y"); ?>" value="<?php echo date("d/m/Y"); ?>" />
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="date_to" id="date_to" placeholder="<?php _e('Return (optional)','wemovo-booking-tool') ?>" />
        </div>
        <select name="passenger_count" id="passenger_count" class="form-control select select-default"
                        style="width: 100%">
                    <option value="1">1 <?php _e('passenger','wemovo-booking-tool') ?></option>
                    <option value="2">2 <?php _e('passengers','wemovo-booking-tool') ?></option>
                    <option value="3">3 <?php _e('passengers','wemovo-booking-tool') ?></option>
                    <option value="4">4 <?php _e('passengers','wemovo-booking-tool') ?></option>
                    <option value="5">5 <?php _e('passengers','wemovo-booking-tool') ?></option>
                </select>
        <div class="form-group">

            <?php
            foreach ($passenger_types as $passenger_type) {
                $splited_types = explode('|',$passenger_type );

                echo '<div style="width:45%;float:left;margin: 5px 5px;">
                        <div style="width: 50%; float:left; padding-top: 10px;"><label style="vertical-align: middle">'.$splited_types[1].'</label></div>
                        <div style="width: 40%; float:left"><input type="number" max="5" min="0" id="passenger_type_'.$splited_types[0].'" name="passenger_type_'.$splited_types[0].'" ></div>
                        </div>';
            }
            ?>
        </div>

        <input type="checkbox" id="open_return" name="open_return"/> <small><?php _e('Open return (validity 6 month)','wemovo-booking-tool') ?></small>
        <br/>
        <button type="submit"><?php _e('Search','wemovo-booking-tool')?></button>
    </form>
<?php
}
?>
