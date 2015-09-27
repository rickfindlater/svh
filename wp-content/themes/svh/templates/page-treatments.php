<?php
/*
Template Name: Treatments
Description: Only used for the treatments homepage
*/

get_header(); ?>

	<p>The treatments page</p>

<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
<!-- End newsletter subscription form -->

<?php get_footer(); ?>