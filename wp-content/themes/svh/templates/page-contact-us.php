<?php
/*
Template Name: Contact Us
Description: Only used for the site homepage
*/

get_header(); ?>

<?php
$args = array(
	'post_type' => 'map_block',
	'order' => ASC,
);
$map_block = new WP_Query( $args );

if( $map_block->have_posts() ) {
	while( $map_block->have_posts() ) {
		$map_block->the_post();
		?>

		<?php the_field( 'address'); ?>

		<a href="mailto:<?php the_field( 'email'); ?>"><?php the_field( 'email'); ?></a>

		<?php the_field( 'phone_number'); ?>

		<?php the_field( 'map_link'); ?>

		<?php if ( is_user_logged_in() ) { ?>
			<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
		<?php } ?>
		<?php
	}
}
?>

<!-- Start contact form -->
<?php echo do_shortcode( '[contact-form-7 id="7" title="Contact form 1"]' ); ?>
<!-- Start contact form -->

<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
<!-- End newsletter subscription form -->

<?php get_footer(); ?>