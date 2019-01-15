var addTrainingButton = document.getElementById("show-loc");

addTrainingButton.addEventListener('click',function(){
    if(document.getElementById('edit-loc').style.display == "none"){
        document.getElementById('edit-loc').style.display = "block"
    } else {
        document.getElementById('edit-loc').style.display = "none"
    }
},false);




var id = document.getElementById('username-id').value;
var eventRecords = new Array();
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    responseObject = JSON.parse(xhttp.responseText);
    console.log(responseObject)
    var actualTableContent = "<table><tr><th style='width:18%'>Data</th><th style='width:18%'>Godzina</th><th style='width:23%'>Nazwa zajęć</th><th style='width:23%'>Miejsce</th><th style='width:8%'>Status</th><th style='width:10%'></th></tr>"
    for(var i = 0; i < responseObject.length; i++){
        actualTableContent+= "<tr><td>"+responseObject[i].date+"</td>";
        actualTableContent+= "<td>"+responseObject[i].begin_time.slice(0, -3)+" - "+responseObject[i].end_time.slice(0, -3)+"</td>";
        actualTableContent+= "<td>"+responseObject[i].name+"</td>";
        actualTableContent+= "<td>"+responseObject[i].place+"</td>";
        actualTableContent+= "<td>"+responseObject[i].status+"</td>";
        actualTableContent+= "<td style='text-align: center;font-size: 30px;'><span style='cursor:pointer;' id='expand"+i+"'>+</span></td>";
        actualTableContent+="</tr><tr style='background-color:#e4f6fb;'><td id='slide"+i+"' colspan='6'>"
        actualTableContent+="<div  id='single-event"+responseObject[i].id+"'><i style='bottom:30px;' class='far edit-icon fa-calendar-alt'></i>";
        actualTableContent+="<div style='display:inline-block; width: 555px;height: 137px;' class='single-cer'>"
        actualTableContent+="<span style='line-height: 1.8;'>Data i godzina: <b> "+responseObject[i].date+" ";
        actualTableContent+=" "+responseObject[i].begin_time.slice(0, -3)+ " - "+responseObject[i].end_time.slice(0, -3)+"</b></span></br>";
        actualTableContent+="<span style='line-height: 1.8;'><b>"+responseObject[i].name+"</b> w miejscu <b>"+ responseObject[i].place+"</b></span></br>";
        actualTableContent+="<span style='line-height: 1.8;'>Liczba zapisanych osób: <b>"+responseObject[i].actual_client_number+"/"+ responseObject[i].client_limit +"</b></span></br>"
        actualTableContent+='<span style="line-height: 1.8;">Cena: <b>'+ responseObject[i].price +"zł.</b></span>";
        actualTableContent+='<span style="position: relative;top: -62px;right: -384px;"><a id="editEvent-'+responseObject[i].id+'" class="editEventBut">Edytuj</a><a id="deleteEvent-'+responseObject[i].id+'" class="deleteEventBut">Usuń</a></span>'
        actualTableContent+= "</div></div>";



        actualTableContent+= '<form  action="editTraining" method = "POST"> \
        <br>\
                <div id="edit-event-'+responseObject[i].id+'" style="display:none; font-size:14px; margin-left: 20px;">\
                    <p style="margin-bottom: 2px;">\
                        Nazwa zajęć:\
                        <input value="'+responseObject[i].name+'" placeholder="Podaj nazwę zajęć..." class="edit-uni" name="name" type="text" pattern=".{3,}">\
                    </p>\
                    <p style="margin-bottom: 2px;display: inline-block;">\
                        Miejsce:\
                        <input value="'+responseObject[i].place+'" placeholder="Podaj miejsce zajęć..." class="edit-loc-place" name="place" type="text" pattern=".{3,}" required >\
                    </p>\
                    <p style="margin-bottom: 2px;display:inline-block">\
                        Data:\
                        <input value="'+responseObject[i].date+'" class="edit-startdate-loc" name="date" type="date" required>\
                    </p>\
                    <p style="margin-bottom: 2px;display:inline-block;margin-left: 10px;"> \
                        Godzina od:\
                        <input value="'+responseObject[i].begin_time+'" class="edit-time" name="begin_time" type="time" >\
                    </p>\
                    <p style="margin-bottom: 2px;display:inline-block;margin-left: 13px;">\
                        do:\
                        <input value="'+responseObject[i].end_time+'"  class="edit-time" name="end_time" type="time" min="1" max="15">\
                    </p>\
                    <p style="margin-bottom: 2px;display:inline-block;">\
                        Maks. liczba osób:\
                        <input value="'+responseObject[i].client_limit+'" class="edit-number" placeholder="0" name="client_limit" type="number">\
                    </p>\
                    <p style="margin-bottom: 2px;display:inline-block;margin-left: 64px;">\
                        Cena zł (1 os.):\
                        <input value="'+responseObject[i].price+'" class="edit-time" placeholder="0" style="width:83px" name="price" type="number">\
                    </p><br>\
                    <span style="margin-bottom: 2px;display:inline-block;position: relative;bottom: 182px;\
">\
                        Opis:\
                    </span><p style="margin-bottom: 2px;display:inline-block;"><textarea placeholder="Podaj opis treningu..."  style="width:480px; margin-left:100px; border: 1.5px solid #dfdede;" class="edit-text" name="description" cols="90" rows="10" maxlength="2048" minlength="5" title="Minimalna liczba znaków to 5, a maksymalna 2000 ">'+responseObject[i].description+'</textarea> </p>\
                    <input type="hidden" name="id" value="'+responseObject[i].trainer_id+'"/>\
                    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>\
                    <div style="margin-bottom: 70px;">\
                    <input class="add-button" type="submit" value="Zapisz" style="margin-right:23px"" >\
                    <input id="backFromEdit-'+responseObject[i].id+'" class="add-button"  value="Wróć" style="width: 106px;margin-right: 19px;text-align: center;" >\
</div>\
                </div>\
        </form>'





        //uczestnicy
        for(var j = 0; j < responseObject[i].tr_ord_tr.length; j++){
            actualTableContent+= "<div style='min-height: 170px;'><i style='bottom: -21px;right: -74px;' class='edit-icon far fa-address-card'></i><div style='height:100px;width: 470px;display: inline-block;;float: right;'>"
            actualTableContent+= "<span style='line-height: 1.8;'>Imię i nazwisko: <b style='margin-left: 40px;'>"+responseObject[i].tr_ord_tr[j].name;
            actualTableContent+= " "+responseObject[i].tr_ord_tr[j].surname+"</b></span></br>"
            actualTableContent+= "<span style='line-height: 1.8;'>Adres email: <b style='margin-left: 65px;'>"+responseObject[i].tr_ord_tr[j].email+"</b></span></br>";
            if(responseObject[i].tr_ord_tr[j].phone){
                actualTableContent+= "<span style='line-height: 1.8;'>Numer telefonu: <b style='margin-left: 38px;'>"+responseObject[i].tr_ord_tr[j].phone.toString().substring(0,3)+"-";
                actualTableContent+= responseObject[i].tr_ord_tr[j].phone.toString().substring(3,6)+ "-"+ responseObject[i].tr_ord_tr[j].phone.toString().substring(6,9)+"</b></span></br>"
            }
            actualTableContent+= "<span style='line-height: 1.8;'>Wiadomość:</br> <b>"+responseObject[i].tr_ord_tr[j].comment+"</b></span></br>";
            actualTableContent+= "</div></div>"
        }



        actualTableContent+= "</tr>";
        
    }


    var tableContainer = document.getElementById('table-container');

    tableContainer.innerHTML = actualTableContent





    for(var i = 0; i < responseObject.length; i++){
            $("#slide"+i).hide();
            let k = i
            $("#expand"+i).click(function() {
                if($('#slide'+k).css("display") === "none"){
                    $("#expand"+k).html("-")
                    $('#slide'+k).slideToggle();
                }else{
                    $("#expand"+k).html("+")
                    $('#slide'+k).slideUp();
                }            
            });
    }
   
    for(var x=0; x<responseObject.length; x++){
        document.getElementById('editEvent-'+responseObject[x].id).addEventListener('click',function() {
            let idSplit = event.target.id.split("-");
            let rightElement = document.getElementById('edit-event-'+idSplit[1]);
            if(rightElement){
                if(rightElement.style.display == "none"){
                    rightElement.style.display = "block"
                    document.getElementById('single-event'+idSplit[1]).style.display = "none"
                }
            }
        },false)
    }
    for(var x=0; x<responseObject.length; x++){
        document.getElementById('backFromEdit-'+responseObject[x].id).addEventListener('click',function() {
            let idSplit = event.target.id.split("-");
            let rightElement = document.getElementById('edit-event-'+idSplit[1]);
            if(rightElement){
                if(rightElement.style.display == "block"){
                    rightElement.style.display = "none"
                    document.getElementById('single-event'+idSplit[1]).style.display = "block"
                }
            }
        },false)
    }

    }
};
xhttp.open("GET", 'http://pri.me/api/futureTrainerTrainings/'+id, true);
xhttp.send();






































var xhttp2 = new XMLHttpRequest();
xhttp2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    responseObject = JSON.parse(xhttp2.responseText);
    console.log(responseObject)
    var actualTableContent = "<table><tr><th style='width:18%'>Data</th><th style='width:18%'>Godzina</th><th style='width:23%'>Nazwa zajęć</th><th style='width:23%'>Miejsce</th><th style='width:8%'>Status</th><th style='width:10%'></th></tr>"
    for(var i = 0; i < responseObject.length; i++){
        actualTableContent+= "<tr><td>"+responseObject[i].date+"</td>";
        actualTableContent+= "<td>"+responseObject[i].begin_time.slice(0, -3)+" - "+responseObject[i].end_time.slice(0, -3)+"</td>";
        actualTableContent+= "<td>"+responseObject[i].name+"</td>";
        actualTableContent+= "<td>"+responseObject[i].place+"</td>";
        actualTableContent+= "<td>"+responseObject[i].status+"</td>";
        actualTableContent+= "<td style='text-align: center;font-size: 30px;'><span style='cursor:pointer;' id='2expand"+i+"'>+</span></td>";
        actualTableContent+="</tr><tr style='background-color:#e4f6fb;'><td id='2slide"+i+"' colspan='6'>"
        actualTableContent+="<div  id='2single-event"+responseObject[i].id+"'><i style='bottom:30px;' class='far edit-icon fa-calendar-alt'></i>";
        actualTableContent+="<div style='display:inline-block; width: 555px;height: 137px;' class='single-cer'>"
        actualTableContent+="<span style='line-height: 1.8;'>Data i godzina: <b> "+responseObject[i].date+" ";
        actualTableContent+=" "+responseObject[i].begin_time.slice(0, -3)+ " - "+responseObject[i].end_time.slice(0, -3)+"</b></span></br>";
        actualTableContent+="<span style='line-height: 1.8;'><b>"+responseObject[i].name+"</b> w miejscu <b>"+ responseObject[i].place+"</b></span></br>";
        actualTableContent+="<span style='line-height: 1.8;'>Liczba zapisanych osób: <b>"+responseObject[i].actual_client_number+"/"+ responseObject[i].client_limit +"</b></span></br>"
        actualTableContent+='<span style="line-height: 1.8;">Cena: <b>'+ responseObject[i].price +"zł.</b></span>";
        actualTableContent+= "</div></div>";






        //uczestnicy
        for(var j = 0; j < responseObject[i].tr_ord_tr.length; j++){
            actualTableContent+= "<div style='min-height: 170px;'><i style='bottom: -21px;right: -74px;' class='edit-icon far fa-address-card'></i><div style='height:100px;width: 470px;display: inline-block;;float: right;'>"
            actualTableContent+= "<span style='line-height: 1.8;'>Imię i nazwisko: <b style='margin-left: 40px;'>"+responseObject[i].tr_ord_tr[j].name;
            actualTableContent+= " "+responseObject[i].tr_ord_tr[j].surname+"</b></span></br>"
            actualTableContent+= "<span style='line-height: 1.8;'>Adres email: <b style='margin-left: 65px;'>"+responseObject[i].tr_ord_tr[j].email+"</b></span></br>";
            if(responseObject[i].tr_ord_tr[j].phone){
                actualTableContent+= "<span style='line-height: 1.8;'>Numer telefonu: <b style='margin-left: 38px;'>"+responseObject[i].tr_ord_tr[j].phone.toString().substring(0,3)+"-";
                actualTableContent+= responseObject[i].tr_ord_tr[j].phone.toString().substring(3,6)+ "-"+ responseObject[i].tr_ord_tr[j].phone.toString().substring(6,9)+"</b></span></br>"
            }
            actualTableContent+= "<span style='line-height: 1.8;'>Wiadomość:</br> <b>"+responseObject[i].tr_ord_tr[j].comment+"</b></span></br>";
            actualTableContent+= "</div></div>"
        }



        actualTableContent+= "</tr>";
        
    }


    var tableContainer = document.getElementById('table-container2');

    tableContainer.innerHTML = actualTableContent





    for(var i = 0; i < responseObject.length; i++){
            $("#2slide"+i).hide();
            let k = i
            $("#2expand"+i).click(function() {
                if($('#2slide'+k).css("display") === "none"){
                    $("#2expand"+k).html("-")
                    $('#2slide'+k).slideToggle();
                }else{
                    $("#2expand"+k).html("+")
                    $('#2slide'+k).slideUp();
                }            
            });
    }
   }
};
xhttp2.open("GET", 'http://pri.me/api/pastTrainerTrainings/'+id, true);
xhttp2.send();




