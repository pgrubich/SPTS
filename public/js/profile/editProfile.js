

var option1 = document.getElementById("editMenu-option1");
var option2 = document.getElementById("editMenu-option2");
var option3 = document.getElementById("editMenu-option3");
var option4 = document.getElementById("editMenu-option4");
var option5 = document.getElementById("editMenu-option5");
var option6 = document.getElementById("editMenu-option6");

var block1 = document.getElementById("basic-edit");
var block2 = document.getElementById("specific-edit");
var block3 = document.getElementById("calendar-edit");
var block4 = document.getElementById("gallery-edit");
var block5 = document.getElementById("email-edit");
var block6 = document.getElementById("password-edit");

option1.addEventListener('click',function(){show(1);},false)
option2.addEventListener('click',function(){show(2);},false)
option3.addEventListener('click',function(){show(3);},false)
option4.addEventListener('click',function(){show(4);},false)
option5.addEventListener('click',function(){show(5);},false)
option6.addEventListener('click',function(){show(6);},false)


function show(a){
    switch(a){
        case 1:
            option1.classList.add("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            block1.style.display = "block";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "none";
            break;
        case 2:
            option1.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option2.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "block";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "none";
            break;
        case 3:
            option1.classList.remove("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option3.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "block";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "none";
        break;
        case 4:
            option1.classList.remove("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option4.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "block";
            block5.style.display = "none";
            block6.style.display = "none";
        break;
        case 5:
            option1.classList.remove("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option5.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "block";
            block6.style.display = "none";
            break;
        case 6:
            option1.classList.remove("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "block";
            break;
    }
    
    

}


// show and hide price, course and uni


var course = document.getElementById("edit-course");
var uni = document.getElementById("edit-uni");
var price = document.getElementById("edit-price");
var cities = document.getElementById("edit-cities");

course.style.display = "none";
uni.style.display = "none";
price.style.display = "none";
cities.style.display = "none";

var click1 = document.getElementById("show-course");
var click2 = document.getElementById("show-uni");
var click3 = document.getElementById("show-price");
var click4 = document.getElementById("show-cities");

click1.addEventListener('click',function(){showHide(1);},false);
click2.addEventListener('click',function(){showHide(2);},false);
click3.addEventListener('click',function(){showHide(3);},false);
click4.addEventListener('click',function(){showHide(4);},false);

function showHide(a){
    switch(a){
        case 1:
            if(course.style.display=="none"){
                course.style.display = "block";
            }else{
                course.style.display = "none";
            }
            break;
        case 2:
            if(uni.style.display=="none"){
                uni.style.display = "block";
            }else{
                uni.style.display = "none";
            }
            break;
        case 3:
            if(price.style.display=="none"){
                price.style.display = "block";
            }else{
                price.style.display = "none";
            }
            break;
        case 4:
            if(cities.style.display=="none"){
                cities.style.display = "block";
            }else{
                cities.style.display = "none";
            }
            break;
  
    }
    
}


// dyscyplines from json

var xhr = new XMLHttpRequest();                 

xhr.onload = function() {                       
  if(xhr.status === 200) {
    responseObject = JSON.parse(xhr.responseText);  
    var column1 ='';
    var column2 ='';
    var column3 ='';
    var column4 ='';
    var column5 ='';
    var column6 ='';
    var record = document.getElementsByClassName("dyscypline-column-editprofile");                    
    for (var i = 0; i < 12; i++){
        column1 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column1 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column1 += responseObject.Dysciplines[i].Name + '</label></br>';
        
    }
    for (var i = 12; i < 24; i++){
        column2 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column2 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column2 += responseObject.Dysciplines[i].Name + '</label></br>';
    }
    for (var i = 24; i < 36; i++){
        column3 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column3 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column3 += responseObject.Dysciplines[i].Name + '</label></br>';

    }
    for (var i = 36; i < responseObject.Dysciplines.length; i++){

        column4 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column4 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column4 += responseObject.Dysciplines[i].Name + '</label></br>';
    }   

    // for (var i = 40; i < responseObject.Dysciplines.length; i++){

    //     column5 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
    //     column5 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
    //     column5 += responseObject.Dysciplines[i].Name + '</label></br>';

    // }   
    record[0].innerHTML = column1;   
    record[1].innerHTML = column2;  
    record[2].innerHTML = column3;  
    record[3].innerHTML = column4;  
    // record[4].innerHTML = column5;  

  }
};

xhr.open('GET', 'http://pri.me/api/dyscyplines.json', true);        
xhr.send(null);

//checked dyscyplines


var xhr2 = new XMLHttpRequest();  
var loggedUserId = document.getElementById("username-id").value;
xhr2.onload = function() {                       
    if(xhr2.status === 200) {
      responseObject2 = JSON.parse(xhr2.responseText);
      
      for(var i = 0; i < responseObject2[0].tr_disc.length; i++ ){
          var dysciplineName = responseObject2[0].tr_disc[i].discipline_name.replace(" ","_");
          if(document.getElementById(dysciplineName)){
            document.getElementById(dysciplineName).checked = true;
          }
      }


//show offers

        var offers = '';
       for(var i = 0; i<responseObject2[0].tr_off.length; i++){
          offers += '<i class="fas fa-shopping-bag edit-icon"></i>'
          offers +=  "<div class='single-ofert' id='single-ofert-"+responseObject2[0].tr_off[i].id+"'><div>";
          offers +=  responseObject2[0].tr_off[i].name+"</br><div style='font-size: 13px;'> "+ responseObject2[0].tr_off[i].price+"zł </br> ";
          offers +=  "Maks. liczba klientów: "+responseObject2[0].tr_off[i].max_no_of_clients+ "</div></div><div class='edit-delete-section'><span>Edytuj</span></br><span>Usuń</span></div></div>";
          offers += "<div class='edit-single-ofert' id='edit-single-ofert-"+responseObject2[0].tr_off[i].id;
          offers += "'><form id='editTrainerOffer' action='editTrainerOffer' method='POST'><label>Nazwa zajęć: <input type='text' name='name'></label>";
          offers += "<label>Cena: <input type='text' name='price'></label>";
          offers += "<label>Maksymalna liczba osób: <input type='text' name='members'></label>";
          offers += "<label><input type='hidden' value='{{ csrf_token() }}' name='_token'/></label>";
          offers += "<label><input name='id' type='hidden' value='"+responseObject2[0].tr_off[i].id+"'></label></label><input type='submit' value='Edytuj'></form></div>";
      }
      var offersContainer = document.getElementById("offers-container");
      offersContainer.innerHTML = offers;


    //hide edit offers
    var y = document.getElementsByClassName("single-ofert");

    for(var i=0; i<y.length;i++){
        document.getElementsByClassName("edit-single-ofert")[i].style.display="none";
    }

     //show edit offers
  
    for(var i=0; i<y.length;i++){
        document.getElementById("single-ofert-"+responseObject2[0].tr_off[i].id).addEventListener('click',function(){
                let idSplit = event.target.id.split("-");
                if(document.getElementById("edit-single-ofert-"+idSplit[2]).style.display == "none"){
                    document.getElementById("edit-single-ofert-"+idSplit[2]).style.display = "block";
                }else{
                    document.getElementById("edit-single-ofert-"+idSplit[2]).style.display = "none";
                }
                
        },false);
    }
   
/// UNI

    var unis = '';
    for(var i = 0; i<responseObject2[0].tr_uni.length; i++){
       unis += '<i class="fas fa-graduation-cap edit-icon-uni"></i>'
       unis +=  "<div class='single-uni' id='single-uni-"+responseObject2[0].tr_uni[i].id+"'><div>";
       unis +=  responseObject2[0].tr_uni[i].university+"<br><div style='font-size: 13px;'>"+ responseObject2[0].tr_uni[i].course+" - ";
       unis +=  responseObject2[0].tr_uni[i].degree+"</br> "+responseObject2[0].tr_uni[i].begin_date;
       unis += " - "+responseObject2[0].tr_uni[i].end_date+"</div></div><div class='edit-delete-section'><span>Edytuj</span></br><span>Usuń</span></div></div>";
       unis += "<div class='edit-single-uni' id='edit-single-uni-"+responseObject2[0].tr_uni[i].id;
       unis += "'><form id='editUni' action='editUni' method='POST'><label>Nazwa uniwersytetu: <input type='text' name='university'></label>";
       unis += "<label>Kierunek: <input type='text' name='course'></label>";
       unis += "<label>Stopień: <input type='text' name='degree'></label></br>";
       unis += "<label>Data rozpoczęcia: <input type='date' name='begin_date'></label>";
       unis += "<label>Data zakończenia: <input type='date' name='end_date'></label>";
       unis += "<label><input type='hidden' value='{{ csrf_token() }}' name='_token'/></label>";
       unis += "<label><input name='id' type='hidden' value='"+responseObject2[0].tr_uni[i].id+"'></label></label><input type='submit' value='Edytuj'></form></div>";

   }
   var uniContainer = document.getElementById("uni-container");
   uniContainer.innerHTML = unis;


 //hide edit uni
 var yy = document.getElementsByClassName("single-uni");

 for(var i=0; i<yy.length;i++){
     document.getElementsByClassName("edit-single-uni")[i].style.display="none";
 }
  //show edit uni


 for(var i=0; i<yy.length;i++){
     document.getElementById("single-uni-"+responseObject2[0].tr_uni[i].id).addEventListener('click',function(){
             var idSplitUni = event.target.id.split("-");

             if(document.getElementById("edit-single-uni-"+idSplitUni[2]).style.display == "none"){
                 document.getElementById("edit-single-uni-"+idSplitUni[2]).style.display = "block";
             }else{
                 document.getElementById("edit-single-uni-"+idSplitUni[2]).style.display = "none";
             }
             
     },false);
 }





/// CER

var cers = '';
for(var i = 0; i<responseObject2[0].tr_cert.length; i++){
    cers += '<i class="far fa-file-alt edit-icon"></i>'
    cers +=  "<div class='single-cer' id='single-cer-"+responseObject2[0].tr_cert[i].id+"'><div>";
    cers +=  responseObject2[0].tr_cert[i].name_of_institution+"</br><div style='font-size: 13px;'>"+ responseObject2[0].tr_cert[i].name_of_course;
    cers +=  "</br>"+responseObject2[0].tr_cert[i].begin_date;
    cers += " - "+responseObject2[0].tr_cert[i].end_date+"</div></div><div class='edit-delete-section'><span>Edytuj</span></br><span>Usuń</span></div></div>";
    cers += "<div class='edit-single-cer' id='edit-single-cer-"+responseObject2[0].tr_cert[i].id;
    cers += "'><form id='editCourse' action='editCourse' method='POST'><label>Nazwa instytucji: <input type='text' name='name_of_institution'></label>";
    cers += "<label>Nawa kursu: <input type='text' name='name_of_course'></label>";
    cers += "<label>Data rozpoczęcia: <input type='date' name='begin_date'></label>";
    cers += "<label>Data zakończenia: <input type='date' name='end_date'></label>";
    cers += "<label><input type='hidden' value='{{ csrf_token() }}' name='_token'/></label>";
    cers += "<label><input name='id' type='hidden' value='"+responseObject2[0].tr_cert[i].id+"'></label></label><input type='submit' value='Edytuj'></form></div></br>";

}
var cerContainer = document.getElementById("cer-container");
cerContainer.innerHTML = cers;


//hide edit cer
var yyy = document.getElementsByClassName("single-cer");

for(var i=0; i<yyy.length;i++){
 document.getElementsByClassName("edit-single-cer")[i].style.display="none";
}
//show edit cer


for(var i=0; i<yyy.length;i++){
 document.getElementById("single-cer-"+responseObject2[0].tr_cert[i].id).addEventListener('click',function(){
         var idSplitCer = event.target.id.split("-");

         if(document.getElementById("edit-single-cer-"+idSplitCer[2]).style.display == "none"){
             document.getElementById("edit-single-cer-"+idSplitCer[2]).style.display = "block";
         }else{
             document.getElementById("edit-single-cer-"+idSplitCer[2]).style.display = "none";
         }
         
 },false);
}















      
  }
};

xhr2.open('GET', 'http://pri.me/api/profiles/'+loggedUserId, true);        
xhr2.send(null);



// edit existing information

