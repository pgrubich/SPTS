// city + discipline header


var n = decodeURI(window.location.href).split("/");

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
var disciplineSection = document.getElementsByClassName("discipline-value");
var citySection = document.getElementsByClassName("city-value");
disciplineSection[0].textContent = capitalizeFirstLetter(n[n.length - 2]).replace("_", " ")
citySection[0].textContent = capitalizeFirstLetter(n[n.length - 1]);


// trainers profiles

var xhr = new XMLHttpRequest();                 

xhr.onload = function() {                       
  if(xhr.status === 200) {
    responseObject = JSON.parse(xhr.responseText);
    var content = '';
    for(var i = 0; i < responseObject.length; i++) {
      console.log(responseObject[i].rating)
      content += '<div class="single-trainer-result" id="trainer_record_';
      content += responseObject[i].id+'"><div class="profile-picture">';
      content += '</div><div class="profile-info">'
      content += "<p class='name-surname'>"+ responseObject[i].name + " " + responseObject[i].surname +"</p>";
      content += "<p> Opis: "+ responseObject[i].description+"</p>";
      content += "</div><div class='right-segment'><div class='stars'>";

      for( var j = 0; j < responseObject[i].rating ; j++ ){
        content += '<span class="fa fa-star green-star-checked"></span>';
      }
      for(var k = 0; k < (5-responseObject[i].rating); k++){
        content += '<span class="fa fa-star green-star"></span>';
      }
      content += "</div><button type='button' class='btn green-button'>Zobacz profil</button></div></div>";
    }
    var trainerBox = document.getElementById("trainers-container");
    trainerBox.innerHTML = content;
    for(var i = 0; i < responseObject.length; i++){
      var event = document.getElementById("trainer_record_"+responseObject[i].id);
      event.addEventListener('click',function(){ window.location.href = 'http://pri.me/profiles/'+this.id.slice(-1);},false);
    }
    let resultValue = document.getElementsByClassName('result-value');

    switch(responseObject.length){
      case 0:
        resultValue[0].textContent = '(0 wyników)'
        break;
      case 1:
        resultValue[0].textContent = '(1 wynik)'
        break;
      case 2: case 3: case 4:
        resultValue[0].textContent = '('+responseObject.length+' wyniki)';
        break;
      default:
        resultValue[0].textContent = '('+responseObject.length+' wyników)';
        break
    } 
  }else{
    let resultValue = document.getElementsByClassName('result-value');
    resultValue[0].textContent = '(0 wyników)';
  }
};

xhr.open('GET', 'http://pri.me/api/'+n[n.length - 2]+'/'+n[n.length - 1], true);        
xhr.send(null);                                 
