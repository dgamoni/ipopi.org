<?php
// Register the "Country" taxonomy

function wp_cc_tax_custom_taxonomy() {

  // Define labels in an array

  $labels = array(
    'name'                => _x( 'Country', 'Country' ),
    'singular_name'       => _x( 'Countries', 'Countries' ),
    'search_items'        =>  __( 'Search Countries' ),
    'all_items'           => __( 'All Countries' ),
    'edit_item'           => __( 'Edit Country' ),
    'update_item'         => __( 'Update Country' ),
    'add_new_item'        => __( 'Add New Country' ),
    'new_item_name'       => __( 'New Country Name' ),
    'menu_name'           => __( 'Countries' ),
  );

  register_taxonomy( 'country', array( 'organizations','pid-products' ), array(
    'hierarchical'=> true,
    'labels'      => $labels,
    'show_ui'     => true,
    'query_var'   => true,
    'rewrite'     => array( 'slug'   => 'country' ),
  ));
}

add_action( 'init', 'wp_cc_tax_custom_taxonomy'); 

// Register the "Brand" taxonomy

function wp_cc_tax_custom_taxonomy_brand() {

  // Define labels in an array

  $labels = array(
    'name'                => _x( 'Brand', 'Brand' ),
    'singular_name'       => _x( 'Brands', 'Brands' ),
    'search_items'        =>  __( 'Search Brands' ),
    'all_items'           => __( 'All Brands' ),
    'edit_item'           => __( 'Edit Brand' ),
    'update_item'         => __( 'Update Brand' ),
    'add_new_item'        => __( 'Add New Brand' ),
    'new_item_name'       => __( 'New Brand Name' ),
    'menu_name'           => __( 'Brand' ),
  );

  register_taxonomy( 'brand', array( 'pid-products' ), array(
    'hierarchical'=> true,
    'labels'      => $labels,
    'show_ui'     => true,
    'query_var'   => true,
    'rewrite'     => array( 'slug'   => 'brand' ),
  ));
}

add_action( 'init', 'wp_cc_tax_custom_taxonomy_brand'); 