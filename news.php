<?php
/**
 * Template Name: News JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header("nav-style-2"); ?>

<div id="content">
            
  <div id="main" role="main">

    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>
    
    <!-- NEWS -->
    <?php $posts = get_posts(array('posts_per_page'=>-1, 'post_type'=>'news')); ?>
    <div class="clear200rem"></div>
    <?php foreach($posts as $i=>$post) : setup_postdata($post); ?>
    <div class="row news-article-block <?php if($i >= $limit) :?>hidden<?php endif; ?>">
      <div class="small-12 medium-12 large-10 large-offset-1 columns">
        <div class="small-12 medium-3 columns small-only-text-center publisher-wrapper">
          <a href="<?php the_field('news-link') ?>"  title="<?php echo the_field('publisher-title'); ?>" target="_blank">
            <?php $image = get_field('publisher-logo'); ?>
            <img src="<?php echo $image['url'] ?>">
          </a>
        </div>
        <div class="small-12 medium-8 medium-offset-1 columns news-article-wrapper small-only-text-center">
          <p class="news-article-title"><a href="<?php the_field('news-link') ?>" target="_blank"><?php the_title() ?></a></p>
          <p class="news-date"><?php the_time('F j, Y') ?></p>
          <p class="no-margin-bottom"><a href="<?php the_field('news-link') ?>" target="_blank" class="go">Read More</a></p>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="small-12 columns">
        <hr>
      </div>
    </div>

    <?php endforeach; wp_reset_postdata(); ?>
    <div class="row padded">
      <div class="small-12 columns small-only-text-center">
        <a href="#top" class="top">Top</a>
      </div>
    </div>
    <div class="clear200rem"></div>

  </div> <!-- end #main --> 

</div> <!-- end #content -->

<?php get_footer(); ?>