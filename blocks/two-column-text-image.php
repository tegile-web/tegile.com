<div class="row-wide <?php the_sub_field('class'); ?> block block-two-column-text-image">
  <div class="row">
      <div class="small-12 medium-6 columns">
        <?php the_sub_field('text') ?>
      </div>
      <div class="small-12 medium-6 columns text-center column-right">
        <?php $image = get_sub_field('image') ?>
      	<img src="<?php echo $image['url'] ?>" alt="" class="align-center align-vertical">
      </div>
  </div>
</div>