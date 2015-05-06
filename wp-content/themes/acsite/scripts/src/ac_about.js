'use strict';

jQuery(document).ready(function($) {
	$('#acmoto-carousel').owlCarousel({
		autoPlay: 4000,
		rewindSpeed : 1000,
		transitionStyle: 'fade',
		singleItem: true
	});

	$('#leadership_img').load(function(){
        var img_h = $('#leadership_img').css('height');
		img_h = Math.round(parseInt(img_h, 10) * 0.7); 
		img_h = img_h + 'px';

        $('#amir_button, #zeo_button').css('height' , img_h);
        $('.about_box').css('max-height', img_h);

        $("#about_zeo").hide();
        $("#about_amir").hide();
    });

    $(window).resize(function() {
        var img_h = $('#leadership_img').css('height');
		img_h = Math.round(parseInt(img_h, 10) * 0.7); 
		img_h = img_h + 'px';

        $('#amir_button, #zeo_button').css('height' , img_h);
        $('.about_box').css('max-height', img_h);
    });

    $("#amir_button").mouseenter(function(){
        $("#about_amir").show();
        $("#about_zeo").hide();
    });
    $("#zeo_button").mouseenter(function(){
        $("#about_zeo").show();
        $("#about_amir").hide();
    });
    $("#about_amir").mouseleave(function(){
        $("#about_amir").hide();
    });
    $("#about_zeo").mouseleave(function(){
        $("#about_zeo").hide();
    });
    $("#leadership").mouseleave(function(){
        $("#about_zeo").hide();
        $("#about_amir").hide();
    }); 

});