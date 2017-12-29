<?php

    // echo '<pre>';

    // Default = Image on Left, Text on Right
    // Flip = Push/Pull Columns

    $section_size = get_sub_field('size');
    $modifiers = get_sub_field('modifiers') . ' section-size-' . $section_size;
    $modifiers .= (get_sub_field('divider') ? ' section-divider' : '');

    $sub_head = get_sub_field('header');

    $image = get_sub_field('image');
    $flip = get_sub_field('image-location');

    $columns = array(
        'text' => array(
            'size' => 'medium-7 large-',
            'content' => '<h2 class="hide-for-small-only">'.$sub_head.'</h2>'.get_sub_field('text'),
            'class' => 'text-left section-text',
        ),
    );

    $flip = ( ($flip == 'right') ? true : false );
    $oversized = get_sub_field('oversize');

    $columns['image'] = array(
        'size' => 'medium-5 large-',
        'content' => array(
            'data-sizes' => 'auto',
            'class' => 'lazyload '.get_sub_field('image-modifiers'),
            'style' => '',
            'src' => 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==',
            'data-src' => $image['url'],
            'alt' => $image['alt'],
        ),
        'class' => 'text-center section-image',
    );

    if ($image) {

        $image['vid-link'] = get_sub_field('video');

        if ( $image['vid-link'] ) {

            preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $image['vid-link'], $matches);
            $image['vid-link'] = $matches[1];
        }
    } else {

        $columns['image']['class'] .= ' hide-for-small-only';
    }

    if ($oversized) {

        $section_split = explode('_','6_6');
        $columns['image']['content']['class'] .= (($flip) ? (' oversized-right') : (' oversized-left'));
        $columns['image']['content']['style'] .= 'min-width: ' . (get_sub_field('image-oversize')-10) . 'vh;';
        $columns['image']['content']['style'] .= 'max-width: ' . (get_sub_field('image-oversize')+10) . 'vh;';

    } else {

        $section_split = explode('_',get_sub_field('split'));
        $columns['image']['content']['style'] .= 'width: ' . get_sub_field('image-size') . '%;';
    }

    $columns['image']['size'] .= (($flip) ? ($section_split[1].' medium-push-7 large-push-'.$section_split[0]) : ($section_split[0]));
    $columns['text']['size'] .= (($flip) ? ($section_split[0].' medium-pull-5 large-pull-'.$section_split[1]) : ($section_split[1]));

    if (have_rows('cta-button')):

        $buttons = array();

        while( have_rows('cta-button') ): $row = the_row();

            $i = get_row_index();
            $cta = get_sub_field('cta');

            $buttons['content'][] = button_generator( $cta, true );

        endwhile;

        if (count($buttons['content']) > 1) {

            $buttons['content'] = '<ul class="button-group section-cta"><li>'.$buttons['content'][0].'</li><li>'.$buttons['content'][1].'</li></ul>';
        } else {

            $buttons['content'] = '<p class="section-cta">'.$buttons['content'][0].'</p>';
        }

        $columns['text']['content'] .= $buttons['content'];

    endif;

    // echo '</pre>';
?>

<!-- Main Row -->
<a id="<?php the_sub_field('id') ?>"></a>
<div class="row-wide collapse section-standard <?php echo $modifiers; ?>">

    <!-- Inner Row -->
    <div class="row main-row">

        <!-- Header for Small Screens -->
        <?php if ( strlen($sub_head) ) : ?>
            <div class="small-12 columns hide-for-medium-up text-center margin-bottom-100rem">
                <?php echo '<h2>'.$sub_head.'</h2>'; ?>
            </div>
        <?php endif; ?>

        <!-- Image Column -->
        <div class="small-12 <?php echo $columns['image']['size'].' '.$columns['image']['class']; ?> columns">
            <?php if ( $image['vid-link'] ) : ?>
                <div class="iframe-container shadow no-padding-top margin-top-bottom-100rem">
                    <iframe src="https://www.youtube.com/embed/<?php echo $image['vid-link']; ?>?rel=0&amp;theme=light&amp;color=red&amp;modestbranding=1&amp;autoplay=1" frameborder="0" allowfullscreen=""></iframe>
                </div>
            <?php else : ?>
                <img <?php foreach ($columns['image']['content'] as $k=>$v) { echo $k.'="'.$v.'"'; } ?> />
            <?php endif; ?>
        </div>

        <!-- Text Column -->
        <div class="small-12 <?php echo $columns['text']['size'].' '.$columns['text']['class']; ?> columns">
            <?php echo $columns['text']['content']; ?>
        </div>
    </div>

    <!-- Add the visual settings block if 'Customize Background' is true -->
    <?php if (get_sub_field('custom-bkg')) { include(locate_template('blocks/section-visual-settings.php')); } ?>
</div>
