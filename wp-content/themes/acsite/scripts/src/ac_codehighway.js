jQuery(function($) {
    'use strict';

    /*
    	Isotope
     	http://isotope.metafizzy.co/
    */

    var codehighwayContainer = $('#code-highway-isotopes');

    if (codehighwayContainer) {
        codehighwayContainer.isotope({
            itemSelector: '.code-highway-item',
            layoutMode: 'masonry'
        });

        $('#code-highway-filters').on('click', 'a', function (event) {
            event.preventDefault();
            var filterValue = $(this).attr('data-filter-value');

            codehighwayContainer.isotope({
                filter: filterValue
            });
            $('#code-highway-filters li').removeClass();
            $(this).parent().addClass('active');
        });

        codehighwayContainer.after('<div id="infinite-load-icon"></div>');

        codehighwayContainer.infinitescroll({
            navSelector: '#navlinks_post',
            nextSelector: '#navlinks_post a',
            itemSelector: '.code-highway-item',
            loading: {
                selector: '#infinite-load-icon',
                msgText: '<em>Loading more...</em>',
                finishedMsg: '<em>No more posts to load!<em>'
            }
        }, function(newElements) {
            var newElems = $(newElements).css({ opacity: 0 });

            newElems.imagesLoaded(function() {
                newElems.animate({ opacity: 1 });
                codehighwayContainer.isotope('appended', newElems);
            });
        });
    }
});
