<?php

function get_all_country() {
	$args_country = array(
		'taxonomy'      => array( 'country' ), // название таксономии с WP 4.5
		'orderby'       => 'name', 
		'order'         => 'ASC',
		'hide_empty'    => false, 
		'object_ids'    => null, // 
		'include'       => array(),
		'exclude'       => array(), 
		'exclude_tree'  => array(), 
		'number'        => '', 
		'fields'        => 'all', 
		'count'         => false,
		'slug'          => '', 
		'parent'         => '',
		'hierarchical'  => true, 
		'child_of'      => 0, 
		'get'           => '', // ставим all чтобы получить все термины
		'name__like'    => '',
		'pad_counts'    => false, 
		'offset'        => '', 
		'search'        => '', 
		'cache_domain'  => 'core',
		'name'          => '', // str/arr поле name для получения термина по нему. C 4.2.
		'childless'     => false, // true не получит (пропустит) термины у которых есть дочерние термины. C 4.2.
		'update_term_meta_cache' => true, // подгружать метаданные в кэш
		'meta_query'    => '',
	); 

	$myterms = get_terms( $args_country );
	return $myterms;
}

function generateAtoZHtml()	{

	$args_country = array(
		'taxonomy'      => array( 'country' ), // название таксономии с WP 4.5
		'orderby'       => 'name', 
		'order'         => 'ASC',
		 'hide_empty'    => true, 
		//'hide_empty'    => false, 
		'object_ids'    => null, // 
		'include'       => array(),
		'exclude'       => array(), 
		'exclude_tree'  => array(), 
		'number'        => '', 
		'fields'        => 'all', 
		'count'         => false,
		'slug'          => '', 
		'parent'         => '',
		'hierarchical'  => true, 
		'child_of'      => 0, 
		'get'           => '', // ставим all чтобы получить все термины
		'name__like'    => '',
		'pad_counts'    => false, 
		'offset'        => '', 
		'search'        => '', 
		'cache_domain'  => 'core',
		'name'          => '', // str/arr поле name для получения термина по нему. C 4.2.
		'childless'     => false, // true не получит (пропустит) термины у которых есть дочерние термины. C 4.2.
		'update_term_meta_cache' => true, // подгружать метаданные в кэш
		'meta_query'    => '',
		'post_type'		=> 'organizations' // used filter the terms clauses
	); 

	$myterms = get_terms( $args_country );


		$startCapital = 65;
		$startSmall = 97;

		$html = "<div id='wp-alphabet-listing'>";
		//$html .= "<section>";
		//$html .= "<h2></h2>";
		//$html .= "<ol>\n";
		$button = '<a href="#" class="is-checked letter"  data-tag="{All}" data-filter="element-item">All</a><span>•</span>';
		
		for($i = 0;$i<26;$i++)
		{
			$hasItem = FALSE;
			$tempHtml = "";
			//$html .= "<li><a href='#'>" . chr($startCapital + $i) . "</a>\n";
			$html .= '<div class="element-item cat-' . chr($startCapital + $i) .'" data-category="cat-' . chr($startCapital + $i) .'">';
			
			// $button .= '<a href="#" class="letter" data-filter="cat-'.chr($startCapital + $i).'">'.chr($startCapital + $i).'</a>';

			foreach($myterms as $row)
			{
				if (( $row->name[0] == chr($startCapital + $i)) || ( $row->name[0] == chr($startSmall + $i)))
				{
					$tempHtml .= "<div class='single_toggle' data-tags='{All} {".chr($startCapital + $i)."}'> 
									<p data-fake-id='#".($row->slug)."' class='toggler flags ".strtoupper($row->slug)."'>
										<img class='flags-img' src='".CORE_URL."/img/flags/".strtoupper($row->slug).".png'>
										<span class='flags-title'>" . substr($row->name,0,20) . "</span>
										<span class='flags-descript'>".get_office_title($row->term_taxonomy_id)."</span>
									</p>
								";
						$tempHtml .= "<div id='".($row->slug)."-container' class='toggle_wrap office-wrap '>".get_office_by_term($row->term_taxonomy_id)."</div>";
					$tempHtml .= "</div>";
					// $tempHtml .= "<style>.".strtoupper($row->slug).":before {
					// 	  content:url('".CORE_URL."/img/flags/".strtoupper($row->slug).".png'); 
					// 	}
					// </style>";
					$hasItem = TRUE;
				}
			}

			$have = "";

			if ($hasItem)
			{
				$html .= "" . $tempHtml . "";
				$have = "letter_true";
			}

			$button .= '<a href="#" class="letter '.$have.'" data-tag="{'.chr($startCapital + $i).'}" data-filter="cat-'.chr($startCapital + $i).'">'.chr($startCapital + $i).'</a>';
			
			$html .= "</div>";
		}
		//$html .= "</ol>\n";
		//$html .= "</section>";
		$html .= "</div>";
		$html .= '<div class="al_clear"></div>';	

		return '<div id="filters"  class="taglist">'.$button.'</div><section class="av_toggle_section" >'.$html.'</section>';
	}


function get_office_by_term($term) {

		$args = array(
			
			
			//Type & Status Parameters
			// 'post_type'   => 'any',
			// 'post_status' => 'any',
			
			//Choose ^ 'any' or from below, since 'any' cannot be in an array
			'post_type' => array(
				'organizations',
				),
			
			'post_status' => array(
				'publish',
				),

			//Pagination Parameters
			'posts_per_page'         => -1,

			//Taxonomy Parameters
			'tax_query' => array(
			//'relation'  => 'AND',
				array(
					'taxonomy'         => 'country',
					'field'            => 'id',
					'terms'            => array( $term ),
				)
			),
			
			
		);
	
	$query = new WP_Query( $args );
	$out_office = "";

	while ( $query->have_posts() ) {
		$query->the_post();

		$this_id = $query->post->ID;

		$ipopi_organizations_logo = get_field('ipopi_organizations_logo',$this_id);
		$ipopi_organizations_adress_1 = get_field('ipopi_organizations_adress_1',$this_id);
		$ipopi_organizations_adress_2 = get_field('ipopi_organizations_adress_2',$this_id);
		$ipopi_organizations_adress_3 = get_field('ipopi_organizations_adress_3',$this_id);
		$ipopi_organizations_postal_code = get_field('ipopi_organizations_postal_code',$this_id);
		$ipopi_organizations_country = get_field('ipopi_organizations_country',$this_id);
		$ipopi_organizations_phone_1 = get_field('ipopi_organizations_phone_1',$this_id);
		$ipopi_organizations_phone_2 = get_field('ipopi_organizations_phone_2',$this_id);
		$ipopi_organizations_email_1 = get_field('ipopi_organizations_email_1',$this_id);
		$ipopi_organizations_email_2 = get_field('ipopi_organizations_email_2',$this_id);
		$ipopi_organizations_website = get_field('ipopi_organizations_website',$this_id);
		$title = get_the_title($this_id);

		if($title) {
			//$out_office .= '<h3>'.$title.'</h3>';
		}

		$out_office .= '<div class="ipopi_organizations_column organizations_logo">';
			if($ipopi_organizations_logo) {
				$out_office .= '<img src="'.$ipopi_organizations_logo.'">';
			}else {
				$out_office .= '&nbsp;';
			}
		$out_office .= '</div>';

		$out_office .= '<div class="ipopi_organizations_column organizations_adress">';
			$out_office .= '<h3>Address</h3>';
			if($ipopi_organizations_adress_1) {
				$out_office .= '<p>'.$ipopi_organizations_adress_1.'</p>';
			}
			if($ipopi_organizations_adress_2) {
				$out_office .= '<p>'.$ipopi_organizations_adress_2.'</p>';
			}	
			if($ipopi_organizations_adress_3) {
				$out_office .= '<p>'.$ipopi_organizations_adress_3.'</p>';
			}
			if($ipopi_organizations_postal_code) {
				$out_office .= '<p>'.$ipopi_organizations_postal_code.'</p>';
			}
			if($ipopi_organizations_country) {
				$out_office .= '<p>'.$ipopi_organizations_country.'</p>';
			}
		$out_office .= '</div>';

		$out_office .= '<div class="ipopi_organizations_column organizations_phone">';
		$out_office .= '<h3>Phone</h3>';
			if($ipopi_organizations_phone_1) {
				$out_office .= '<p>'.$ipopi_organizations_phone_1.'</p>';
			}
			if($ipopi_organizations_phone_2) {
				$out_office .= '<p>'.$ipopi_organizations_phone_2.'</p>';
			}
		$out_office .= '</div>';

		$out_office .= '<div class="ipopi_organizations_column organizations_email">';
		$out_office .= '<h3>Email/Website</h3>';
			if($ipopi_organizations_email_1) {
				$out_office .= '<p><a href="mailto:'.$ipopi_organizations_email_1.'" target="_blank">'.$ipopi_organizations_email_1.'</a></p>';
			}
			if($ipopi_organizations_email_2) {
				$out_office .= '<p><a href="mailto:'.$ipopi_organizations_email_2.'" target="_blank">'.$ipopi_organizations_email_2.'</a></p>';
			}
			if($ipopi_organizations_website) {
				$out_office .= '<p><a href="http://'.$ipopi_organizations_website.'" target="_blank">'.$ipopi_organizations_website.'</a></p>';
			}
		$out_office .= '</div>';

	}
	wp_reset_postdata();

	return $out_office;
	
}//end get

function get_office_title($term) {

		$args = array(
			'post_type' => array(
				'organizations',
				),
			'post_status' => array(
				'publish',
				),
			'posts_per_page'         => 1,

			'tax_query' => array(
				array(
					'taxonomy'         => 'country',
					'field'            => 'id',
					'terms'            => array( $term ),
				)
			),
		);
	
	$query = new WP_Query( $args );
	$title = "";
	while ( $query->have_posts() ) {
		$query->the_post();
		$this_id = $query->post->ID;
		$title = get_the_title($this_id);
	}
	wp_reset_postdata();

	return $title;
	
}//end get_office_title