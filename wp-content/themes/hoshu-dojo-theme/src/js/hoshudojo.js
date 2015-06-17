(function($) {

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


    // Init
    addDatesToEvents();

})(jQuery)
