<?php
//Hook Widget
add_action( 'widgets_init', 'google_ads_master_widget_ads' );
//Register Widget
function google_ads_master_widget_ads() {
register_widget( 'google_ads_master_widget_ads' );
}

class google_ads_master_widget_ads extends WP_Widget {
	function google_ads_master_widget_ads() {
	$widget_ops = array( 'classname' => 'Google Ads Master', 'description' => __('Google Ads Master for wordpress is the professional plugin you need to generate income with your website. ', 'google_ads_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'google_ads_master_widget_ads' );
	$this->WP_Widget( 'google_ads_master_widget_ads', __('Google Ads Master', 'google_ads_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$google_ads_title = isset( $instance['google_ads_title'] ) ? $instance['google_ads_title'] :false;
		$google_ads_title_new = isset( $instance['google_ads_title_new'] ) ? $instance['google_ads_title_new'] :false;
		$googleadsspacer ="'";
		$show_googleads = isset( $instance['show_googleads'] ) ? $instance['show_googleads'] :false;
		$googleads_code = $instance['googleads_code'];
		$google_code_align = $instance['google_code_align'];
		echo $before_widget;
		
		// Display the widget title
	if ( $google_ads_title ){
		if (empty ($google_ads_title_new)){
			if(is_multisite()){
			$google_ads_title_new = get_site_option('google_ads_master_name');
			}
			else{
			$google_ads_title_new = get_option('google_ads_master_name');
			}
		echo $before_title . $google_ads_title_new . $after_title;
		}
		else{
		echo $before_title . $google_ads_title_new . $after_title;
		}
	}
	else{
	}
	//Prepare Google Ads Alignment
	if (empty($google_code_align)){
	$google_code_align = 'style="float:left;"';
	}
	if ($google_code_align == "left"){
	$google_code_align = 'style="float:left;"';
	}
	if ($google_code_align == "right"){
	$google_code_align = 'style="float:right;"';
	}
	if ($google_code_align == "center"){
	$google_code_align = 'style="text-align:center;"';
	}
	//Display Google Ads
	if ( $show_googleads ){
		echo '<div '.$google_code_align.'>' .
		$googleads_code .
		'</div>';
	}
	else{
	}
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['google_ads_title'] = strip_tags( $new_instance['google_ads_title'] );
		$instance['google_ads_title_new'] = $new_instance['google_ads_title_new'];
		$instance['show_googleads'] = $new_instance['show_googleads'];
		$instance['googleads_code'] = $new_instance['googleads_code'];
		$instance['google_code_align'] = $new_instance['google_code_align'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'google_ads_title_new' => __('Google Ads Master', 'google_ads_master'), 'google_ads_title' => true, 'google_ads_title_new' => false, 'show_googleads' => false, 'googleads_code' => false, 'google_code_align' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['google_ads_title'], true ); ?> id="<?php echo $this->get_field_id( 'google_ads_title' ); ?>" name="<?php echo $this->get_field_name( 'google_ads_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'google_ads_title' ); ?>"><b><?php _e('Display Widget Title', 'google_ads_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'google_ads_title_new' ); ?>"><?php _e('Change Title:', 'google_ads_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'google_ads_title_new' ); ?>" name="<?php echo $this->get_field_name( 'google_ads_title_new' ); ?>" value="<?php echo $instance['google_ads_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_googleads'], true ); ?> id="<?php echo $this->get_field_id( 'show_googleads' ); ?>" name="<?php echo $this->get_field_name( 'show_googleads' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_googleads' ); ?>"><b><?php _e('Display Google Ads', 'google_ads_master'); ?></b></label>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'googleads_code' ); ?>"><?php _e('insert Google Ad Code:', 'google_ads_master'); ?></label></br>
	<textarea cols="35" rows="5" id="<?php echo $this->get_field_id( 'googleads_code' ); ?>" name="<?php echo $this->get_field_name( 'googleads_code' ); ?>" ><?php echo stripslashes ($instance['googleads_code']); ?></textarea>
	<div class="description">Copy and Paste your google ad script code from Google AdSense website.</div>
	</p>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<label for="<?php echo $this->get_field_id( 'google_code_align' ); ?>"><b><?php _e('Google Ad Align', 'google_ads_master'); ?></label></b></br>
	<input id="<?php echo $this->get_field_id( 'google_code_align' ); ?>" name="<?php echo $this->get_field_name( 'google_code_align' ); ?>" value="<?php echo $instance['google_code_align']; ?>" style="width:auto;" />
	<div class="description">Special option for theme sidebars, but can be used on other widget theme locations if you need to align the google ad.</div>
	<div class="description">Available options are: <b>left</b>, <b>center</b> and <b>right</b></div>
	<div class="description">if empty or blank, left alignment is assumed.</div>
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b><?php echo get_option('google_ads_master_name'); ?> Website</b>
	</p>
	<p><a class="button-secondary" href="http://wordpress.techgasp.com/google-ads-master/" target="_blank" title="<?php echo get_option('google_ads_master_name'); ?> Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/google-ads-master-documentation/" target="_blank" title="<?php echo get_option('google_ads_master_name'); ?> Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.org/plugins/google-ads-master/" target="_blank" title="<?php echo get_option('google_ads_master_name'); ?> Wordpress">RATE US *****</a></p>
	<?php
	}
 }
?>