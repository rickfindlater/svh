<?php
/*
Template Name: Vein disease
Description: Only used for the about homepage
*/

get_header(); ?>

	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php the_content(); ?>

<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
<!-- End newsletter subscription form -->

<?php get_footer(); ?>