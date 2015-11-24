<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>

<div class="row">
	<div class="small-12 large-8 columns" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header class="blog-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php foundationpress_entry_meta(); ?>
			</header>
			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content">

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="row">
					<div class="column">
						<?php the_post_thumbnail( '', array('class' => 'th') ); ?>
					</div>
				</div>
			<?php endif; ?>
			<?php the_content(); ?>
			</div>

			<!-- Next and prev blog links-->
			<div class="row prev-next-links">
				<div class="medium-6 columns prev-next-link prev-link">
					<p class="prev-next-header"><i class="btl bt-angle-left"></i>Previous post</p>
					<p class="lead prev-next-title"><?php previous_post_link(); ?></p>
				</div>
				<div class="medium-6 columns prev-next-link next-link">
					<p class="prev-next-header">Next post<i class="btl bt-angle-right"></i></p>
					<p class="lead prev-next-title"><?php next_post_link(); ?></p>
				</div>
			</div>

			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_post_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_post_after_comments' ); ?>
		</article>
	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php get_sidebar(); ?>
</div>

	<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form id="260"]' ); ?>
	<!-- End newsletter subscription form -->


<?php get_footer(); ?>