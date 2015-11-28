<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="blog-header text-muted">
		<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php foundationpress_entry_meta(); ?>
	</header>
	<div class="entry-content">
		<!-- The post featured image -->
		<?php the_post_thumbnail( $size, $attr ); ?>
		<!-- The post excerpt -->
		<?php the_excerpt(); ?>
		<!-- Read more button -->
		<a class="button small secondary outline radius read-more" href="<?php the_permalink(); ?>">Read More</a>
	</div>
	<footer>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
	<hr class="blog-divider" />
</article>