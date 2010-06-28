<?php
/*
Plugin Name: Link Prefetching
Plugin URI: http://intlect.com/wordpress-link-prefetching/
Description: A simple plugin to add link prefetching links on your homepage (to your latest post) and on your posts (to the previous and next posts). Activate and that's it.
Version: 1.0.1
Author: TJ
Author URI: http://intlect.com
*/

add_action('wp_head', 'wp_linkprefetch');

function wp_linkprefetch() {
	if (is_home()) {
		$nextPost = get_next_post(true);
		$nextURI = get_permalink($nextPost->ID);
		echo "".'<link rel="next" href="'.$nextURI.'"/>'."\n";
	} else {
		$nextPost = get_next_post(true);
		$nextURI = get_permalink($nextPost->ID);
		$prevPost = get_previous_post(true);
		$prevURI = get_permalink($prevPost->ID);
		echo "".'<link rel="next" href="'.get_bloginfo(wpurl).'"/>'."\n";
		echo "".'<link rel="next" href="'.$prevURI.'"/>'."\n";
		echo "".'<link rel="next" href="'.$nextURI.'"/>'."\n";
	}
}
?>
