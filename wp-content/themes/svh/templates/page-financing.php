<?php
/*
Template Name: Financing
Description: Only used for the Financing page
*/

get_header(); ?>

<div class="row row-treatments-page">
	<div class="medium-10 large-centered columns">
		<h1><?php the_title(); ?></h1>
		<?php the_field( 'main_content'); ?>
	</div>
</div>

<?php if ( is_user_logged_in() ) { ?>
	<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
<?php } ?>

<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
<!-- End newsletter subscription form -->

<?php get_footer(); ?>