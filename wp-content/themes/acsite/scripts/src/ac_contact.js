'use strict';

jQuery(function($) {
	
	$("#gmap-overlay").click(function () {
		$("#gmap-overlay").fadeOut("fast");
	});

	$("#gmap").mouseleave(function () {
		$("#gmap-overlay").fadeIn("fast");
	});

	$("#cf_send_button").click(function(event) {
		event.preventDefault();
		var location = $("#cf_location").val();
		var name = $("#cf_name").val();
		var email = $("#cf_email").val();
		var website = $("#cf_website").val();
		var message = $("#cf_message").val();

		if(name === "") {
			$("#cf_warning").html("Please enter a name");
			$("#cf_warning").fadeIn("fast");
			return;
		} else if(email === "") {
			$("#cf_warning").html("Please enter an email");
			$("#cf_warning").fadeIn("fast");
			return;
		} else if(message === "") {
			$("#cf_warning").html("Please enter a message");
			$("#cf_warning").fadeIn("fast");
			return;
		}

		$("#cf_warning").hide();
		$("#block_screen").css("height", jQuery("#div_form").height());
		$("#block_screen").fadeIn("slow");

		$.post(ACAjax.ajaxurl, {
			'action': 'ac_contact_send_email', 
			'location': location,
			'name': name,
			'email': email,
			'website': website,
			'message': message
		}, function(response) {
			if(response['success'] == true) {
				$("#cf_location").val(1);
				$("#cf_name").val("");
				$("#cf_email").val("");
				$("#cf_website").val("");
				$("#cf_message").val("");

				$("#cf_success").fadeIn("slow").promise().done(function(){
				     $("#cf_success").delay(5000).fadeOut("slow");
				 });
			} else {
				$("#cf_error").fadeIn("slow").promise().done(function(){
				     $("#cf_error").delay(5000).fadeOut("slow");
				 });
			}
			$("#block_screen").fadeOut("slow");
		});
	});

});