<?php
/*
Template Name: About
Description: Only used for the about homepage
*/

get_header(); ?>

<!-- Start full width image block -->
<div class="full-width-image-block full-width-image-block-centered-cta about-hero" data-parallax="scroll" data-position-y="60px" data-image-src="<?php bloginfo('template_directory');?>/assets/img/svh_about_hero.jpg">
	<div class="row">
		<div class="large-8 large-centered columns">
	    	<h2><?php the_field( 'header', 70 ); ?></h2>
			<p class="lead"><?php the_field( 'description', 70 ); ?></p>
	    </div>
	</div>
	<?php if ( is_user_logged_in() ) { ?>
		<a class="post-edit" href="<?php echo get_edit_post_link( 70, $context ); ?>">Edit this</a>
	<?php } ?>
</div>
<!-- Start the bio blocks -->
<div class="about-us-bio-block">
	<div class="row row-standard-padding">
		<div class="large-8 medium-10 medium-centered columns">

			<?php
			$args = array(
				'post_type' => 'about_person',
				'order' => ASC,
			);
			$about_person = new WP_Query( $args );

			if( $about_person->have_posts() ) {
				while( $about_person->have_posts() ) {
					$about_person->the_post();
					?>
					<!--Start of bio 1-->
					<div class="row about-us-bio">
						<!--Picture-->
						<div class=" medium-3 medium-uncentered small-6 small-centered columns">
							<img src="<?php the_field( 'profile_image'); ?>" alt="JK Wicks">
						</div>
						<!--Text-->
						<div class="medium-9 small-12 columns">
							<h3 class="about-us-bio-name"><?php the_field( 'name'); ?></h3>
							<h6 class="subheader"><?php the_field( 'sub_name'); ?></h6>
							<?php the_field( 'bio'); ?>
						</div>
						<?php if ( is_user_logged_in() ) { ?>
							<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
						<?php } ?>
					</div>
					<?php
				}
			}
			?>

		</div>
	</div>	
</div>
<!-- End the bio blocks -->

<!-- Start of embeded video block -->
<div class="block-alt-color text-center">
	<div class="row row-standard-padding">
		<div class="medium-12 columns">
			<h3><?php the_field( 'title', 174 ); ?></h3>
			<div class="flex-video widescreen vimeo">
				<?php the_field( 'video_embed_code', 174 ); ?>
			</div>
		</div>
	</div>
	<?php if ( is_user_logged_in() ) { ?>
		<a class="post-edit" href="<?php echo get_edit_post_link( 174, $context ); ?>">Edit this</a>
	<?php } ?>
</div>

<!-- Start triple quote block -->
<div class="testimonial-x-3-block text-center block-alt-color">
	<div class="row row-standard-padding">

		<?php
		$args = array(
			'post_type' => 'three_quote',
			'order' => ASC,
		);
		$three_quote = new WP_Query( $args );

		if( $three_quote->have_posts() ) {
			while( $three_quote->have_posts() ) {
				$three_quote->the_post();
				?>
				<!--Start of bio 1-->
				<div class="medium-4 columns text-center">
					<i class="btl bt-quote-left bt-2x text-primary"></i>
					<div class="testimonial-quote testimonial-quote-small">
						<p><?php the_field( 'quote_content' ); ?></p>
						<img class="identity" src="<?php the_field( 'profile_image'); ?>">
						<h5><?php the_field( 'quote_name'); ?></h5>
					</div>
					<?php if ( is_user_logged_in() ) { ?>
						<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
					<?php } ?>
				</div>
				<?php
			}
		}
		?>

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

<?php get_footer(); ?>