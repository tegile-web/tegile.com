<?php
/**
 * Template Name: Single Resource Post JointsWP
 *
 * @package Tegile
 */
 ?>
<?php get_header("standard-new"); ?>

    <div id="content">
                
      <!-- <div id="main" role="main"> -->
      <div id="main" role="main">

        <?php get_template_part( 'parts/loop', 'page' ); ?>
        
            <div id="resource-content" class="row-wide no-padding-top-bottom">
                <?php get_template_part('core/resource-blocks'); ?>
            </div>

            <?php if(is_single('18032')) :?>
                <!-- Need to make this dependent on a field in the Resource (maybe a select box with form or CTAs) -->
                <?php get_template_part('blocks/form-request-personalized-demo'); ?>
            <?php else :?>
                <?php get_template_part('blocks/resource-cta'); ?>
            <?php endif;?>

      </div> <!-- end #main -->

    </div> <!-- end #content -->

<?php get_footer("standard-new"); ?>