<?php
/*
Template Name: Standard Page - New (White Footer)
*/
?>

<?php get_header("standard-new"); ?>

			<!-- Testing -->
			<?php
				$desc = get_post_meta(get_the_ID(),'_su_description');

				if ( (count($desc > 0)) && ($desc[0]) ) {
					$desc = $desc[0];
				} else {
					$desc = "MISSING DESCRIPTION!!!";
				}

				echo '<script type="text/javascript">console.log("'.$desc.'");</script>';
			?>
			<!-- End Testing -->
			
			<div id="content">
						
				    <div id="main" role="main">
					
						<?php get_template_part( 'parts/loop', 'page' ); ?>
						<?php get_template_part('core/page-blocks'); ?>
					    					
    				</div>
    				<!-- end #main --> 
    
			</div>
			<!-- end #content -->

<?php get_footer("standard-new"); ?>