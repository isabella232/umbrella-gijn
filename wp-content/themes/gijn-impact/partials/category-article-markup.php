<div class="primary-featured-post">
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix row-fluid'); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="span4">
			<?php if ( is_home() && largo_has_categories_or_tags() && $tags === 'top' ) { ?>
				<h5 class="top-tag"><?php largo_categories_and_tags( 1 ); ?></h5>
			<?php } ?>

			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'rect_thumb' ); ?></a>
		</div>

		<div class="span8">
	<?php } else { ?>
		<div class="span12">
	<?php } ?>
			<header>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __( 'Permalink to', 'largo' ) . ' ' ) )?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			</header><!-- / entry header -->

			<div class="entry-content">
				<?php largo_excerpt( $post, 5, true, '', true, false ); ?>
			</div><!-- .entry-content -->
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
