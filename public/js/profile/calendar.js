$(function() {

  

    // page is now ready, initialize the calendar...
  
    $('#calendar').fullCalendar({
      // put your options and callbacks here
      defaultView: 'agendaWeek',
      contentHeight: 600,
      locale: 'pl',
      allDaySlot: false,
    
      events: [
          {
            title: 'Trening indywidualny',
            start: '2018-11-28T07:00:55.008',
            end: '2018-11-28T08:00:55.008',
            id: "mojeid",
            color: "#4bc0e3",
            className: 'training-cal',
            description: 'Pozostała liczba osób: 1',
          },
          {
            title: 'Trening grupowy',
            start: '2018-11-28T10:00:55.008',
            end: '2018-11-28T11:00:55.008',
            id: "mojeid",
            color: "#3cdaa8;",
            className: 'training-cal',
            description: 'Pozostała liczba osób: 3',
          },
          {
            title: 'Trening indywidualny',
            start: '2018-11-30T09:00:55.008',
            end: '2018-11-30T10:00:55.008',
            id: "mojeid",
            color: "#4bc0e3",
            className: 'training-cal',
            description: 'Pozostała liczba osób: 1',
          },
          {
            title: 'Trening grupowy',
            start: '2018-11-30T12:00:55.008',
            end: '2018-11-30T14:00:55.008',
            id: "mojeid",
            color: "#3cdaa8;",
            className: 'training-cal',
            description: 'Pozostała liczba osób: 5',
          }
      ],
      color: 'white',
      minTime: '06:00:00',
      eventClick: function(calEvent, jsEvent, view) {
        console.log(calEvent)
        alert('Event: ' + calEvent.title);
        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        alert('View: ' + view.name);
    
        // change the border color just for fun
        $(this).css('border-color', 'red');
    
      }
    })
  
  });