<?php
/*
Template Name: About
Description: Only used for the about homepage
*/

get_header(); ?>

<!-- Start full width image block -->
<div class="full-width-image-block full-width-image-block-centered-cta">
    <img src="<?php bloginfo('template_directory');?>/assets/img/svh_about_hero.jpg" alt="The team">
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
<div class="row about-us-bio-block row-standard-padding">
	<div class="large-8 medium-10 medium-centered columns">
		<!--Start of bio 1-->
		<div class="row about-us-bio">
			<!--Picture-->
			<div class=" medium-3 medium-uncentered small-6 small-centered columns">
				<img src="<?php the_field( 'profile_image', 114 ); ?>" alt="JK Wicks">
			</div>
			<!--Text-->
			<div class="medium-9 small-12 columns">
				<h3 class="about-us-bio-name"><?php the_field( 'name', 114 ); ?></h3>
				<h6 class="subheader"><?php the_field( 'sub_name', 114 ); ?></h6>
				<?php the_field( 'bio', 114 ); ?>
			</div>
			<?php if ( is_user_logged_in() ) { ?>
				<a class="post-edit" href="<?php echo get_edit_post_link( 115, $context ); ?>">Edit this</a>
			<?php } ?>
		</div>
		<!--Start of bio 2-->
		<div class="row about-us-bio">
			<!--Picture-->
			<div class=" medium-3 medium-uncentered small-6 small-centered columns">
				<img src="<?php the_field( 'profile_image', 115 ); ?>" alt="JK Wicks">
			</div>
			<!--Text-->
			<div class="medium-9 small-12 columns">
				<h3 class="about-us-bio-name"><?php the_field( 'name', 115 ); ?></h3>
				<h6 class="subheader"><?php the_field( 'sub_name', 115 ); ?></h6>
				<?php the_field( 'bio', 115 ); ?>
			</div>
			<?php if ( is_user_logged_in() ) { ?>
				<a class="post-edit" href="<?php echo get_edit_post_link( 115, $context ); ?>">Edit this</a>
			<?php } ?>
		</div>
		<!--Start of bio 3-->
		<div class="row about-us-bio">
			<!--Picture-->
			<div class=" medium-3 medium-uncentered small-6 small-centered columns">
				<img src="<?php the_field( 'profile_image', 116 ); ?>" alt="JK Wicks">
			</div>
			<!--Text-->
			<div class="medium-9 small-12 columns">
				<h3 class="about-us-bio-name"><?php the_field( 'name', 116 ); ?></h3>
				<h6 class="subheader"><?php the_field( 'sub_name', 116 ); ?></h6>
				<?php the_field( 'bio', 116 ); ?>
			</div>
			<?php if ( is_user_logged_in() ) { ?>
				<a class="post-edit" href="<?php echo get_edit_post_link( 116, $context ); ?>">Edit this</a>
			<?php } ?>
		</div>
	</div>
</div>
<!-- Start triple quote block -->
<div class="testimonial-x-3-block text-center block-alt-color">
	<div class="row row-standard-padding">
		<div class="medium-4 columns text-center">
			<i class="btl bt-quote-left bt-2x text-primary"></i>
			<div class="testimonial-quote testimonial-quote-small">
				<p>
					Excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis.
				</p>
				<img class="identity" src="<?php the_field( 'profile_image', 67 ); ?>">

			</div>
			<?php if ( is_user_logged_in() ) { ?>
				<a class="post-edit" href="<?php echo get_edit_post_link( 110, $context ); ?>">Edit this</a>
			<?php } ?>
		</div>
		<div class="medium-4 columns text-center">
			<i class="btl bt-quote-left bt-2x text-primary"></i>
			<div class="testimonial-quote testimonial-quote-small">
				<p><?php the_field( 'quote_content', 111 ); ?></p>
				<img class="identity" src="<?php the_field( 'profile_image', 111 ); ?>">
				<h5><?php the_field( 'quote_name', 111 ); ?></h5>
			</div>
			<?php if ( is_user_logged_in() ) { ?>
				<a class="post-edit" href="<?php echo get_edit_post_link( 111, $context ); ?>">Edit this</a>
			<?php } ?>
		</div>
		<div class="medium-4 columns text-center">
			<i class="btl bt-quote-left bt-2x text-primary"></i>
			<div class="testimonial-quote testimonial-quote-small">
				<p><?php the_field( 'quote_content', 112 ); ?></p>
				<img class="identity" src="<?php the_field( 'profile_image', 112 ); ?>">
				<h5><?php the_field( 'quote_name', 112 ); ?></h5>
			</div>
			<?php if ( is_user_logged_in() ) { ?>
				<a class="post-edit" href="<?php echo get_edit_post_link( 112, $context ); ?>">Edit this</a>
			<?php } ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>