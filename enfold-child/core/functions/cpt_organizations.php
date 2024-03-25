<?php
if ( ! function_exists('custom_post_type_organization') ) {

// Register Custom Post Type
function custom_post_type_organization() {

	$labels = array(
		'name'                  => _x( 'Organizations', 'Organizations', 'ipopi' ),
		'singular_name'         => _x( 'Organizations', 'Organizations', 'ipopi' ),
		'menu_name'             => __( 'Organizations', 'ipopi' ),
		'name_admin_bar'        => __( 'Organizations', 'ipopi' ),
		'archives'              => __( 'Item Archives', 'ipopi' ),
		'attributes'            => __( 'Item Attributes', 'ipopi' ),
		'parent_item_colon'     => __( 'Parent Item:', 'ipopi' ),
		'all_items'             => __( 'All Items', 'ipopi' ),
		'add_new_item'          => __( 'Add New Item', 'ipopi' ),
		'add_new'               => __( 'Add New', 'ipopi' ),
		'new_item'              => __( 'New Item', 'ipopi' ),
		'edit_item'             => __( 'Edit Item', 'ipopi' ),
		'update_item'           => __( 'Update Item', 'ipopi' ),
		'view_item'             => __( 'View Item', 'ipopi' ),
		'view_items'            => __( 'View Items', 'ipopi' ),
		'search_items'          => __( 'Search Item', 'ipopi' ),
		'not_found'             => __( 'Not found', 'ipopi' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ipopi' ),
		'featured_image'        => __( 'Featured Image', 'ipopi' ),
		'set_featured_image'    => __( 'Set featured image', 'ipopi' ),
		'remove_featured_image' => __( 'Remove featured image', 'ipopi' ),
		'use_featured_image'    => __( 'Use as featured image', 'ipopi' ),
		'insert_into_item'      => __( 'Insert into item', 'ipopi' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ipopi' ),
		'items_list'            => __( 'Items list', 'ipopi' ),
		'items_list_navigation' => __( 'Items list navigation', 'ipopi' ),
		'filter_items_list'     => __( 'Filter items list', 'ipopi' ),
	);
	$args = array(
		'label'                 => __( 'Organizations', 'ipopi' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', 'thumbnail', 'page-attributes', ),
		'taxonomies'            => array( 'country' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'organizations', $args );

}
add_action( 'init', 'custom_post_type_organization', 0 );

} 