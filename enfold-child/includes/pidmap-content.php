<?php
global $avia_config;
?>		


<article class='post-entry post-entry-type-page <?php echo $post_class; ?>' <?php avia_markup_helper(array('context' => 'entry')); ?>>

	<div class="entry-content-wrapper clearfix">
		<header class="entry-content-header">
            <?php $thumb = get_the_post_thumbnail(get_the_ID(), $avia_config['size']); ?>
            <?php if($thumb) echo "<div class='page-thumb'>{$thumb}</div>";?>
		</header>



        <!-- display the actual post content -->
        <div class="entry-content" <?php avia_markup_helper(array('context' => 'entry_content','echo'=>false)); ?>>
			
			<form action="<?php bloginfo('url'); ?>/" method="get">
				<div>
					<?php
					$args = array(
						'show_option_all'    => '',
						'show_option_none'   => 'Choose by Country',
						'orderby'            => 'ID',
						'order'              => 'ASC',
						'show_last_update'   => 0,
						'show_count'         => 0,
						'hide_empty'         => 1,
						'child_of'           => 0,
						'exclude'            => '',
						'echo'               => 0,
						'selected'           => 0,
						'hierarchical'       => 0,
						'name'               => 'cat',
						'id'                 => 'country_select',
						'class'              => 'postform',
						'depth'              => 0,
						'tab_index'          => 0,
						'taxonomy'           => 'country',
						'hide_if_empty'      => false,
						'value_field'        => 'term_id', // значение value e option
						'required'           => false,
					);
					$select = wp_dropdown_categories($args);
					echo $select;
					?>
					
				</div>
			</form>

		<div id="country_detail"></div>
		<div id="firms_list"></div>

		</div><!--  end entry-content -->

        <footer class="entry-footer">
        </footer>
        
    	<?php do_action('ava_after_content', get_the_ID(), 'page');  ?>
	</div>

</article><!--end post-entry-->

