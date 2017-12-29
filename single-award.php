<?php
/**
 * Template Name: Single Award JointsWP
 *
 * @package Tegile
 */
 ?>
 <?php get_header("standard-new"); ?>

<div id="content">
            
  <div id="main" role="main">

  	<?php get_template_part( 'parts/loop', 'page' ); ?>
  	<div class="row-wide no-padding-bottom">
      <div class="row">
        <div class="small-12 columns">
          <p class="section top font-size-h5 no-margin-bottom"><a href="/company/awards/" class="font-weight-normal color-charcaol"><i class="fa fa-angle-double-left"></i>All Awards &amp; Recognition</a></p>
          <hr>
        </div>
      </div>
    </div>

  	<div class="row padding-top-bottom-300rem spotlight">
      <div class="small-12 medium-3 columns md_award text-center">
        <a href="<?php the_field('award-link'); ?>" target="_blank"><?php the_post_thumbnail("medium", array('style'=>'max-width:150px;height:auto;')); ?></a>
        <div class="clear200rem show-for-small-only"></div>
      </div>
      <div class="small-12 medium-9 end columns small-only-text-center">
        <p class="uppercase no-margin-bottom"><?php the_time('F j, Y') ?></p>
  	    <h2 class="margin-bottom-200rem font-size-h4"><?php the_title() ?></h2>
        <?php the_content() ?>
        <p class="no-margin-bottom"><a href="<?php the_field('award-link') ?>" class="button small" target="_blank">View Award</a></p>
      </div>
    </div>

  </div> <!-- end #main --> 

</div> <!-- end #content -->

<?php get_footer('standard-new'); ?>