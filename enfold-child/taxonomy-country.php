<?php
$tag = get_queried_object();
//var_dump($tag->slug);
wp_redirect( home_url('/organisations/#'.$tag->slug.'') );
