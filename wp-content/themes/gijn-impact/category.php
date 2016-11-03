<?php
/**
 * Template for category archive pages
 */
get_header();
global $tags;
?>

<div class="clearfix">

		<?php if ( have_posts() ) {

			// queue up the first post so we know what type of archive page we're dealing with
			the_post();
			$title = single_cat_title( '', false );
			$description = category_description();
			$rss_link =  get_category_feed_link( get_queried_object_id() );
			$posts_term = of_get_option( 'posts_term_plural', 'Stories' );
		?>
			<header class="archive-background clearfix">
				<?php

					/*
					 * Show a label for the list of recent posts
					 * again, tailored to the type of page we're looking at
					 */

					printf( '<a class="rss-link rss-subscribe-link" href="%1$s">%2$s <i class="icon-rss"></i></a>', $rss_link, __( 'Subscribe', 'largo' ) );

					echo '<h1 class="page-title">' . $title . '</h1>';
					echo '<div class="archive-description">' . $description . '</div>';

					// category pages show a list of related terms
					if ( is_category() && largo_get_related_topics_for_category( get_queried_object() ) != '<ul></ul>' ) { ?>
						<div class="related-topics">
							<h5><?php _e('Related Topics:', 'largo'); ?> </h5>
							<?php echo largo_get_related_topics_for_category( get_queried_object() ); ?>
						</div>
				<?php
					}
				?>
			</header>

		<?php
			if ( $paged < 2 ) {
				// First post is alread queued
				get_template_part('partials/category-article-markup');

				while (have_posts()): the_post();
					get_template_part('partials/category-article-markup');
				endwhile;
			}
		?>
				</div>
			</div>
		<?php } ?>
		</div><!--#content-->
	</div>
</div>

<?php get_footer(); ?>
