<?php 

function add_taxonomies_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
	register_taxonomy_for_object_type( 'post_tag', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' ); 

add_post_type_support( 'post', 'page-attributes' );