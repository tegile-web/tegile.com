<div class="row block block-cards">
  <div class="small-12 large-4 columns">
    <?php $post = get_sub_field('video'); ?>
    <?php setup_postdata($post); ?>
    <?php list($img) = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
    <a href="<?php the_field('resource-video-url') ?>">
    <div class="card card-watch" style="background-image: url(<?php echo $img; ?>);">
      <div class="badge badge-icon-play"></div>
      <div class="text-overlay">
        <h3><?php the_title() ?></h3>
        <h6 class="subtitle"><?php the_field('resource-subtitle') ?></h6>
        <p><a href="<?php the_field('resource-video-url') ?>" class="more">Watch now ></a></p>
      </div>
      <?php wp_reset_postdata(); ?>
    </div>
    </a>
  </div>
  <div class="small-12 large-4 columns">
    <div class="card card-quote">
      <div class="badge badge-icon-quote"></div>
      <?php the_sub_field('quote') ?>
    </div>
  </div>
  <div class="small-12 large-4 columns">
    <?php $post = get_sub_field('webinar'); ?>
    <?php setup_postdata($post); ?>
    <?php $date = DateTime::createFromFormat('Ymd', get_field('webinar-date')); ?>
    <?php list($img) = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
    <a href="<?php the_field('webinar-link') ?>">
    <div class="card card-imagefill" style="background-image: url(<?php echo $img; ?>);">      
      <div class="badge badge-icon-cal">
        <div class="date"><?php echo $date->format('j'); ?></div>
        <div class="month"><?php echo $date->format('M'); ?></div>
      </div>
      <div class="text-overlay">
        <h6 class="pretitle"><?php the_field('webinar-subtitle') ?></h6>
        <h3><?php the_title(); ?></h3>
        <p><a href="<?php the_field('webinar-link') ?>" class="more">Watch now ></a></p>
      </div>
      <?php wp_reset_postdata(); ?>
    </div>
    </a>
  </div>
</div>