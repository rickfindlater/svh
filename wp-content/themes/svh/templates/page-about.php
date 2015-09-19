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
		<!--Start of one bio-->
		<div class="row about-us-bio">
			<!--Picture-->
			<div class=" medium-3 medium-uncentered small-6 small-centered columns">
				<img src="<?php bloginfo('template_directory');?>/assets/img/jk-wicks-bio-pic.jpg" alt="JK Wicks">
			</div>
			<!--Text-->
			<div class="medium-9 small-12 columns">
				<h3 class="about-us-bio-name">JK Wicks</h3>
				<h6 class="subheader">MBCHB (OTAGO), FRACS (GENERAL SURGERY), FRACS (VASCULAR)</h6>
				<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
			</div>
		</div>
		<!--Start of one bio-->
		<div class="row about-us-bio">
			<!--Picture-->
			<div class=" medium-3 medium-uncentered small-6 small-centered columns">
				<img src="<?php bloginfo('template_directory');?>/assets/img/lupe-taumoepeau-bio-pic.jpg" alt="JK Wicks">
			</div>
			<!--Text-->
			<div class="medium-9 small-12 columns">
				<h3 class="about-us-bio-name">JK Wicks</h3>
				<h6 class="subheader">MBCHB (OTAGO), FRACS (GENERAL SURGERY), FRACS (VASCULAR)</h6>
				<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
			</div>
		</div>
		<!--Start of one bio-->
		<div class="row about-us-bio">
			<!--Picture-->
			<div class=" medium-3 medium-uncentered small-6 small-centered columns">
				<img src="<?php bloginfo('template_directory');?>/assets/img/richard-evans-bio-pic.jpg" alt="JK Wicks">
			</div>
			<!--Text-->
			<div class="medium-9 small-12 columns">
				<h3 class="about-us-bio-name">JK Wicks</h3>
				<h6 class="subheader">MBCHB (OTAGO), FRACS (GENERAL SURGERY), FRACS (VASCULAR)</h6>
				<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
			</div>
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
				<h6>June Summers</h6>
			</div>
		</div>
		<div class="medium-4 columns text-center">
			<i class="btl bt-quote-left bt-2x text-primary"></i>
			<div class="testimonial-quote testimonial-quote-small">
				<p>
					Excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis.
				</p>
				<img class="identity" src="<?php the_field( 'profile_image', 67 ); ?>">
				<h6>June Summers</h6>
			</div>
		</div>
		<div class="medium-4 columns text-center">
			<i class="btl bt-quote-left bt-2x text-primary"></i>
			<div class="testimonial-quote testimonial-quote-small">
				<p>
					Excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis.
				</p>
				<img class="identity" src="<?php the_field( 'profile_image', 67 ); ?>">
				<h6>June Summers</h6>
			</div>
		</div>
	</div>
</div>
<div class="full-width-image-block full-width-image-block-centered-cta">
	<img src="http://placehold.it/1400x700">
	<div class="row">
		<div class="large-10 large-centered columns">
			<h2>Learn more about our non-invasive techniques</h2>
			<p class="lead">Omnis iste natus error sit voluptatem accusantium doloremque laudantium iste natus error sit voluptatem</p>
			<a class="button large primary radius extra-side-padding button-opacity" href="#">Book a consultation</a>
			<p class="cta-phone-number">or call <span>(800) 777 9999</span></p>
		</div>		
	</div>
</div>


	<!--<p>--><?php //the_field( 'background_image'); ?><!--</p>-->

<?php get_footer(); ?>