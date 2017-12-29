<div class="row-wide block block-three-nine-column-image-text">
  <div class="row">
    <div class="small-12 medium-push-3 medium-9 columns">
      <?php the_sub_field('text') ?>
    </div>
    <div class="small-12 medium-pull-9 medium-3 columns text-center">
      <?php $image = get_sub_field('image') ?>
      <img src="<?php echo $image['url'] ?>" alt="" class="align-center align-vertical">
    </div>
  </div>
</div>