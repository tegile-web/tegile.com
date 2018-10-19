<?php get_header('standard-new'); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row-wide bg-row-even">

					<div class="clear200rem"></div>

					<div class="row">
						
						<div class="small-12 columns margin-bottom-200rem">
							<h1 class="font-size-h1-hero-bold">Tegile Blog</h1>
							<hr>
						</div>

				    <div id="main" class="small-12 medium-8 large-7 columns" role="main">
					 
					  <!-- To see additional archive styles, visit the /parts directory -->
					    <?php get_template_part( 'parts/loop', 'archive' ); ?>
								
				    </div> <!-- end #main -->
				    <div class="small-12 medium-4 large-4 large-offset-1 columns">
							<h4 class="section text-left">Recent Posts</h4>
				  		<?php $args = array(
							'posts_per_page'   => 10,
							'offset'           => 0,
							'category'         => '',
							'orderby'          => 'post_date',
							'order'            => 'DESC',
							'include'          => '',
							'exclude'          => '',
							'meta_key'         => '',
							'meta_value'       => '',
							'post_type'        => 'post',
							'post_mime_type'   => '',
							'post_parent'      => '',
							'post_status'      => 'publish',
							'suppress_filters' => true ); 
						?>
				  		<?php $posts = get_posts( $args ); ?>
				  		<ul class="resource-text-list">
						<?php foreach($posts as $post): setup_postdata($post); ?>
							<li><a href="<?php the_permalink() ?>" class="font-size-small"><?php the_title() ?></a></li>
						<?php endforeach; wp_reset_postdata(); ?>
						</ul>

				  		<!-- <h4 class="section text-left">Archive</h4>
				  		<ul class="none">
				  		<?php $args = array(
							'type'            => 'yearly',
							'limit'           => '',
							'format'          => 'custom', 
							'before'          => '<li class="font-size-small">',
							'after'           => '</li>',
							'show_post_count' => true,
							'echo'            => 1,
							'order'           => 'DESC'
						); ?>
				  		<?php wp_get_archives( $args ); ?> 
				  		</ul>-->
						</div>

				  </div> <!-- end .row -->
				    
				</div> <!-- end #inner-content .row-wide -->
    
			</div> <!-- end #content -->

<?php get_footer('standard-new'); ?>