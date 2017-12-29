<?php
/**
 * Template Name: Regional Events JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header("nav-style-2"); ?>

  <div id="content">
            
    <div id="main" role="main">
  
    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>
    <div class="row-wide bg-smoke">

      <!-- EVENTS -->
      <div class="row">
        <div class="small-12 columns padding-bottom-200rem">
          <h1 class="text-center">Regional Events</h1>
        </div>
      </div>
      <div class="row padded-bottom">
        <div class="small-12 columns">
          <?php if(dynamic_sidebar('sidebar1')) : else : endif; ?>
        </div>
      </div> 

      </div> <!-- end .row-wide -->
                  
      </div> <!-- end #main --> 

    </div> <!-- end #content -->
  
  

<?php get_footer(); ?>