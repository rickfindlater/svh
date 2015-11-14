<?php
/*
Template Name: Treatments
Description: Only used for the treatments homepage
*/

get_header(); ?>

<?php the_field( 'main_content', 90); ?>

<?php if ( is_user_logged_in() ) { ?>
	<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
<?php } ?>

	<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
	<!-- End newsletter subscription form -->

<?php get_footer(); ?>