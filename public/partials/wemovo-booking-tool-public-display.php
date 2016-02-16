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

if (defined('ICL_LANGUAGE_CODE'))
    $lang = ICL_LANGUAGE_CODE;
else
    $lang = 'en';

?>
<form id="wemovo_search_form" method="GET" action="//book.eurolines.ch/<?php echo $lang ?>/search/">
    <select style="width: 100%;" name="place_from_id" id="select_place_from" class="form-control select input-sm" required="required" data-regexp="^[1-9]\d*" data-placeholder="<?php _e('Departure Station','wemovo-booking-tool') ?>"></select>
    <select  style="width:100%" name="place_to_id" id="select_place_to" data-placeholder="<?php _e('Arrival Station','wemovo-booking-tool') ?>" ></select>
    <div class="form-group">
        <input type="text" class="form-control" name="date_from" id="date_from"  value="09/02/2016" />
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
    <input type="checkbox" id="open_return" name="open_return"/> <small><?php _e('Open return (validity 6 month)','wemovo-booking-tool') ?></small>
    <br/>
    <button type="submit"><?php _e('Search','wemovo-booking-tool')?></button>
</form>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
