'use strict';

jQuery(document).ready(function($) {
	$('#header-carousel').owlCarousel({
		autoPlay: 4000,
		rewindSpeed : 1000,
		transitionStyle: 'fade',
		singleItem: true
	});  

	
	/*
		Isotope
	  	http://isotope.metafizzy.co/
	*/

	var container = $("#clients-partners-isotopes");
	if(container){
		container.isotope({
			itemSelector: ".clients-partners-item",
			layoutMode: 'fitRows'
		});

		// filter items on button click
		$('#clients-partners-filters').on('click', 'a', function (event) {
			event.preventDefault();
			var filterValue = $(this).attr('data-filter-value');
			container.isotope({
				filter: filterValue
			});
			// active class
			$('#clients-partners-filters li').removeClass();
			$(this).parent().addClass('active');
		});
	}
});