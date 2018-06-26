<?php

    // Block for the following section visual settings:
    //      - Background (Image, Color, Position, etc...)
    //      - Font Color
    //      - Color Filter
    //      - Film Overlay

    global $filters;
    global $films;
    global $data_types;

    // $font = get_sub_field('text-color');
    $film = get_sub_field('film-preset');
    $filter = get_sub_field('filter-preset');
    $bkg_image = get_sub_field('bkg-image');

    $background = array(
        'color' => get_sub_field('bkg-color').' ',
        'image' => ( ($bkg_image) ? ('url('.$bkg_image['url'].') ') : ('') ),
        'settings' => get_sub_field('bkg-settings'),
        'size' => get_sub_field('bkg-size'),
        'class' => get_sub_field('bkg-modifiers'),
    );

    if ($film) {

        $film = "url('data:".$data_types[$films[$film]].";base64,".base64_encode(file_get_contents(WP_CONTENT_DIR."/uploads/film-overlays/".$film.".".$films[$film]))."')";

        $film = compile_html_tag(array(
            'class' => 'section-film '.get_sub_field('film-class'),
            'style' => compile_html_tag(array(
                'background-image' => $film,
                'background-attachment' => 'fixed',
                'background-size' => get_sub_field('film-zoom').'%',
                'opacity' => (get_sub_field('film-strength'))/100,
                'filter' => 'brightness('.get_sub_field('film-brightness').')',
            ), '', false, ': ', '; '),
        ), '', 'div');

    } else {

        $film = '';
    }

    if ($filter) {
        
        $filter = compile_html_tag(array(
            'class' => 'section-filter',
            'style' => compile_html_tag(array(
                'background' => $filters[$filter],
                'opacity' => (get_sub_field('filter-strength'))/100,
            ), '', false, ': ', '; '),
        ), '', 'div');

    } else {

        $filter = '';
    }

?>

<?php echo $filter; ?>
<?php echo $film; ?>
<?php // echo $background; ?>

<?php if ( ($background['color']) || ($background['image']) ): ?>
    <div class="section-background <?php echo $background['class']; ?>" style="background: <?php echo $background['image'].$background['color'].$background['settings']; ?>; background-size: <?php echo $background['size'] ?>;"></div>
<?php endif; ?>