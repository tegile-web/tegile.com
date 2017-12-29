<?php
    
    echo '<pre>';

    // NEED TO USE IMAGE ALT TEXT WHEN UPLOADING !!!
    // 
    // WHEN YOU WAKE UP MAKE THE CTA BUTTON ALWAYS APPEAR AT THE BOTTOM ON MOBILE !!!
    // 
    // Default = Image on Left, Text on Right
    // Flip = Push/Pull Columns

    $flip = ( ( get_sub_field('section-image-location') == 'right' ) ? true : false );

    $image = get_sub_field('section-image');
    $image['cta-link'] = get_sub_field('section-image-link');

    $section_split = explode('_',get_sub_field('section-split'));
    $sub_head = get_sub_field('section-header');

    $columns = array(
        'image' => array(
            'size' => 'large-'.$section_split[0],
            'content' => '<img data-sizes="auto"
                class="lazyload"
                style="width: '.get_sub_field('section-image-size').'%;"
                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                data-src="'.$image['url'].'"
                alt="'.$image['alt'].'" />',
            'class' => 'text-center section-image '.get_sub_field('section-image-class'),
        ),
        'text' => array(
            'size' => 'large-'.$section_split[1],
            'content' => '<h2 class="hide-for-small-only">'.$sub_head.'</h2>'.get_sub_field('section-text'),
            'class' => 'text-left section-text '.get_sub_field('section-text-class'),
        ),
    );

    if ( $flip ) {

        $columns['text']['size'] =  'large-'.$section_split[0].' medium-pull-6 large-pull-'.$section_split[1];
        $columns['image']['size'] = 'large-'.$section_split[1].' medium-push-6 large-push-'.$section_split[0];
    }

    if ( get_sub_field('cta-link') ) {

        $cta = array(
            'position' => get_sub_field('cta-position'),
            'content' => array('1'),
            'class' => 'hide-for-medium-up'
        );

        if ( get_sub_field('split-cta') ) {

            $cta['content'][] = '2';
        }

        foreach ($cta['content'] as $k=>&$v) {
            
            $v = '<a href="'.get_sub_field('cta-url-'.$v).'" class="button" target="_blank">'.get_sub_field('cta-text-'.$v).'</a>';
        }

        if ( count($cta['content']) > 1 ) {
            
            $cta['content'] = '<ul class="button-group round"><li>'.$cta['content'][0].'</li><li>'.$cta['content'][1].'</li></ul>';
        } else {
            
            $cta['content'] = $cta['content'][0];
        }

        switch ( $cta['position'] ) {
            case 'text':
                $columns[$cta['position']]['content'] .= '<p class="section-cta">'.$cta['content'].'</p>';
                break;
            
            case 'image':
                $columns[$cta['position']]['content'] .= '<div class="section-cta">'.$cta['content'].'</div>';
                break;
            
            default:
                $cta['class'] = '';
                break;
        }
    }

    echo '</pre>';
?>


<div class="row-wide collapse section-columns-2 <?php the_sub_field('section-class'); ?>"> <!-- Main Row -->
    <div class="row">
        <?php if ( strlen($sub_head) ) : ?>
            <div class="small-12 columns hide-for-medium-up text-center margin-bottom-100rem">
                <?php echo '<h2>'.$sub_head.'</h2>'; ?>
            </div>
        <?php endif; ?>
        <div class="small-12 medium-6 <?php echo $columns['image']['size'].' '.$columns['image']['class']; ?> columns"> <!-- Column classes for image -->
            <?php echo $columns['image']['content']; ?>
        </div>
        <div class="small-12 medium-6 <?php echo $columns['text']['size'].' '.$columns['text']['class']; ?> columns"> <!-- Column classes for text -->
            <?php echo $columns['text']['content']; ?>
        </div>
    </div>
    <div class="row section-cta-row <?php echo $cta['class']; ?>">
        <div class="small-12 columns">
            <?php echo $cta['content']; ?>
        </div>
    </div>
</div>