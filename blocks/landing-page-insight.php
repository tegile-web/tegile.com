<div class="row-wide no-padding-bottom bg-smoke">
	<div class="row">
		<div class="small-12 medium-12 large-8 large-offset-2 columns">
			<p class="uppercase font-weight-bold color-lead font-size-h4 no-margin-bottom">Customer Insight</p>
		</div>
	</div>
</div>
<div class="row-wide no-padding-top padding-bottom-300rem bg-smoke">
	<div class="row">	
		<div class="small-12 medium-12 large-8 large-offset-2 columns">
			<h1 class="asset-lp single-title font-size-h1-hero-bold"><?php the_title(); ?></h1>
			<div class="text-center">
				<?php $image = get_sub_field('asset_image'); ?>
				<img src="<?php echo $image['url'] ?>" alt="<?php echo the_title(); ?>">
			</div>
			<div class="asset-blurb">
				<?php echo get_sub_field('blurb'); ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>