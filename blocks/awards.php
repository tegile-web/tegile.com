<div class="row block block-awards awards">
  <div class="small-12 columns">
    <h4 class="section"><?php the_sub_field('heading') ?></h4>

    <div class="slider-awards red-dots">
      <div>
        <ul class="small-block-grid-1 large-block-grid-4">
          <?php if( have_rows('awards') ): ?>
          	<?php while ( have_rows('awards') ): the_row(); ?>
      			<?php $post = get_sub_field('award'); ?>
				    <?php setup_postdata( $post ); ?>			
	        	<li>
              <div class="award-icon">	        		   
		            <a href="<?php echo get_bloginfo('url'); ?>/company/awards/">
                  <?php if ( has_post_thumbnail() ) :?>
                    <a href="<?php echo get_bloginfo('url'); ?>/company/awards/"><?php the_post_thumbnail("medium"); ?></a>
                  <?php else :?>
                    <img src="/wp-content/themes/tegile/images/FPO16x9.jpg" />
                  <?php endif; ?>
                </a>
              </div>
		            <h5><a href="<?php echo get_bloginfo('url'); ?>/company/awards/"><?php the_title() ?></a></h5>
		            <?php the_content() ?>
		            <a href="<?php echo get_bloginfo('url'); ?>/company/awards/" class="more">Read more ></a>
	        	</li>
          		<?php wp_reset_postdata(); ?>
        	<?php endwhile; ?>
        	<?php endif;?>            
        </ul>
      </div>

    </div>        

  </div>
</div>