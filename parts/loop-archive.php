<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">					
		<header class="article-header">
			<h2 class="text-left"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="color-charcoal"><?php the_title(); ?></a>
			</h2>
			<?php get_template_part( 'parts/content', 'byline' ); ?>
			<p><?php the_excerpt(); ?></p>
			<p><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="go">Go to article</a></p>
			<hr class="margin-top-bottom-300rem">
		</header> <!-- end article header -->

		<style type="text/css">
			.excerpt-read-more {display: none;}
		</style>
						
		<!-- <section class="entry-content" itemprop="articleBody">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
			<?php the_content('<button class="tiny">Read more...</button>'); ?>
		</section> --> <!-- end article section -->
							
		<!-- <footer class="article-footer">
	    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
		</footer> --> <!-- end article footer -->				    						
	</article> <!-- end article -->

<?php endwhile; ?>	
					
<?php joints_page_navi(); ?>

<?php else : ?>
	<?php get_template_part( 'parts/content', 'missing' ); ?>
<?php endif; ?>