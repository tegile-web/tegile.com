<?php
/*
Template Name: Standard Page - New (White Footer)
*/
?>

<?php //get_header("standard-new"); ?>
			
			<!-- <div id="content"> -->
						
				    <!-- <div id="main" role="main"> -->
					
						<?php //get_template_part( 'parts/loop', 'page' ); ?>
						<?php //get_template_part('core/page-blocks'); ?>
					    					
    				<!-- </div> -->
    				<!-- end #main --> 
    
			<!-- </div> -->
			<!-- end #content -->

			<!-- Testing -->
			<?php
				echo '<body><pre>';
				// $desc = get_post_custom();
				$desc = get_post_meta($post);
				// $desc = get_post_meta($post,'_su_description');
				print_r($desc);
				echo '</pre></body>';
				return;
			?>
			<!-- End Testing -->

<?php //get_footer("standard-new"); ?>