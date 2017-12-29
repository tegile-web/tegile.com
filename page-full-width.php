<?php
/*
Template Name: Full Width (No Sidebar)
*/
?>

<?php get_header(); ?>
			
			<div id="content">
						
				    <div id="main" role="main">
					
						<?php get_template_part( 'parts/loop', 'page' ); ?>
						<?php get_template_part('core/page-blocks'); ?>
					    					
    				</div> <!-- end #main --> 
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
