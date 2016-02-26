<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.wemovo.com
 * @since      1.0.0
 *
 * @package    Wemovo_Booking_Tool
 * @subpackage Wemovo_Booking_Tool/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wemovo_Booking_Tool
 * @subpackage Wemovo_Booking_Tool/admin
 * @author     Shpetim Islami <shpetim@wemovo.com>
 */
class Wemovo_Booking_Tool_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wemovo-booking-tool-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wemovo-booking-tool-admin.js', array( 'jquery' ), $this->version, false );
	}

	public function add_plugin_admin_menu() {

	    add_menu_page( 'Wemovo booking tool', 'Wemovo BT', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'), plugins_url( 'admin/img/wemovo-logo-admin.jpg', dirname(__FILE__) ) );
	}

	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'admin.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}
	public function display_plugin_setup_page() {
		include_once( 'partials/wemovo-booking-tool-admin-display.php' );
	}
	public function validate($input) {
	    $valid = array();

	    //Cleanup
	    $valid['partner_token'] = (isset($input['partner_token']) && !empty($input['partner_token'])) ?  ($input['partner_token']) : '';
		$valid['api_url'] = (isset($input['api_url']) && !empty($input['api_url'])) ?  ($input['api_url']) : '';
		$valid['redirect_url'] = (isset($input['redirect_url']) && !empty($input['redirect_url'])) ?  ($input['redirect_url']) : '';
		$valid['active'] = (isset($input['active']) && !empty($input['active'])) ?  1 : 0;

		$valid['facebook_id'] = (isset($input['facebook_id']) && !empty($input['facebook_id'])) ?  ($input['facebook_id']) : '';
		$valid['analytics_id'] = (isset($input['analytics_id']) && !empty($input['analytics_id'])) ?  ($input['analytics_id']) : '';
		$valid['mailchimp_id'] = (isset($input['mailchimp_id']) && !empty($input['mailchimp_id'])) ?  ($input['mailchimp_id']) : '';

	    return $valid;
 	}
	public function options_update() {
   		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

	/**
	 * Create our custom widgets
	 *
	 * @since    1.0.0
	 */
	public function register_widgets() {
	    register_widget( 'Search_form_Widget' );
	}

}
