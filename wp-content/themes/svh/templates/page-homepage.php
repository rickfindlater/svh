<?php
/*
Template Name: Homepage
Description: Only used for the site homepage
*/
get_header(); ?>

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
					</div>
					<?php if ( is_user_logged_in() ) { ?>
						<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
					<?php }
				}
			}
		?>
		<!-- end teaser blocks -->

		<!-- Start single quote block -->

</div>

<?php get_footer(); ?>
