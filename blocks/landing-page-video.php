<div class="row-wide bg-smoke">
	<div class="row">	
		<div class="small-12 medium-12 large-6 columns">
			<p class="uppercase font-weight-bold color-lead font-size-h4 no-margin-bottom">Video</p>
			<h1 class="asset-lp text-left single-title font-size-h1-hero-bold"><?php the_title(); ?></h1>
			<p class="use-cases color-lead font-size-h5"><span class="uppercase font-weight-bold">Use Cases:</span> <?php echo get_sub_field('use_cases'); ?></p>
			<div class="asset-blurb">
				<?php echo get_sub_field('blurb'); ?>
				<div class="clear"></div>
			</div>
		</div>
		<div class="small-12 medium-12 large-6 columns text-center">

		<?php if(get_sub_field('youtube_id')) :?>
		
			<div class="iframe-container shadow no-margin-bottom">
				<iframe src="https://www.youtube.com/embed/<?php the_sub_field('youtube_id') ?>?rel=0&theme=light&color=red&modestbranding=1&autoplay=1" frameborder="0" allowfullscreen=""></iframe>
			</div>
		
		<?php else :?>

			<a href="<?php the_sub_field('resource_link') ?>?rel=0&theme=light&color=red&modestbranding=1&autoplay=1" class="asset-video fancybox-youtube">
				<?php $image = get_sub_field('asset_image'); ?>
				<img src="<?php echo $image['url'] ?>" alt="<?php echo the_title(); ?>" class="margin-bottom-200rem">
			</a>
			<p><a href="<?php echo get_sub_field('resource_link') ?>?rel=0&theme=light&color=red&modestbranding=1&autoplay=1" class="button fancybox-youtube" alt="<?php echo the_title(); ?>">Watch the Video</a></p>

		<?php endif;?>

		</div>
	</div>
</div>