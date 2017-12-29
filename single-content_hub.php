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

            <!-- Hero Banner Content -->
            <?php
                $h1 = get_the_title();
                $h2 = false;
                $image = '/wp-content/uploads/2016/01/hero-video-lights-splash-screen.png';

                $row_index = 0;
                if( have_rows('hero_banner') ) {
                	while( have_rows('hero_banner') ) {
                		the_row();
                		$h2 = get_sub_field('sub-header');
                        $img = get_sub_field('hero-image');
                        $image = ($img ? $img : $image);
                		$row_index++;
                    }
                }
            ?>

            <div style="background-image: url(<?php echo $image; ?>);" class="row-wide hero-banner third-screen">
                <div class="fade-away"></div>
                <div class="row margin-bottom-200rem hero-middle-center">
                    <div>
                        <div class="small-12 columns">
                            <h1><?php echo $h1; ?></h1>
                            <?php if ($h2) : ?>
                                <h2><?php echo $h2; ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <p class="scroll-arrow"><a href="#hub-content" class="smooth-scroll"><i class="fa fa-angle-double-down"></i></a></p>
            </div>

            <!-- Main Hub Content -->
            <div id="hub-content" class="row-wide no-padding-top-bottom">
                <?php get_template_part( 'core/content', 'hub' ); ?>
            </div>

            <!-- Alternate CTA Content -->
            <?php

                if( have_rows('alt-cta') ):

                   	while ( have_rows('alt-cta') ) : the_row();

                        $btn = get_sub_field('cta-link'); ?>

                        <div id="alt-cta" class="row-wide collapse section-blockquote section-size-auto section-divider text-center color-white" style="margin-bottom: 3rem;">
                          <div class="row main-row" style="margin: 3rem auto;">
                            <h2><?php the_sub_field('cta-header'); ?></h2>
                            <p class="text-center"><?php the_sub_field('cta-blurb'); ?></p>
                            <p><?php echo button_generator( $btn, true ); ?></p>
                          </div>
                          <div class="section-filter" style="background: linear-gradient(135deg, #1C83EA 0%, #00E598 100%); opacity: 0.8; "></div>
                          <div class="section-film " style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA5LjYgOS42Ij48dGl0bGU+Z3JpZDwvdGl0bGU+PGcgc3R5bGU9Im9wYWNpdHk6MC4xIj48cGF0aCBkPSJNOS42LDAuMTZWMEg5LjQ0QTAuMTYsMC4xNiwwLDAsMCw5LjYuMTZaIiBzdHlsZT0iZmlsbDojZmZmIi8+PHBhdGggZD0iTTYuNCwwLjE2QTAuMTYsMC4xNiwwLDAsMCw2LjU2LDBINi4yNEEwLjE2LDAuMTYsMCwwLDAsNi40LjE2WiIgc3R5bGU9ImZpbGw6I2ZmZiIvPjxwYXRoIGQ9Ik05LjQ0LDYuNGEwLjE2LDAuMTYsMCwwLDAsLjE2LjE2VjYuMjRBMC4xNiwwLjE2LDAsMCwwLDkuNDQsNi40WiIgc3R5bGU9ImZpbGw6I2ZmZiIvPjxwYXRoIGQ9Ik05LjQ0LDMuMmEwLjE2LDAuMTYsMCwwLDAsLjE2LjE2VjNBMC4xNiwwLjE2LDAsMCwwLDkuNDQsMy4yWiIgc3R5bGU9ImZpbGw6I2ZmZiIvPjxwYXRoIGQ9Ik0zLjIsOS40NEEwLjE2LDAuMTYsMCwwLDAsMyw5LjZIMy4zNkEwLjE2LDAuMTYsMCwwLDAsMy4yLDkuNDRaIiBzdHlsZT0iZmlsbDojZmZmIi8+PHBhdGggZD0iTTMuMiwwLjE2QTAuMTYsMC4xNiwwLDAsMCwzLjM2LDBIM0EwLjE2LDAuMTYsMCwwLDAsMy4yLjE2WiIgc3R5bGU9ImZpbGw6I2ZmZiIvPjxwYXRoIGQ9Ik02LjQsOS40NGEwLjE2LDAuMTYsMCwwLDAtLjE2LjE2SDYuNTZBMC4xNiwwLjE2LDAsMCwwLDYuNCw5LjQ0WiIgc3R5bGU9ImZpbGw6I2ZmZiIvPjxwYXRoIGQ9Ik0wLDkuNDRWOS42SDAuMTZBMC4xNiwwLjE2LDAsMCwwLDAsOS40NFoiIHN0eWxlPSJmaWxsOiNmZmYiLz48cGF0aCBkPSJNMCwzVjMuMzZBMC4xNiwwLjE2LDAsMCwwLC4xNiwzLjIsMC4xNiwwLjE2LDAsMCwwLDAsM1oiIHN0eWxlPSJmaWxsOiNmZmYiLz48cGF0aCBkPSJNMC4xNiw2LjRBMC4xNiwwLjE2LDAsMCwwLDAsNi4yNFY2LjU2QTAuMTYsMC4xNiwwLDAsMCwuMTYsNi40WiIgc3R5bGU9ImZpbGw6I2ZmZiIvPjxwYXRoIGQ9Ik0wLDBWMC4xNkEwLjE2LDAuMTYsMCwwLDAsLjE2LDBIMFoiIHN0eWxlPSJmaWxsOiNmZmYiLz48cGF0aCBkPSJNOS42LDkuNDRhMC4xNiwwLjE2LDAsMCwwLS4xNi4xNkg5LjZWOS40NFoiIHN0eWxlPSJmaWxsOiNmZmYiLz48Y2lyY2xlIGN4PSIzLjIiIGN5PSIzLjIiIHI9IjAuMTYiIHN0eWxlPSJmaWxsOiNmZmYiLz48Y2lyY2xlIGN4PSI2LjQiIGN5PSI2LjQiIHI9IjAuMTYiIHN0eWxlPSJmaWxsOiNmZmYiLz48Y2lyY2xlIGN4PSI2LjQiIGN5PSIzLjIiIHI9IjAuMTYiIHN0eWxlPSJmaWxsOiNmZmYiLz48Y2lyY2xlIGN4PSIzLjIiIGN5PSI2LjQiIHI9IjAuMTYiIHN0eWxlPSJmaWxsOiNmZmYiLz48L2c+PC9zdmc+'); background-attachment: fixed; background-size: 3%; opacity: 0.4; filter: brightness(4); "></div>
                          <div class="section-background " style="background: url() no-repeat fixed center center; background-size: cover;"></div>
                        </div>

                    <?php endwhile;

                endif;

            ?>

            <!-- Form Content Placeholder -->

      </div> <!-- end #main -->

    </div> <!-- end #content -->

<?php get_footer("standard-new"); ?>
