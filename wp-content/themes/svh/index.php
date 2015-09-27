<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>

<!--begin blog header-->
<div class="full-width-image-block full-width-image-block-newsletter">
	<?php the_field( 'header', 160 ); ?>
	<img src="<?php the_field( 'background_image', 160 ); ?>" />
	<div class="row row-standard-padding">
		<div class="medium-8 medium-centered columns">
			<h2>Welcome to our blog</h2>
		</div>
		<!-- newsletter subscription form -->
		<?php echo do_shortcode( '[mc4wp_form]' ); ?>

		<?php if ( is_user_logged_in() ) { ?>
			<a class="post-edit" href="<?php echo get_edit_post_link( 67, $context ); ?>">Edit this</a>
		<?php } ?>
	</div>
</div>
<!--end blog header-->

<div class="row">
	<div class="small-12 large-8 columns" role="main">

	<?php if ( have_posts() ) : ?>

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

		<?php do_action( 'foundationpress_before_pagination' ); ?>

	<?php endif;?>

	<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
		</nav>
	<?php } ?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>