<?php

add_filter('posts_clauses', 'posts_clauses_feed', 10, 2);
function posts_clauses_feed( $clauses, $wp_query ) {
	global $wpdb;


	if (is_feed()) {

		$clauses['orderby'] = "wp_posts.post_date DESC";
		//var_dump($clauses['orderby']); 
	}
	return $clauses;
}