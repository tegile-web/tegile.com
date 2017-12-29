<div class="row-wide row-even <?php the_sub_field('class'); ?> block block-section-header no-padding-bottom">
	<div class="row">
		<div class="small-12 columns">
			<?php if(get_sub_field('anchor')) :?><a name="<?php echo str_replace('#','', get_sub_field('anchor')) ?>"></a><?php endif;?>
	  	<h3 class="fs-37 fw-300 padding-bottom-200rem text-center" style="border-bottom: 1px solid #c3c3c3;"><?php the_sub_field('text') ?></h3>
		</div>
	</div>
</div>