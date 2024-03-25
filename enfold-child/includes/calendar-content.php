<?php
global $avia_config, $post_loop_count;

//$post_loop_count= 1;
$post_class 	= "post-entry-".avia_get_the_id();

    $q_event = new WP_Query( array(
        'post_type'      => 'ipopievent',
        'posts_per_page' => - 1,
        'post_status'    => 'publish',
        'order'          => 'ASC',
        'orderby'        => 'menu_order',
    ) );

// check if we got posts to display:
if ($q_event->have_posts()) :

    $first = true;

    $counterclass = "";
    $post_loop_count = 1;
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if($page > 1) $post_loop_count = ((int) ($page - 1) * (int) get_query_var('posts_per_page')) +1;

	while ($q_event->have_posts()) : $q_event->the_post();
    $event_id = $q_event->post->ID;
?>

		<article class='post-entry post-entry-type-page <?php echo $post_class; ?>' <?php avia_markup_helper(array('context' => 'entry')); ?>>

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

                <blockquote>
                    <p><?php echo $ipopi_calendar_date; ?></p>
                </blockquote>

                <?php if($ipopi_calendar_picture): ?>
                    <div class="av-magazine-thumbnail av-magazine-thumbnail-calndar">
                        <!-- <a href="<?php echo get_permalink( $event_id ); ?>" title="Link to: Rare Disease Day" class="av-magazine-thumbnail-link " style="position: relative; overflow: hidden;"> -->
                            <?php echo wp_get_attachment_image( $ipopi_calendar_picture, 'calendar-thumb' ); ?>
                            <span class="image-overlay overlay-type-extern">
                                <span class="image-overlay-inside"></span>
                            </span>
                        <!-- </a> -->
                    </div>
                <?php endif; ?>
                <div class="av-magazine-content-wrap">
                    <header class="entry-content-header">

                        <h3 class="av-magazine-title entry-title calendar-title" itemprop="headline">
                           <!--  <a href="<?php echo get_permalink( $event_id ); ?>" title=""> -->
                                <?php echo $ipopi_calendar_title; ?>
                            <!-- </a> -->
                        </h3>
                        <p class="ipopi_calendar_location"><?php echo $ipopi_calendar_location; ?></p>
                        <p class="ipopi_calendar_organisation"><?php echo $ipopi_calendar_organisation; ?></p>
                        
                    </header>
                </div>
                <div class="myclear"></div>

                <?php if($ipopi_calendar_website): ?>
                    <a class="event-button" href="<?php echo $ipopi_calendar_website; ?>" target="_blank"><?php echo _e( 'Go to website', 'ipopi' );?></a>
                <?php endif; ?>
                <?php 
                
            
                do_action('ava_after_content', $event_id, 'page');
                ?>
			</div>

		</article><!--end post-entry-->


    <?php
    $first = false;
    $post_loop_count++;
    if($post_loop_count >= 100) $counterclass = "nowidth";
	endwhile;

else:
?>

    <article class="entry">
        <header class="entry-content-header">
            <h1 class='post-title entry-title'><?php _e('Nothing Found', 'avia_framework'); ?></h1>
        </header>

        <?php get_template_part('includes/error404'); ?>

        <footer class="entry-footer"></footer>
    </article>

<?php

endif;
echo avia_pagination('', 'nav');
?>
