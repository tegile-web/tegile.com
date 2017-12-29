<article id="post-<?php the_ID(); ?>" class="blog-excerpt" itemscope itemtype="http://schema.org/BlogPosting">
<div class="row">	
	<div class="small-12 columns">
		<h2><?php the_title(); ?></h2>
		<div class="clear175rem"></div>
		<!-- <h5 class="attrib">
			<span class="author">by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?php echo get_the_author(); ?></span></a></span>
		</h5> -->
		<span class="post-article" itemprop="articleSection"><?php the_content(); ?></span>
	</div>
</div>
</article>