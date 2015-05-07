'use strict';

jQuery(function($) {
	
	$("#gmap-overlay").click(function () {
		$("#gmap-overlay").fadeOut("fast");
	});

	$("#gmap").mouseleave(function () {
		$("#gmap-overlay").fadeIn("fast");
	});

});