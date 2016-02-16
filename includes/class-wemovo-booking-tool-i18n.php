<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.wemovo.com
 * @since      1.0.0
 *
 * @package    Wemovo_Booking_Tool
 * @subpackage Wemovo_Booking_Tool/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wemovo_Booking_Tool
 * @subpackage Wemovo_Booking_Tool/includes
 * @author     Shpetim Islami <shpetim@wemovo.com>
 */
class Wemovo_Booking_Tool_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wemovo-booking-tool',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
