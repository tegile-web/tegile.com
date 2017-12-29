/**************************/
/* Begin Setting defaults */
/**************************/

var defaults = {};

defaults.init = false;
defaults.header = 'header.header';
defaults.hero = '.hero-banner';
defaults.content = '#container';
defaults.footer = 'footer.footer';
defaults.mobile_back_btn = '.mobile-back-btn';
defaults.nav_class = {
    alt:'alt-nav-bkg',
    hide:'hide-nav'
};

jQuery(document).foundation().ready(function() {

    /****************************************/
    /* Begin Importing breakpoints from CSS */
    /****************************************/

    // Importing breakpoints from the active site
    var breakpoint = {};

    // Define function to refresh current breakpoint
    breakpoint.refreshValue = function () {

        this.value = window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/(\"|\')/g, '');
    };

    // Bind refresh of breakpoint to resize event, and trigger it once
    jQuery(window).resize(function () {

        breakpoint.refreshValue();
    }).resize();



    /*************************/
    /* Init jQuery.dotdotdot */
    /*************************/

    jQuery(".dotdotdot").dotdotdot({
        watch: "window"
    });



    /*********************************/
    /* Begin Navbar reaction segment */
    /*********************************/

    var win = {};

    // Set win.obj to the window object
    win.obj = jQuery(window);

    // Set win.body to the body object
    win.body = jQuery('body');

    // Set win.header to the nav object
    win.header = jQuery(defaults.header);

    // Set win.hero to the header object
    win.hero = jQuery(defaults.hero);

    // Set win.footer to the footer object
    win.footer = jQuery(defaults.footer);

    // Set win.trigger to the bottom pixel of the header
    win.getTrigger = function() {

        if (this.hero.length > 1) {

            this.hero.each(function(i) {

                var el = jQuery(this);

                if (el.css('opacity') > 0) {

                    win.hero = el;
                }
            });
        }

        if (this.hero.length > 0) {

            this.trigger = (this.hero.position().top + this.hero.height()) - this.hero.offset().top;
        } else {

            this.trigger = 0;
        }
    };

    // Set win.header.position to the current position of the bottom of the nav object (above or below the trigger)
    win.header.getPosition = function() {
        this.bottom = this.offset().top + this.height();
        this.position = (this.bottom > win.trigger) ? 'below' : 'above';
    };

    // Set win.footer.position to th ecurrent position of the top of the footer (above or below the bottom of the viewport)
    win.footer.getPosition = function() {
        win.bottom = win.obj.scrollTop() + win.obj.height();
        this.top = this.offset().top;
        this.position = (this.top <= win.bottom) ? 'above' : 'below';
    }

    function checkNavCollide() {

        win.header.getPosition();

        switch (win.header.position) {

            case 'above':
                win.header.removeClass(defaults.nav_class.alt);
                break;

            case 'below':
                win.header.addClass(defaults.nav_class.alt);
                break;

            default:
        }

        win.footer.getPosition();

        switch (win.footer.position) {

            case 'above':
                win.header.addClass(defaults.nav_class.hide);
                break;

            case 'below':
                win.header.removeClass(defaults.nav_class.hide);
                break;

            default:
        }

        win.init = win.top;
    }

    // Reset variables on a resize event
    win.obj.on('resize', function () {

        win.getTrigger();
        checkNavCollide();

    }).resize();

    win.obj.on('scroll', checkNavCollide);



    /***************************/
    /* Begin MegaMenu UI Stuff */
    /***************************/

    // Setup our important collections
    win.back_btn = jQuery(defaults.mobile_back_btn);

    win.nav = win.header.find('nav.top-bar');
    win.nav.wrapper = win.nav.parent('.nav-wrapper');

    win.nav.list = win.nav.find('ul.top-nav-menu');
    win.nav.items = win.nav.list.find('li.top-nav-item');
    win.nav.links = win.nav.list.find('a.top-level');

    win.mega = win.header.find('#mega-menu-content');
    win.mega.items = win.mega.find('div').filter('[data-menu-id]');

    win.tabs = win.mega.find('ul.tabs');
    win.tabs.items = win.tabs.find('li.tab-title');
    win.tabs.links = win.tabs.find('a');
    win.tabs.content = jQuery('.tabs-content .content');

    function open_mega_menu(e, el, o) {

        if (o === false) {
            o = {};
        }

        o.target = jQuery(el);

        if ( (o.target.is('[data-mega-menu]')) && (!(o.target).hasClass('open')) ) {

            // Setup our object properties
            o.parent = (o.target).parent();
            o.id = (o.target).attr('id');
            o.mega = win.mega.items.filter('[data-menu-id='+(o.id)+']');

            if (breakpoint.value == 'desktop') {

                // Clear and close all mega menus
                close_mega_menu();

                // Open THIS mega menu
                o.mega.show();
                o.target.addClass('open');
                win.mega.addClass('open');

                win.mega.add(win.nav.list.parent()).on('mouseleave', function(e) {

                    var elem = jQuery(this);

                    if ( ( (elem.is(win.nav.list.parent())) && (e.pageY < (elem.offset().top + elem.height())) ) || ( (elem.is(win.mega)) && (e.pageY > elem.offset().top) ) ) {

                        // Clear and close all mega menus
                        win.nav.links.removeClass('open');
                        win.mega.removeClass('open');
                        win.mega.items.hide(0, pauseVideos);

                        win.mega.add(win.nav.list.parent()).off('mouseleave');
                    }
                });
            } else {

                // Clear and close all mega menus
                o.parent.removeClass('show_hide').siblings().addClass('show_hide');
                win.nav.links.add(win.mega).removeClass('open');
                win.mega.items.hide(0, pauseVideos);

                // Open THIS mega menu
                o.mega.show();
                win.mega.css('margin-top', (o.target).outerHeight());
                (o.target).add(win.mega).addClass('open');

                // Insert a mobile back button in this top nav element and setup the event handlers
                win.back_btn.prependTo((o.target).parent()).removeClass('show_hide').on('click', function(e) {

                    e.preventDefault();
                    e.stopPropagation();
                    e.stopImmediatePropagation();

                    win.nav.removeClass('nav-shrink');

                    close_mega_menu();

                    win.back_btn.addClass('show_hide').off('click').appendTo(win.header);
                });
            }
        }
    }

    function close_mega_menu() {

        // Clear and close all mega menus
        win.nav.links.removeClass('open');
        win.nav.items.removeClass('show_hide');
        win.mega.removeClass('open');
        win.mega.items.hide(0, pauseVideos);

        win.tabs.items.add(win.tabs.content).removeClass('active');

        win.tabs.each(function(i) {

            var first_tab = jQuery(this).find('li').first();
            var tab_target = jQuery(first_tab.find('a').data('tab-target'));

            first_tab.add(tab_target).addClass('active');
        });

        win.back_btn.addClass('show_hide').off('click').appendTo(win.header);
    }

    // Variable to track click following on mobile (for dropdown menus);
    var dragging = false;

    // Event to open/close the mobile menu
    jQuery('#burger').on('click', function(){

        if (breakpoint.value != 'desktop') {

            close_mega_menu();

            jQuery(this).toggleClass('open');
            win.nav.list.toggleClass('open');
            win.nav.toggleClass('open');
            win.body.toggleClass('no-scroll');
            jQuery('.sumome-share-client-wrapper').fadeToggle();
        }
    });

    // Touchscreen device events for the top nav menu
    win.nav.list.on('touchmove', 'a.top-level', function(e) {

        dragging = true;
    }).on('touchstart', 'a.top-level', function(e) {

        dragging = false;
    }).on('touchend', 'a.top-level', function(e) {

        if ( (!dragging) && (el.is('[data-mega-menu]')) && (!el.hasClass('open')) ) {

            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            open_mega_menu(e, this, false);
        } else {

            return;
        }
    });

    // Open top-nav items on click for medium-down screens
    win.nav.list.on('mousedown', 'a.top-level', function(e) {

        var el = jQuery(this);

        if (breakpoint.value !== 'desktop') {

            if ( (el.is('[data-mega-menu]')) && (!el.hasClass('open')) ) {

                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                win.nav.addClass('nav-shrink');

                open_mega_menu(e, this, false);
            } else {

                // Do your thing
            }
        }
    }).on('click', 'a.top-level', function(e) {
        // Event to properly catch and hande clicks on top nav items on small screens

        var el = jQuery(this);

        if (breakpoint.value !== 'desktop') {

            if ( (el.is('[data-mega-menu]')) && (!el.hasClass('open')) ) {

                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                win.nav.addClass('nav-shrink');

                return;
            } else {

                // Do your thing
            }
        }
    }).on('mouseenter', 'a.top-level', function(e) {

        var el = jQuery(this);

        if ( (el.attr('id') == win.mega.items.filter(':visible').data('menu-id')) && (defaults.init == true) ) {

            return;
        }

        defaults.init = true;

        if (breakpoint.value == 'desktop') {

            close_mega_menu();

            open_mega_menu(e, this, false);

            win.mega.on('mouseleave', function(e) {

                close_mega_menu();

                win.mega.off('mouseleave');
            });
        }
    });

    // Event to pause YouTube videos when their parent tree is hidden
    function pauseVideos() {

        var vids = jQuery('.embedded-video');

        vids.each(function() {

            var vid = jQuery(this);
            var content = vid[0].contentWindow;

            // div.style.display = state == 'hide' ? 'none' : '';
            // func = state == 'hide' ? 'pauseVideo' : 'playVideo';
            func = 'pauseVideo';
            content.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
        });
    }



    /*****************************/
    /* Begin Search Mode Actions */
    /*****************************/

    var search = {};
        search.obj = jQuery('#search-box input');
        search.open = jQuery('.search-icon');
        search.close = jQuery('#search-box .search-close');

    search.open.on('click', function(e) {

        e.preventDefault();

        win.header.addClass('search-mode');
        search.obj.focus();

        search.close.on('click', function(e) {

            e.preventDefault();

            search.obj.blur();
            win.header.removeClass('search-mode');

            search.close.off('click');
        });
    });

    search.obj.on('keydown', function(e) {

        if (e.keyCode == 13) {

            window.location.href="/?s="+search.obj.val();
        }
    });
});

Foundation.utils.image_loaded(jQuery('#mega-menu-content img'), function(){
    jQuery(document).foundation('equalizer', 'reflow');
});
