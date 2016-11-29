<?php

// This site is an INN Member
if ( !defined( 'INN_MEMBER' ) {
    define( 'INN_MEMBER', true) ;
}

// This site is hosted by INN
if ( !defined( 'INN_HOSTED' ) {
    define( 'INN_HOSTED', true) ;
}
// Include the Largo metabox API
require_once( get_template_directory() . '/largo-apis.php' );


// Includes
$includes = array(
	'/inc/metaboxes.php',
	'/inc/sidebars.php',
	'/homepages/homepage.php'
);
foreach ( $includes as $include ) {
	require_once( get_stylesheet_directory() . $include );
}


add_theme_support( 'custom-header' );


// Add excerpts to pages
function gijn_init() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'gijn_init' );


function largo_header() {
	$header_tag = is_home() ? 'h1' : 'h2'; // use h1 for the homepage, h2 for internal pages

	// if we're using the text only header, display the output, otherwise this is just replacement text for the banner image
	$header_class = of_get_option( 'no_header_image' ) ? 'branding' : 'visuallyhidden';
	$divider = $header_class == 'branding' ? '' : ' - ';

	// print the text-only version of the site title
	printf('<%1$s class="%2$s"><a itemprop="url" href="%3$s"><span itemprop="name">%4$s</span>%5$s<span class="tagline" itemprop="description">%6$s</span></a></%1$s>',
		$header_tag,
		$header_class,
		esc_url( home_url( '/' ) ),
		esc_attr( get_bloginfo('name') ),
		$divider,
		esc_attr( get_bloginfo('description') )
	);

	// modified to show this on every page, not just homepage
	echo '<a itemprop="url" href="' . esc_url( home_url( '/' ) ) . '"><img class="header_img" src="" alt="" /></a>';

	if ( of_get_option( 'logo_thumbnail_sq' ) ) {
		echo '<meta itemprop="logo" content="' . esc_url( of_get_option( 'logo_thumbnail_sq' ) ) . '"/>';
	}
}


function show_more_interviews( $query ) {
	if ($query->is_main_query() && is_category('interviews'))
		$query->set('posts_per_page', 100);
}
add_action('pre_get_posts', 'show_more_interviews');
