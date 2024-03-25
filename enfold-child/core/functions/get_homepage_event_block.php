<?php
function get_homepage_event_block() {

	ob_start(); ?>
	<a href="<?php echo get_site_url(null,'/about-ipopi/calendar/'); ?>" id="av-masonry-1-item-4" data-av-masonry-item="4" class="event-masonry av-masonry-entry isotope-item  av-masonry-item-with-image av-grid-img av-masonry-item-loaded"  >
		<div class="av-inner-masonry-sizer"></div>
		<figure class="av-inner-masonry main_color">
			<figcaption class="av-inner-masonry-content site-background">
				<div class="av-inner-masonry-content-pos event-masonry-wrap">
					<span class="ipopi_homepage_tag" style="background-color:#4f8fbb;">
						<span class="ipopi_homepage_tag_label">calendar</span>
					</span>

					<?php echo get_calendar_content(); ?>
				</div>
			</figcaption>
		</figure>
	</a>
	

	<?php
	$items = ob_get_contents();
	ob_end_clean();
	return $items;
 } 

function get_calendar_content() {
	

	$q_event = new WP_Query( array(
        'post_type'      => 'ipopievent',
        'posts_per_page' => 2,
        'post_status'    => 'publish',
		'meta_key'       => 'ipopi_calendar_homepage',
		'meta_value'     => true,
		'meta_compare'   => '=',
    ) );


	// check if we got posts to display:
	ob_start();
	if ($q_event->have_posts()) :
		$loop = 0;
	

		while ($q_event->have_posts()) : $q_event->the_post();
	    $event_id = $q_event->post->ID;
	    //var_dump($q_event->post_count);
	?>

			<article class='post-entry post-entry-type-page <?php if($loop ==0){ echo 'eventborder';} ?>' data-permalink="<?php echo get_permalink($event_id); ?>">

				<div class="entry-content-wrapper clearfix">


	                <?php
	                $ipopi_calendar_date = get_field('ipopi_calendar_date',$event_id);
	                $ipopi_calendar_title = get_field('ipopi_calendar_title',$event_id);
	                $ipopi_calendar_location = get_field('ipopi_calendar_location',$event_id);
	                $ipopi_calendar_organisation = get_field('ipopi_calendar_organisation',$event_id);
	                $ipopi_calendar_picture = get_field('ipopi_calendar_picture',$event_id);
	                $ipopi_calendar_website = get_field('ipopi_calendar_website',$event_id);
	                $ipopi_calendar_homepage = get_field('ipopi_calendar_homepage',$event_id);
	                //var_dump($ipopi_calendar_picture);
	                 ?>

	                <div class="av-magazine-thumbnail av-magazine-thumbnail-calndar">
	                    <!-- <a href="<?php echo get_permalink( $event_id ); ?>" title="Link to: Rare Disease Day" class="av-magazine-thumbnail-link " style="position: relative; overflow: hidden;"> -->
			                <p class="home_ipopi_calendar_date"><?php echo $ipopi_calendar_date; ?></p>
	                        <span class="image-overlay overlay-type-extern">
	                            <span class="image-overlay-inside"></span>
	                        </span>
	                    <!-- </a> -->
	                </div>
	                <div class="av-magazine-content-wrap">
	                    <header class="entry-content-header">

	                        <h3 class="av-magazine-title entry-title calendar-title" itemprop="headline">
	                            <!-- <a href="<?php echo get_permalink( $event_id ); ?>" title=""> -->
	                            	<?php echo $ipopi_calendar_title; ?>
	                            <!-- </a> -->
	                        </h3>
	                        <p class="ipopi_calendar_location"><?php echo $ipopi_calendar_location; ?></p>
	                        <p class="ipopi_calendar_organisation"><?php echo $ipopi_calendar_organisation; ?></p>
	                        
	                    </header>
	                </div>


				</div>

			</article><!--end post-entry-->
			<?php if($q_event->post_count == 1): ?>
				<article class='post-entry post-entry-type-page event_empty' data-permalink="">
				</article><!--end post-entry-->
			<?php endif; ?>

	    <?php
	    $loop ++;
		endwhile;
	else: ?>
		<article class='post-entry post-entry-type-page event_empty' data-permalink="">
			<div class="entry-content-wrapper clearfix">
			                <p class="home_ipopi_calendar_date"><?php echo _e('Please check back later for selected events', 'ipopi'); ?></p>
	                        <span class="image-overlay overlay-type-extern">
	                            <span class="image-overlay-inside"></span>
	                        </span>
			</div>
		</article><!--end post-entry-->
	<?php
	endif;

	$items = ob_get_contents();
	ob_end_clean();
	return $items;
}