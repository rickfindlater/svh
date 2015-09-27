<?php
/*
Template Name: Contact Us
Description: Only used for the site homepage
*/

get_header(); ?>

<p><img src="<?php the_field( 'background_image'); ?>"/></p>

<p><?php the_field( 'contact_title'); ?></p>

<p><a href="mailto:<?php the_field( 'email'); ?>"><?php the_field( 'email'); ?></a></p>

<p><?php the_field( 'phone_number'); ?></p>

<p><?php the_field( 'contact_form'); ?></p>

<!-- Start contact form -->
<?php echo do_shortcode( '[contact-form-7 id="7" title="Contact form 1"]' ); ?>
<!-- Start contact form -->

<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
<!-- End newsletter subscription form -->

<?php get_footer(); ?>