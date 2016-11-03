<?php

include_once get_template_directory() . '/homepages/homepage-class.php';

class GIJNHomepageLayout extends Homepage {
  var $name = 'GIJN Impact Site Homepage Layout';
  var $description = 'Custom homepage layout for GIJN Impact site.';

  function __construct($options=array()) {
    $defaults = array(
      'template' => get_stylesheet_directory() . '/homepages/templates/gijn.php',
      'assets' => array(
	  		array('gijn', get_stylesheet_directory_uri() . '/homepages/assets/css/gijn.css', array()),
	  	)
    );
	$options = array_merge($defaults, $options);
    $this->init();
    $this->load($options);
  }
}

function gijn_custom_homepage_layouts() {
	$unregister = array(
		'HomepageBlog',
		'HomepageSingle',
		'HomepageSingleWithFeatured',
		'HomepageSingleWithSeriesStories',
		'TopStories',
		'Slider'
	);

	foreach ($unregister as $layout)
		unregister_homepage_layout($layout);

	register_homepage_layout('GIJNHomepageLayout');

}
add_action('init', 'gijn_custom_homepage_layouts', 10);
