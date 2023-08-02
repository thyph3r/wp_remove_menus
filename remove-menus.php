<?php
/**
 * Remove Menus
 *
 * Plugin Name: Remove Menus by Ecoweb
 * Description: Avoid problems by removing specific menus for non-admin users.
 * Version:     0.9
 * Author:      Othon Man
 * Author URI:  https://ecoweb.gr
 * License:     GPLv3 or later
 * License URI: https://www.gnu.org/licenses/fdl-1.3.html
 * Text Domain: Ecoweb Remove Menus
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.0 or later
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}

//function to hide left bar menus from shop managers
function hideUnncessaryMenuItems(){
	if (current_user_can('shop_manager') ) {
     
        remove_menu_page( 'edit.php' );
        remove_menu_page( 'upload.php' ); 
        remove_menu_page( 'edit.php?post_type=page' );
        remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'edit.php?post_type=static_block' );
        remove_menu_page( 'wpcf7' );		
	remove_menu_page( 'woocommerce-marketing' );
        remove_menu_page( 'users.php' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'vc-welcome' );
        remove_menu_page( 'wpseo_workouts' );
        remove_submenu_page( 'index.php',  'statcounter');
	
	}
    }
    add_action( 'admin_menu', 'hideUnncessaryMenuItems');


//function to hide top bar menus from shop managers
function wps_admin_bar() {
	if (current_user_can('shop_manager') ) {
    global $wp_admin_bar;
    $wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('customize');
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('new-content');
	$wp_admin_bar->remove_node('widgets');
	$wp_admin_bar->remove_node('menus');
	$wp_admin_bar->remove_node('edit');
	$wp_admin_bar->remove_node('delete-cache');
	$wp_admin_bar->remove_node('vc_inline-admin-bar-link');

	}}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );
