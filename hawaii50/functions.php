<?php

function get_recent_posts($num_posts = 5, $before = '<li>', $after = '</li>') {
    global $wpdb;
	$now = gmdate("Y-m-d H:i:s",time());
    $request = "SELECT ID, post_title, post_excerpt FROM $wpdb->posts 
                WHERE post_status = 'publish' AND post_type='post'
                AND post_date_gmt < '$now' ORDER BY post_date DESC LIMIT 0, $num_posts";
    
    $posts = $wpdb->get_results($request);
	$output = '';
    if($posts) {
		foreach ($posts as $post) {
			$post_title = stripslashes($post->post_title);
			$permalink = get_permalink($post->ID);
			$output .= $before . '<a href="' . $permalink . '"rel="bookmark" title="Permanent Link: ' . htmlspecialchars($post_title, ENT_COMPAT) . '">' . $post_title . '</a>';
			$output .= $after;
		}
	} else {
		$output .= $before . "No posts found." . $after;
	}
    echo $output;
}

?>