<div class="row-wide <?php the_sub_field('class'); ?> block block-section-header no-padding-bottom">
	<div class="row">
		<div class="small-12 columns">
			<?php if(get_sub_field('anchor')) :?><a name="<?php echo str_replace('#','', get_sub_field('anchor')) ?>"></a><?php endif;?>
	  	<h3 class="section-clean"><?php the_sub_field('text') ?></h3>
		</div>
	</div>
</div>