<?php
$id = 44;
$map_permalink = get_permalink( $id );
$map_title = get_the_title( $id );
$map_img = get_the_post_thumbnail_url($id, array(705, 260) );
//var_dump($map_img);
$ipopi_homepage_excerpt = get_field('ipopi_homepage_excerpt',$id);

$ipopi_homepage_tag = get_field('ipopi_homepage_tag',$id);
						$ipopi_homepage_tag_color = get_field('ipopi_homepage_tag_color',$id);
						if($ipopi_homepage_tag_color) {
							$tag_color = "style='background-color:".$ipopi_homepage_tag_color.";'";
						} else {
							$tag_color = "";
						}
?>
<div class="flex_column av_one_full  flex_column_div first  avia-builder-el-1  el_after_av_slideshow_full  avia-builder-el-no-sibling  " style="padding:0 0 0 0 ; border-radius:0px; ">
	<div id="av-masonry-1" class="_child-av-masonry av-masonry noHover av-fixed-size av-large-gap av-hover-overlay-active av-masonry-col-2 av-caption-always av-caption-style-overlay  avia_sortable_active">
		<div class="av-masonry-container isotope">

			<a href="<?php echo $map_permalink; ?>" 
				id="av-masonry-1-item-44" 
				data-av-masonry-item="44" 
				class="av-masonry-entry isotope-item post-44 page type-page status-publish has-post-thumbnail hentry category-homepage tag-landscape all_sort homepage_sort  av-masonry-item-with-image av-landscape-img av-masonry-item-loaded" 
				title="IPOPI PID Map" 
				itemscope="itemscope" 
				itemtype="https://schema.org/CreativeWork" 
				
				">

				<div class="av-inner-masonry-sizer"></div>
				<figure class="av-inner-masonry main_color">
					<div class="av-masonry-outerimage-container">
						<div class="av-masonry-image-container" style="background-image: url(<?php echo $map_img; ?>);">
							<img src="<?php echo $map_img; ?>" title="" alt="">
						</div>
						</div>
						<figcaption class="av-inner-masonry-content site-background">
							<div class="av-inner-masonry-content-pos">
								<div class="av-inner-masonry-content-pos-content">
									<div class="avia-arrow"></div>
									<span class="ipopi_homepage_tag" <?php echo $tag_color; ?> >
										<span class="ipopi_homepage_tag_label"><?php echo $ipopi_homepage_tag; ?></span>
									</span>
									<h3 class="ipopi_homepage-masonry-entry-title av-masonry-entry-title entry-title" itemprop="headline"><?php echo $map_title; ?></h3>
									<div class="av-masonry-entry-content entry-content">
										<?php echo $ipopi_homepage_excerpt; ?>
									</div>
								</div>
								<div class="av-inner-masonry-content-pos-content-bg"></div>
							</div>
						</figcaption>
				</figure>
			</a> 

		</div>
	</div>
</div>