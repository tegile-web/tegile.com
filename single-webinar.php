<?php
/**
 * Template Name: Single Webinar JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header("standard-new"); ?>

<div id="content">
            
  <div id="main" role="main">

    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>
    <div class="row-wide no-padding-bottom">
      <div class="row">
        <div class="small-12 columns">
          <p class="section top font-size-h5 no-margin-bottom"><a href="/events/webinars/" class="font-weight-normal color-charcaol"><i class="fa fa-angle-double-left"></i>All Webinars</a></p>
          <hr>
        </div>
      </div>
    </div>
    <div class="row-wide padding-top-200rem">
      <?php $date = DateTime::createFromFormat('Ymd', get_field('webinar-date')); ?>

      <?php if(get_field('webinar-is-ondemand')) :?>
      <div class="row">
        <div class="small-12 medium-3 large-2 columns">
          <div class="text-center">
            <?php if(get_field('webinar-link')) :?>
              <a href="<?php echo the_field('webinar-link') ?>" target="_blank">
                <img src="http://www.tegile.com/wp-content/uploads/2016/02/icon-webinars-laptop-gray.png" class="margin-bottom-100rem hide-for-small-only">
                <p class="color-lead font-weight-bold letter-spacing-1 small-only-text-left">On-Demand Webinar</p>
              </a>
            <?php else :?>
              <img src="http://www.tegile.com/wp-content/uploads/2016/02/icon-webinars-laptop-gray.png" class="margin-bottom-100rem hide-for-small-only">
              <p class="color-lead font-weight-bold letter-spacing-1 small-only-text-left">On-Demand Webinar</p>
            <?php endif;?>
          </div>
        </div>
        <div class="small-12 medium-8 medium-offset-1 large-9 large-offset-1 columns">
          <?php if(get_field('webinar-link')) :?>
            <h3 class="small-only-text-left no-margin-bottom"><a class="font-weight-normal" href="<?php if(get_field('webinar-link')) :?><?php echo the_field('webinar-link') ?><?php else :?><?php echo get_permalink(); ?><?php endif;?>" target="<?php if(get_field('webinar-link')) :?>_blank<?php endif;?>"><?php the_title() ?></a></h3>
          <?php else :?>
            <h3 class="small-only-text-left no-margin-bottom"><span class="font-weight-normal"><?php the_title() ?></span></h3>
          <?php endif;?>
          <p class="font-weight-bold">On-Demand Webinar</p>
          <?php if(get_field('iframe-code')) :?>
            <center>
              <div class="iframe-container">
                <?php echo the_field('iframe-code') ?>
              </div>
            </center>
          <?php endif;?>
          <?php // not sure why the_content() is not applying paragraph wrapping on content here
              // forcing it manually - chris@duarte.com 
            echo wpautop(apply_filters('the_content', get_the_content())); ?> 
          <?php if(get_field('webinar-link')) :?>
            <p><a href="<?php if(get_field('webinar-link')) :?><?php echo the_field('webinar-link') ?><?php else :?><?php echo get_permalink(); ?><?php endif;?>" target="<?php if(get_field('webinar-link')) :?>_blank<?php endif;?>" class="button small">Watch Now</a></p>
          <?php endif;?>
        </div>
      </div>
      <?php else :?>
      <div class="row">
        <div class="small-12 medium-3 large-2 columns">
          <div class="text-center">
            <a href="<?php the_field('webinar-link') ?>" target="_blank">
              <img src="http://www.tegile.com/wp-content/uploads/2016/02/icon-webinars-laptop-blue.png" class="margin-bottom-100rem hide-for-small-only">
              <p class="color-lead font-weight-bold letter-spacing-1 small-only-text-left">Upcoming Webinar</p>
            </a>
          </div>
        </div>
        <div class="small-12 medium-8 medium-offset-1 large-9 large-offset-1 columns">
          <h3 class="small-only-text-left no-margin-bottom"><a class="font-weight-normal" href="<?php the_field('webinar-link') ?>" target="_blank"><?php the_title() ?></a></h3>
            <p class="font-weight-bold"><?php echo $date->format('F j, Y') ?> @ <?php the_field('webinar-time') ?></p>
            <?php // not sure why the_content() is not applying paragraph wrapping on content here
                  // forcing it manually - chris@duarte.com 
                echo wpautop(apply_filters('the_content', get_the_content())); ?> 
            <p><a href="<?php the_field('webinar-link') ?>" class="button small" target="_blank">Register</a></p>
        </div>
      </div>
      <?php endif;?>
      <div class="row">
        <div class="small-12 columns">
          <div class="clear200rem"></div>
        </div>
      </div>
      

    </div> <!-- end .row-wide -->



  </div> <!-- end #main -->

</div> <!-- end #content -->

<?php get_footer("standard-new"); ?>