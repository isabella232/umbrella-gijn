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
			
			<?php the_content(); ?>

			<?php if ( $sched_url = get_post_meta( get_the_ID(), 'sched_url', true) ) : ?>
				<div id="sched-container">
					<?php 
						if ( is_page( 'speakers' ) ) {
							echo '<a id="sched-embed"  href="' . $sched_url . '/directory/speakers">View the ' . get_bloginfo( 'name' ) . ' mobile app</a>';
						} else {
							echo '<a id="sched-embed"  href="' . $sched_url . '/">View the ' . get_bloginfo( 'name' ) . ' mobile app</a>';
						} 
					?>
				</div>
			<?php
				echo '<script type="text/javascript" src="' . $sched_url . '/js/embed.js"></script>';
			endif; 
			?>
			
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- #content -->

<?php get_footer(); ?>