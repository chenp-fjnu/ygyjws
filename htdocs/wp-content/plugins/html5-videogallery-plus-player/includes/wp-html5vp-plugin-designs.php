<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package Video gallery and Player
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'wp_html5vp_register_design_page');

/**
 * Register plugin design page in admin menu
 * 
 * @package Video gallery and Player
 * @since 1.0.0
 */
function wp_html5vp_register_design_page() {
	add_submenu_page( 'edit.php?post_type='.WP_HTML5VP_POST_TYPE, __('Video Gallery Pro Designs', 'html5-videogallery-plus-player'), __('PRO Designs', 'html5-videogallery-plus-player'), 'manage_options', 'wp-html5vp-designs', 'wp_html5vp_designs_page' );
}

/**
 * Function to display plugin design HTML
 * 
 * @package Video gallery and Player
 * @since 1.0.0
 */
function wp_html5vp_designs_page() {

	$wpsisac_feed_tabs = array(
								'design-feed' 	=> __('Plugin Designs', 'html5-videogallery-plus-player'),
								'plugins-feed' 	=> __('Our Plugins', 'html5-videogallery-plus-player')
							);

	
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'design-feed';
	?>
	
	<div class="wrap wp-vgp-wrap">

		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpsisac_feed_tabs as $tab_key => $tab_val) {

				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'post_type' => WP_HTML5VP_POST_TYPE, 'page' => 'wp-html5vp-designs', 'tab' => $tab_key), admin_url('edit.php') );
			?>

			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_val; ?></a>

			<?php } ?>
		</h2>

		<div class="wp-vgp-tab-cnt-wrp">
		<?php 
			if( isset($_GET['tab']) && $_GET['tab'] == 'plugins-feed' ) {
				echo wp_html5vp_get_plugin_design( 'plugins-feed' );
			} else {
				echo wp_html5vp_get_plugin_design();
			}
		?>
		</div><!-- end .wp-vgp-tab-cnt-wrp -->

	</div><!-- end .wp-vgp-wrap -->

<?php
}

/**
 * Gets the plugin design part feed
 *
 * @package Video gallery and Player
 * @since 1.0.0
 */
function wp_html5vp_get_plugin_design( $feed_type = '' ) {
	
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'design-feed';
	$transient_key 	= 'wp_html5vp_' . $active_tab;
	
	// Feed URL
	if( $feed_type == 'plugins-feed' ) {
		$url 			= 'http://wponlinesupport.com/plugin-data-api/plugins-data.php';
		$transient_key 	= 'wpos_plugins_feed';
	} else {
		$url = 'http://wponlinesupport.com/plugin-data-api/video-gallery-and-player/video-gallery-and-player.php';
	}
	
	$cache = get_transient( $transient_key );
	
	if ( false === $cache ) {
		
		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, 172800 );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'html5-videogallery-plus-player' ) . '</div>';
		}
	}
	return $cache;
}