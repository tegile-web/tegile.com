<?php $image = get_sub_field('background') ?>
<div class="row-wide background-cover block block-two-column-text-text-background" style="background-image: url(<?php echo $image['url'] ?>);">
	<div class="row">
		<div class="small-12 medium-6 columns"><?php the_sub_field('text-left') ?></div>
		<div class="small-12 medium-6 columns"><?php the_sub_field('text-right') ?></div>
	</div>
</div>