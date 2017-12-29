<?php
/**
 * Template Name: Company: Awards JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header("nav-style-2"); ?>

<div id="content">
            
  <div id="main" role="main">

    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>

    <?php $posts = get_posts(array('posts_per_page'=>-1,'post_type'=>'award')); ?>
    <?php foreach($posts as $post) : setup_postdata($posts); ?>
    <div class="row padding-top-bottom-300rem spotlight md_rowhalf">
  	<?php echo $post->post_content; ?>
      <div class="small-12 medium-3 columns md_award text-center">
        <?php if ( has_post_thumbnail() ) :?>
          <a href="<?php the_field('award-link'); ?>" target="_blank"><?php the_post_thumbnail("medium", array('style'=>'max-width:150px;height:auto;')); ?></a>
        <?php else :?>
          <img src="/wp-content/themes/tegile/images/FPO16x9.jpg" />
        <?php endif; ?>
        <div class="clear200rem show-for-small-only"></div>
      </div>
      <div class="small-12 medium-9 end columns small-only-text-center">
        <p class="uppercase no-margin-bottom"><?php the_time('F j, Y') ?></p>
  	    <h2 class="margin-bottom-200rem font-size-h4"><?php the_title() ?></h2>
        <?php the_content() ?>
        <p class="no-margin-bottom"><a href="<?php the_field('award-link') ?>" class="button small" target="_blank">View Award</a></p>
      </div>
    </div>
    <div class="row spotlight-rule">
      <div class="small-12 columns">
        <hr class="no-margin">
      </div>
    </div>

    <?php endforeach; wp_reset_postdata(); ?>
    <style>
      .md_rowhalf{margin-top:0px !important; margin-bottom:0px !important;}
    </style>

  </div> <!-- end #main --> 

</div> <!-- end #content -->

<?php get_footer(); ?>