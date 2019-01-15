$(function() {

    var id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1)
    var eventRecords = new Array();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        var responseObject = JSON.parse(xhttp.responseText);
        console.log(responseObject)
        for(var i = 0; i < responseObject[0].tr_tr.length; i++){
          var oneEvent = {
          title: responseObject[0].tr_tr[i].name,
          start: responseObject[0].tr_tr[i].full_begin_date,
          end: responseObject[0].tr_tr[i].full_end_date,
          id: "mojeid",
          eventid: responseObject[0].tr_tr[i].id,
          color: "#4bc0e3",
          className: 'training-cal',
          place: responseObject[0].tr_tr[i].place,
          price: responseObject[0].tr_tr[i].price,
          date:responseObject[0].tr_tr[i].date,
          begin_time: responseObject[0].tr_tr[i].begin_time.slice(0, -3),
          end_time:responseObject[0].tr_tr[i].end_time.slice(0, -3),
          description: "Liczba zapisanych osób: <b style='font-size: 19px;'>"+responseObject[0].tr_tr[i].actual_client_number+"/"+ responseObject[0].tr_tr[i].client_limit +"</b>",
          description2: responseObject[0].tr_tr[i].description
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
            let eventInfo = '<p>Nazwa zajęć: <b style="font-size: 19px;">'+ calEvent.title + "</b></p>";
            eventInfo += "<p>Data:  <b style='font-size: 19px;'>"+calEvent.date+"</b>      Godzina: <b style='font-size: 19px;'>"+calEvent.begin_time+" - "+calEvent.end_time+"</b> </p>";
            eventInfo += '<p>Miejsce: <b style="font-size: 19px;">'+ calEvent.place + "</b></p>";
            eventInfo += '<p>'+calEvent.description+'</b></p>';
            if(calEvent.price)
            eventInfo += '<p>Cena: <b style="font-size: 19px;">'+ calEvent.price +"zł.</b>";
            eventInfo += '<p>Opis:</br> <b style="font-size: 19px;">'+ calEvent.description2 +"</b>";
            $('#eventInfoContent').html(eventInfo)
            $('#idEventToken').html("<input type='hidden' name='id' value='"+calEvent.eventid+"'/>")
          }
        })


        }
    };
    xhttp.open("GET", 'http://pri.me/api/profiles/'+id, true);
    xhttp.send();

  
  });