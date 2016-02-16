<?php
/**
 * Our main search form widget
 *
 *
 * @package    wemovo-search-form
 * @subpackage Wemovo_Booking_Tool/widget
 * @author     Shpetim Islami <shpetim@wemovo.com>
 */
class Search_form_Widget extends WP_Widget {

 	/**
	 * Constructor for the widget
	 *
	 * @since    1.1.0
	 */
    public function __construct() {
        parent::__construct(
            'wemovo-search-form', // Base ID
            'Wemovo Search Form', // Name
            array(
                'description' => __( 'Add the wemovo search form to the sidebar', 'wemovo-search-form' )
            ) // Args
        );
    }

    /**
	 * Admin form in the widget area
	 *
	 * @since    1.0.0
	 */
    public function form( $instance ) {
    	$title = strip_tags($instance['title']);
    	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

    	<?php
    }

	/**
	 * Update function for the widget
	 *
	 * @since    1.0.0
	 */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }


	/**
	 * Outputs the widget with the selected settings
	 *
	 * @since    1.0.0
	 */
    public function widget( $args, $instance ) {

    	extract($args);
    	$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/*
	    * The content of the widget
	    */
        echo $before_widget;
        if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		?>
		<div class="search-form-widget">
			<?php
                require('/../public/partials/wemovo-booking-tool-public-display.php');
             ?>
		</div>

		<?php

		echo $after_widget;
    }
}
?>
