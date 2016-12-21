<?php
/**
 * Template Name: Projects Page
 * Description: Shows widgets in the projects widget area
 */
get_header();
?>

<div id="content" class="span8" role="main">
	<?php
		the_post();
		get_template_part( 'content', 'page' );
	?>
	<div id="homepage-bottom" class="clearfix<">
		<?php if ( ! dynamic_sidebar( 'projects-bottom' ) ) : ?>
			<p><?php _e('Please add widgets to this content area in the WordPress admin area under appearance > widgets.', 'largo'); ?></p>
		<?php endif; ?>
	</div>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>