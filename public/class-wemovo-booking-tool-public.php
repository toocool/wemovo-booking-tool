<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.wemovo.com
 * @since      1.0.0
 *
 * @package    Wemovo_Booking_Tool
 * @subpackage Wemovo_Booking_Tool/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wemovo_Booking_Tool
 * @subpackage Wemovo_Booking_Tool/public
 * @author     Shpetim Islami <shpetim@wemovo.com>
 */
class Wemovo_Booking_Tool_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( 'select2style', plugin_dir_url( __FILE__ ) . 'css/select2.min.css', array(  ), $this->version, false );
		wp_enqueue_style( 'datetimepickerstyle', plugin_dir_url( __FILE__ ) . 'css/datetimepicker.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wemovo-booking-tool-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'select2', plugin_dir_url( __FILE__ ) . 'js/select2.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'moment', plugin_dir_url( __FILE__ ) . 'js/moment.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'datetimepicker', plugin_dir_url( __FILE__ ) . 'js/datetimepicker.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wemovo-booking-tool-public.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * This function is the search form shortcode.
	 *
	 */
	public function wemovo_search_form(){
		require('partials/wemovo-booking-tool-public-display.php');
	}



}
