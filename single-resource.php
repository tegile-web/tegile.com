<?php
/**
 * Template Name: Single Resource Post JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header("standard-new"); ?>

<div id="content">
            
  <div id="main" role="main">

    <?php get_template_part( 'parts/loop', 'page' ); ?>
    
		<div class="row-wide no-padding-top-bottom">
			<?php get_template_part('core/page-blocks'); ?>
			<?php the_content(); ?>
		</div>

		<?php if(is_single('18032')) :?>
			<!--<?php get_template_part('blocks/form-request-personalized-demo'); ?>-->
		<?php else :?>
			<?php get_template_part('blocks/resource-cta'); ?>
		<?php endif;?>

  </div> <!-- end #main -->

</div> <!-- end #content -->

<?php get_footer('standard-new'); ?>