<?php
    
    // echo '<pre>';

    $modifiers = get_sub_field('modifiers') . ' section-size-' . get_sub_field('size');
    $modifiers .= (get_sub_field('divider') ? ' section-divider' : '');
    $width = get_sub_field('width');

    $link = get_sub_field('link');

    if ($link['url']) {

        $logo = get_sub_field('logo');

        $link = '<p class="text-center" style="margin-top: 6rem;">'.button_generator( $link, true, $logo).'</p>';

    } else {
        $link = false;
    }

    // echo '</pre>';
?>

<!-- Main Row -->
<a id="<?php the_sub_field('id') ?>"></a>
<div class="row-wide collapse section-blockquote <?php echo $modifiers; ?>">
    
    <!-- Inner Row -->
    <div class="row main-row">
        
        <!-- Main BlockQuote -->
        <!-- MAYBE MOVE THE FONT COLOR CUSTOMIZATION? TO SECTION ATTRIBUTES? color: <?php //echo $visuals['font']; ?>; -->
        <blockquote style="max-width: <?php echo (($width) ? ($width.'vw') : '50vw'); ?>;">
            <div class="blockquote-border"></div>
                <?php the_sub_field('quote'); ?>
            <footer >&#8209;&nbsp;<?php echo get_sub_field('author').'<br>'.get_sub_field('company'); ?></footer>
        </blockquote>
        
        <!-- Link for Case Study -->
        <?php if ($link) { echo $link; } ?>
    </div>
    
    <!-- Add the visual settings block if 'Customize Background' is true -->
    <?php if (get_sub_field('custom-bkg')) { include(locate_template('blocks/section-visual-settings.php')); } ?>
</div>