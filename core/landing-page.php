<?php

// Enqueue the Marketo Forms 2.0 Script and our Custom Form CSS
wp_enqueue_script( 'Forms2', '//app-sj05.marketo.com/js/forms2/js/forms2.min.js', 'jquery' );
wp_enqueue_style( 'Tegile-Forms', get_template_directory_uri() . '/assets/css/form/forms.min.css', 'site-css' );

?>

<script>
// Javscript to run/display/control our fancy schmancy new Marketo Form
    function custom_required_field_handling (mktoForm) {

        var form = mktoForm.getFormElem();

        form.find('.mktoRequiredField').addClass('required-field').find('input, select, textarea').blur( function() {

            // Push jQuery(this) to a variable
            var el = jQuery(this);

            if ( !el.val() ) {

                el.parent().addClass('warning');
            } else {

                el.parent().removeClass('warning');
            }
        });

        mktoForm.onValidate( function(val) {

            if (!val) {

                var toAnimate = form.find('.required-field.warning');

                for(i = 0; i < 2; i++) {
                    toAnimate.animate({marginLeft: '-=3px'},150)
                        .animate({marginLeft: '+=3px'},150);
                }
            }
        });
    }

    function cleanForm (mktoForm) {

        // Set a few variables
        var form = mktoForm.getFormElem();

        // Replace classes that don't make sense with our theme
        form.find('.mktoFormRow').addClass('form-field').removeClass('mktoFormRow');
        form.find('.mktoButtonRow').addClass('submit-field').removeClass('mktoButtonRow');
        form.find('.mktoCheckboxList').removeClass('mktoCheckboxList').closest('.form-field').addClass('checkbox-list');
        form.find('button').addClass('form-submit').removeClass('mktoButton');

        // Find and remove unneaded elements
        form.find('label, .mktoOffset, .mktoGutter').remove();

        // Remove inline styles from ALL children of the form, and the form itself
        form.removeAttr('style').find('*').removeAttr('style');

        // Remove erroneous classes from input and wrapper fields
        form.find('input.mktoField, input.mktoTextField, .mktoFieldWrap, .mktoFormCol, .mktoHasWidth')
            .removeClass('mktoField')
            .removeClass('mktoTextField')
            .removeClass('mktoFieldWrap')
            .removeClass('mktoFormCol')
            .removeClass('mktoHasWidth')
        ;

        // If there are select or checkbox fields, move their 'title' attribute to its own span as a title
        var needsLabel = form.find('input[title], select[title], textarea[title], div[title]');
        jQuery.each( needsLabel, function (key,val) {
            val = jQuery(val);
            val.closest('.form-field').prepend('<span class="form-label">'+val.attr('title')+'</span>');
        });

        // If there are checkbox fields, we need to create a label for each one
        var checkboxes = form.find('.checkbox-list input');
        jQuery.each( checkboxes, function (key,val) {
            val = jQuery(val);
            val.wrap('<div class="form-checkboxes"></div>').after('<span class="checkbox-label">'+val.attr('value')+'</span>');
        });

        // Remove erroneous clearing divs, and place one per form-field
        form.find('.mktoClear').remove();
        form.find('.form-field').append('<div class="mktoClear"></div>');

        // Move any submit condition spans into the right place
        var submitCondition = form.siblings('.submit-condition').detach();
        var submitField = form.find('.submit-field');

        submitCondition.prependTo(submitField);

        // Call function to build custom error handling for required fields
        custom_required_field_handling(mktoForm);

        // Add our form class for styling
        form.addClass('tegile-form').parent('.loading').removeClass('loading');
        form.closest('.columns').css('opacity','1');
    }

    jQuery(document).ready( function ($) {

        MktoForms2.loadForm("//app-sj05.marketo.com", "568-BVY-995", <?php the_field('form'); ?>).whenReady( function(form) {

            cleanForm(form);
        });
    });
</script>

<?php

    // Main Content Body

    $placeholder = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';

    $form = get_field('form');
    $blurb = get_field('blurb');

    $columns = array(
        '_fields' => array('header','image','shadow','text'),
    );

    $standard = array(
        '_fields' => array('header','image','options','text'),
    );

    foreach (array('columns','standard') as $var) {

        $row_index = 0;

        if( have_rows($var) ) {

            while( have_rows($var) ) {

                the_row();

                foreach (${$var}['_fields'] as $field) {

                    ${$var}[$row_index][$field] = get_sub_field($field);
                }

                $row_index++;
            }
        }

        if (is_array(${$var}['_fields'])) {
            unset(${$var}['_fields']);
        }
    }

?>

<!-- Primary Content Section -->
<!-- MAKE CHANGES HERE!!!! -->
    <!-- The anchor link -->
    <a id="form"></a>
    <div class="row-wide collapse section-standard section-divider section-size-auto">
        <div class="row">

            <!-- Text Column -->
            <div class="small-12 medium-6 columns">
                <!-- <div class="clear300rem show-for-small-only"></div> -->
                <?php the_field('blurb'); ?>
            </div>

            <!-- Marketo Form Column -->
            <div class="small-12 medium-6 text-center padding200rem columns small-only-no-padding small-only-no-margin form-column">
                <div class="clear100rem show-for-medium-up"></div>
                <div class="clear300rem show-for-small-only"></div>

                <div class="form-container loading">

                    <h3><?php the_field('form_head'); ?></h3>

                    <span class="form-sub-text"><?php the_field('form_sub'); ?></span>

                    <form id="mktoForm_<?php the_field('form'); ?>"></form>

                    <span class="form-fields-required">- All Fields are Required -</span>

                    <div class="form-background"></div>

                    <span class="submit-condition">*By clicking the button, you agree to the <a href="#" target="_blank">Terms&nbsp;and&nbsp;Conditions</a></span>

                </div>
                <div class="formClear hide-for-small-only"></div>
            </div>

        </div>
    </div>

    <!-- Clear all floats -->
    <div class="clear"></div>
<!-- End Primary Content Section -->

<!-- Multi-Column Section -->

    <a id="columns"></a>
    <div class="row-wide section-multi-column section-divider section-size-75">

        <div class="row main-row">

            <?php foreach ($columns as $count=>$column): ?>

                <div class="collapse small-12 medium-<?php echo (12/count($columns)); ?> columns text-center">

                    <?php if ($column['image']): ?>
                        <img
                            data-sizes="auto"
                            class="lazyload margin-bottom-100rem width-80<?php echo ( $column['shadow'] ? ' image-pop' : '' ); ?>"
                            src="<?php echo $placeholder; ?>"
                            data-src="<?php echo $column['image']; ?>"
                        />
                    <?php endif; ?>

                    <?php if ($column['header']): ?>
                        <h3><?php echo $column['header']; ?></h3>
                    <?php endif; ?>

                    <p class="font-size-normal"><?php echo $column['text'];?></p>
                    <?php if($count < (count($columns)-1)) : ?>
                        <div class="clear300rem show-for-small-only"></div>
                    <?php endif;?>

                </div>

            <?php endforeach; ?>

        </div>

    </div>
<!-- End Multi-Column Section -->

<!-- Standard Sections -->
    <?php foreach ($standard as $k=>$section): ?>

        <?php

            $section_size = '75';

            $section['image'] = array(
                'data-sizes' => 'auto',
                'class' => 'lazyload',
                'style' => 'width:80% !important;',
                'src' => $placeholder,
                'data-src' => $section['image'],
            );
        ?>

        <?php

            if (is_array($section[options])) {
                if (in_array( 'fill', $section['options'] )) {
                    $section['image']['class'] .= ' oversized-left';
                    $section['image']['style'] = 'min-width: 110vh;max-width: 130vh;';
                    $section_size = '100';
                }
                if (in_array( 'flip', $section['options'] )) {
                    $flip = array('img' => ' medium-push-6', 'txt' => ' medium-pull-6');
                    $section['image']['class'] = str_replace( ' oversized-left', ' oversized-right', $section['image']['class'] );
                }
                if (in_array( 'shadow', $section['options'] )) {
                    $section['image']['class'] .= ' image-pop';
                }
            }
        ?>

        <a id="section-<?php echo $k; ?>"></a>
        <div class="row-wide collapse section-standard section-divider section-size-<?php echo $section_size; ?>">

            <!-- Inner Row -->
            <div class="row main-row">

                <!-- Header for Small Screens -->
                <?php if ( strlen($section['header']) ) : ?>
                    <div class="small-12 columns hide-for-medium-up text-center margin-bottom-100rem">
                        <?php echo '<h2>'.$section['header'].'</h2>'; ?>
                    </div>
                <?php endif; ?>

                <!-- Image Column -->
                <div class="small-12 medium-6<?php echo $flip['img']; ?> columns text-center section-image">
                    <img <?php foreach ($section['image'] as $prop=>$val) { echo $prop.'="'.$val.'"'; } ?> />
                </div>

                <div class="clear300rem show-for-small-only"></div>

                <!-- Text Column -->
                <div class="small-12 medium-6<?php echo $flip['txt']; ?> columns">
                    <h2 class="hide-for-small-only"><?php echo $section['header']; ?></h2>
                    <?php echo $section['text']; ?>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
<!-- End Standard Sections -->
