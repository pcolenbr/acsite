jQuery(function($) {
    'use strict';

    var ACAjax;

    $('#gmap-overlay').click(function () {
        $('#gmap-overlay').fadeOut('fast');
    });

    $('#gmap').mouseleave(function () {
        $('#gmap-overlay').fadeIn('fast');
    });

    $('#cf_send_button').click(function(event) {
        event.preventDefault();
        var location = $('#cf_location').val(),
        name = $('#cf_name').val(),
        email = $('#cf_email').val(),
        website = $('#cf_website').val(),
        message = $('#cf_message').val();

        if (name === '') {
            $('#cf_warning').html('Please enter a name');
            $('#cf_warning').fadeIn('fast');
            return;
        } else if (email === '') {
            $('#cf_warning').html('Please enter an email');
            $('#cf_warning').fadeIn('fast');
            return;
        } else if (message === '') {
            $('#cf_warning').html('Please enter a message');
            $('#cf_warning').fadeIn('fast');
            return;
        }

        $('#cf_warning').hide();
        $('#block_screen').css('height', jQuery('#div_form').height());
        $('#block_screen').fadeIn('slow');

        $.post(ACAjax.ajaxurl, {
            action: 'ac_contact_send_email',
            location: location,
            name: name,
            email: email,
            website: website,
            message: message
        }, function(response) {
            if (response.success === true) {
                $('#cf_location').val(1);
                $('#cf_name').val('');
                $('#cf_email').val('');
                $('#cf_website').val('');
                $('#cf_message').val('');

                $('#cf_success').fadeIn('slow').promise().done(function() {
                    $('#cf_success').delay(5000).fadeOut('slow');
                });
            } else {
                $('#cf_error').fadeIn('slow').promise().done(function() {
                    $('#cf_error').delay(5000).fadeOut('slow');
                });
            }
            $('#block_screen').fadeOut('slow');
        });
    });

    $('.location-link').click(function() {
        var office = $(this).data('location'),
        frame = $('#mapFrame'),
        officeID = $('#officeID'),
        address = $('#officeAddress'),
        phone = $('#officePhone'),
        fax = $('#officeFax'),
        faxImage = $('#office-fax-image'),
        mailLink = $('#mailLink');

        $('.location-link-active').removeClass('location-link-active');
        $(this).addClass('location-link-active');

        if (office === 'SF') {
            $('#contact-info-list').fadeOut('slow').promise().done(function() {
                frame.attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.866917500437!2d-122.40253129999998!3d37.793158499999976!2m3!1f0!2f0!3f0!' +
                '3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808a698fd8eb%3A0xcfad419c0e900b47!2s400+Montgomery+St+%23305!5e0!3m2!1sen!2s!4v1400803033706');
                address.html('400 Montgomery Street, Suite 305<br>San Francisco, CA 94104');
                phone.html('Accounting Department: +1 415-990-3689<br>Marketing Department: +1 415 766-4179<br>Human Resources: +1 415-259-4214' +
                '<br>Recruiting Department: +1 415-766-4177<br>General Inquiries: +1 415-766-4178');
                faxImage.show();
                fax.show().html('+1 415 766 4252');
                mailLink.html('info@avenuecode.com');
                $(this).fadeIn('slow');
            });
        } else if (office === 'SP') {
            $('#contact-info-list').fadeOut('slow').promise().done(function() {
                frame.attr('src', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3657.3303769973313!2d-46.6595608!3d-23.556575099999996!3m2!1i1024!2i768!4f13.1!' +
                '3m3!1m2!1s0x94ce5832c987e301%3A0x85713c0a3d027b93!2zUnVhIEx1w61zIENvZWxobywgMjIzIC0gQ29uc29sYcOnw6Nv!5e0!3m2!1sen!2s!4v1399654305150');
                officeID.val('Contact info (São Paulo)');
                address.html('Rua Luís Coelho, 223 - 3º andar<br>Consolação, São Paulo, SP 01309-001');
                phone.html('+55 11 3205-3232');
                faxImage.hide();
                fax.hide();
                mailLink.html('brazil.info@avenuecode.com');
                mailLink.prop('href', 'mailto:brazil.info@avenuecode.com');
                $(this).fadeIn('slow');
            });
        } else if (office === 'BH') {
            $('#contact-info-list').fadeOut('slow').promise().done(function() {
                frame.attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.7291085360866!2d-43.935407338098074!3d-19.935817084534122!2m3!1f0!2f0!3f0!3m2' +
                '!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699db449c6009%3A0xeff4dac21f11fc3!2sRua+Pernambuco%2C+1000+-+Funcion%C3%A1rios!5e0!3m2!1sen!2sbr!4v1398281975939');
                officeID.val('Contact info (Belo Horizonte)');
                address.html('Rua Pernambuco, 1000 - 8º andar<br>Funcionários, Belo Horizonte, MG 30130-151');
                phone.html('+55 31 2516-1448');
                faxImage.show();
                fax.show().html('+55 31 2127-1804');
                mailLink.html('brazil.info@avenuecode.com');
                mailLink.prop('href', 'mailto:brazil.info@avenuecode.com');
                $(this).fadeIn('slow');
            });
        }
    });
});
