<?php
/*
Plugin Name:  first Plugin
Description:  Example plugin for the video tutorial series, "WordPress: Plugin Development", available at Lynda.com.
Plugin URI:   https://profiles.wordpress.org/specialk
Author:       Amrutha
Version:      1.0
Text Domain:  firstplugin
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/



// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

    exit;

}
// display the plugin settings pagE

function firstplugin_display_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;

	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">

			<?php

			// output security fields
			settings_fields( 'firstplugin_options' );

			// output setting sections
			do_settings_sections( 'firstplugin' );

			// submit button
			submit_button();

			?>

		</form>
	</div>

<?php




// add top-level administrative menu
function firstplugin_add_toplevel_menu() {

/*
add_menu_page(
string   $page_title,
string   $menu_title,
string   $capability,
string   $menu_slug,
callable $function = '',
string   $icon_url = '',
int      $position = null
)
*/

add_menu_page(
'firstplugin Settings',
'firstplugin',
'manage_options',
'firstplugin',
'firstplugin_display_settings_page',
'dashicons-admin-generic',
null
);

}
add_action( 'admin_menu', 'firstplugin_add_toplevel_menu' );