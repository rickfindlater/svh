<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add desktop menu walker */
require_once( 'library/menu-walker.php' );

/** Add off-canvas menu walker */
require_once( 'library/offcanvas-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Header image */
require_once( 'library/custom-header.php' );


//Custom post types

//**** teaser ****

function post_teaser() {
	$labels = array(
		'name'               => _x( 'Teaser', 'post type general name' ),
		'singular_name'      => _x( 'Teaser', 'post type singular name' ),
		'add_new_item'       => __( 'Add new teaser block' ),
		'edit_item'          => __( 'Edit teaser' ),
		'new_item'           => __( 'New teaser' ),
		'all_items'          => __( 'All teasers' ),
		'view_item'          => __( 'View teaser' ),
		'search_items'       => __( 'Search teaser' ),
		'not_found'          => __( 'No teaser found' ),
		'not_found_in_trash' => __( 'No teaser found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Teaser'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'The specific content type for a teaser',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'teaser', $args );
}
add_action( 'init', 'post_teaser' );

//**** single quote ****

function post_single_quote() {
	$labels = array(
		'name'               => _x( 'Single quote', 'post type general name' ),
		'singular_name'      => _x( 'Single quote', 'post type singular name' ),
		'add_new_item'       => __( 'Add new Single quote block' ),
		'edit_item'          => __( 'Edit Single quote' ),
		'new_item'           => __( 'New Single quote' ),
		'all_items'          => __( 'All Single quotes' ),
		'view_item'          => __( 'View Single quote' ),
		'search_items'       => __( 'Search Single quote' ),
		'not_found'          => __( 'No Single quote found' ),
		'not_found_in_trash' => __( 'No Single quote found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Single quote'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'The specific content type for a Single quote',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'single_quote', $args );
}
add_action( 'init', 'post_single_quote' );

//**** Full width image block ****

function post_fw_imgblk() {
	$labels = array(
		'name'               => _x( 'Full width image block', 'post type general name' ),
		'singular_name'      => _x( 'Full width image block', 'post type singular name' ),
		'add_new_item'       => __( 'Add new Full width image block block' ),
		'edit_item'          => __( 'Edit Full width image block' ),
		'new_item'           => __( 'New Full width image block' ),
		'all_items'          => __( 'All Full width image blocks' ),
		'view_item'          => __( 'View Full width image block' ),
		'search_items'       => __( 'Search Full width image block' ),
		'not_found'          => __( 'No Full width image block found' ),
		'not_found_in_trash' => __( 'No Full width image block found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Full width image block'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'The specific content type for a Full width image block',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'fw_imgblk', $args );
}
add_action( 'init', 'post_fw_imgblk' );

//**** Video block ****

function post_video() {
	$labels = array(
		'name'               => _x( 'Video block', 'post type general name' ),
		'singular_name'      => _x( 'Video block', 'post type singular name' ),
		'add_new_item'       => __( 'Add new Video block block' ),
		'edit_item'          => __( 'Edit Video block' ),
		'new_item'           => __( 'New Video block' ),
		'all_items'          => __( 'All Video blocks' ),
		'view_item'          => __( 'View Video block' ),
		'search_items'       => __( 'Search Video block' ),
		'not_found'          => __( 'No Video block found' ),
		'not_found_in_trash' => __( 'No Video block found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Video block'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'The specific content type for a Video block',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'video', $args );
}
add_action( 'init', 'post_video' );

?>