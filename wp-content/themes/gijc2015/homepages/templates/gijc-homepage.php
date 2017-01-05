<?php
/**
 * Home Template: GIJC Homepage
 * Description: Some widget areas.
 * Sidebars: Partners
 */

global $largo, $shown_ids, $tags;
?>

<div id="gijc-content" class="stories span8" role="main">
	<!-- wtf -->

	<?php get_template_part( 'partials/home', 'bottom-widget-area' ); ?>

	<aside id="partners" class="row-fluid widget clearfix">
		<?php dynamic_sidebar( 'partners' ); ?>
	</aside>

</div><!-- #gijc-content-->

<?php get_sidebar(); ?>

<aside id="sponsors" class="row-fluid widget">
	<?php dynamic_sidebar( 'sponsors' ); ?>
</aside>
