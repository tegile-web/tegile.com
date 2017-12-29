<?php
    
    // echo '<pre>';
    
    $section_size = get_sub_field('size');
    
    $modifiers = get_sub_field('modifiers') . ' section-size-' . $section_size;
    $modifiers .= (get_sub_field('divider') ? ' section-divider' : '');

    $image = get_sub_field('image');

    $columns = array(
        'text' => array(
            'size' => 'small-12 medium-10 large-8 medium-offset-1 large-offset-2',
            'header' => get_sub_field('header'),
            'content' => get_sub_field('text'),
            'class' => 'section-text text-center',
        )
    );

    if ($image) {

        $image['vid-link'] = get_sub_field('video');

        $columns['image'] = array(
            'size' => 'small-12',
            'content' => array(
                'data-sizes' => 'auto',
                'class' => 'lazyload '.get_sub_field('image-modifiers'),
                'style' => 'width: ' . get_sub_field('image-size') . '%;',
                'src' => 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==',
                'data-src' => $image['url'],
                'alt' => $image['alt'],
            ),
            'class' => 'text-center section-image',
        );
    }

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
        
        <!-- Text/Image for Section -->
        <div class="columns <?php echo $columns['text']['size'].' '.$columns['text']['class']; ?>">
            
            <?php echo '<h2>'.$columns['text']['header'].'</h2>'; ?>
            
            <?php if (is_array($columns['image'])) : ?>
                
                <div class="columns <?php echo $columns['image']['size'].$columns['image']['class']; ?>">
                    
                    <img <?php foreach ($columns['image']['content'] as $k=>$v) { echo $k.'="'.$v.'"'; } ?> />
                
                </div>
            
            <?php endif; ?>
            
            <?php echo $columns['text']['content']; ?>
        
        </div>
    
    </div>

    <!-- Add the visual settings block if 'Customize Background' is true -->
    <?php if (get_sub_field('custom-bkg')) { include(locate_template('blocks/section-visual-settings.php')); } ?>
</div>