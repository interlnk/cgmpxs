<?php
/*
Plugin Name: cgmpx
Plugin URI: 
Description: cgm pix is a photoblog plugin intended for use in webmorials. It is intended to be used as part of a larger suite of cgm* memorial plugins.

	This plugin scans all media posted by authors and assembles them into a gallery, which can be re-displayed in several ways.
Version: 0.1
Author: Automattic
Author URI: http://cameronroberts.ca/
*/

/*
Code Plan:
	this will be a gallery app that works with wordpress's internal media management system.

	Create a table to identify each piece of media, and allow for it to be captioned/titled etc.

	table cgmpx_pic(
              ID int auto_increment
              cgmpx_path varchar(256)  //path used to identify the file
             );

	table cgmpx_meta(
		cgmpx_pic_ID int,
                cgmpx_title varchar(256),
                cgmpx_caption text,
                cgmpx_active tinyint
                cgmpx_date datetime,
                cgmpx_user_id int
	) primary key ONE_PER(cgpx_pic_ID, cgmpx_active);


	look for a wp function that can scan/return all the media in the library, if it returns the full image path also, use it.  Otherwise write code that will recurse over the wordpress subdirectory and return all the images. 

	do selects to see if any of the image paths do not exist in the db, if they don't insert them. 

	code a slideshow/browse page that allows the user to browse all wordpress media.  

	Feature, allow user to "tie" a post to an image. 
		Use an extra post field.

		create a function, called from the view-post template, that checks that field and displays the relevant image, with title/caption.



*/



define('CGMPX_VERSION', '0.1');

// If you hardcode a WP.com API key here, all key config screens will be hidden
if ( defined('WPCOM_API_KEY') )
	$wpcom_api_key = constant('WPCOM_API_KEY');
else
	$wpcom_api_key = '';

function cgmpx_init() {
	/*global $wpcom_api_key, $cgmpx_api_host, $cgmpx_api_port;

	if ( $wpcom_api_key )
		$cgmpx_api_host = $wpcom_api_key . '.rest.cgmpx.com';
	else
		$cgmpx_api_host = get_option('wordpress_api_key') . '.rest.cgmpx.com';

	$cgmpx_api_port = 80;
	add_action('admin_menu', 'cgmpx_config_page');
	add_action('admin_menu', 'cgmpx_stats_page');
	cgmpx_admin_warnings(); */
}
//add_action('init', 'cgmpx_init');

function cgmpx_admin_init() {
/*	if ( function_exists( 'get_plugin_page_hook' ) )
		$hook = get_plugin_page_hook( 'cgmpx-stats-display', 'index.php' );
	else
		$hook = 'dashboard_page_cgmpx-stats-display';
	add_action('admin_head-'.$hook, 'cgmpx_stats_script');
*/
}
//add_action('admin_init', 'cgmpx_admin_init');

if ( !function_exists('wp_nonce_field') ) {
	function cgmpx_nonce_field($action = -1) { return; }
	$cgmpx_nonce = -1;
} else {
	function cgmpx_nonce_field($action = -1) { return wp_nonce_field($action); }
	$cgmpx_nonce = 'cgmpx-update-key';
}

if ( !function_exists('number_format_i18n') ) {
	function number_format_i18n( $number, $decimals = null ) { return number_format( $number, $decimals ); }
}

function cgmpx_config_page() {
/*	if ( function_exists('add_submenu_page') )
		add_submenu_page('plugins.php', __('Akismet Configuration'), __('Akismet Configuration'), 'manage_options', 'cgmpx-key-config', 'cgmpx_conf');
*/
}

?>
