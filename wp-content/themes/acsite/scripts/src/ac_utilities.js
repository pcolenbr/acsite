jQuery(function($) {
    'use strict';

    /*
    	Isotope
    	http://isotope.metafizzy.co/
    */

    var clientsPartnersContainer = $('#clients-partners-isotopes');

    if (clientsPartnersContainer) {
        clientsPartnersContainer.imagesLoaded(function() {
            clientsPartnersContainer.isotope({
                itemSelector: '.clients-partners-item',
                layoutMode: 'fitRows'
            });

            // Filter items on button click
            $('#clients-partners-filters').on('click', 'a', function (event) {
                event.preventDefault();
                var filterValue = $(this).attr('data-filter-value');

                clientsPartnersContainer.isotope({
                    filter: filterValue
                });
                // Active class
                $('#clients-partners-filters li').removeClass();
                $(this).parent().addClass('active');
            });
        });
    }

    var multimediasContainer = $('#container-multimedias');

    if (multimediasContainer) {
        multimediasContainer.isotope({
            itemSelector: '.multimedia-element',
            layoutMode: 'fitRows'
        });

        // Filter items on button click
        $('#multimedia-filters').on('click', 'a', function (event) {
            event.preventDefault();
            var filterValue = $(this).data('filter-value');

            multimediasContainer.isotope({
                filter: filterValue
            });
            // Active class
            $('.multimedia-menu-item-link.active').removeClass('active');
            $(this).addClass('active');
        });
    }

    var subMenu = $('#submenu'),
    subMenuList = $('[data-submenu]'),
    subMenuLabel,
    subMenuAnchor;

    for(var i = 0; i < subMenuList.length; i++) {
        subMenuLabel = $(subMenuList[i]).data('submenu');
        subMenuAnchor = $(subMenuList[i]).attr('id');
        $(subMenu).append('<li class="submenu-item"><a class="submenu-anchor" href="#' + subMenuAnchor + '">' + subMenuLabel + '</a></li>');
    }

    $('.submenu-anchor').click(function() {
        $('li.submenu-item.active').removeClass('active');
        $(this).parent().addClass('active');
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);

            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    $('#wrap-menu').on('affixed-top.bs.affix', function () {
        $('body').css('margin-top', '0px');
    });

    $('#wrap-menu').on('affix.bs.affix', function () {
        $('body').css('margin-top', $('#wrap-menu').height());
    });

    $('#wrap-menu').affix({
        offset: {
            top: $('#header-carousel').height()
        }
    });
});
