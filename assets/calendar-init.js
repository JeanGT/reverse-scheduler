jQuery(document).ready(function ($) {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: '',
            center: ''
        },
        locale: 'pt-br',
        height: 'auto',
        editable: true,
        selectable: true,
        selectMirror: true,
        nowIndicator: true,
        unselectAuto: false,
        slotMinTime: '08:00:00',
        slotMaxTime: '18:00:00',
        allDayText: 'Dia todo',
        dayHeaderFormat: { day: '2-digit', month: '2-digit' },
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
