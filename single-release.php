<?php
/**
 * Template Name: Single Press Release JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header("standard-new"); ?>

<div id="content">
            
  <div id="main" role="main">

    <?php get_template_part( 'parts/loop', 'page' ); ?>
    <?php get_template_part('core/page-blocks'); ?>
		<div class="row-wide">
			<div class="row">
			    <div class="small-12 columns">
			    	<h2 class="section top font-size-h3">Press Release</h2>
			    	<hr>
			  	</div>
			</div>

			<div class="row padded-bottom">
				<div class="small-12 medium-9 end columns">
					<?php the_content(); ?>
				</div>
			</div>
		</div>

  </div> <!-- end #main -->

</div> <!-- end #content -->

<script type="text/javascript">
    // Hacky...
    // Need to adjust the release CPT so that this isnt necessary
    // jQuery('h1').addClass('single-title font-size-h1-hero-bold');
    jQuery('h1').addClass('single-title font-size-h1 font-weight-extrabold');
</script>

<?php get_footer('standard-new'); ?>