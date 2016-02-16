<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.wemovo.com
 * @since             1.0.0
 * @package           Wemovo_Booking_Tool
 *
 * @wordpress-plugin
 * Plugin Name:       Wemovo booking tool
 * Plugin URI:        www.wemovo.com
 * Description:       Wemovo booking tool to include the search form in your web site
 * Version:           1.0.0
 * Author:            Shpetim Islami
 * Author URI:        http://www.wemovo.com
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wemovo-booking-tool
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wemovo-booking-tool-activator.php
 */
function activate_wemovo_booking_tool() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wemovo-booking-tool-activator.php';
	Wemovo_Booking_Tool_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wemovo-booking-tool-deactivator.php
 */
function deactivate_wemovo_booking_tool() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wemovo-booking-tool-deactivator.php';
	Wemovo_Booking_Tool_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wemovo_booking_tool' );
register_deactivation_hook( __FILE__, 'deactivate_wemovo_booking_tool' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wemovo-booking-tool.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wemovo_booking_tool() {

	$plugin = new Wemovo_Booking_Tool();
	$plugin->run();

}
run_wemovo_booking_tool();
