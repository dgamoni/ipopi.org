<?php
if ( ! function_exists('custom_post_type_ipopievent') ) {

// Register Custom Post Type
function custom_post_type_ipopievent() {

	$labels = array(
		'name'                  => _x( 'Events', 'Events', 'ipopi' ),
		'singular_name'         => _x( 'Events', 'Events', 'ipopi' ),
		'menu_name'             => __( 'Events', 'ipopi' ),
		'name_admin_bar'        => __( 'Events', 'ipopi' ),
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
		'label'                 => __( 'Events', 'ipopi' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', 'thumbnail', 'page-attributes', ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'           	=> 'dashicons-calendar-alt'
	);
	register_post_type( 'ipopievent', $args );

}
add_action( 'init', 'custom_post_type_ipopievent', 0 );

} 


	// function manage_organizations_columns( $column_name, $id ) {

	// 	global $wpdb, $pageURLs;

	// 	$diplom = get_post( $id );
	// 	$user   = get_userdata( $diplom->post_author );

	// 	switch ( $column_name ) {
	// 		case 'id':
	// 			echo $id;
	// 			break;

	// 		case 'country':
	// 				$terms = get_the_terms($id, 'country');
	// 				foreach($terms as $term)
	// 				    echo ' '.$term->name. ' ';
	// 			break;


	// 		default:
	// 			break;
	// 	} // end switch
	// }

	// function add_organizations_columns( $columns ) {

	// 	global $pageURLs;
	// 	$new_columns['cb']               = '<input type="checkbox" />';
	// 	$new_columns['title']            = _x( 'Title', 'column name' );
	// 	$new_columns['country'] = _x( 'Country', 'country' );
	// 	$new_columns['date']             = _x( 'Date', 'column name' );
	// 	return $new_columns;
	// }
	// add_filter( 'manage_edit-organizations_columns', 'add_organizations_columns' );
	// add_action( 'manage_organizations_posts_custom_column', 'manage_organizations_columns', 10, 2 );



	// 	// Make these columns sortable
	// function sortable_columns_organizations() {
	//   return array(
	//   	'title'     => 'title',
	//   	'country'     => 'country',
	//     'date' => 'date'
	//   );
	// }

	// add_filter( "manage_edit-organizations_sortable_columns", "sortable_columns_organizations" );