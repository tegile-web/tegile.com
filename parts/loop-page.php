<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
	    <section class="entry-content" itemprop="articleBody">
		    <?php wp_link_pages(); ?>
			</section> <!-- end article section -->
							
		<footer class="article-footer">
			
		</footer> <!-- end article footer -->
						
	</article> <!-- end article -->
	
<?php endwhile; endif; ?>