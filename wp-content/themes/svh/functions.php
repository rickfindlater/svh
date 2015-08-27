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

function my_custom_post_teaser() {
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
add_action( 'init', 'my_custom_post_teaser' );

?>