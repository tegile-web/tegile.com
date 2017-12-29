<?php
/**
 * Template Name: Search Results JointsWP
 *
 * @package JointsWP
 */
 ?>

<?php get_header('standard-new'); ?>
			
			<div id="content">

				<div id="inner-content" class="row-wide bg-row-even">

					<div class="row">
			
						<div id="main" class="large-12 medium-12 columns" role="main">
							
							<section class="search">
	            	<p><?php get_search_form(); ?></p>
	            </section> <!-- end search section -->
							
							<?php $hit_count = $wp_query->found_posts; // count # of search results ?>
							
							<h1 class="archive-title font-size-h3 text-left font-weight-light no-margin-bottom"><span><?php _e('Your search for', 'jointstheme'); ?></span> <span class="font-weight-semibold letter-spacing-1">"<span class="font-lato-italic"><?php echo esc_attr(get_search_query()); ?></span>"</span> returned <span class="font-weight-semibold letter-spacing-1"><?php echo $hit_count; ?></span> results:</h1>

							<hr class="lead">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								
								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
									<header class="article-header">

										<h2 class="search-title font-size-h4 text-left"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										<p><?php the_excerpt(); ?></p>

										<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="go">Go to article</a></p>

										<hr class="tin-dotted">
							
									</header> <!-- end article header -->

									<!-- <section class="entry-content">
										<?php the_content('<button class="tiny">Read more...</button>'); ?> 
									</section> --> <!-- end article section -->
							
									<!-- <footer class="article-footer">
								
									</footer> --> <!-- end article footer -->
						
								</article> <!-- end article -->
						
							<?php endwhile; ?>	
						
							        <?php joints_page_navi(); ?>	
						
						    <?php else : ?>
						
	    					    <article id="post-not-found" class="hentry clearfix">
	    					    	<!--<header class="article-header">
	    					    		<h1>Sorry, No Results.</h1>
	    					    	</header>-->
	    					    	<section class="entry-content">
	    					    		<p class="font-size-h5 font-weight-semibold color-tegile-red letter-spacing-1">Sorry, no results match your search. Please try your search again using different terms.</p>
	    					    	</section>
	    					    	<!--<section class="search">
	                                    			<p><?php get_search_form(); ?></p>
	                		                </section>--> <!-- end search section -->
	    					    	<!-- <footer class="article-footer">
	    					    	    <p>This is the error message in the search.php template.</p>
	    					    	</footer> -->
	    					    </article>
						
						    <?php endif; ?>
				
					    </div> <!-- end #main -->
	    			
	    			</div> <!-- end #inner-content -->

	    		</div> <!-- end .row -->
    
			</div> <!-- end #content -->

<?php get_footer('standard-new'); ?>
