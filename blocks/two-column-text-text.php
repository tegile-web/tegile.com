<a id="<?php the_sub_field('id') ?>"></a>
<div class="row-wide <?php the_sub_field('block_class'); ?>">
	<div class="row">
		<div class="small-12 medium-6 columns <?php the_sub_field('text_left_class'); ?>">
			<?php echo do_shortcode(get_sub_field('text_left')) ?>
		</div>
		<div class="small-12 medium-6 columns <?php the_sub_field('text_right_class'); ?>">
			<?php echo do_shortcode(get_sub_field('text_right')) ?>
		</div>
	</div>
</div>