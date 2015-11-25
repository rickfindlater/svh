<?php
/*
Template Name: FAQs
Description: Only used for the FAQs homepage
*/

get_header(); ?>

<div class="faqs-block">
	<div class="row row-standard-padding text-center">
		<div class="medium-12 columns">
			<h2 class="no-margin">Frequently Asked Questions</h2>
		</div>	
	</div>
	<div class="row row-standard-padding-bottom">
		<div class="medium-12 columns">
			<div class="faqs-columns">

				<?php
				$args = array(
					'post_type' => 'faq_item',
					'order' => ASC,
				);
				$faq_item = new WP_Query( $args );

				if( $faq_item->have_posts() ) {
					while( $faq_item->have_posts() ) {
						$faq_item->the_post();
						?>
						<h6><?php the_title(); ?></h6>
						<p><?php the_field( 'faq_content'); ?></p>

						<?php if ( is_user_logged_in() ) { ?>
							<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
						<?php } ?>
						<?php
					}
				}
				?>

			</div>
		</div>
	</div>	
</div>

<!-- Start learn more about block -->
<div class="full-width-image-block full-width-image-block-centered-cta" data-parallax="scroll" data-image-src="<?php the_field( 'background_image', 145 ); ?>">
	<div class="row">
		<div class="large-10 large-centered columns">
			<h2><?php the_field( 'header', 145 ); ?></h2>
			<p class="lead"><?php the_field( 'description', 145 ); ?></p>
			<a class="button large primary radius extra-side-padding button-opacity" href="<?php the_field( 'button_cta_link', 145 ); ?>"><?php the_field( 'button_cta_text', 145 ); ?></a>
			<p class="cta-phone-number"><?php the_field( 'text_cta', 145 ); ?></p>
		</div>
	</div>
	<?php if ( is_user_logged_in() ) { ?>
		<a class="post-edit" href="<?php echo get_edit_post_link( 145, $context ); ?>">Edit this</a>
	<?php } ?>
</div>

	<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form id="260"]' ); ?>
	<!-- End newsletter subscription form -->

<?php get_footer();?>