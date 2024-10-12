jQuery(document).ready(function ($) {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title'
        },
        locale: 'pt-br',
        height: 'auto',
        navLinks: false,
        editable: true,
        selectable: true,
        selectMirror: true,
        nowIndicator: true,
        unselectAuto: false,

        // Function to handle creating new events on select
        select: function (info) {
            calendar.addEvent({
                start: info.start,
                end: info.end,
                allDay: info.allDay
            });

            calendar.unselect(); 
        }
    });

    calendar.render();
});
