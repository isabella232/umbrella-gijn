<?php

/**
 * Extend the Largo settings page to add more options
 */
function gijn_custom_options($options) {
	// tacking this option on to the end of the theme options
	$options[] = array(
		'name' => __('GIJN Options', 'gijn'),
		'type' => 'heading'
	);
	$options[] = array(
		'desc' => __('<strong>Google Maps API key</strong> (Used for geocoding member locations, for <a href="https://gijn.org/member/">gijn.org/member</a>https://po.missouri.edu/cgi-bin/wa?A0=GLOBAL-L)', 'gijn'),
		'id'   => 'google_maps_api_key',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'desc' => __('<strong>Frontend Google Maps API key</strong> (Used for displaying the map of member locations at <a href="https://gijn.org/member/">gijn.org/member</a>)', 'gijn'),
		'id'   => 'google_maps_api_key_frontend',
		'std'  => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Additional Social Links', 'gijn'),
		'type' => 'info'
	);
	$options[] = array(
		'desc' => __('<strong>Link for GIJN Listserv</strong> (https://po.missouri.edu/cgi-bin/wa?A0=GLOBAL-L)', 'gijn'),
		'id'   => 'listserv_link',
		'std'  => '',
		'type' => 'text'
	);
	return $options;
}
add_filter('largo_options', 'gijn_custom_options');

function gijn_additional_networks( $networks ) {
	if ( of_get_option( 'listserv_link' ) ) {
		$gijn_networks = array( 
			'listserv' => 'Join The GIJN Listserv'
		);
		$networks = array_merge( $networks, $gijn_networks );
	}
	return $networks;
}
add_filter( 'largo_additional_networks', 'gijn_additional_networks' );
