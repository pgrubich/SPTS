// header
var city = localStorage.getItem("city");
var discipline = localStorage.getItem("discipline");

var headerSection = document.getElementById("header-section");
headerSection.textContent = discipline + " w " + city;


// trainers profiles

var xhr = new XMLHttpRequest();                 

xhr.onload = function() {                       
  if(xhr.status === 200) {
    responseObject = JSON.parse(xhr.responseText);
    var content = '';
    for(var i = 0; i < responseObject.length; i++) {
      content += '<div class="single-trainer-result"><div class="profile-picture"></div><div class="profile-info">';
      content += "<p>"+ responseObject[i].name + " " + responseObject[i].surname +"</p>";
      content += "<p>"+ responseObject[i].tr_disc[i].discipline_name +"</p>";
      content += "<p> Miejsca: "+ responseObject[i].tr_pl[i].place+"</p>";
      content += "<p> Opis: "+ responseObject[i].description+"</p>";
      content += '</div><div style="clear:both;"></div></div>';
    }
    var trainerBox = document.getElementById("trainers-box");
    trainerBox.innerHTML = content;

  }
};

 xhr.open('GET', 'http://pri.me/api/'+discipline+'/'+city, true);        
xhr.send(null);                                 
