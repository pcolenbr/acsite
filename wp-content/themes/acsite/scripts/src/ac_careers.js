'use strict';

jQuery(function($) {
	/*
		Isotope
	  	http://isotope.metafizzy.co/
	*/

	var working_at_ac_container = $("#working-at-ac-isotopes");
	if(working_at_ac_container){
		working_at_ac_container.isotope({
			itemSelector: ".working-at-ac-item",
			layoutMode: 'fitRows'
		});

		// filter items on button click
		$('#working-at-ac-filters').on('click', 'a', function (event) {
			event.preventDefault();
			var filterValue = $(this).attr('data-filter-value');
			working_at_ac_container.isotope({
				filter: filterValue
			});
			// active class
			$('#working-at-ac-filters li').removeClass();
			$(this).parent().addClass('active');
		});
	}

});