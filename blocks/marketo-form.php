<?php

// Enqueue the Marketo Forms 2.0 Script and our Custom Form CSS - Moved to /form/...
wp_enqueue_script( 'Forms2', '//app-sj05.marketo.com/js/forms2/js/forms2.min.js', 'jquery' );
wp_enqueue_style( 'Tegile-Forms', get_template_directory_uri() . '/assets/css/form/forms.min.css', 'site-css' );

?>

<script>

    function known_visitor_form (kv) {

        // Set some variables we will need to preserve text/html
        // var notKnown = kv.find('.mktoNotYou').addClass('form-not-you').removeClass('mktoNotYou').detach();
        // var formButton = kv.find('.mktoButtonWrap').detach().find('.form-submit').html(jQuery('.form-container > h3').html());

        // Append the "Not You?" dialogue to the h3 and set it's text to the known-visitor text
        // jQuery('.form-container > h3').html(kv.text()).after(notKnown);

        // Replace the form with just the button wrapper & button
        // kv.html(formButton).addClass('submit-field').removeClass('mktoTemplateBox');
    }

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

    function multi_stage_form_handling (form) {
        
        var formFields = form.find('.form-field');
        var formNav = jQuery('.form-nav');
        var initFields = <?php the_sub_field('initial_fields'); ?>;
        var setCount = <?php the_sub_field('fields_per_set'); ?>;
        var currentSet = 1;

        if (initFields == 0) {

            formNav.remove();
        } else {

            // Set data-field-set attribute to 1 for all initial fields
            jQuery.each(formFields,function( key,val ) {
                
                jQuery(val).attr('data-field-set',currentSet);

                if (key+1 == formFields.length) {
                    return false;
                }
                
                if ( (key == (initFields - 1)) || ((key > (initFields - 1)) && (((key-initFields+1)%setCount) == 0)) ) {
                    
                    currentSet++;
                }
            });

            var lastSet = currentSet;
            currentSet = 1;

            jQuery('.form-field').hide().filter('[data-field-set="1"]').show();
            jQuery('.submit-field').hide();
            formNav.show().find('#form-nav-back').hide();

            // Bind the form-nav buttons to event handlers

            formNav.find('#form-nav-next').click(function() {

                var required = jQuery('.form-field:visible').find('.required-field').find('input, textarea, select');
                var empty = [];

                jQuery.each(required,function(key,val) {
                    if (!jQuery(val).val()) {
                        empty.push(jQuery(val).parent('.required-field'));
                    }
                });

                if (empty.length) {
                    jQuery.each(empty,function(k,v) {
                        jQuery(v).addClass('warning');
                    });
                } else {

                    if (currentSet == 1) {
                        formNav.find('#form-nav-back').show();
                    }

                    currentSet++;

                    jQuery('.form-field').hide();
                    jQuery('.form-field[data-field-set="'+currentSet+'"]').show();

                    if (currentSet == lastSet) {
                        
                        formNav.hide();
                        form.find('.submit-field').show();
                    }

                    jQuery('body').animate({
                        scrollTop: form.parent().offset().top
                    }, 350);
                }
            });

            /*formNav.find('#form-nav-back').click(function() {

                currentSet--;

                jQuery('.form-field').hide();
                jQuery('.form-field[data-field-set="'+currentSet+'"]').show();

                if (currentSet == 1) {
                    formNav.find('#form-nav-back').hide();
                }
            });*/
        }

        // console.log(formFields.length);
    }

    function cleanForm (mktoForm) {
        
        // Set a few variables
        var form = mktoForm.getFormElem();
        // var known_visitor = form.find('.mktoTemplateBox');

        // Replace classes that don't make sense with our theme
        form.find('.mktoFormRow').addClass('form-field').removeClass('mktoFormRow');
        form.find('.mktoButtonRow').addClass('submit-field').removeClass('mktoButtonRow');
        form.find('.mktoCheckboxList').removeClass('mktoCheckboxList').closest('.form-field').addClass('checkbox-list');
        form.find('button').addClass('form-submit').removeClass('mktoButton');

        // Call function to build the known visitor form if this is a known visitor
        /*if (known_visitor.length > 0) {
            
            known_visitor_form(known_visitor);
        }*/

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

        /*if (known_visitor.length > 0) {

            submitCondition.appendTo(submitField);
        } else {

            submitCondition.prependTo(submitField);
        }*/

        // Call function to build custom error handling for required fields
        custom_required_field_handling(mktoForm);

        // Call function to initiate Multi-Stage Form
        multi_stage_form_handling(form);

        // Add our form class for styling
        form.addClass('tegile-form').parent('.loading').removeClass('loading');
    }

    jQuery(document).ready( function ($) {

        MktoForms2.loadForm("//app-sj05.marketo.com", "568-BVY-995", <?php the_sub_field('form_id'); ?>).whenReady( function(form) {
            
            cleanForm(form);
        });
    });
</script>

<!-- The anchor link -->
<a id="<?php the_sub_field('id') ?>"></a>

<!-- The content block -->
<div class="row-wide text-center padding200rem small-only-no-padding">
    <div class="row no-padding small-only-no-padding">
        <div class="small-12 columns small-only-no-padding">
            <div class="clear100rem show-for-medium-up"></div>

            <div class="form-container loading <?php the_sub_field('custom_form_class'); ?>">
                
                <h3><?php the_sub_field('form_header'); ?></h3>
                
                <span class="form-sub-text"><?php the_sub_field('sub_text'); ?></span>
                
                <form id="mktoForm_<?php the_sub_field('form_id'); ?>"></form>

                <span class="form-fields-required">- All Fields are Required -</span>
                
                <!-- These are the Back/Next buttons for multi-stage forms -->
                <?php if ( get_sub_field('initial_fields') > 0 ): ?>
                    <div class="form-nav" style="display: none;">
                        <!-- <a id="form-nav-back" class="form-nav-button"><i class="fa fa-caret-left fa-lg"></i> Back</a> -->
                        <a id="form-nav-next" class="form-nav-button">Next <i class="fa fa-caret-right fa-lg"></i></a>
                    </div>
                <?php endif; ?>

                <!-- Used in conjunction with a Custom Form Class to add flanking images and such -->
                <div class="form-extras"></div>
                
                <!-- Used in conjunction with a Custom Form Class to add a different colored background -->
                <div class="form-background"></div>

                <?php if (get_sub_field('terms') != '') : ?>
                    <span class="submit-condition">*By clicking the button, you agree to the <a href="<?php the_sub_field('terms'); ?>" target="_blank">Terms&nbsp;and&nbsp;Conditions</a></span>
                <?php endif; ?>
            </div>

            <div class="formClear"></div>

        </div>
    </div>
</div>

<!-- Clear all floats -->
<div class="clear"></div>