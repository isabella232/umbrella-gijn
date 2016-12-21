<?php
/**
 * Template Name: Sched Pages
 * Description: Shows widgets in the projects widget area
 */
get_header();
?>

<div id="content" class="span12" role="main">
	<?php
		the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php edit_post_link(__('Edit This Page', 'largo'), '<h5 class="byline"><span class="edit-link">', '</span></h5>'); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<div id="sched-container">
				<?php if (is_page('speakers')) { ?>
					<a id="sched-embed"  href="http://abraji.sched.org/directory/speakers">View the gijc13 mobile app</a>
				<?php } else { ?>
					<a id="sched-embed"  href="http://abraji.sched.org/">View the gijc13 mobile app</a>
				<?php } ?>
			</div>
		<script type="text/javascript" src="http://abraji.sched.org/js/embed.js"></script>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- #content -->

<?php get_footer(); ?>