<?php
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
					
					<?php echo generateAtoZHtml(); ?>

				</main>


			</div><!--end container-->

		</div><!-- close default .container_wrap element -->




<?php get_footer(); ?>
