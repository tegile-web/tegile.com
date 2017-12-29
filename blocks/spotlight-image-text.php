<div class="row spotlight block block-spotlight-image-text">
	<div class="small-6 medium-3 medium-offset-1 columns text-center">
		<?php $image = get_sub_field('image') ?>
      	<?php if(get_sub_field('link')) :?>
      		<a href="<?php the_sub_field('link') ?>"><img src="<?php echo $image['url'] ?>" alt="" class="aligncenter"></a>
      	<?php else :?>
      		<img src="<?php echo $image['url'] ?>" alt="" class="aligncenter">
      	<?php endif; ?>
	</div>
	<div class="small-6 medium-6 medium-offset-1 end columns">
		<?php the_sub_field('text') ?>
	</div>
</div>