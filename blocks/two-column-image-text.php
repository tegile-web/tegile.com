<div class="row-wide <?php the_sub_field('class'); ?> block block-two-column-image-text">
	<div class="row">
		<div class="small-12 medium-push-6 medium-6 columns">
		  <?php the_sub_field('text') ?>
		</div>
		<div class="small-12 medium-pull-6 medium-6 columns text-center">
		  <?php $image = get_sub_field('image') ?>
		  <a href="<?php the_sub_field('link-for-img') ?>"><img src="<?php echo $image['url'] ?>" alt="" class="align-center align-vertical"></a>
		</div>
	</div>
</div>