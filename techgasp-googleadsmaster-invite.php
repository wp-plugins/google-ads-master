<?php
// HOOKS
function techgasp_googleadsmaster_notice() {
	global $current_user;
	global $pagenow;
	$user_id = $current_user->ID;
/* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'techgasp_googleadsmaster_notice') ) {
		parse_str($_SERVER['QUERY_STRING'], $params);
		if ( $pagenow == 'plugins.php' ) {
			echo '<div class="updated">';
		printf (__('<p><b>Congratulations!</b> TechGasp Lite Plugin Installation Complete.</p>'));
		printf (__('<p>If you need help don\'t be shy, just issue a support ticket <a class="button" href="http://wordpress.techgasp.com/support/" target="_blank" title="Support">Technical Support</a> | <a class="button" href="http://wordpress.techgasp.com/category/support/" target="_blank" title="Documentation">Documentation</a> | <a class="button" href="%s">Hide Notice</a></p>'), '?techgasp_googleadsmaster_ignore=0');
		printf (__('<p><b>IMPORTANT!!!</b> please take a minute to support  and give us a good rating in Wordpress Plugin Directory</b> <a class="button-primary" href="http://wordpress.org/plugins/google-ads-master/" target="_blank" title="Please Rate Us"><b>RATE US</b></a></p>'));
			echo "</div>";
		}
	}
}
add_action( 'admin_notices', 'techgasp_googleadsmaster_notice' );

function techgasp_googleadsmaster_ignore() {
    global $current_user;
		$user_id = $current_user->ID;
		/* If user clicks to ignore the notice, add that to their user meta */
		if ( isset($_GET['techgasp_googleadsmaster_ignore']) && '0' == $_GET['techgasp_googleadsmaster_ignore'] ) {
		add_user_meta($user_id, 'techgasp_googleadsmaster_notice', 'true', true);
		}
}
add_action('admin_init', 'techgasp_googleadsmaster_ignore');
?>