'use strict';

jQuery(function($) {
		/*
		Isotope
	  	http://isotope.metafizzy.co/
	  	*/

	  	var codehighway_container = $("#code-highway-isotopes");
	  	if(codehighway_container) {
	  		codehighway_container.isotope({
	  			itemSelector: ".code-highway-item",
	  			layoutMode: 'masonry'
	  		});

		$('#code-highway-filters').on('click', 'a', function (event) {
			event.preventDefault();
			var filterValue = $(this).attr('data-filter-value');
			codehighway_container.isotope({
				filter: filterValue
			});
			$('#code-highway-filters li').removeClass();
			$(this).parent().addClass('active');
		});

		codehighway_container.after('<div id="infinite-load-icon"></div>');

		codehighway_container.infinitescroll({
			navSelector  : '#navlinks_post',
			nextSelector : '#navlinks_post a',
			itemSelector : '.code-highway-item',
			loading: {
				selector: "#infinite-load-icon",
				msgText: '<em>Loading more...</em>',
				finishedMsg: "<em>No more posts to load!<em>"
			}
		}, function(newElements) {
			var newElems = $(newElements).css({ opacity: 0 }); 

			newElems.imagesLoaded( function() {
				newElems.animate({ opacity: 1 });
				codehighway_container.isotope( 'appended', newElems );
			});
		});
	}

});