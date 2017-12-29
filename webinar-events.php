<?php
/**
 * Template Name: Webinar Events JointsWP
 *
 * @package Tegile
 */
 ?>

<!-- ========= Get ALL Webinars, sort and split into Live & On-Demand ========= -->

<?php

  # Set a blank array for holding the Live Webinars
  $live_webinars = array();

  # Get aLL Webinars
  $posts = get_posts(array(
    'posts_per_page'=>-1, 
    'post_type'=>'webinar', 
    'meta_key' => 'webinar-date',
    'orderby'=>'meta_value_num', 
    'order'=>'ASC'
  ));

  # Loop through webinars, push live to $live_webinars and unset from $posts
  # $posts will only contain On-Demand webinars now
  foreach ($posts as $k=>$post) {
    
    if (!get_field('webinar-is-ondemand')) {
      $live_webinars[] = $post;

      # Remove the matched Live Webinar from the $posts variable
      unset($posts[$k]);
    }
  }

  # Re-Sort both arrays by date
  # Live Webinars are ordered Ascending
  # On-Demand Webinars ar ordered Descending
  $live_webinars = sort_posts($live_webinars,'webinar-date','ASC',false);
  $past_webinars = sort_posts($posts,'webinar-date','DESC',false);

  wp_reset_postdata();

?>

<!-- ========= Begin building page ========= -->

<?php get_header("standard-new"); ?>

  <div id="content">
            
    <div id="main" role="main">
  
    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>
    <div class="row-wide no-padding-bottom">
      <div class="row">
        <div class="small-12 columns">
          <h1 class="text-center font-size-h1-hero-bold">Webinars</h1>
        </div>
      </div>
    </div>
    <div class="row-wide no-padding-top-bottom">
      <div class="row">
        <div class="small-12 columns">
          <!-- Only populate the quick-jump menu if there is more than one section -->
          <?php if( empty($live_webinars) || empty($past_webinars) ) :?>
          <?php else :?>
            <ul class="inpage-links">
              <li><a href="#upcoming">Upcoming</a></li>
              <li><a href="#on-demand">On-Demand</a></li>
            </ul>
          <?php endif ?>
        </div>
      </div>
    </div>

    <!-- =============== LIVE WEBINAR SECTION ================ -->
  
    <!-- Only display the Live Webinar section if there are Live Webinars coming up -->
    <?php if(empty($live_webinars)) : $bg_color = 'section-divider';?>
    <?php else : $bg_color = 'section-divider';?>
      <a id="upcoming"></a>
      <!-- Need to manually set section deivider because currently it only works on #page-standard-new -->
      <div class="row-wide section-divider" style="box-shadow: 0 -0.05rem 0px rgba(0,0,0,0.125) inset;">
        <div class="row">
          <div class="small-12 columns padding-bottom-200rem">
            <h2>Upcoming Webinars</h2>
            <hr>
          </div>
        </div>

        <?php $laptop = 'http://www.tegile.com/wp-content/uploads/2016/02/icon-webinars-laptop-blue.png';
        
        // Loop through all of the Live Webinars and display them
        foreach ($live_webinars as $i=>$post): setup_postdata($post);
          
          $date = DateTime::createFromFormat('Ymd', get_field('webinar-date'));
          $webinar_link = get_field('webinar-link'); ?>

            <div class="row">
              <div class="small-12 medium-3 large-2 columns">
                <div class="text-center">

                  <?php
                    $webinar_image = '<img src="'.$laptop.'" class="margin-bottom-100rem hide-for-small-only"><p class="color-lead font-weight-bold letter-spacing-1 small-only-text-left">Upcoming Webinar</p>';
                    
                    if ($webinar_link) { $webinar_image = '<a href="'.$webinar_link.'" target="_blank">'.$webinar_image.'</a>'; }
                    
                    echo $webinar_image;
                  ?>
                
                </div>
              </div>
              <div class="small-12 medium-8 medium-offset-1 large-9 large-offset-1 columns">
                
                <h3 class="small-only-text-left no-margin-bottom">

                  <?php
                    $webinar_title = get_the_title();
                    
                    if ($webinar_link) { $webinar_title = '<a class="font-weight-normal" href="'.$webinar_link.'" target="_blank">'.$webinar_title.'</a>'; }

                    echo $webinar_title;
                  ?>

                </h3>
                
                <p class="font-weight-bold"><?php echo $date->format('F j, Y') ?> @ <?php the_field('webinar-time') ?></p>
                  <?php // not sure why the_content() is not applying paragraph wrapping on content here
                        // forcing it manually - chris@duarte.com 
                      echo wpautop(apply_filters('the_content', get_the_content())); ?> 
                  <p>

                  <?php if ($webinar_link): ?>
                    <a href="<?php the_field('webinar-link') ?>" class="button small" target="_blank">Register</a></p>
                  <?php endif; ?>

              </div>
            </div>
            <div class="row">
              <div class="small-12 columns">
                <div class="clear200rem"></div>
              </div>
            </div>
        <?php endforeach; wp_reset_postdata(); ?>

      </div> <!-- end .row-wide -->

    <?php endif;?>

    <!-- =============== ON-DEMAND WEBINAR SECTION ================ -->
    
    <!-- Only display the On-Demand Webinar section if there are On-Demand Webinars to show -->
    <?php if(empty($past_webinars)) :?>
    <?php else :?>
      <a id="on-demand"></a>
      <!-- Need to manually set section deivider because currently it only works on #page-standard-new -->
      <div class="row-wide <?php echo $bg_color; ?>" style="box-shadow: 0 -0.05rem 0px rgba(0,0,0,0.125) inset;">
        <div class="row">
          <div class="small-12 columns padding-bottom-200rem">
            <h2>On-Demand Webinars</h2>
            <hr>
          </div>
        </div>

        <?php $laptop = 'http://www.tegile.com/wp-content/uploads/2016/02/icon-webinars-laptop-gray.png';
        
        // Loop through all of the On-Demand Webinars and display them -->
        foreach($past_webinars as $i=>$post) : setup_postdata($post);
        
          $date = DateTime::createFromFormat('Ymd', get_field('webinar-date')); ?>

          <div class="row">
            <div class="small-12 medium-3 large-2 columns">
              <div class="text-center">

                <a href="<?php if(get_field('webinar-link')) :?><?php echo the_field('webinar-link') ?><?php else :?><?php echo get_permalink(); ?><?php endif;?>" target="<?php if(get_field('webinar-link')) :?>_blank<?php endif;?>">
                  <img src="<?php echo $laptop; ?>" class="margin-bottom-100rem hide-for-small-only">
                  <p class="color-lead font-weight-bold letter-spacing-1 small-only-text-left">On-Demand Webinar</p>
                </a>

              </div>
            </div>
            <div class="small-12 medium-8 medium-offset-1 large-9 large-offset-1 columns">
              
              <h3 class="small-only-text-left no-margin-bottom">
                
                <a class="font-weight-normal" href="<?php if(get_field('webinar-link')) :?><?php echo the_field('webinar-link') ?><?php else :?><?php echo get_permalink(); ?><?php endif;?>" target="<?php if(get_field('webinar-link')) :?>_blank<?php endif;?>"><?php the_title() ?></a>

              </h3>
              
              <p class="font-weight-bold">On-Demand Webinar</p>
                
              <?php // not sure why the_content() is not applying paragraph wrapping on content here
                    // forcing it manually - chris@duarte.com 
                  echo wpautop(apply_filters('the_content', get_the_content())); ?> 
              <p>
                
                <a href="<?php if(get_field('webinar-link')) :?><?php echo the_field('webinar-link') ?><?php else :?><?php echo get_permalink(); ?><?php endif;?>" target="<?php if(get_field('webinar-link')) :?>_blank<?php endif;?>" class="button small">Watch Now</a>

              </p>

            </div>
          </div>
          <div class="row">
            <div class="small-12 columns">
              <div class="clear200rem"></div>
            </div>
          </div>
        
        <?php endforeach; wp_reset_postdata(); ?>

      </div> <!-- end .row-wide -->

    <?php endif;?>

    <?php joints_page_navi(); ?>

  <?php get_footer('standard-new'); ?>