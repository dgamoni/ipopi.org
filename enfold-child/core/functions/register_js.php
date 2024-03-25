<?php

function ipopi_scripts_child() {

	wp_register_script( '_avia_sc_toggle_js', CORE_URL . '/js/avia_sc_toggle_.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( '_avia_sc_toggle_js');

	wp_register_script( 'ipopi-function-child-js', CORE_URL . '/js/function-child.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'ipopi-function-child-js');

	if ( is_page_template('pid-map-template.php') ) {
		wp_register_script('snazzy_info_window_js', CORE_URL . '/js/snazzy-info-window.min.js', array('jquery'), '', true);
		wp_enqueue_script( 'snazzy_info_window_js' );
		wp_register_style('snazzy_info_window', CORE_URL .'/css/snazzy-info-window.css', array(),null, 'all');
		wp_enqueue_style('snazzy_info_window');
		wp_register_script( 'ipopi-pidmap-js', CORE_URL . '/js/pidmap.js', array( 'jquery' ), '1', true );
		wp_enqueue_script( 'ipopi-pidmap-js');
		wp_localize_script( 'ipopi-pidmap-js', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}
	
	wp_localize_script( 'ipopi-function-child-js', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	
}
add_action( 'wp_enqueue_scripts', 'ipopi_scripts_child', 101 );

// Replace avia.js
function change_aviajs() {
   wp_dequeue_script( 'avia-default' );
   wp_enqueue_script( 'avia-default-child', CORE_URL .'/js/avia.js', array('jquery'), 2, true );
}
add_action( 'wp_enqueue_scripts', 'change_aviajs', 100 );