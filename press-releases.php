<?php
/**
 * Template Name: Press Releases JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header("nav-style-2"); ?>

<div id="content">
            
  <div id="main" role="main">

    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>
  

    <!-- RELEASES -->
    <?php $posts = get_posts(array('posts_per_page'=>-1, 'post_type'=>'release')); ?>
    <div class="clear200rem"></div>
    <div class="row">
      <div class="small-12 columns padding-bottom-200rem text-center">
        <h1>Press Releases</h1>
      </div>
    </div>
    <?php foreach($posts as $i=>$post) : setup_postdata($post); ?>
    <div class="row margin-bottom-200rem post-release <?php if($i >= $limit) :?>hidden<?php endif; ?>">
      <div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns">
        <div class="small-12 medium-4 columns text-right small-only-text-left">
          <h5 class="color-blue"><?php the_time('F j, Y') ?></h6>
        </div>
        <div class="small-12 medium-8 columns">
          <h5 class="color-graphite"><a href="<?php the_permalink() ?>"><span class="fw-700"><?php the_title() ?></span></a></h5>
          <p><a href="<?php the_permalink() ?>">Read the Press Release &gt;</a></p>
        </div>
      </div>
    </div>

    <?php endforeach; wp_reset_postdata(); ?>
    <div class="row padded">
      <div class="small-12 columns">
        <a href="#top" class="top">Top</a>
      </div>
    </div>
    <div class="clear200rem"></div>

  </div> <!-- end #main --> 

</div> <!-- end #content -->

<?php get_footer(); ?>