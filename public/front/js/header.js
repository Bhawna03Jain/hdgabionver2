
jQuery(function() {
    // Handle hamburger menu toggle
    jQuery(".hamburger").click(function() {
        jQuery('.menuTitle').not('.noL2').each(function() {
            jQuery(this).attr('data-href', jQuery(this).attr('href'));
        });
        jQuery('.menuTitle').not('.noL2').removeAttr('href');

        if (jQuery(this).hasClass('is-active')) {
            jQuery('.menuTitle, .title').removeClass('active');
            jQuery('.l3, .menu20Content').hide();
            jQuery('.menuTitle, .menu20 li').show();
        }

        jQuery(this).toggleClass("is-active");
        jQuery('.menu20').toggleClass("is-active");
        jQuery("#profileContainer").hide();
    });

    // Handle menu item clicks for mobile view
    jQuery(".menu20 .menuTitle").not('.noL2').click(function() {
        if (jQuery(window).width() < 992) {
            let menuContent = jQuery(this).next('.menu20Content');

            jQuery('.menu20Content, .l3').not(menuContent).hide();
            jQuery(".menuTitle").not(this).parent().show();
            menuContent.toggle();
            jQuery(this).toggleClass('active');
            jQuery('#header20 .menu20 .menu20Content .title').addClass('hidd');
        }
    });

    // Hover effects for menu items
    jQuery('.menuTitle').hover(function() {
        let firstChild = jQuery(this).next('.menu20Content').find('ul li:first');
        let firstChildTitle = firstChild.children('.title');

        firstChild.addClass('hovered');
        firstChildTitle.addClass('hovered');
    });

    jQuery('.title').hover(function() {
        jQuery('li, .title').removeClass('hovered');
    });

    jQuery('.menu20Content .content').hover(function(e) {
        jQuery(e.currentTarget).prev('.title').toggleClass("hovered");
    });

    jQuery('.menu20Content').hover(function(e) {
        jQuery(e.currentTarget).prev('.menuTitle').toggleClass("hovered");
    });

    // Handle window resize
    jQuery(window).resize(function() {
        jQuery("#profileContainer").hide();
        if (jQuery(window).width() >= 992) {
            jQuery('.is-active').removeClass('is-active');
            jQuery('.hovered').removeClass('hovered');

            jQuery('.menuTitle').not('.noL2').each(function() {
                jQuery(this).attr('href', jQuery(this).data('href'));
            });

            jQuery('.menuTitle, .menu20 li, .l3').show();
            jQuery('.menu20Content').removeAttr('style');
        }
    });
});

