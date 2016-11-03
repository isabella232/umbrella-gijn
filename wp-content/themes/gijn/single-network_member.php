<?php
/**
 * The Template for displaying all single network_members
 */
get_header();
?>

<div id="content" class="span12" role="main">
	<?php
		while ( have_posts() ) : the_post();
		
			get_template_part( 'partials/content', 'member' );
	
		endwhile;
	?>
</div><!--#content-->

<?php get_footer(); ?>