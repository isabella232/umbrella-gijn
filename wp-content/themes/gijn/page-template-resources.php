<?php
/**
 * Page Template: Resources Search Page
 * Template Name: Resources Search Page
 * Description: Shows the search, the icons, and the sidebar.
 *
 * Copied from Largo's single-two-column.php at dbfb738663d1af11332af66f4ff4e1a8b64d2c1a
 * @since Largo 0.5.4
 * @link http://jira.inn.org/browse/GIJN-37
 */


/**
 * The list of resource links
 * This is a placeholder.
 *
 * Array(
 *    'Resource' => array(
 *        'icon' => 'slug',
 *        'link' => 'url',
 *    )
 * )
 */

$resources = array(
	'Business & Trade' => array('icon' => 'Business & Trade.png', 'link' => 'tktk', 'color' => 'dkgrey'),
	'Corruption' => array('icon' => 'Corruption.png', 'link' => 'tktk', 'color' => 'red'),
	'Crime' => array('icon' => 'Crime.png', 'link' => 'tktk', 'color' => 'dkgrey'),
	'Education' => array('icon' => 'Education.png', 'link' => 'tktk', 'color' => 'sedge'),
	'Environment' => array('icon' => 'Environment.png', 'link' => 'tktk', 'color' => 'red'),
	'Food & Agriculture' => array('icon' => 'Food & Ag.png', 'link' => 'tktk', 'color' => 'khaki'),
	'Health' => array('icon' => 'Helath.png', 'link' => 'tktk', 'color' => 'sedge'),
	'Human Rights' => array('icon' => 'Human Rights.png', 'link' => 'tktk', 'color' => 'orange'),
	'Military & Conflict' => array('icon' => 'Military & Conflict.png', 'link' => 'tktk', 'color' => 'red'),
	'Poverty & Development' => array('icon' => 'Poverty & Development.png', 'link' => 'tktk', 'color' => 'khaki'),
	'Sports' => array('icon' => 'Sports.png', 'link' => 'tktk', 'color' => 'orange'),
	'Terrorism & Extremists' => array('icon' => 'Terrorism.png', 'link' => 'tktk', 'color' => 'red'),
);

global $shown_ids;

add_filter('body_class', function($classes) {
	$classes[] = 'classic';
	return $classes;
});

get_header();
?>

<div id="content" class="span8" role="main">

	<?php
		while ( have_posts() ) : the_post();

			$shown_ids[] = get_the_ID();

			$partial = ( is_page() ) ? 'page' : 'single-classic';

			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix resources-page'); ?>>

				<?php do_action('largo_before_page_header'); ?>

				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php edit_post_link(__('Edit This Page', 'largo'), '<h5 class="byline"><span class="edit-link">', '</span></h5>'); ?>
				</header><!-- .entry-header -->

				<?php do_action('largo_after_page_header'); ?>

				<section class="entry-content">

					<?php do_action('largo_before_page_content'); ?>

					<?php the_content(); ?>

					<?php /*
					       * The search form
						   */ ?>
					<form name="searchform" method="get" action="http://gijn.bywatersolutions.com/cgi-bin/koha/opac-search.pl" id="searchform" class="form-inline input-append clearfix">
						<label for="transl1"><?php _e('Search', 'largo'); ?>:</label>
						<select name="idx" id="masthead_search">
							<option value="kw">Keyword</option>
							<option value="ti">Title</option>
							<option value="au">Author</option>
							<option value="su">Subject</option>
							<option value="nb">ISBN</option>
							<option value="se">Series</option>
							<option value="callnum">Call Number</option>
						</select>
						<input id="transl1" name="q" type="text"><button value="Search" id="searchsubmit" type="submit" class="btn"><?php _e("Go", 'largo');?></button>
					</form>

					<p id="advanced-search" class="sans "><a class="red" href="tktk">Advanced Search</a></p>

					<h3><?php _e('Key Sources', 'gijn'); ?></h3>
					<div class="row row-fluid resource-list">
					<?php

					foreach ( $resources as $name => $properties ) {
						?>
						<div class="span3 resource-link <?php echo $properties['color']; ?>">
							<a href="<?php echo $properties['link'];?>">
								<img src="<?php echo get_stylesheet_directory_uri() . '/img/' . $properties['icon'];?>" alt="<?php echo $name;?>">
								<span class="title"><?php echo $name; ?></span>
							</a>
						</div>
						<?php
					}
					?>
					</div>

					<div class="row">
						<div class="span6">
							<?php dynamic_sidebar('resources-page-bottom-left'); ?>
						</div>
						<div class="span6">
							<?php dynamic_sidebar('resources-page-bottom-right'); ?>
						</div>
					</div>

					<?php do_action('largo_after_page_content'); ?>

				</section><!-- .entry-content -->

			</article><!-- #post-<?php the_ID(); ?> -->

			<?php

		endwhile;
	?>
</div>

<?php do_action('largo_after_content'); ?>

<?php get_sidebar(); ?>

<?php get_footer();
