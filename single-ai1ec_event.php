<?php
/**
 * Template Name: Single Event JointsWP
 *
 * @package JointsWP
 */
 ?>

<!--<?php wp_enqueue_style('blog', get_stylesheet_directory_uri(). "/blog.css", null, "1.0.0", "all"); ?>-->
<?php get_header("standard-new"); ?>

	<div class="row-wide no-padding-bottom">
		<div class="row">
	    <div class="small-12 columns">
	    	<h3>Event</h3>
	    	<hr>
	    </div>
		</div>
	</div>

	<?php if( have_posts() ) :?>
	<?php while( have_posts() ): the_post(); ?>
	<div class="row-wide no-padding-top">
		<div class="row block">
			<div class="small-12 columns">
				<?php get_template_part('event/content', 'event'); ?>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>


<?php get_footer('standard-new'); ?>