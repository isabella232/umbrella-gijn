<?php
// This site is an INN Member
if ( !defined( 'INN_MEMBER' ) ) {
    define( 'INN_MEMBER', true) ;
}

// This site is hosted by INN
if ( !defined( 'INN_HOSTED' ) ) {
    define( 'INN_HOSTED', true) ;
}

/**
 * Includes
 */
$includes = array(
	'/inc/member-directory.php', // member directory
	'/inc/options.php' // additional theme options
);
// Perform load
foreach ( $includes as $include ) {
	require_once( get_stylesheet_directory() . $include );
}


/**
 * Include compiled style.css
 */
function gijn_stylesheet() {
	wp_dequeue_style( 'largo-child-styles' );

	wp_enqueue_style( 'gijn', get_stylesheet_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'gijn_stylesheet', 20 );


// add a custom feed template to include argolinks
add_feed('combined_feed_rss2', 'gijn_custom_rss');
function gijn_custom_rss() {
	add_filter('pre_option_rss_use_excerpt', '__return_zero');
	load_template( get_stylesheet_directory() . '/customfeed.php' );
}


function gijn_archive_rounduplink_title() {
	$title = __( 'Around The World', 'gijn' );
	return $title;
}
add_filter( 'largo_archive_rounduplink_title', 'gijn_archive_rounduplink_title' );

function gijn_register_sidebars() {
	register_sidebar( array(
		'name' => __('Resources Page Bottom Right', 'gijn'),
		'Description' => __('The right-hand area on the bottom of pages using the Resources Page template', 'gijn'),
		'id' => 'resources-page-bottom-right',
		'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="widgettitle">',
		'after_title' 	=> '</h3>',
	) );
	register_sidebar( array(
		'name' => __('Resources Page Bottom Left', 'gijn'),
		'Description' => __('The left-hand area on the bottom of pages using the Resources Page template', 'gijn'),
		'id' => 'resources-page-bottom-left',
		'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="widgettitle">',
		'after_title' 	=> '</h3>',
	) );
}
add_action( 'widgets_init', 'gijn_register_sidebars', 99 );

function gijn_reregister_wp_widget_rss() {
	register_widget('WP_Widget_RSS');
}
add_action( 'widgets_init', 'gijn_reregister_wp_widget_rss', 20 );// make sure this runs after Largo's runction removing it
