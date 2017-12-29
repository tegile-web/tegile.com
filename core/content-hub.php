<?php

    require_once __DIR__.'/../assets/php/Opengraph/Meta.php';
    require_once __DIR__.'/../assets/php/Opengraph/Opengraph.php';
    require_once __DIR__.'/../assets/php/Opengraph/Reader.php';

    $styles = array(
        'page' => array(
            'icon' => 'fa-laptop',
            'link-text' => 'Read More',
        ),
        'article' => array(
            'icon' => 'fa-external-link',
            'link-text' => 'Read More',
        ),
        'post' => array(
            'icon' => 'fa-align-left',
            'link-text' => 'Read More',
        ),
        'case_study' => array(
            'icon' => 'fa-user-circle-o',
            'link-text' => 'Read More',
        ),
        'award' => array(
            'icon' => 'fa-trophy',
            'link-text' => 'More Info',
        ),
        'release' => array(
            'icon' => 'fa-newspaper-o',
            'link-text' => 'More Info',
        ),
        'video' => array(
            'icon' => 'fa-youtube-play',
            'link-text' => 'Watch Now',
        ),
        'webinar' => array(
            'icon' => 'fa-video-camera',
            'link-text' => 'Watch Now',
        ),
        'product_info' => array(
            'icon' => 'fa-list-alt',
            'link-text' => 'Learn More',
        ),
        'white_paper' => array(
            'icon' => 'fa-file-text-o',
            'link-text' => 'Learn More',
        ),
    );

    $blurb = get_field('blurb');
    $form = get_field('form');
    $types = array_keys($styles);

    function generate_grid( $data ) {

        $cards = count($data);
        $rows = (int)($cards/3);
        $part = ($cards % 3);

        $counts = array_count_values(
            array_column($data, 'type')
        );

        $cards = array();
        $lastFirst = 0;

        if ($part > 0) {

            $rows += ( $part == 2 ? 1 : 0 );

            $part = array(
                mt_rand(1,$rows) => ( ($part*3) ),
            );
        }

        for ($i=1; $i < $rows+1; $i++) {

            shuffle($data);
            $tmp = array();

            if ( (is_array($part)) && ($i == key($part)) ) {

                for ($j=0; $j < (12/reset($part)); $j++) {
                    $tmp[] = array(
                        'size' => reset($part),
                        'content' => array_pop($data),
                    );
                }
            } else {

                $tmp = array(0,0,0);

                foreach ($tmp as $k=>&$v) {

                    $min = 3;

                    switch ($tmp[0]['size']) {
                        case 6:
                            $max = 3;
                            break;

                        case 5:
                            $max = 4;
                            break;

                        case 4:
                            $max = 5;
                            break;

                        default:
                            $max = 6;
                            break;
                    }

                    if ($k == 0) {

                        while( in_array( ($rand = mt_rand($min,$max)), array($lastFirst) ) );
                    } else {

                        $rand = mt_rand($min,$max);
                    }

                    $v = array(
                        'size' => ( $k == (count($tmp) - 1) ? ( 12 - (array_sum(array_column($tmp, 'size'))) ) : $rand ),
                        'content' => array_pop($data),
                    );
                }

                $lastFirst = $tmp[0]['size'];
            }

            $cards[] = $tmp;
        }

        return $cards;
    }

    foreach ( $types as $key=>$type ) {

        $field = get_field( $type );

        unset($types[$key]);

        if ( $field ) {

            foreach ( $field as $k=>$v ) {

                if ($type == 'white_paper') {

                    $post = $v;
                    setup_postdata( $post );
                    $v = get_field('asset-link');
                    wp_reset_postdata();
                }

                if ($type == 'article') {
                    $defaults = $v;
                    unset($defaults['url']);
                    $v = $v['url'];
                }

                if (in_array($type, array('article','white_paper'))) {

                    error_reporting(0);

                    if (!$site = file_get_contents($v)) {
                        $err = error_get_last();
                        // echo "HTTP request failed to URL: " . $v . PHP_EOL . "Error was: " . PHP_EOL . $err['message'];
                        continue;
                    }

                    $reader = new Opengraph\Reader();
                    $reader->parse($site);
                    $reader = $reader->getArrayCopy();

                    if (empty($reader)) {
                        // echo "Parsing URL " . $v . " Failed.";
                        continue;
                    }

                    error_reporting(E_WARNING);

                    $image = '/wp-content/themes/JointsWP-master/core/../assets/images/link-image.png';
                    $title = 'This article has no Title';

                    if (in_array(strtolower($reader['og:site_name']), array('youtube', 'vimeo'))) {
                        $this_type = 'video';
                    } else {
                        $this_type = $type;
                    }

                    if (isset($reader['og:image'])) {
                        $image = $reader['og:image'][0]['og:image:url'];
                    } else if(!empty($defaults['og-image'])) {
                        $image = $defaults['og-image'];
                    }

                    if (isset($reader['og:title'])) {
                        $title = $reader['og:title'];
                    } else if(!empty($defaults['og-title'])) {
                        $title = $defaults['og-title'];
                    }

                    $types[] = array(
                        'type' => $this_type,
                        'title' => $title,
                        'image' => $image,
                        'url' => $v,
                    );

                    unset($defaults);
                } else {

                    $post = $v;
                    setup_postdata( $post );

                    if ($type == 'video') {
                        $url = get_field('asset-link');
                    } else {
                        $url = wp_make_link_relative( get_the_permalink() );
                    }

                    $types[] = array(
                        'type' => $type,
                        'title' => get_post_meta( get_the_id(), '_su_og_title', true ),
                        'image' => get_the_post_thumbnail_url( $post->ID, 'full' ),
                        'url' => $url,
                    );

                    wp_reset_postdata();
                }
            }
        }

        unset( $field );
    }

    $grid = generate_grid( $types );

?>

<div class="row-wide collapse section-standard section-size-auto section-divider">
    <div class="row main-row content-blurb">
        <div class="columns small-12 medium-10 large-8 medium-offset-1 large-offset-2 section-text text-center padding-top-bottom-400rem">
            <?php echo $blurb ?>
            <?php

                if( have_rows('account-reps') ):

                    $reps = count(get_field('account-reps'));

                   	while ( have_rows('account-reps') ) : the_row();

                        $rep = array(
                          'name' => get_sub_field('rep-name'),
                          'title' => get_sub_field('rep-title'),
                          'text' => 'Contact Me',
                          'url' => ('mailto:'.get_sub_field('rep-email')),
                        ); ?>

                        <div class="columns medium-12 large-<?php echo (12/count($reps)); ?> text-center account-reps">
                            <a href="<?php echo $rep['url'] ?>">
                              <p class="rep-image"><img src="<?php the_sub_field('rep-photo'); ?>" /></p>
                              <p class="rep-info"><span class="rep-name"><?php echo $rep['name']; ?></span><span class="rep-title"><?php echo $rep['title']; ?></p>
                            </a>
                            <p class="rep-cta"><?php echo button_generator( $rep, true ); ?></p>
                        </div>

                    <?php endwhile;

                endif;

            ?>

        </div>
    </div>
</div>

<div class="row-wide collapse section-standard section-size-auto section-divider padding-top-bottom-400rem">

    <div class="row hub-content">
        <?php foreach ($grid as $row) : ?>
                <?php foreach ($row as $col) : ?>
                    <div class="hub-card columns small-12 medium-4 large-<?php echo $col['size']; ?>">
                        <a href="<?php echo $col['content']['url']; ?>">
                            <div class="hub-inner-card <?php echo $col['content']['type']; ?>-hub-card">
                                <div class="hub-card-type">
                                    <i class="fa fa-2x fa-fw <?php echo $styles[$col['content']['type']]['icon']; ?>"></i>
                                    <div class="hub-card-type-banner"></div>
                                </div>
                                <div class="hub-card-bkg" style="background-image: url(<?php echo $col['content']['image']; ?>);"></div>
                                <div class="hub-card-content">
                                    <!-- <p class="hub-card-title">
                                        <?php echo ucwords(str_replace("_"," ",$col['content']['type']))." |"; ?>
                                    </p> -->
                                    <p class="hub-card-blurb dotdotdot">
                                        <?php echo $col['content']['title']; ?>
                                    </p>
                                    <p class="hub-card-link">
                                        <i class="fa fa-fw <?php echo $styles[$col['content']['type']]['icon']; ?> left-icon"></i>
                                        <?php echo $styles[$col['content']['type']]['link-text']; ?>
                                        <i class="fa fa-fw fa-angle-double-right right-icon"></i>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
        <?php endforeach; ?>
    </div>

</div>
