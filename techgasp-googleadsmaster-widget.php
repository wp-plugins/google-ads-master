<?php
//Load Shortcode Framework

//Hook Widget
add_action( 'widgets_init', 'techgasp_googleadsmaster_widget' );
//Register Widget
function techgasp_googleadsmaster_widget() {
register_widget( 'techgasp_googleadsmaster_widget' );
}

class techgasp_googleadsmaster_widget extends WP_Widget {
	function techgasp_googleadsmaster_widget() {
	$widget_ops = array( 'classname' => 'Google Ads Master', 'description' => __('Google Ads Master for wordpress is the professional plugin you need to generate income with your website. ', 'Google Ads Master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'techgasp_googleadsmaster_widget' );
	$this->WP_Widget( 'techgasp_googleadsmaster_widget', __('Google Ads Master', 'google ads master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$name = "Google Ads Master";
		$title = isset( $instance['title'] ) ? $instance['title'] :false;
		$googleadsspacer ="'";
		$show_googleads = isset( $instance['show_googleads'] ) ? $instance['show_googleads'] :false;
		$googleads_code = $instance['googleads_code'];
		echo $before_widget;
		
		// Display the widget title
	if ( $title )
		echo $before_title . $name . $after_title;
	//Display Google Ads
	if ( $show_googleads )
		echo $googleads_code;
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_googleads'] = $new_instance['show_googleads'];
		$instance['googleads_code'] = $new_instance['googleads_code'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'name' => __('Google Ads Master', 'google ads master'), 'title' => true, 'show_googleads' => false, 'googleads_code' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<b>Check the buttons to be displayed:</b>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_googleads'], true ); ?> id="<?php echo $this->get_field_id( 'show_googleads' ); ?>" name="<?php echo $this->get_field_name( 'show_googleads' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_googleads' ); ?>"><b><?php _e('Display Google Ads', 'google ads master'); ?></b></label>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'googleads_code' ); ?>"><?php _e('insert Google Ad Code:', 'google ads master'); ?></label></br>
	<textarea cols="40" rows="5" id="<?php echo $this->get_field_id( 'googleads_code' ); ?>" name="<?php echo $this->get_field_name( 'googleads_code' ); ?>" ><?php echo stripslashes ($instance['googleads_code']); ?></textarea>
	</p>
	<p>Copy and Paste your google ad script code from Google AdSense website.</p>
	<hr>
	<p>You have <b>Google Ads Master Lite Version</b>. Advanced Version Contains: Display or hide Widget Title. Display or hide Google Adsense ads. Insert desired google ad (allows ads styling). Shortcode Framework, publish widget inside pages and posts.</p>
	<p><a class="button-primary" href="http://wordpress.techgasp.com/google-ads-master/" target="_blank" title="Google Ads Master Advanced Version">Google Ads Master Advanced Version</a></p>
	<?php
	}
 }
?>