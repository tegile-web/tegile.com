<div class="row-wide no-padding-bottom">
	<div class="row">
		<div class="small-12 columns">
			<p class="uppercase font-weight-bold color-lead font-size-h4 no-margin-bottom">Customer Story</p>
		</div>
	</div>
</div>
<div class="row-wide no-padding-top padding-bottom-300rem">
	<div class="row">	
		<div class="small-12 medium-7 large-7 columns">
			<h1 class="asset-lp single-title font-size-h1-hero-bold"><?php the_title(); ?></h1>
			<p class="use-cases color-lead font-size-h5"><span class="uppercase font-weight-bold">Use Cases:</span> <?php echo get_sub_field('use_cases'); ?></p>
			<div class="asset-blurb">
				<?php echo get_sub_field('blurb'); ?>
				<div class="clear"></div>
			</div>
		</div>
		<div class="small-12 medium-5 large-5 columns text-center">
			<div class="clear200rem show-for-small-only"></div>
			<a href="<?php the_sub_field('resource_link') ?>" class="asset-cs-logo" target="_blank">
				<?php $image = get_sub_field('asset_image'); ?>
				<img src="<?php echo $image['url'] ?>" alt="<?php echo the_title(); ?>">
			</a>
			<p><a href="<?php echo get_sub_field('resource_link') ?>" target="_blank" class="button">Get the Customer Story</a></p>
		</div>
	</div>
</div>