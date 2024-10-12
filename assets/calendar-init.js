jQuery(document).ready(function($) {
    moment.locale('fr');
    var now = moment();
    $('#calendar').Calendar({
        events: [
            { // An event on the current week on Wednesday from 10h to 12h
              start: now.startOf('week').isoWeekday(3).startOf('day').add(10, 'h'),
              end: now.startOf('week').isoWeekday(3).startOf('day').add(12, 'h'),
              title: 'An event title !',
              content: 'Hello World! <br>Foo Bar<p class="text-right">Wow this text is right aligned !</p>',
              category: 'A test category name'
            }
          ]
    }).init();
});