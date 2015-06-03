jQuery(function($) {
    'use strict';

    var workingAtAcContainer,
    listJobs,
    createAnchor,
    showDetails,
    jobAnchorList,
    dataGlobal,
    addPositionToDataGlobal;

    /*
    		Isotope
    	 	http://isotope.metafizzy.co/
    	*/
    workingAtAcContainer = $('#working-at-ac-isotopes');
    if (workingAtAcContainer) {
        workingAtAcContainer.isotope({
            itemSelector: '.working-at-ac-item',
            layoutMode: 'fitRows'
        });

        // Filter items on button click
        $('#working-at-ac-filters').on('click', 'a', function (event) {
            event.preventDefault();
            var filterValue = $(this).attr('data-filter-value');

            workingAtAcContainer.isotope({
                filter: filterValue
            });
            // Active class
            $('#working-at-ac-filters li').removeClass();
            $(this).parent().addClass('active');
        });
    }

    // Create the proper anchors for each career position the user clicks
    createAnchor = function(dataPos) {
        var jobTitle = dataGlobal[dataPos].title.split(' '),
        anchor = '';

        anchor = '#jp-' + jobTitle[0] + jobTitle[1];
        return anchor;
    };

    // Asked to be added by Rosa Chicaiza - Do not delete this function
    addPositionToDataGlobal = function() {
        dataGlobal.splice(0, 0, {title: 'Sr. Software Developer',
        city: 'San Francisco',
        type: 'full-time',
        description: '<p><br><u><strong>POSITION DUTIES:</strong></u><br><br>Design and develop next generation cloud-based point of sale system.  Design ' +
        'and implement REST API facade tier for respective services.  Develop generic routing engine to process requests and responses.  Work on implementing' +
        ' security architectures for authentication and authorization, cryptography using industry standards. Implement one-way hashing to secure credit card ' +
        'numbers. Implement service virtualization to stub services.</p><p><br><u><strong>DEGREE REQUIREMENTS:</strong></u><br><br>Master’s degree or foreign ' +
        'equivalent in Computer Science, Engineering or a related field.</p><p><br><u><strong>EXPERIENCE REQUIRED:</strong></u><br><br>3 years of experience in ' +
        'the job offered or related occupation.</p><p><br><u><strong>OTHER SPECIAL REQUIREMENTS:</strong></u><br><br>Experience must include: development of ' +
        'Platform and REST APIs; Java; Ruby; Spring Framework; Cryptography; Hibernate;  IVY, Maven; MySQL; PostgreSQL; Oracle; IBM WebSphere MQ; Cucumber; ' +
        'Mockito; Hamcrest; SVN, Tomcat; Scripting;  Windows; and Linux.</p><p><br><u><strong>LOCATION OF POSITION AND INTERVIEW:</strong></u><br>' +
        '<br>Avenue Code LLC<br>400 Montgomery Street, Suite 305<br>San Francisco, CA 94104</p><p><br><u><strong>APPLICANTS SHOULD SUBMIT RESUMES TO:' +
        '</strong></u><br><br>Human Resources<br>Avenue Code LLC<br>400 Montgomery Street, Suite 305<br>San Francisco, CA 94104<br>' +
        '<a href="mailto:openings@avenuecode.com">openings@avenuecode.com</a><br></p>',
        board_code: ''
        });
    };

    // List the open positions retrieved with the proper format
    listJobs = function() {
        addPositionToDataGlobal();

        var tam = dataGlobal.length,
        table = $('#jobs-table'),
        linkAnchor,
        content;

        jobAnchorList = [];
        // Listing jobs
        for(var i = 0; i < tam; i++) {
            linkAnchor = createAnchor(i);
            content += '<tr class="jobs-row" data-job-link=' + i + '><td class="jobs-title-column">' + dataGlobal[i].title +
                       '</td><td class="jobs-location-column" >' + dataGlobal[i].city + '</td></tr>';
            jobAnchorList[i] = linkAnchor;
        }

        table.append(content);
        $('#job-details').hide();
    };

    showDetails = function() {
        $('.jobs-row').click(function() {
            var jobTitle = $('#job-title'),
            jobCityType = $('#job-city-and-type'),
            jobDescription = $('#job-description'),
            btnApply = $('#btnApply'),
            data = $(this).data('job-link'),
            changeURL;

            $('.list-inline').fadeOut(400, function() {
                $('#job-details').fadeIn(400);
            });

            changeURL = { page: dataGlobal[data].title, url: jobAnchorList[data] };
            history.pushState(changeURL, changeURL.page, changeURL.url);
            jobTitle.html(document.createTextNode(dataGlobal[data].title));
            jobCityType.html(document.createTextNode(dataGlobal[data].city + ' - ' + dataGlobal[data].type));
            jobDescription.html(dataGlobal[data].description);
            btnApply.attr('href', 'http://avenuecode.theresumator.com/apply/' + dataGlobal[data].board_code);
        });
    };

    $('#back-to-table').click(function() {
        $('#job-details').fadeOut(400, function() {
            $('.list-inline').fadeIn(400);
        });
    });

    $.get('https://api.resumatorapi.com/v1/jobs?apikey=2HRO3q4A0RNtUCTqcZlEL25ZYf6IyMvO', function(data, status) {
        dataGlobal = data;

        if (status === 'success') {
            $.when(listJobs()).then(showDetails());
        }
    });
});
