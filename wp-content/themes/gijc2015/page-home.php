<?php
/**
 * Template Name: Home
 * Description: Fake-out the homepage if it 404s
 */
get_header();

/*
 * Collect post IDs in each loop so we can avoid duplicating posts
 * and get the theme option to determine if this is a two column or three column layout
 */
$ids = array();
?>

<div id="content" class="stories span8" role="main">

	<?php get_template_part( 'home-part', 'bottom-widget-area' ); ?>

	<aside id="partners" class="row-fluid widget clearfix">
		<?php dynamic_sidebar( 'partners' ); ?>
	</aside>

</div><!-- #content-->

<?php get_sidebar(); ?>

<aside id="sponsors" class="row-fluid widget">
	<?php dynamic_sidebar( 'sponsors' ); ?>
</aside>

<?php get_footer(); ?>