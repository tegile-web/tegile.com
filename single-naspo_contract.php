<?php
/**
* Template Name: Single Naspo Contract JointsWP
*
* @package Tegile
*/

    // Setup some vars
    global $naspo_id;
    global $us_states;
    global $naspo_master;
    global $naspo_transfer;
    global $naspo_secondary;

    $title = get_the_title();
    $the_state = array_shift( array_keys( $us_states, $title ) );

    $partners = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'naspo_partner',
    	'meta_query' => array(
    		array(
    			'key'		=> 'states',
    			'value'		=> $the_state,
    			'compare'	=> 'LIKE'
    		),
        ),
        'meta_key'          => 'company',
        'orderby'           => 'meta_value',
        'order'             => 'ASC',
    ));

    $contract_number = get_field('state_addendum_number');
    $contract_document = get_field('state_addendum_document');
    $addendums = get_field('additional_addendums');
    $state_info = get_field('state_info');

    if ($addendums) {

        foreach ($addendums as $addendum) {

            switch ($addendum['type']) {
                case 'extension':
                    $extensions[] = $addendum;
                    break;

                case 'terms':
                    $terms[] = $addendum;
                    break;

                default:
                    break;
            }
        }

        foreach (array('terms','extensions') as $arr) {

            if (${$arr}) {

                array_multisort( ${$arr}, SORT_DESC);
                ${$arr} = array_shift(${$arr});
            }
        }
    }

    $naspo_pricelist = get_naspo_docs($naspo_docs_path)['Master'];

    foreach ($naspo_pricelist as $k=>$naspo_doc) {

        if (strpos($naspo_doc, 'pricelist') !== false) {
            $doc_date = strtotime( str_replace( '-', '/', array_pop( explode( '_', array_shift( explode( '.', $naspo_doc ) ) ) ) ) );
            $naspo_pricelist[$doc_date] = '/naspo-docs/Master/'.$naspo_doc;
        }
        unset($naspo_pricelist[$k]);
    }

    krsort($naspo_pricelist);
    $naspo_pricelist = array_shift($naspo_pricelist);

?>

<?php get_header("landing-page-no-nav-new"); ?>

<div id="content">

    <div id="main" role="main">

        <!-- Display the back link title -->
        <div class="row-wide no-padding-bottom">
          <div class="row">
              <div class="small-12 columns">
                  <p class="font-size-h6 no-margin-bottom"><a href="/naspo/" class="font-weight-normal color-charcaol"><i class="fa fa-angle-double-left"></i>TEGILE NASPO VALUEPOINT STORAGE PRODUCTS AND SERVICES <?php echo $naspo_transfer; ?></a></p>
              </div>
          </div>
        </div>

        <!-- Display the state and state change buttons -->
        <div class="row-wide no-padding-bottom">
            <div class="row">
                <div class="small-12 large-9 columns">
                    <h1 class="font-size-h1-hero-bold single-title no-padding">State of <?php echo $title; ?></h1>
                    <p>Participating Addendum <?php echo $contract_number; ?></p>
                </div>
                <div class="small-12 large-3 columns">
                    <?php echo button_generator( array('text' => 'Change State', 'url' => '#state-list', 'class' => array('expand fancybox-inline')), true, false ); ?>
                </div>
            </div>
            <hr />
        </div>

        <!-- Content container -->
        <div class="row-wide no-padding-bottom section-divider">
            <div class="row">

                <!-- Display the main content body -->
                <div class="large-7 columns" style="padding-left: 0;">
                    <p>The State of <?php echo $title; ?> has authorized all government entities within the State of <?php echo $title; ?> to purchase all products offered under the Tegile, a Western Digital brand NASPO ValuePoint contract <strong><?php echo $naspo_transfer; ?></strong>.</p>

                      <p>All products and services offered under the Tegile, a Western Digital brand NASPO ValuePoint contract <?php echo $naspo_transfer; ?> may be purchased. All purchase orders issued by purchasing entities must include the State of <?php echo $title; ?> Participating Addendum Contract number <strong><?php echo $contract_number; ?></strong>; and the Tegile, a Western Digital brand NASPO ValuePoint contract <strong><?php echo $naspo_transfer; ?></strong>.  In order to procure products and services hereunder, Eligible Users shall issue purchase orders which shall reference the contract numbers.  Eligible Users are responsible for reviewing the terms and conditions of this Addendum including all Exhibits.  Configuration limits are set at $500,000/configuration.  Please see the <a target="_blank" href="<?php echo $contract_document; ?>"><?php echo $title; ?> NASPO ValuePoint <?php echo $naspo_transfer; ?> Computer Equipment, Peripherals and Related Services Participating Addendum</a> for complete details.</p>

                    <?php if (is_array($extensions)) : ?>
                        <p><a href="<?php echo $extensions['doc']; ?>" target="_blank">Amendment <?php echo $extensions['date']; ?></a> to the Participating Addendum extends the term of the contract to <strong><?php echo $extensions['date']; ?></strong>.</p>
                    <?php endif; ?>

                    <?php if ($state_info) : ?>
                        <p><?php echo $state_info; ?></p>
                    <?php endif; ?>

                    <!-- Section for partners -->
                    <a id="partners"></a>
                    <?php if ($partners) : ?>

                        <div class="clear300rem"></div>

                        <p><strong>Tegile Partner Contact Information:</strong></p>
                        <hr />

                        <?php

                            foreach ($partners as $post) {

                                setup_postdata( $post ); ?>

                                <p><strong><?php the_field('company'); ?></strong><br />
                                <?php the_title(); ?><br />
                                <a href="tel:<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a><br />
                                <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                                <div class="clear200rem"></div>
                                <!-- <hr /> -->

                                <?php
                            }

                            wp_reset_postdata();

                        ?>

                    <?php endif; ?>

                </div>

                <!-- Display the sidebar -->
                <div class="large-3 columns" style="padding: 0;">
                    <div class="sidebar naspo-sidebar">
                        <h2>Quick Links</h2>
                        <div class="sidebar-list">
                            <ul>
                                <li><a target="_blank" href="<?php echo $naspo_secondary; ?>">Master Agreement</a></li>
                                <li><a target="_blank" href="<?php echo $contract_document; ?>">Participating Addendum</a></li>
                                <?php if (is_array($extensions)) : ?>
                                    <li><a target="_blank" href="<?php echo $extensions['doc']; ?>">Addendum <?php echo $extensions['date']; ?></a></li>
                                <?php endif; ?>
                                <li><a target="_blank" href="<?php echo $naspo_pricelist; ?>">Current Pricelist</a></li>
                                <!-- <li><a href="#partners">Partner by State</a></li> -->
                                <li><a target="_blank" href="http://www.naspovaluepoint.org/#/page/eMarket-Center-Info">Emarket Center</a></li>
                                <li><a href="/">Tegile Website</a></li>
                            </ul>
                            <div class="banner">
                                <h2>Contract Questions?</h2>
                                <h1>Allison Giglierano </h1>
                                <a href="tel:5105981059 ">510-598-1059 </a><br>
                                <a href="mailto:Allison.Giglierano@wdc.com">Allison.Giglierano@wdc.com</a>
                                <div class="banner-shadow"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Inline Fancybox Content -->
        <div class="show_hide">
            <div id="state-list"> <!-- style="width: 80vw;" -->
                <div class="row-wide">
                    <div class="row margin-bottom-050rem">
                        <?php

                            $contracts = get_posts(array(
                                'numberposts' => -1,
                                'post_type' => 'naspo_contract',
                                'post_status' => 'publish',
                                'orderby'=> 'title',
                                'order' => 'ASC',
                            ));

                            foreach ($contracts as $post) {

                                setup_postdata($post);

                                echo '<div class="small-12 medium-6 large-4 columns margin-bottom-050rem">'.button_generator( array('text' => get_the_title(), 'url' => get_permalink(), 'class' => array('go','width-100')), true, false ).'</div>';
                            }

                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end #main -->

</div> <!-- end #content -->

<?php get_footer('standard-new'); ?>
