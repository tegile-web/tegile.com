<?php

	// Do some setup for this page
	$display_type = get_sub_field('resource-type');

	$tax = 'use_case';

	if ( $display_type != 'all' ) {

		// Enqueue our mixitup plugins
		wp_enqueue_script( 'mixitup-plugin', get_template_directory_uri() . '/assets/js/min/mixitup.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'mixitup-main', get_template_directory_uri() . '/assets/js/site/init-mixitup.js', array( 'jquery' ), '', true );

		$terms = get_terms( $tax, array(
		    	'hide_empty' => false,
			)
		);

		#################################################
		## Will need to update this for WP4 as follows
		################################################
		## $terms = get_terms( array(
		##     	'taxonomy' => $term,
		##     	'hide_empty' => false,
		## ) );
		#############################################

		# Get all posts of type $display_type
		$posts = get_posts(array(
			'posts_per_page' => -1,
			'post_type' => $display_type,
			'orderby' => 'date',
			'order' => 'DESC',
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'hide_resource',
					'compare' => 'NOT EXISTS',
				),
				array(
					'key' => 'hide_resource',
					'value' => '0',
					'compare' => '==',
				),
			),
		));

		$remainder = (count($posts)%4);

		# Get used terms across all posts in $display_type
		foreach ($posts as $k=>$post) {

			setup_postdata($post);

			foreach (get_the_terms($post->ID, $tax) as $term) {
				$valid_terms[] = $term->name;
			}
		}

		// Look into this later (Sort by occurrance)
		// print_r(array_count_values($valid_terms));

		$valid_terms = array_unique($valid_terms);

		sort($valid_terms);
		
		foreach ($valid_terms as $k=>$v) {
			foreach($terms as $term) {
			    if ($v == $term->name) {
			        $valid_terms[$term->slug] = $v;
			        unset($valid_terms[$k]);
			    }
			}
		}

		wp_reset_postdata();
		unset($terms);

	} else {

		$post_types = get_post_types('','objects');

	    // iteratore over post types and remove any that don't use the $tax taxonomy
	    foreach( $post_types as $k=>$post_type ){
	        $taxonomies = get_object_taxonomies( $k );
	        if( !(in_array( $tax, $taxonomies )) ){
	            unset($post_types[$k]);
	        }
	    }
	    
        $top_posts = array(
	    	'case_study' => array(22819, 22326, 25077, 22817),
			'product_info' => array(20719, 20720, 20702, 20708),
			'white_paper' => array(24769, 21919, 23652, 22848),
			'video' => array(24824, 25035, 23225, 23459),
		);

	    // Loop through top 4's and pull post data
	    foreach ($top_posts as $post_type=>$top_4) {
	    	
	    	foreach ($top_4 as $k=>$v) {
	    		
	    		$top_posts[$post_type][$k] = get_post($v);
	    	}
	    }
	}

	// Uncomment for testing
	// echo '<pre>';
	// print_r($terms);
	// echo '</pre>';

?>


<?php ## HEADER SECTION ## ?>
<div class="row-wide">
	<div class="row text-center">
		<div class="small-12 columns">
			<?php the_title( '<h1 class="font-size-h1-hero-bold">', '</h1>' ); ?>
		</div>
	</div>
</div>
<div class="clear"></div>


<?php ## LINKS SECTION ## ?>
<?php if ($display_type == 'all') : ?>

	<a id='links'></a>
	<div class="row-wide mixitup-control-panel section-divider show-for-medium-up">
		<div class="row ">
			<div class="small-12 columns">
				<!-- <ul class="inpage-links"> -->
				<div class="text-center">
					<?php foreach ($post_types as $k=>$v) : ?>
						<!-- <li><a href="#<?php echo $k; ?>"><?php echo $v->labels->menu_name; ?></a></li> -->
						<a class="button small no-margin-bottom margin-right-050rem margin-left-050rem" href="#<?php echo $k; ?>"><?php echo $v->labels->menu_name; ?></a>
					<?php endforeach; ?>
				</div>
				<!-- </ul> -->
			</div>
		</div>
	</div>
	<div class="clear"></div>

	<div class="row-wide ">
		<div class="row ">
			<div class="small-12 columns">
				<div id="Container" class="container">

					<?php foreach ($post_types as $p=>$post_type) : ?>
		    			
		    			<a id="<?php echo $p; ?>"></a>
		    			<h4 class="section-simple cat-cs"><a href="/<?php echo $post_type->rewrite['slug']; ?>"><?php echo $post_type->labels->menu_name; ?></a></h4>

		    			<?php foreach ($top_posts[$p] as $top_post) : ?>

		    				<?php
		    					$post = $top_post;
		    					setup_postdata($post);
		    					
		    					$card = array(
		    						'title' => (get_field('card-title') != '' ? get_field('card-title') : trim(get_the_title())),
		    						'image' => wp_make_link_relative(get_field('asset-image')['url']),
		    						'link' => (( $post_type->labels->menu_name == 'White Papers' ) ? get_field('asset-link') : get_permalink()),
		    					);

		    					foreach (get_the_terms($post->ID,$tax) as $k=>$v) {
		    						$card['terms'][] = $v->name;
		    					}

		    					$card['terms'] = implode(', ',$card['terms']);
		    				?>


			    			<div class="large-3 medium-6 small-12 columns">
			        			<div class="mix width-100 <?php echo $p; ?>" style="display: inline-block;" data-bound="">
			            			<div class="resource-image" title="<?php echo $card['title']; ?>">
		                				<div class="vertical-align-middle">
		                					<?php if ($post_type->labels->menu_name == 'White Papers') : ?>
			                					<a href="<?php echo $card['link']; ?>" target="_blank">
			                				<?php else : ?>
			                					<a href="<?php echo $card['link']; ?>">
			                				<?php endif; ?>
			                    				<img src="<?php echo $card['image']; ?>">
			                				</a>
		                				</div>
			            			</div>
			            			<div class="resource-caption">
			                			<p class="resource-title" title="<?php echo $card['title']; ?>"><?php echo $card['title']; ?></p>
			                			<p class="resource-use-case" title="<?php echo $card['terms']; ?>"><?php echo $card['terms']; ?></p>
			                			<p class="resource-text-link"><a class="go" href="<?php echo $card['link']; ?>" target="_blank">Learn More</a></p>
			            			</div>
			        			</div>
			    			</div>
		    				
		    				<?php ## SHOW BETWEEN #2 and #3 ## ?>
		    				<!-- <div class="clear show-for-medium-down"></div> -->
		    			<?php endforeach; wp_reset_postdata(); ?>

		    			<p class="view-all-resources"><a href="/<?php echo $post_type->rewrite['slug']; ?>" class="go">More <?php echo $post_type->labels->menu_name; ?></a></p>

		    		<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

<?php else : ?>
	
	<button class="modal-control-button" data-target=".mixitup-control-panel" title="Open Filters"><i class="fa fa-sliders fa-2x"></i></button>
	<div class="row-wide mixitup-control-panel section-divider">
		<div class="row ">
			<div class="small-12 columns mixitup-control-outer-wrapper">
				<div class="large-10 large-offset-1 columns mixitup-control-inner-wrapper">
					<button class="modal-control-close" title="Close Pop-up"><i class="fa fa-close fa-2x"></i></button>
					<?php
						$col_size = 'large-offset-'.(5 - count($valid_terms));
						$last_term = array_pop(array_keys($valid_terms));
					?>
					<div class="large-2 <?php echo $col_size; ?> medium-4 small-6 columns">
						<!-- <button id="viewAll" class="resource-control mixitup-control-active" data-filter="all">View All</button> -->
						<div class="text-center">View All</div>
						<button id="viewAll" class="resource-control toggle mixitup-control-active" data-filter="all"><!-- View All --></button>
					</div>
					<?php foreach ($valid_terms as $k=>$v) : ?>
						<div class="large-2 medium-4 small-6 columns <?php if ($k == $last_term) {echo 'end';} ?>">
							<!-- <button class="resource-control" data-toggle=".<?php echo $k; ?>"><?php echo $v; ?></button> -->
							<div class="text-center"><?php echo $v; ?></div>
							<button class="resource-control toggle" data-toggle=".<?php echo $k; ?>"><!-- <?php echo $v; ?> --></button>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>

	<a id='resources'></a>
	<div class="row-wide ">
		<div class="row ">
			<div class="small-12 columns">
				<div id="Container" class="container">

					<?php foreach ($posts as $k=>$post) : ?>
						
						<?php

							setup_postdata($post);

							$card = array(
	    						'title' => (get_field('card-title') != '' ? get_field('card-title') : trim(get_the_title())),
	    						'image' => wp_make_link_relative(get_field('asset-image')['url']),
	    						'link' => (( $display_type == 'white_paper' ) ? get_field('asset-link') : get_permalink()),
	    					);

	    					foreach (get_the_terms($post->ID,$tax) as $k=>$v) {
	    						$card['terms'][$v->slug] = $v->name;
	    					}

	    					$card['mixins'] = implode(' ',array_keys($card['terms']));
	    					$card['terms'] = implode(', ',$card['terms']);
						?>

						<div class="large-3 medium-6 small-12 columns">
							<div class="mix width-100 <?php echo $display_type . ' ' . $card['mixins']; ?>">
								<div class="resource-image" title="<?php echo $card['title']; ?>">
									<div class="vertical-align-middle">
										<?php if ($display_type == 'white_paper') : ?>
											<a href="<?php echo $card['link']; ?>" target="_blank">
										<?php else : ?>
											<a href="<?php echo $card['link']; ?>">
										<?php endif; ?>
											<img src="<?php echo $card['image']; ?>">
										</a>
									</div>
								</div>
								<div class="resource-caption">
									<p class="resource-title" title="<?php echo $card['title']; ?>"><?php echo $card['title']; ?></p>
									<p class="resource-use-case" title="<?php echo $card['terms']; ?>"><?php echo $card['terms']; ?></p>
									<p class="resource-text-link"><a class="go" href="<?php echo $card['link']; ?>" target="_blank">Learn More</a></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
<div class="clear"></div>
