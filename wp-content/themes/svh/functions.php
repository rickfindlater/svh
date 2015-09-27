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
		'add_new_item'       => __( 'Add new Full width image block' ),
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

//**** Full width image block with call to action ****

function post_fw_imgblk_CTA() {
	$labels = array(
		'name'               => _x( 'Full width image block CTA', 'post type general name' ),
		'singular_name'      => _x( 'Full width image block CTA', 'post type singular name' ),
		'add_new_item'       => __( 'Add new Full width image block CTA' ),
		'edit_item'          => __( 'Edit Full width image block CTA' ),
		'new_item'           => __( 'New Full width image block CTA' ),
		'all_items'          => __( 'All Full width image block CTAs' ),
		'view_item'          => __( 'View Full width image block CTA' ),
		'search_items'       => __( 'Search Full width image block CTA' ),
		'not_found'          => __( 'No Full width image block CTA found' ),
		'not_found_in_trash' => __( 'No Full width image block CTA found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Full width image block CTA'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'The specific content type for a Full width image block with a centered call to action',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'fw_imgblk_CTA', $args );
}
add_action( 'init', 'post_fw_imgblk_CTA' );

//**** Video block ****

function post_video() {
	$labels = array(
		'name'               => _x( 'Video block', 'post type general name' ),
		'singular_name'      => _x( 'Video block', 'post type singular name' ),
		'add_new_item'       => __( 'Add new Video block' ),
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

//**** 3 quote block ****

function post_three_quote() {
	$labels = array(
		'name'               => _x( 'Three quote block', 'post type general name' ),
		'singular_name'      => _x( 'Three quote block', 'post type singular name' ),
		'add_new_item'       => __( 'Add new Three quote' ),
		'edit_item'          => __( 'Edit Three quote block' ),
		'new_item'           => __( 'New Three quote block' ),
		'all_items'          => __( 'All Three quote blocks' ),
		'view_item'          => __( 'View Three quote block' ),
		'search_items'       => __( 'Search Three quote block' ),
		'not_found'          => __( 'No Three quote block found' ),
		'not_found_in_trash' => __( 'No Three quote block found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Three quote block'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'The specific content type for a Three quote block',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'three_quote', $args );
}
add_action( 'init', 'post_three_quote' );

//**** 3 quote block ****

function post_about_person() {
	$labels = array(
		'name'               => _x( 'About person block', 'post type general name' ),
		'singular_name'      => _x( 'About person block', 'post type singular name' ),
		'add_new_item'       => __( 'Add new About person' ),
		'edit_item'          => __( 'Edit About person block' ),
		'new_item'           => __( 'New About person block' ),
		'all_items'          => __( 'All About person blocks' ),
		'view_item'          => __( 'View About person block' ),
		'search_items'       => __( 'Search About person block' ),
		'not_found'          => __( 'No About person block found' ),
		'not_found_in_trash' => __( 'No About person block found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'About person block'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'The specific content type for a About person block',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'about_person', $args );
}
add_action( 'init', 'post_about_person' );

//**** faq item ****

function post_faq_item() {
	$labels = array(
		'name'               => _x( 'FAQ Item', 'post type general name' ),
		'singular_name'      => _x( 'FAQ Item', 'post type singular name' ),
		'add_new_item'       => __( 'Add new FAQ Item' ),
		'edit_item'          => __( 'Edit FAQ Item' ),
		'new_item'           => __( 'New FAQ Item' ),
		'all_items'          => __( 'All FAQ Items' ),
		'view_item'          => __( 'View FAQ Item' ),
		'search_items'       => __( 'Search FAQ Item' ),
		'not_found'          => __( 'No FAQ Item found' ),
		'not_found_in_trash' => __( 'No FAQ Item found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'FAQ Item'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'The specific content type for a FAQ Item',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'faq_item', $args );
}
add_action( 'init', 'post_faq_item' );

//**** Map block ****

function post_map_block() {
	$labels = array(
		'name'               => _x( 'Map block', 'post type general name' ),
		'singular_name'      => _x( 'Map block', 'post type singular name' ),
		'add_new_item'       => __( 'Add new Map block' ),
		'edit_item'          => __( 'Edit Map block' ),
		'new_item'           => __( 'New Map block' ),
		'all_items'          => __( 'All Map blocks' ),
		'view_item'          => __( 'View Map block' ),
		'search_items'       => __( 'Search Map block' ),
		'not_found'          => __( 'No Map block found' ),
		'not_found_in_trash' => __( 'No Map block found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Map block'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'The specific content type for a Map block',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'map_block', $args );
}
add_action( 'init', 'post_map_block' );

?>