<?php

    $sub_head = get_sub_field('header');
    $cta = get_sub_field('cta');
    $block_class = 'link-strip row-wide no-padding no-margin text-center';

    if (get_sub_field('divider')) {

        $block_class .= ' section-divider';
    }

    if (get_sub_field('modifiers')) {

        $block_class .= ' ' . get_sub_field('modifiers');
    }

    if( have_rows('links') ):

        while( have_rows('links') ): $row = the_row();

            $i = get_row_index();
            $links[$i]['icon'] = get_sub_field('link-icon');
            $links[$i]['target'] = get_sub_field('link-url');

        endwhile;

    endif;
?>

<a id="<?php the_sub_field('id') ?>"></a>
<div class="<?php echo $block_class; ?>">

    <?php if ($sub_head):
        echo '<h2>' . $sub_head . '</h2>';
    endif; ?>

    <div class="row">

        <?php

            foreach ($links as $k=>$v) {

                $img = array(
                    'data-sizes' => 'auto',
                    'class' => 'lazyload',
                    'src' => 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==',
                    'data-src' => $v['icon']['url'],
                    'alt' => $v['icon']['alt'],
                );

                if ( pathinfo( $img['data-src'], PATHINFO_EXTENSION ) == 'svg' ) {
                    $img['width'] = 100;
                }

                $out = compile_html_tag($img, '', 'img');

                if ($v['target']) {
                    $out = compile_html_tag(array('href' => $v['target'],'target' => '_blank'), $out, 'a');
                } else {
                    $img['style'] = 'filter: none;';
                    $out = compile_html_tag($img, '', 'img');
                }

                echo $out;
            }
        ?>

    </div>

    <?php
        if ($cta) {
            $cta['text'] = 'Learn More';
            echo button_generator($cta);
        }
    ?>

</div>
<div class="clear"></div>