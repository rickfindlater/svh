<?php
/*
Template Name: Contact Us
Description: Only used for the site homepage
*/

get_header(); ?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<style type="text/css">

	.acf-map {
		width: 100%;
		height: 400px;
		border: #ccc solid 1px;
		margin: 20px 0;
	}

</style>


<?php
$args = array(
	'post_type' => 'map_block',
	'order' => ASC,
);
$map_block = new WP_Query( $args );

if( $map_block->have_posts() ) {
	while( $map_block->have_posts() ) {
		$map_block->the_post();
		?>
		<div class="contact-location-wrapper">
			<!--start google map-->
			<?php
			$location = get_field('map_link');
			if( !empty($location) ):
				?>
				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
			<?php endif; ?>
			<!--end google map-->
			<div class="contact-location-details">
				<div class="row">
					<div class="large-4 medium-6 columns">
						<div class="contact-location-panel">
							<h4 class="location-title">Location title</h4>
							<!--start contact details-->
							<div class="contact-address">
								<i class="btl bt-map bt-lg text-primary location-panel-icon"></i>
								<?php the_field( 'address'); ?>
							</div>
							<div class="contact-details">
								<a href="mailto:<?php the_field( 'email'); ?>"><?php the_field( 'email'); ?></a>
								<p><?php the_field( 'phone_number'); ?></p>
								<!--end contact detals-->
							</div>
						</div>
					</div>	
				</div>
			</div>				
		</div>
		<!--edit link-->
		<?php if ( is_user_logged_in() ) { ?>
			<a class="post-edit" href="<?php echo get_edit_post_link( $id, $context ); ?>">Edit this</a>
		<?php } ?>
		<?php
	}
}
?>

<!-- Start contact form -->
<?php echo do_shortcode( '[contact-form-7 id="7" title="Contact form 1"]' ); ?>
<!-- Start contact form -->

<!-- Start newsletter subscription form -->
<?php echo do_shortcode( '[mc4wp_form]' ); ?>
<!-- End newsletter subscription form -->

<?php get_footer(); ?>