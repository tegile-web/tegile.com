<?php
/**
 * Template Name: Single News JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header("standard-new"); ?>

<div id="content">
            
  <div id="main" role="main">

    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>
    
    <div class="row-wide bg-row-even">
      <div class="row">
        <div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns">
          <a href="<?php the_field('news-link') ?>"  title="<?php echo the_field('publisher-title'); ?>" target="_blank" class="display-block bg-white shadow global-radius padding-top-bottom-300rem padding-left-200rem padding-right-200rem text-center">
            <?php $image = get_field('publisher-logo'); ?>
            <img src="<?php echo $image['url'] ?>" class="margin-bottom-200rem">
            <p class="color-lead font-weight-light no-margin-bottom"><?php the_time('F j, Y') ?></p>
            <p class="color-charcoal font-size-h4 font-weight-normal"><?php the_title() ?></p>
            <p class="no-margin-bottom"><span class="go color-tegile-blue font-weight-semibold">Read More</span></p>
            <div class="clear"></div>
          </a>
        </div>
      </div>
    </div>

  </div> <!-- end #main --> 

</div> <!-- end #content -->

<?php get_footer('standard-new'); ?>