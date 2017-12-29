<?php
    
    // echo '<pre>';

    $header = get_sub_field('header');
    $section_size = get_sub_field('size');

    // NEED TO ADD THIS CTA FIELD SOMEWHERE
    $cta = get_sub_field('cta');

    $modifiers = get_sub_field('modifiers') . ' section-size-' . $section_size;
    $modifiers .= (get_sub_field('divider') ? ' section-divider' : '');

    $rows = count(get_sub_field('columns'));
    $rows = 12 / $rows;
    $columns = array();

    if (have_rows('columns')):

        while( have_rows('columns') ): $row = the_row();

            $i = get_row_index();

            $text = get_sub_field('text');
            // $text = preg_replace('/-/','&#8209;',$text);

            $columns[$i] = array(
                'image' => '',
                'sub-head' => '',
                'text' => $text,
                'link' => '',
            );

            $image = get_sub_field('image');
            $sub_head = get_sub_field('sub-head');
            $link = get_sub_field('link');
            
            if ($image) {

                $placeholder = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
                
                $columns[$i]['image'] = '<img data-sizes="auto" class="lazyload margin-bottom-100rem '.get_sub_field('image-modifiers').'" src="'.$placeholder.'" data-src="'.$image['url'].'" alt="'.$image['alt'].'" />';

            } else {

                unset($columns[$i]['image']);
            }

            if ($sub_head) {

                $sub_head = preg_replace('/-/','&#8209;',$sub_head);
                $columns[$i]['sub-head'] = '<h3>'.$sub_head.'</h3>';

            } else {
                
                unset($columns[$i]['sub-head']);
            }

            if ($rows < 6) {

                $columns[$i]['text'] = preg_replace('/<p>/', '<p class="font-size-normal">', $columns[$i]['text']);
            }

            if ($link) {

                $columns[$i]['link'] = '<p class="floor-link">'.button_generator( $link ).'</p>';
                $columns[$i]['link'] .= ( ($i==12/$rows) ? ('') : ('<div class="clear200rem show-for-small-only"></div>') );

                if (isset($columns[$i]['image'])) {

                    $columns[$i]['image'] = '<a class="text-center" href="'.$link['url'].'" target="'.$link['target'].'" >'.$columns[$i]['image'].'</a>';
                }
            } else {
                unset($columns[$i]['link']);
            }

            $columns[$i] = implode('',$columns[$i]);

            $columns[$i] = '<div class="collapse small-12 medium-'.$rows.' columns small-only-text-center">'.$columns[$i].'</div>';
            
        endwhile;

    endif;

    // echo '</pre>';
?>

<!-- Main Row -->
<a id="<?php the_sub_field('id') ?>"></a>
<div class="row-wide section-multi-column <?php echo $modifiers; ?>">

    <div class="row main-row">

        <?php if ($header): ?>
            <h2 class="text-center margin-bottom-200rem"><?php echo $header; ?></h2>
        <?php endif; ?>

        <?php echo implode('', $columns); ?>
    
    </div>

    <!-- Add the visual settings block if 'Customize Background' is true -->
    <?php if (get_sub_field('custom-bkg')) { include(locate_template('blocks/section-visual-settings.php')); } ?>

</div>