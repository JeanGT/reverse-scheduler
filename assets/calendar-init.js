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
        buttonText: {
            today: 'Hoje'
        },
        // Function to handle creating new events on select
        select: function (info) {
            var startDate = info.start;
            var endDate = info.end;

            // If the event is spanning multiple days, prevent the event creation
            if (startDate.getDate() !== endDate.getDate()) {
                calendar.unselect();
                return;
            }

            calendar.addEvent({
                start: info.start,
                end: info.end,
                allDay: info.allDay
            });

            calendar.unselect();
        }
    });

    calendar.render();

    $('#submit-calendar').on('click', function () {
        var events = calendar.getEvents();

        console.log(events);
    });
});
