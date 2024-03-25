<?php
add_action( 'template_redirect', 'wpse_128636_redirect_post' );

function wpse_128636_redirect_post() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'organizations' ==  $queried_post_type ) {
    wp_redirect( home_url('/organisations/') );
    exit;
  }
}

add_action( 'template_redirect', 'wpse_128636_redirect_post_org_archive' );

function wpse_128636_redirect_post_org_archive() {
  $queried_post_type = get_query_var('post_type');
  if ( is_post_type_archive('organizations') ) {
    wp_redirect( home_url('/organisations/') );
    exit;
  }
}

add_action( 'template_redirect', 'wpse_128636_redirect_post_ipopievent' );

function wpse_128636_redirect_post_ipopievent() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'ipopievent' ==  $queried_post_type ) {
    wp_redirect( home_url('/about-ipopi/calendar/') );
    exit;
  }
}