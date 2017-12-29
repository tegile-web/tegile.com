<?php
/**
 * Template Name: Single Resource Post JointsWP
 *
 * @package Tegile
 */
 ?>
<?php // get_header("standard-new"); ?>
<?php get_header("landing-page-no-nav-new"); ?>

    <div id="content">

      <!-- <div id="main" role="main"> -->
      <div id="main" role="main">

            <!-- Hero Banner -->
                <?php
                    $h1 = get_the_title();
                    $h2 = false;
                    $image = '/wp-content/uploads/2016/01/hero-video-lights-splash-screen.png';

                    $row_index = 0;
                    if( have_rows('hero') ) {
                    	while( have_rows('hero') ) {
                    		the_row();
                    		$h2 = get_sub_field('sub-header');
                            $img = get_sub_field('image');
                            $image = ($img ? $img : $image);
                    		$row_index++;
                        }
                    }
                ?>

                <div style="background-image: url(<?php echo $image; ?>);" class="row-wide hero-banner third-screen">
                <!-- film-grain-aqua-strong -->
                    <div class="fade-away"></div>
                    <div class="row margin-bottom-200rem hero-middle-left">
                        <div>
                            <div class="small-12 large-6 columns">
                                <h1><?php echo $h1; ?></h1>
                                <?php if ($h2) : ?>
                                    <h2 class="hide-for-medium-down"><?php echo $h2; ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- <p class="scroll-arrow"><a href="#hub-content" class="smooth-scroll"><i class="fa fa-angle-double-down"></i></a></p> -->
                </div>

                <!-- Fancy Section Break -->
                <div class="row-wide fancy-section-break show-for-medium-up">
                	<div class="small-12 medium-12 columns">
                        <div class="break-container" style="height: 4rem; top: inherit; bottom: -2px;">
                            <svg width='100%' height='100%' viewBox="0 0 100 100" preserveAspectRatio="none">
                                <polygon points="0 95, 100 0, 100 100, 0 100" fill="white" />
                            </svg>
                        </div>
                	</div>
                </div>
            <!-- End Hero Banner -->

            <!-- Main LP Content -->
            <div id="lp-content" class="row-wide no-padding-top-bottom">
                <?php get_template_part( 'core/landing', 'page' ); ?>
            </div>

      </div> <!-- end #main -->

    </div> <!-- end #content -->

<?php get_footer("standard-new"); ?>
