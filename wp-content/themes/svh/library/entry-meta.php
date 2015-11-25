<?php
/**
 * Entry meta information for posts
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

if ( ! function_exists( 'foundationpress_entry_meta' ) ) :
	function foundationpress_entry_meta() {
		echo '<time class="updated" datetime="'. '">'. sprintf( __( 'Posted on %s', 'foundationpress' ), get_the_date()) .'</time>';
	}
endif;
?>
