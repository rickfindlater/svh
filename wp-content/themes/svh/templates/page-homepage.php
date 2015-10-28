<?php
/*
Template Name: Homepage
Description: Only used for the site homepage
*/

get_header(); ?>

<div class="full-width-image-block hp-hero">
	<script>
		$(function() {
			var BV = new $.BigVideo();
			BV.init();
			if (Modernizr.touch) {
				//background image for mobile devices goes here
				BV.show('video-poster.jpg');
			} else {
				BV.show('https://player.vimeo.com/external/142859789.sd.mp4?s=74321aa6204b13c6b4c243bc45cea0db&profile_id=112',{ambient:true});
			}

			//when modal is open we pause the background video and add the html of the full video with autoplay
			$('#videoModal').on('open.fndtn.reveal', function(e) {
				BV.getPlayer().pause();
				$("#videoModal .flex-video").html('<iframe src="https://player.vimeo.com/video/142859791?autoplay=1" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>')
			});

			//when modal is open we re start the background video and remove the html of the full video with autoplay
			$('#videoModal').on('closed.fndtn.reveal', function(e) {
				BV.getPlayer().play();
				$("#videoModal .flex-video").html('');
			});
		});

	</script>
	<div class="hp-hero-inner">
		<div class="row">
			<div class="large-10 large-centered columns">
				<h1>Specialist Vein Health empowers people to take control of their health.</h1>
				<p>We provide advanced and minimally invasive techniques at affordable levels.</p>
			</div>	
		</div>
		<div class="row">
			<div class="large-5 medium-6 medium-centered columns">
				<button class="button large primary radius expand button-opacity hp-hero-primary-button">
					Book a consultation
				</button>
				<button id="video-play-button" data-reveal-id="videoModal" class="button radius secondary display-block margin-top-10px expand">
					Or watch the video
				</button>
			</div>	
		</div>
	</div>
	<div id="videoModal" class="reveal-modal large" data-reveal="svhVideo" aria-hidden="true" style="opacity: 1; visibility: hidden; display: none;">
		<div class="flex-video" style="display: none;">

		</div>
		<a class="close-reveal-modal">×</a>
	</div>
</div>


<div class="teaser-blocks">
		<div class="row row-standard-padding" role="main">

		<!-- Start teaser blocks -->
		<?php
			$args = array(
				'post_type' => 'teaser',
			);
			$teasers = new WP_Query( $args );

			if( $teasers->have_posts() ) {
				while( $teasers->have_posts() ) {
					$teasers->the_post();
					?>
					<div class="medium-4 columns teaser-block">
						<a href="#" class="uber-link"><?php the_title() ?></a>
						<img src="<?php the_field('teaser_image'); ?>" alt="Teaser image">
						<p><?php the_field('teaser_summary'); ?></p>
						<a class="button secondary outline radius extra-side-padding" href="<?php the_field('learn_more_link'); ?>">Learn more</a>
						<!-- custom edit link for posts is user is logged in -->
						<?php if ( is_user_logged_in() ) { ?>
							<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
						<?php } ?>
					</div>
				<?php
				}
			}
		?>
		<!-- end teaser blocks -->
	</div>
</div>
<!-- Start full width image block -->
<div class="full-width-image-block full-width-image-block-bottom-cta" data-parallax="scroll" data-image-src="<?php the_field( 'background_image', 159 ); ?>">
	<div class="row">
		<div class="large-8 large-centered columns">
	    	<h2><?php the_field( 'header', 159 ); ?></h2>
			<p class="lead"><?php the_field( 'description', 159 ); ?></p>
			<a class="button large primary radius extra-side-padding button-opacity" href="<?php the_field( 'button_cta_link', 159 ); ?>"><?php the_field( 'button_cta_text', 159 ); ?></a>
	    </div>
	</div>
	<?php if ( is_user_logged_in() ) { ?>
		<a class="post-edit" href="<?php echo get_edit_post_link( 159, $context ); ?>">Edit this</a>
	<?php } ?>
</div>

<!-- Start of embeded video block -->
<div class="block-alt-color text-center">
	<div class="row row-standard-padding">
		<div class="medium-12 columns">
			<h3><?php the_field( 'title', 81 ); ?></h3>
			<div class="flex-video widescreen vimeo">
				<?php the_field( 'video_embed_code', 81 ); ?>
			</div>
		</div>
	</div>
	<?php if ( is_user_logged_in() ) { ?>
		<a class="post-edit" href="<?php echo get_edit_post_link( 81, $context ); ?>">Edit this</a>
	<?php } ?>
</div>	

<!-- Start single quote block -->
<div class="testimonial-x-1-block text-center">
	<div class="row row-standard-padding">
		<div class="medium-8 medium-centered columns">
			<i class="btl bt-quote-left bt-3x text-primary"></i>
			<div class="testimonial-quote testimonial-quote-large">
				<p class=""><?php the_field( 'quote_content', 67 );	?></p>
			</div>
			<img class="identity" src="<?php the_field( 'profile_image', 67 ); ?>">
			<h5><?php the_field( 'quote_name', 67 );	?></h5>
		</div>
	</div>
	<?php if ( is_user_logged_in() ) { ?>
		<a class="post-edit" href="<?php echo get_edit_post_link( 67, $context ); ?>">Edit this</a>
	<?php } ?>
</div>

<!-- Start contact form -->
<div class="block-alt-color">
	<div class="row row-standard-padding">
		<div class="medium-6 medium-centered columns">
			<div class="text-center">
				<h4>Book a consultation now</h4>
				<p>Let us know your details and we‘ll contact you within one working day.</p>
			</div>
			<?php echo do_shortcode( '[contact-form-7 id="7" title="Contact form 1"]' ); ?>
		</div>
	</div>
</div>

<!-- End contact form -->

<!-- Start blog carousel -->
<div class="blog-carousel">
	<div class="row">
		<div class="medium-12">
			<h3>The latest from our health blog</h3>
		</div>		
	</div>
	<div class="row">
		<div class="medium-12">
			<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>
		</div>	
	</div>
</div>

<!-- end blog carousel -->

<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
<!-- End newsletter subscription form -->

<?php get_footer(); ?>