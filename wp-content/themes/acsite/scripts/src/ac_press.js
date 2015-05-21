'use strict';

jQuery(function($) {

	var releases_container = $("#releases");
	releases_container.after('<div id="infinite-load-icon"></div>');

	releases_container.infinitescroll({
		navSelector  : '#navlinks_post',
		nextSelector : '#navlinks_post a',
		itemSelector : '.release',
		loading: {
			selector: "#infinite-load-icon",
			msgText: '<em>Loading more...</em>',
			finishedMsg: "<em>No more posts to load!<em>"
		}
	});

});