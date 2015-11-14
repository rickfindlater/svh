<?php
/*
Template Name: Vein disease
Description: Only used for the about homepage
*/

get_header(); ?>

	<p>The vein page</p>

	<!--<p>--><?php //the_field( 'background_image'); ?><!--</p>-->

<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
<!-- End newsletter subscription form -->

<?php get_footer(); ?>