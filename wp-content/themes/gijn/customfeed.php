<?php
/*
 * Template Name: GIJN Custom Feed
 * This includes the argolinks post type with appropriate formatting
 */

$numposts = 20;

function rss_date( $timestamp = null ) {
  $timestamp = ($timestamp==null) ? time() : $timestamp;
  echo date(DATE_RSS, $timestamp);
}

function rss_text_limit($string, $length, $replacer = '...') {
  $string = strip_tags($string);
  if(strlen($string) > $length)
    return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
  return $string;
}

$posts = query_posts( array(
     'post_type' => array( 'post', 'argolinks' ),
     'showposts' => $numposts )
     );

$lastpost = $numposts - 1;

header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<?xml version="1.0"?>';
?><rss version="2.0">
<channel>
  <title>Global Investigative Journalism Network</title>
  <link>http://gijn.org/</link>
  <description>The latest updates from the Global Investigative Journalism Network.</description>
  <language>en-us</language>
  <pubDate><?php rss_date( strtotime($ps[$lastpost]->post_date_gmt) ); ?></pubDate>
  <lastBuildDate><?php rss_date( strtotime($ps[$lastpost]->post_date_gmt) ); ?></lastBuildDate>
  <managingEditor>david.kaplan@gijn.org</managingEditor>

<?php foreach ($posts as $post) {
	if (get_post_type($post) === 'argolinkroundups') continue;
	if (get_post_type($post) === 'argolinks' ) {
		$custom = get_post_custom($post->ID);
		$link = isset( $custom["argo_link_url"][0] ) ? $custom["argo_link_url"][0] : '';
		$description = isset( $custom["argo_link_description"][0] ) ? $custom["argo_link_description"][0] : '';
		if ( $link === '') continue;
	?>
  <item>
    <title><?php echo get_the_title($post->ID); ?></title>
    <link><?php echo $link; ?></link>
    <description><?php echo '<![CDATA['. $description .']]>';  ?></description>
    <pubDate><?php rss_date( strtotime($post->post_date_gmt) ); ?></pubDate>
    <guid><?php echo $link; ?></guid>
  </item>
	<?php } else { ?>
  <item>
    <title><?php echo get_the_title($post->ID); ?></title>
    <link><?php echo get_permalink($post->ID); ?></link>
    <description><?php echo '<![CDATA[' . rss_text_limit($post->post_content, 500) . '<br/><br/>Continue Reading: <a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a>' . ']]>';  ?></description>
    <pubDate><?php rss_date( strtotime($post->post_date_gmt) ); ?></pubDate>
    <guid><?php echo get_permalink($post->ID); ?></guid>
  </item>
  	<?php } // endif
} // endforeach ?>
</channel>
</rss>