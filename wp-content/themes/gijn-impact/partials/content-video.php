<?php
/**
 * The default template for displaying content
 */
$tags = of_get_option('tag_display');
$values = get_post_custom($post->ID);
$youtube_url = $values['youtube_url'][0];
$entry_classes = 'entry-content';

wp_enqueue_script('category-interviews', get_stylesheet_directory_uri() . '/js/category-interviews.js', array('jquery'), 0.1, true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix span4'); ?>>
	<div class="<?php echo $entry_classes; ?>">
	<?php if ($values['youtube_url']) { ?>
		<header>
			<div>
			<?php if ($youtube_url) { ?>
				<div data-iframe="<?php echo htmlentities(wp_oembed_get($youtube_url)); ?>" href="<?php echo $youtube_url; ?>" class="video-container">
					<a href="<?php echo $youtube_url; ?>">
						<span class="play-button-overlay"><i class="icon-play"></i></span>
						<img src="<?php largo_youtube_image_from_url($youtube_url); ?>" />
					</a>
				</div>
			<?php } elseif (has_post_thumbnail()) {
				the_post_thumbnail('full');
			} ?>
			</div>
		</header>
	<?php } ?>

		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>"
				title="<?php the_title_attribute( array( 'before' => __( 'Permalink to', 'largo' ) . ' ' ) )?>"
				rel="bookmark"><?php the_title(); ?></a>
		</h2>

		<?php largo_excerpt($post, 5, false); ?>

		<?php if ( !is_home() && largo_has_categories_or_tags() && $tags === 'btm' ) { ?>
			<h5 class="tag-list"><strong><?php _e('More about:', 'largo'); ?></strong> <?php largo_categories_and_tags( 8 ); ?></h5>
		<?php } ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
