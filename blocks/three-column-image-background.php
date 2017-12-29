<?php $image = get_sub_field('background'); ?>
<div class="row block block-three-column-image-background">
	<div class="small-12 columns">
		<div class="background-image" style="background-image: url(<?php echo $image['url'] ?>);">
			<div class="row">
				<div class="small-4 columns">
					<?php the_sub_field('col-1') ?>
				</div>
				<div class="small-4 columns">
					<?php the_sub_field('col-2') ?>
				</div>
				<div class="small-4 columns">
					<?php the_sub_field('col-3') ?>
				</div>
			</div>
		</div>
	</div>
</div>