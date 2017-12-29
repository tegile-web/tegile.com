<div class="row row-wide background-cover block block-help-me-choose help-me-choose padded">
  <div class="small-12 columns">
    <?php the_sub_field('title') ?>
    <div class="hero hero-hybrid">
        <a href="/products/hybrid-array">
    	<?php $image = get_sub_field('hybrid-photo'); ?>
    	<img src="<?php echo $image['sizes']['large'] ?>" alt="">    	
        </a>
        <h3>Hybrid</h3>
    </div>
    <div class="hero hero-flash">
        <a href="/products/all-flash-array">
    	<?php $image = get_sub_field('flash-photo'); ?>
    	<img src="<?php echo $image['sizes']['large'] ?>" alt="">    	
        </a>
        <h3>All-Flash</h3>
    </div>
    <div class="info">
      <?php the_sub_field('text') ?>
    </div>
  </div>
</div>