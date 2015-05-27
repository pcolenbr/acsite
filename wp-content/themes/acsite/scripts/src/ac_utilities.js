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
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      		var target = $(this.hash);
      		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      		if (target.length) {
        		$('html,body').animate({
          		scrollTop: target.offset().top
        		}, 1000);
        	return false;
      		}
    	}
	});



});