'use strict';

jQuery(function($) {
	/*
		Isotope
	  	http://isotope.metafizzy.co/
	*/

	var clients_partners_container = $("#clients-partners-isotopes");
	if(clients_partners_container){
		clients_partners_container.isotope({
			itemSelector: ".clients-partners-item",
			layoutMode: 'fitRows'
		});

		// filter items on button click
		$('#clients-partners-filters').on('click', 'a', function (event) {
			event.preventDefault();
			var filterValue = $(this).attr('data-filter-value');
			clients_partners_container.isotope({
				filter: filterValue
			});
			// active class
			$('#clients-partners-filters li').removeClass();
			$(this).parent().addClass('active');
		});
	}

	var multimedias_container = $("#container-multimedias");
	if(multimedias_container){
		multimedias_container.isotope({
			itemSelector: ".multimedia-element",
			layoutMode: 'fitRows'
		});

		// filter items on button click
		$('#multimedia-filters').on('click', 'a', function (event) {
			event.preventDefault();
			var filterValue = $(this).data('filter-value');
			multimedias_container.isotope({
				filter: filterValue
			});
			// active class
			$('.multimedia-menu-item-link.active').removeClass('active');
			$(this).addClass('active');
		});
	}

});