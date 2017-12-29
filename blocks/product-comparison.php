<div class="row-wide products-hero block block-product-comparison">
  <div class="row">
    <div class="small-12 medium-5 columns">
      <h2><a href="<?php the_sub_field('prod-1-link') ?>"><strong><?php the_sub_field('prod-1-title') ?></strong></a></h2>
      <h4><strong><?php the_sub_field('prod-1-subtitle') ?></strong></h4>
      <?php the_sub_field('prod-1-description') ?>
      <?php $image = get_sub_field('prod-1-image') ?>
      <img src="<?php echo $image['url'] ?>" alt="">
    </div>
    <div class="small-12 medium-2 columns text-center">      
      <?php $image = get_sub_field('comparison-icon') ?>
      <img src="<?php echo $image['url'] ?>" alt="" style="width:50%;" class="icon-two-way">
    </div>
    <div class="small-12 medium-5 columns">
      <h2><a href="<?php the_sub_field('prod-2-link') ?>"><strong><?php the_sub_field('prod-2-title') ?></strong></a></h2>
      <h4><strong><?php the_sub_field('prod-2-subtitle') ?></strong></h4>
      <?php the_sub_field('prod-2-description') ?>
      <?php $image = get_sub_field('prod-2-image') ?>
      <a href="<?php the_sub_field('prod-2-link') ?>"><img src="<?php echo $image['url'] ?>" alt=""></a>
    </div>
  </div>
</div>