<?php get_header(); ?>

		<div id="content" class="stories span8" role="main">

		<?php if ( have_posts() ) {
			the_post();
		?>

			<h3 class="recent-posts clearfix">Recent Links</h3>

	<?php
			// and finally wind the posts back so we can go through the loop as usual

			rewind_posts();

			while ( have_posts() ) : the_post();
				$custom = get_post_custom($post->ID); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
							<header>
	                      		<h2 class="entry-title"><?php echo ( isset( $custom["argo_link_url"][0] ) ) ? '<a href="' . $custom["argo_link_url"][0] . '">' . get_the_title() . '</a>' : get_the_title(); ?></h2>
							</header>

							<div class="entry-content">
	                      	<?php
	                      	if ( isset( $custom["argo_link_description"][0] ) ) {
		                      	echo '<p class="description">';
		                      	echo $custom["argo_link_description"][0];
		                      	echo '</p>';
	                      	}
	                      	if ( isset($custom["argo_link_source"][0] ) ) {
		                      	echo '<p class="source">' . __('Source: ', 'argo-links') . '<span>';
		                      	echo ( isset( $custom["argo_link_url"][0] ) ) ? '<a href="' . $custom["argo_link_url"][0] . '">' . $custom["argo_link_source"][0] . '</a>' : $custom["argo_link_source"][0];
		                      	echo '</span></p>';
	                      	}
	                      	?>
							</div>
	                  	</article> <!-- /.post-lead -->

	<?php endwhile;

			largo_content_nav( 'nav-below' );
		} else {
			get_template_part( 'content', 'not-found' );
		}
	?>

		</div><!--/ #content .grid_8-->

<aside id="sidebar" class="span4">
<?php get_sidebar(); ?>
</aside>
<!-- /.grid_4 -->
<?php get_footer(); ?>