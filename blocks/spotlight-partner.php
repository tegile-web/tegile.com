<div class="row-wide padded <?php the_sub_field('class'); ?> block block-spotlight-partner spotlight-partner no-margin-bottom">
	<div class="row">
		<div class="small-12 medium-4 columns text-center">
			<?php $image = get_sub_field('image') ?>
	      	<a href="<?php the_sub_field('image_link') ?>" target="_blank"><img src="<?php echo $image['url'] ?>" alt="" class="align-center align-vertical"></a>
		</div>
		<div class="small-12 medium-8 columns">
			<?php the_sub_field('text') ?>
			<?php get_template_part('blocks/_table'); ?>
		</div>
	</div>
</div>