$(function() {

    var id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1)
    var eventRecords = new Array();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        responseObject = JSON.parse(xhttp.responseText);
        console.log(responseObject)
        for(var i = 0; i < responseObject[0].tr_tr.length; i++){
          var oneEvent = {
          title: responseObject[0].tr_tr[i].place,
          start: '2019-01-09T07:00:55.008',
          end: '2019-01-09T09:30:55.008',
          id: "mojeid",
          color: "#4bc0e3",
          className: 'training-cal',
          description: "Liczba zapisanych osób "+responseObject[0].tr_tr[i].actual_client_number+"/"+ responseObject[0].tr_tr[i].client_limit ,
        }
          eventRecords.push(oneEvent);    
        }
        $('#calendar').fullCalendar({
          defaultView: 'agendaWeek',
          contentHeight: 600,
          locale: 'pl',
          allDaySlot: false,
          events: eventRecords,
          color: 'white',
          minTime: '06:00:00',
          eventClick: function(calEvent, jsEvent, view) {
            //  alert('Event: ' + calEvent.description);
            // // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            // // alert('View: ' + view.name);
            // // change the border color just for fun
            // $(this).css('border-color', 'red');
            $('#section-nav').removeClass('sticky');
            $('#eventModal').modal('show');
            let eventInfo = '<p>Nazwa zajęć: '+ calEvent.title + "</p>";
            eventInfo += "<p>Data: 15.01.2019      Godzina: 15:00 - 17:00 </p>";
            eventInfo += '<p>Miejsce: '+ calEvent.title + "</p>";

            $('#eventInfoContent').html(eventInfo)
          }
        })


        }
    };
    xhttp.open("GET", 'http://pri.me/api/profiles/'+id, true);
    xhttp.send();

  
  });