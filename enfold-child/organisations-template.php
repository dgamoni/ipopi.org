<?php

	/*
	Template Name: Organisations 
	*/

	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config, $more;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();
	
		
		$showheader = true;
		if(avia_get_option('frontpage') && $blogpage_id = avia_get_option('blogpage'))
		{
			if(get_post_meta($blogpage_id, 'header', true) == 'no') $showheader = false;
		}
		
	 	if($showheader)
	 	{
	 		//var_dump(get_all_country());
	 		//var_dump(get_office_by_term(265));
	 		// echo generateAtoZHtml();
		}
		
		do_action( 'ava_after_main_title' );
	?>


		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container template-blog '>

				<main class='content av-content-full alpha units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>
					
					<div class="organizations_header">
<!-- 						<h1>Member organisations</h1>
							<p>IPOPI’s National Member Organisations (NMOs), national patient groups that represent the interests of primary immunodeficiencies patients, are the reason for IPOPI’s existence.</p>
							<p>IPOPI recognises one national patient group per country.</p> -->
							<h1><?php echo get_the_title(); ?></h1>
							<p><?php echo get_the_excerpt(); ?></p>
					</div>

					<div id="toog_sort" class="toog_sort"><?php echo generateAtoZHtml(); ?></div>

				</main>


			</div><!--end container-->

		</div><!-- close default .container_wrap element -->




<?php get_footer(); ?>