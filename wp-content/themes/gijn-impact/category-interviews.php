<?php
/**
 * Template for interview archive page
 */
get_header();
global $tags;
?>

<div class="clearfix">
	<?php if (have_posts()) {
		$cat = get_queried_object();
		$posts_term = of_get_option('posts_term_plural', 'Stories');
	?>
	<header class="archive-background clearfix">
		<?php
			printf('<a class="rss-link rss-subscribe-link" href="%1$s">%2$s <i class="icon-rss"></i></a>',
				get_category_feed_link($cat->term_id), __('Subscribe', 'largo'));
		?>
			<h1 class="page-title"><?php echo $cat->name; ?></h1>
			<div class="archive-description"><?php echo $cat->description; ?></div>

		<?php // category pages show a list of related terms
			if (is_category() && largo_get_related_topics_for_category($cat) != '<ul></ul>') { ?>
				<div class="related-topics">
					<h5><?php _e('Related Topics:', 'largo'); ?> </h5>
					<?php echo largo_get_related_topics_for_category($cat); ?>
				</div>
		<?php } ?>
	</header>

	<div class="row-fluid">
	<?php
		while (have_posts()): the_post();
			get_template_part('partials/content', 'video');
			if ($wp_query->current_post > 0 && $wp_query->current_post % 3 == 2) { ?></div><div class="row-fluid"><?php }
		endwhile;
	} else
		get_template_part('partials/content', 'not-found');
	?>
	</div>
</div>

<?php get_footer(); ?>
