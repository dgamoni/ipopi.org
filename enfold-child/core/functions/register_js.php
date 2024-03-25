<?php

function ipopi_scripts_child() {
	wp_register_script( 'ipopi-function-child-js', CORE_URL . '/js/function-child.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'ipopi-function-child-js');

	wp_localize_script( 'ipopi-function-child-js', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'ipopi_scripts_child', 101 );

