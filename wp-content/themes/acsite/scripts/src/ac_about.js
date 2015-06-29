jQuery(function($) {
    'use strict';

    $('#acmoto-carousel').owlCarousel({
        autoPlay: 4000,
        rewindSpeed: 1000,
        transitionStyle: 'fade',
        singleItem: true
    });

    $(window).resize(function() {
        var imgH = $('#leadership_img').css('height');

        imgH = Math.round(parseInt(imgH, 10) * 0.7);
        imgH = imgH + 'px';

        $('#amir_button, #zeo_button').css('height' , imgH);
        $('.about_box').css('max-height', imgH);
    });

    var imgH = $('#leadership_img').css('height');

    imgH = Math.round(parseInt(imgH, 10) * 0.7);
    imgH = imgH + 'px';

    $('#amir_button, #zeo_button').css('height', imgH);
    $('.about_box').css('max-height', imgH);

    $('#about_zeo').hide();
    $('#about_amir').hide();

    $('#amir_button').mouseenter(function() {
        $('#about_amir').show();
        $('#about_zeo').hide();
    });
    $('#zeo_button').mouseenter(function() {
        $('#about_zeo').show();
        $('#about_amir').hide();
    });
    $('#about_amir').mouseleave(function() {
        $('#about_amir').hide();
    });
    $('#about_zeo').mouseleave(function() {
        $('#about_zeo').hide();
    });
    $('#leadership').mouseleave(function() {
        $('#about_zeo').hide();
        $('#about_amir').hide();
    });
});
