jQuery(function($) {
    'use strict';

    var releasesContainer = $('#releases');

    releasesContainer.after('<div id="infinite-load-icon"></div>');

    releasesContainer.infinitescroll({
        navSelector: '#navlinks_post',
        nextSelector: '#navlinks_post a',
        itemSelector: '.release',
        loading: {
            selector: '#infinite-load-icon',
            msgText: '<em>Loading more...</em>',
            finishedMsg: '<em>No more posts to load!<em>'
        }
    });
});
