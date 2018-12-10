<?php
/**
 * Template Name: Naspo Master Page
 */
?>

<?php

    // Setup some vars
    global $naspo_id;
    global $naspo_docs_path;
    global $naspo_master;
    global $naspo_transfer;
    global $naspo_secondary;

    $naspo_master_docs = get_naspo_docs($naspo_docs_path)['Master'];

    sort($naspo_master_docs);

    foreach ($naspo_master_docs as $k=>$naspo_doc) {

        if (strpos($naspo_doc, 'pricelist') !== false) {
            $doc_date = strtotime( str_replace( '-', '/', array_pop( explode( '_', array_shift( explode( '.', $naspo_doc ) ) ) ) ) );
            $naspo_master_docs['pricelist'][$doc_date] = str_replace(ABSPATH,'/',$naspo_docs_path).'/Master/'.$naspo_doc;
        } elseif (strpos($naspo_doc, 'extension') !== false) {
            $doc_date = strtotime( str_replace( '-', '/', array_pop( explode( '_', array_shift( explode( '.', $naspo_doc ) ) ) ) ) );
            $naspo_master_docs['extension'][$doc_date] = str_replace(ABSPATH,'/',$naspo_docs_path).'/Master/'.$naspo_doc;
        }
        unset($naspo_master_docs[$k]);
    }

    $the_states = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'naspo_contract',
        'post_status' => 'publish',
        'orderby'=> 'title',
        'order' => 'ASC',
    ));

?>

<?php get_header('landing-page-no-nav-new'); ?>

<div id="content">

    <div id="main" role="main">

        <!-- Display the state and state change buttons -->
        <div class="row-wide no-padding-bottom">
            <div class="row">
                <div class="small-12 columns">
                    <h1 class="font-size-h1-hero-bold single-title no-padding">Tegile NASPO ValuePoint Storage Products and Services</h1>
                    <p>Contract Number <?php echo $naspo_transfer; ?></p>
                </div>
            </div>
            <hr />
        </div>

        <!-- Content container -->
        <div class="row-wide no-padding-bottom section-divider">
            <div class="row">

                <!-- Display the main content body -->
                <div class="large-7 columns" style="padding-left: 0;">
                    <p>NASPO Contract Expiration Date: March 30, 2018</p>

                    <p>All products and services offered under the Tegile, a Western Digital brand NASPO ValuePoint contract <?php echo $naspo_transfer; ?> may be purchased. All purchase orders issued by purchasing entities must include the appropriate State's Participating Addendum Contract and the Tegile, a Western Digital brand NASPO ValuePoint contract.  In order to procure products and services hereunder, Eligible Users shall issue purchase orders which shall reference the contract numbers.  Eligible Users are responsible for reviewing the terms and conditions of the appropriate Addendum including all Exhibits.  Configuration limits are set at $500,000/configuration.</p>

                    <div class="clear200rem"></div>

                    <h3>NASPO Documentation</h3>

                    <ul>
                        <li><a href="<?php echo $naspo_master; ?>" target="_blank" class="go">NASPO ValuePoint Contract <?php echo $naspo_id; ?></a></li>
                        <?php if ($naspo_master_docs['extension']) : ?>
                            <?php foreach ($naspo_master_docs['extension'] as $date=>$doc) : ?>
                                <li><a href="<?php echo $doc; ?>" target="_blank" class="go">NASPO Contract Extension - <?php echo date('F j, Y', $date) ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <li><a href="<?php echo $naspo_secondary; ?>" target="_blank" class="go">NASPO Assignment Agreement - Tegile to Western Digital</a></li>
                    </ul>

                    <div class="clear200rem"></div>

                    <h3>Price Lists</h3>

                    <ul>

                    <?php

                        $pricelists = $naspo_master_docs['pricelist'];
                        $curr = 0;

                        krsort($pricelists);

                        foreach ($pricelists as $date=>$pricelist) {

                            echo '<li><a target="_blank" class="go" href="'.$pricelist.'">';

                            if ($curr == 0) {
                                echo '<strong>Baseline Price List - CURRENT</strong>';
                            } else {
                                echo 'Baseline Price List - Archived '.$curr;
                            }

                            $curr = date('m/d/Y',$date);

                            echo '</a></li>';
                        }

                    ?>

                    </ul>

                    <div class="clear200rem"></div>

                    <h3>Tegile Product Description and Information</h3>

                    <ul>
                        <li><a href="http://www.tegile.com/wp-content/uploads/2017/11/IntelliFlash-Product-Matrix-Final-11_01_2017.pdf" target="_blank" class="go">T-Series Product Matrix</a></li>
                    </ul>

                </div>

                <!-- Display the sidebar -->
                <div class="large-3 columns" style="padding: 0;">
                    <div class="sidebar naspo-sidebar">
                        <h2>Participating States</h2>
                        <div class="sidebar-list">
                            <ul>

                                <?php

                                    foreach ($the_states as $post) {

                                        setup_postdata($post);

                                        echo '<li><a href="/naspo/';
                                        echo str_replace(" ","-",strtolower(get_the_title()));
                                        echo '/">';
                                        echo ucwords(get_the_title());
                                        echo '</a></li>';

                                        wp_reset_postdata();
                                    }

                                ?>

                            </ul>
                            <div class="banner">
                                <h2>Contract Questions?</h2>
                                <h1>Allison Giglierano </h1>
                                <a href="tel:5105981059 ">510-598-1059 </a><br>
                                <a href="mailto:Allison.Giglierano@wdc.com">Allison.Giglierano@wdc.com</a>
                                <div class="banner-shadow"></div>
                            </div>
                            <ul>
                                <li><a target="_blank" href="http://www.naspovaluepoint.org/#/page/eMarket-Center-Info">Emarket Center</a></li>
                                <li><a href="/">Tegile Website</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div> <!-- end #main -->

</div> <!-- end #content -->

<?php get_footer('standard-new'); ?>
