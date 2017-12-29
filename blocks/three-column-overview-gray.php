<div class="row-wide row-even <?php the_sub_field('class'); ?> products-overview block block-three-column-overview-gray">
<div class="row">
  <div class="small-12 medium-4 columns">
	 <div class="image-caption">
	 	<?php $image = get_sub_field('col-1-image'); ?>
	 	<?php if(get_sub_field('col-1-link')) :?><a href="<?php the_sub_field('col-1-link') ?>"><?php endif;?>
			<img src="<?php echo $image['url'] ?>" alt="">
		<?php if(get_sub_field('col-1-link')) :?></a><?php endif;?>
		<div>
		<h6 class="pretitle">
			<?php if(get_sub_field('col-1-link')) :?><a href="<?php the_sub_field('col-1-link') ?>"><?php endif;?>
				<?php the_sub_field('col-1-subtitle') ?>
			<?php if(get_sub_field('col-1-link')) :?></a><?php endif;?>
		</h6>
		<h4>
			<?php if(get_sub_field('col-1-link')) :?><a href="<?php the_sub_field('col-1-link') ?>"><?php endif;?>
				<?php the_sub_field('col-1-title') ?>
			<?php if(get_sub_field('col-1-link')) :?></a><?php endif;?>
		</h4>
		</div>
	 </div>
	 <?php the_sub_field('col-1-description') ?>
</div>

<div class="small-12 medium-4 columns">
	 <div class="image-caption">
		<?php $image = get_sub_field('col-2-image') ?>
		<?php if(get_sub_field('col-2-link')) :?>
			<a href="<?php the_sub_field('col-2-link') ?>"><?php endif;?>
				<img src="<?php echo $image['url'] ?>" alt="">
		<?php if(get_sub_field('col-2-link')) :?></a><?php endif;?>
		<div>
		<h6 class="pretitle">
			<?php if(get_sub_field('col-2-link')) :?><a href="<?php the_sub_field('col-2-link') ?>"><?php endif;?>
			<?php the_sub_field('col-2-subtitle') ?>
			<?php if(get_sub_field('col-2-link')) :?></a><?php endif;?>
		</h6>
		<h4>
			<?php if(get_sub_field('col-2-link')) :?><a href="<?php the_sub_field('col-2-link') ?>"><?php endif;?>
			<?php the_sub_field('col-2-title') ?>
			<?php if(get_sub_field('col-2-link')) :?></a><?php endif;?>
		</h4>
		</div>
	 </div>
	 <?php the_sub_field('col-2-description') ?>
</div>

<div class="small-12 medium-4 columns">
		<div class="image-caption">
	 	<?php $image = get_sub_field('col-3-image') ?>
	 	<?php if(get_sub_field('col-3-link')) :?>
		<a href="<?php the_sub_field('col-3-link') ?>"><?php endif;?>
			<img src="<?php echo $image['url'] ?>" alt="">
		<?php if(get_sub_field('col-3-link')) :?></a><?php endif;?>
		<div>
		<h6 class="pretitle">
			<?php if(get_sub_field('col-3-link')) :?><a href="<?php the_sub_field('col-3-link') ?>"><?php endif;?>
				<?php the_sub_field('col-3-subtitle') ?>
			<?php if(get_sub_field('col-3-link')) :?></a><?php endif;?>
		</h6>
		<h4>
			<?php if(get_sub_field('col-3-link')) :?><a href="<?php the_sub_field('col-3-link') ?>"><?php endif;?>
				<?php the_sub_field('col-3-title') ?>
			<?php if(get_sub_field('col-3-link')) :?></a><?php endif;?>
		</h4>
		</div>
	 </div>
	 <?php the_sub_field('col-3-description') ?>
	</div>
</div>
</div>