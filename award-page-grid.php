<?php
/**
 * Template Name: Awards Grid
 * Description: A four-column grid page template.
 * Tutorial: http://graphpaperpress.com/tips/create-four-column-grid-template/
 */
?>

<?php get_header('standard-new'); ?>

<style type="text/css">
	/*
	@media (max-width: 700px) {
	  
	}
	@media (min-width: 701px) and (max-width: 1024px) {
	  
	}
	@media (min-width: 1025px) {
	 	
	}
	*/
</style>

<div id="content">
            
  <div id="main" role="main">

    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row-wide">
					<div class="row">
						<div class="small-12 columns">
							<h1 class="text-center font-size-h1-hero-bold">Awards &amp; Recognition</h1>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>

			<div class="row-wide no-padding-top-bottom">
				<div class="row" data-equalizer data-options="equalize_on_stack: true">
						<?php
							global $wp_query; $post; $post_id = $post-> ID;
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							rewind_posts();
							$temp = $wp_query;
							$wp_query = NULL;
							$post_type = 'award';
							$show_posts = '100';
						?>
						<?php $wp_query = new WP_Query( 'post_type=' . $post_type . '&posts_per_page=' . $show_posts . '&paged=' . $paged ); ?>
							<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<div class="small-12 medium-6 large-4 columns text-center">
								<a class="news-link-grid-layout" href="<?php echo the_field('award-link'); ?>" title="<?php echo the_title_attribute(); ?>" target="_blank">
									<div class="bg-white global-radius shadow-hover-turquoise padding200rem margin-bottom-100rem display-block" data-equalizer-watch>
									<!--<?php $image = the_post_thumbnail(); ?>-->
									<?php
										$thumb_id = get_post_thumbnail_id();
										$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
										$thumb_url = $thumb_url_array[0];
										?>
										<center>
											<div class="width-50">
												<div  style="background: url(<?php echo $thumb_url ?>) no-repeat; height: 175px; background-size: contain; background-position: center center; overflow: visible;"></div>
												<hr>
											</div>
						      	</center>
						      	<p class="color-lead font-weight-light font-size-small margin-bottom-100rem"><?php the_time('F j, Y') ?></p>
						      	<p class="color-charcoal font-size-h5 font-weight-normal margin-bottom-100rem"><?php the_title() ?></p>
						      	<p class="no-margin-bottom"><a class="go" href="<?php echo the_field('award-link'); ?>" target="_blank">Learn more</a></p>
										<div class="clear"></div>
									</div>
								</a>
							</div><!-- .small-12 -->
							<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<div class="clear"></div>

						<div class="row padding-top-bottom-300rem">
							<div class="small-6 columns text-left small-only-text-center">
								<?php previous_posts_link(); ?>
							</div>
							<div class="small-6 columns text-right small-only-text-center">
								<?php next_posts_link(); ?>
							</div>
						</div>
						

						<?php $wp_query = NULL; $wp_query = $temp; ?>

					<?php else : ?>

						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title">Nothing Found</h1>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps try a search.</p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->

					
				</div> <!-- .row -->
			</div> <!-- .row-wide .bg-row-even .no-padding-top -->
		<?php endif; ?>
		

	</div> <!-- #main .main -->
</div> <!-- #content -->
</div>
<?php get_footer('standard-new'); ?>