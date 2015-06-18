(function($) {


    // Functions
    // ---

    var addDatesToEvents = function() {
        var startDateRegex = /start':'(.*?)(?= )/;
        var $events = $('.aec-eventlist .fc-event');
        var monthNames = [
            "JAN", "FEB", "MAR",
            "APR", "MAY", "JUN",
            "JUL", "AUG", "SEP",
            "OCT", "NOV", "DEC"
        ];

        $events.each(function(idx, event) {
            $event = $(event);

            var sourceDate = $event.attr('onclick').match(startDateRegex)[1];
            var date = new Date(sourceDate);
            var dateStr = monthNames[date.getMonth()] + '\n' + date.getDate();

            $event.attr('data-date', dateStr);
        });
    };

    var fixJetpackForms = function() {
        var $form = $('.contact-form');

        var $rows = $form.find('> div, > p');
        $rows.addClass('c-field').wrap('<div class="c-field-row"></div>');

        var $selects = $form.find('select');
        $selects.wrap('<div class="c-select"></div>');

        var $textarea = $form.find('textarea').attr('rows', '4');

        var $require = $form.find('label span').text(' *');

        var $submit = $form.find('input[type="submit"]').val('Submit').addClass('c-button c--cta');
    };


    // Init
    // ---

    addDatesToEvents();
    fixJetpackForms();

})(jQuery)
