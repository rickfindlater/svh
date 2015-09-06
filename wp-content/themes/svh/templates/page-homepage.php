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
					<!-- custom edit link for posts is user is logged in -->
					<?php if ( is_user_logged_in() ) { ?>
					<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
				</div>
				<?php }
			}
		}
	?>
	<!-- end teaser blocks -->
</div>

<!-- Start single quote block -->
<div class="full-width-image-block">
    <img src="<?php the_field( 'background_image', 70 ); ?>" alt="The team">
    <div class="row">
    	<div class="large-8 large-centered columns">
    	<h2><?php the_field( 'header', 70 ); ?></h2>
		<p class="lead"><?php the_field( 'description', 70 ); ?></p>
		<a class="button large primary radius extra-side-padding button-opacity" href="<?php the_field( 'link', 70 ); ?>">Find out about us</a>
    	</div>
    </div>
</div>

<!-- Start single quote block -->
<img src="<?php the_field( 'profile_image', 67 ); ?>">
<p><?php the_field( 'quote_content', 67 );	?></p>
<p><?php the_field( 'quote_name', 67 );	?></p>

<?php get_footer(); ?>