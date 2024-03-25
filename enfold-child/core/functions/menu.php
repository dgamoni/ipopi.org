<?php
	//first append search item to main menu
	add_filter( 'wp_nav_menu_items', 'avia_append_search_nav_child', 9997, 2 );
	add_filter( 'avf_fallback_menu_items', 'avia_append_search_nav_child', 9997, 2 );

	function avia_append_search_nav_child ( $items, $args )
	{	
	
	    if ((is_object($args) && $args->theme_location == 'avia') || (is_string($args) && $args = "fallback_menu"))
	    {


	        $items .= '<li id="menu-dot" class="menu-item"><a href="#"><span>•</span></a></li>';
	    }
	    return $items;
	} 