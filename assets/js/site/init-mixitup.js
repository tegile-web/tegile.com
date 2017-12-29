// jQuery('#Container').mixItUp({
// 	animation: {
// 		animate: false
// 	},
// });

var mixer = mixitup('#Container', {
    "animation": {
        "duration": 350,
        "nudge": true,
        "reverseOut": false,
        "easing": "ease-in-out",
        "animateResizeContainer": false,
        "effectsIn": "fade rotateY(-90deg)",
        "effectsOut": "fade rotateY(90deg)"
    },
    "load": {
        filter: "all"
    },
    "controls": {
        toggleLogic: "and"
    }
});

jQuery('#viewAll').focus();

var btn = jQuery('.modal-control-button');
var target = jQuery(btn.data('target'));
var wrapper = jQuery('.mixitup-control-outer-wrapper');

btn.click( function (e) {

    target.toggleClass('modal-open');
    btn.toggleClass('modal-control-hide');
    jQuery('body').toggleClass('overflow-hidden');
});

wrapper.click( function (e) {

    if ( btn.hasClass('modal-control-hide') ) {
        
        if (( !jQuery(e.target).closest('.mixitup-control-inner-wrapper').length ) || ( jQuery(e.target).closest('.modal-control-close').length )) {
        
            target.toggleClass('modal-open');
            btn.toggleClass('modal-control-hide');
            jQuery('body').toggleClass('overflow-hidden');

            // Store hash
            var hash = "#resources";

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            jQuery('html, body').animate({
                
                scrollTop: (jQuery(hash).offset().top)
            }, 800, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        }   
    } else {

        // Do Nothing
    }

});