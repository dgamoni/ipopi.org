<?php
global $avia_config;

add_filter( 'avf_google_heading_font', 'avia_add_heading_font');
function avia_add_heading_font($fonts) {
	$fonts['Open Sans'] = 'Open Sans:100,200,300,400,500,600,700,800,900,400italic,700italic';
	return $fonts;
}

// add_filter( 'avf_google_content_font', 'avia_add_content_font');
// function avia_add_content_font($fonts) {
// 	$fonts['PT Sans'] = 'PT Sans:100,200,300,400,500,600,700,800,900,400italic,700italic';
// 	return $fonts;
// }