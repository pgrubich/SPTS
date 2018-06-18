

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
            block1.style.display = "block";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "none";
            break;
        case 2:
            block1.style.display = "none";
            block2.style.display = "block";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "none";
            break;
        case 3:
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "block";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "none";
        break;
        case 4:
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "block";
            block5.style.display = "none";
            block6.style.display = "none";
        break;
        case 5:
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "block";
            block6.style.display = "none";
            break;
        case 6:
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
    for (var i = 0; i < 10; i++){
        column1 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column1 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column1 += responseObject.Dysciplines[i].Name + '</label></br>';
        
    }
    for (var i = 10; i < 20; i++){
        column2 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column2 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column2 += responseObject.Dysciplines[i].Name + '</label></br>';
    }
    for (var i = 20; i < 30; i++){
        column3 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column3 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column3 += responseObject.Dysciplines[i].Name + '</label></br>';

    }
    for (var i = 30; i < 40; i++){

        column4 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column4 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column4 += responseObject.Dysciplines[i].Name + '</label></br>';
    }   

    for (var i = 40; i < responseObject.Dysciplines.length; i++){

        column5 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column5 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column5 += responseObject.Dysciplines[i].Name + '</label></br>';

    }   
    record[0].innerHTML = column1;   
    record[1].innerHTML = column2;  
    record[2].innerHTML = column3;  
    record[3].innerHTML = column4;  
    record[4].innerHTML = column5;  

  }
};

xhr.open('GET', 'http://pri.me/api/dyscyplines.json', true);        
xhr.send(null);

//checked dyscyplinesi i use


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

      
      
  }
};

xhr2.open('GET', 'http://pri.me/api/profiles/'+loggedUserId, true);        
xhr2.send(null);