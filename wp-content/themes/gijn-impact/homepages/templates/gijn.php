<div class="row-fluid top">
	<div class="span8 featured-video">
		<div class="embed-container">
			<iframe width="560" height="315" src="//www.youtube.com/embed/F2gGHYuNn1Y" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
	<div class="span4">
		<div class="about">
			<?php the_widget( 'largo_about_widget', array( 'title' => __('Why Investigative Journalism Matters', 'largo') ) ); ?>
			<a href="http://gijn.org/" title="Global Investigative Journalism Network"><?php echo wp_get_attachment_image(220, 'full'); ?></a>
		</div>
	</div>
</div>

<div class="row-fluid" id="infographic-and-interviews">
	<div class="span6 infographic">
		<h3><a href="/the-impact-infographic/">The Impact Infographic</a></h3>
		<p><a href="/the-impact-infographic/">
			<?php echo wp_get_attachment_image(277, 'full'); ?></a></p>
	</div>
	<div class="span6 interviews">
		<h3><a href="/category/interviews/">Interviews</a></h3>
		<p><a href="/category/interviews/">
			<?php echo wp_get_attachment_image(161, 'full'); ?></a></p>
	</div>
</div>

<div class="row-fluid">
	<div class="span8" id="case-studies">
		<h3><a href="/category/case-studies/"
			title="Case Studies"
			rel="bookmark">Case Studies</a></h3>
		<div class="row-fluid">
<?php
	$args = array(
		'cat'		=> 11,
		'orderby'	=> 'date',
		'order'		=> 'asc',
		'showposts'	=> 10
	);
	$query = new WP_Query( $args );

    if ( $query->have_posts() ) :
    	$count = 1;
		while ( $query->have_posts() ) : $query->the_post();
			//if ( $count != 10 ) { ?>

				<div class="span6 case-study">
					<a href="<?php the_permalink(); ?>"
						title="<?php the_title_attribute( array( 'before' => __( 'Permalink to', 'largo' ) . ' ' ) )?>"
						rel="bookmark">
						<?php the_post_thumbnail('full'); ?>
					</a>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>"
							title="<?php the_title_attribute( array( 'before' => __( 'Permalink to', 'largo' ) . ' ' ) )?>"
							rel="bookmark">
							<?php the_title(); ?>
						</a>
					</h2>
				</div>
				<?php  if ($query->current_post > 0 && $query->current_post % 2 == 1) { ?></div><div class="row-fluid"><?php }
			//} else { // the tenth post starts the bottom section ?>
			<?php
			//}
		$count++;
		endwhile;
		endif; ?>
		</div>
	</div>
	<div class="span4" id="report-and-resources-container">
		<div id="report-and-resources">
			<div class="row-fluid odd">
				<div class="span12">
					<h3><a href="/report/"
						title="Impact: The Report"
						rel="bookmark">Impact: The Report</a></h3>
					<a href="/report/"
						title="Impact: The Report"
						rel="bookmark">
						<?php echo wp_get_attachment_image(1756, 'full'); ?>
					</a>
				</div>
			</div>
			<div class="row-fluid even">
				<div class="span12">
					<h3><a href="/resources/"
						title="Resources"
						rel="bookmark">Resources</a></h3>
					<a href="/resources/"
						title="Resources"
						rel="bookmark">
						<?php echo wp_get_attachment_image(265, 'full'); ?>
					</a>
				</div>
			</div>
			<div class="row-fluid odd">
				<div class="span12">
					<h3><a href="http://gijn.org/tag/impact/"
						title="Stories"
						rel="bookmark">Stories</a></h3>
					<a href="http://gijn.org/tag/impact/"
						title="Stories"
						rel="bookmark">
						<?php echo wp_get_attachment_image(268, 'full'); ?>
					</a>
				</div>
			</div>
			<div class="row-fluid even">
				<div id="google-ideas">
					<small>This project is supported by:</small>
					<a href="http://www.google.com/ideas/">
						<?php echo wp_get_attachment_image(181, 'full'); ?>
					</a>
					<p><?php $google_ideas_attchment = get_post(181); echo $google_ideas_attchment->post_excerpt; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
