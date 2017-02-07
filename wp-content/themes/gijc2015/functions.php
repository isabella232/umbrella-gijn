<?php
// hides the INN logo and feed of member stories
define( 'INN_MEMBER', FALSE );

function gijn_enqueue() {
	wp_enqueue_style( 'gijn-stylesheet', get_stylesheet_directory_uri().'/style.css' );	//often overridden by custom-less-variables version
}
add_action( 'wp_enqueue_scripts', 'gijn_enqueue', 20 );

/**
 * Include theme files
 *
 * Based off of how Largo loads files: https://github.com/INN/Largo/blob/master/functions.php#L358
 *
 * 1. hook function Largo() on after_setup_theme
 * 2. function Largo() runs Largo::get_instance()
 * 3. Largo::get_instance() runs Largo::require_files()
 *
 * This function is intended to be easily copied between child themes, and for that reason is not prefixed with this child theme's normal prefix.
 *
 * @link https://github.com/INN/Largo/blob/master/functions.php#L145
 */
function largo_child_require_files() {
	$includes = array(
		'/largo-follow-gijn.php',
		'/homepages/layouts/GIJCHomepage.php',
	);
	if ( class_exists( 'WP_CLI_Command' ) ) {
		require __DIR__ . '/inc/cli.php';
		WP_CLI::add_command( 'rr', 'RR_WP_CLI' );
	}
	foreach ($includes as $include ) {
		require_once( get_stylesheet_directory() . $include );
	}
}
add_action( 'after_setup_theme', 'largo_child_require_files' );


function gijn_widgets() {
	register_widget( 'largo_follow_widget_gijn' );
}
add_action( 'widgets_init', 'gijn_widgets' );

function gijc_register_sidebars() {
	register_sidebar( array(
			'name' 			=> __( 'Sponsors', 'largo' ),
			'desc' 			=> __( 'The sponsors section on the homepage', 'largo' ),
			'id' 			=> 'sponsors',
			'before_widget' => '',
			'after_widget' 	=> '',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>',
		) );
	register_sidebar( array(
			'name' 			=> __( 'Partners', 'largo' ),
			'desc' 			=> __( 'The partners section on the homepage', 'largo' ),
			'id' 			=> 'partners',
			'before_widget' => '',
			'after_widget' 	=> '',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>',
		) );

}
add_action( 'widgets_init', 'gijc_register_sidebars' );
