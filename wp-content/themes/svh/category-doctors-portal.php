<?php
/**
 * Doctors portal template file
 */

get_header(); ?>

	<!--begin blog header-->
	<div class="full-width-image-block full-width-image-block-newsletter">

<!--	<div class="full-width-image-block full-width-image-block-newsletter" data-parallax="scroll" data-image-src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/img/svh_blog_hero1.jpg">-->

	<!-- This is the blog hero unit background image -->
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/svh_blog_hero1.jpg" />
		<div class="row row-standard-padding">
			<div class="medium-8 medium-centered columns">
				<h2>Welcome to the Doctors Portal</h2>
			</div>
			<!-- newsletter subscription form -->
			<?php echo do_shortcode( '[mc4wp_form]' ); ?>
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

	<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
	<!-- End newsletter subscription form -->

<?php get_footer(); ?>