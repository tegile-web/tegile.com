<div class="row products-overview without-hyperlinks padded-top white-bg">
<div class="small-12 columns">
	 <h3 class="section"><?php the_sub_field('heading') ?></h3>
  </div>

  <div class="small-12 medium-4 columns">
	 <div class="image-caption">
	 	<?php $image = get_sub_field('col-1-image'); ?>
		<img src="<?php echo $image['url'] ?>" alt="">
		<div>
		<h6 class="pretitle"><span><?php the_sub_field('col-1-subtitle') ?></span></h6>
		<h3><?php the_sub_field('col-1-title') ?></h3>
		</div>
	 </div>
	 <?php the_sub_field('col-1-description') ?>
</div>

<div class="small-12 medium-4 columns">
	 <div class="image-caption">
		<?php $image = get_sub_field('col-2-image') ?>
		<img src="<?php echo $image['url'] ?>" alt="">
		<div>
		<h6 class="pretitle"><span><?php the_sub_field('col-2-subtitle') ?></span></h6>
		<h3><?php the_sub_field('col-2-title') ?></h3>
		</div>
	 </div>
	 <?php the_sub_field('col-2-description') ?>
</div>

<div class="small-12 medium-4 columns">
		<div class="image-caption">
	 	<?php $image = get_sub_field('col-3-image') ?>
		<img src="<?php echo $image['url'] ?>" alt="">
		<div>
		<h6 class="pretitle"><span><?php the_sub_field('col-3-subtitle') ?></span></h6>
		<h3><?php the_sub_field('col-3-title') ?></h3>
		</div>
	 </div>
	 <?php the_sub_field('col-3-description') ?>
	</div>
</div>