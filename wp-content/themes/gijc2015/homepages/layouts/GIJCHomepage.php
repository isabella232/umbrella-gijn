<?php

include_once get_template_directory() . '/homepages/homepage-class.php';

class GIJCHome extends Homepage {

	function __construct($options=array()) {
		$suffix = (LARGO_DEBUG)? '' : '.min';

		$defaults = array(
			'name' => __('GIJC Homepage Template', 'largo'),
			'type' => 'rrlargo',
			'description' => __('Home bottom widget area at the top, sidebar of partners, sponsors at the bottom.', 'largo'),
			'template' => get_stylesheet_directory() . '/homepages/templates/gijc-homepage.php',
		);
		$options = array_merge($defaults, $options);
		parent::__construct($options);
	}
}

/**
 * Unregister some of the default homepage templates
 * Register our custom one
 *
 * @since 0.1
 */
function gijc_custom_homepage_layouts() {
	$unregister = array(
		'HomepageBlog',
		'HomepageSingle',
		'HomepageSingleWithFeatured',
		'HomepageSingleWithSeriesStories',
		'TopStories',
		'LegacyThreeColumn'
	);
	foreach ( $unregister as $layout )
		unregister_homepage_layout( $layout );
	register_homepage_layout( 'GIJCHome' );
}
add_action( 'init', 'gijc_custom_homepage_layouts', 10 );

/**
 * Register some sidebars
 */
function gijc_homepage_widget_areas() {
	$sidebars = array(
		array(
			'name' 	=> __( 'Homepage Bottom', 'largo' ),
			'desc' 	=> __( 'An optional widget area at the bottom of the homepage', 'largo' ),
			'id' 	=> 'homepage-bottom'
		)
	);

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( $sidebar );
	}
}
add_action( 'widgets_init', 'gijc_homepage_widget_areas' );
