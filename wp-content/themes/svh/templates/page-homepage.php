<?php
/*
Template Name: Homepage
Description: Only used for the site homepage
*/
get_header(); ?>

<div class="row">
	<div class="small-12 large-12 columns" role="main">

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

					<div class='content'>
						<h2><?php the_title() ?></h2>

						<img src="<?php the_field('teaser_image'); ?>" alt="Teaser image">

						<p><?php the_field('teaser_summary'); ?></p>

						<p><a href="<?php the_field('learn_more_link'); ?>">Learn more</a></p>

					</div>
					<?php
				}
			}
		?>
		<!-- end teaser blocks -->

	</div>

</div>

<?php get_footer(); ?>
