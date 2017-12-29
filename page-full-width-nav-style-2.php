<?php
/*
Template Name: Full Width with Nav Style 2 (No Sidebar)
*/
?>

<?php get_header("nav-style-2"); ?>
			
			<div id="content">
						
				    <div id="main" role="main">
					
						<?php get_template_part( 'parts/loop', 'page' ); ?>
						<?php get_template_part('core/page-blocks'); ?>
					    					
    				</div> <!-- end #main --> 
    
			</div> <!-- end #content -->

<?php get_footer(); ?>