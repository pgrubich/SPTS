// header


var n = decodeURI(window.location.href).split("/");

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
var headerSection = document.getElementById("header-section");
headerSection.textContent = capitalizeFirstLetter(n[n.length - 2]).replace("_", " ") + " w " + capitalizeFirstLetter(n[n.length - 1]);



// trainers profiles

var xhr = new XMLHttpRequest();                 

xhr.onload = function() {                       
  if(xhr.status === 200) {
    responseObject = JSON.parse(xhr.responseText);
    var content = '';
    for(var i = 0; i < responseObject.length; i++) {
      content += '<div class="single-trainer-result" id="trainer_record_';
      content += responseObject[i].id+'"><div class="profile-picture">';
      content += '</div><div class="profile-info">'
      content += "<p>"+ responseObject[i].name + " " + responseObject[i].surname +"</p><p>";
      for(var j=0 ;j<responseObject[i].tr_disc.length;j++){
        content +=  responseObject[i].tr_disc[j].discipline_name+ "  ";

      }
      
      if(typeof responseObject[i].tr_pl[0] != "undefined"){
        content += "</p><p> Miejsca: "+ responseObject[i].tr_pl[0].place+"</p>";
      }
      content += "<p> Opis: "+ responseObject[i].description+"</p>";
      content += '</div><div style="clear:both;"></div></div></br>';
      
    }
    var trainerBox = document.getElementById("trainers-box");
    trainerBox.innerHTML = content;
    for(var i = 0; i < responseObject.length; i++){
      var event = document.getElementById("trainer_record_"+responseObject[i].id);
      event.addEventListener('click',function(){ window.location.href = 'http://pri.me/profiles/'+this.id.slice(-1);},false);
    }
    
    
  }
};

xhr.open('GET', 'http://pri.me/api/'+n[n.length - 2]+'/'+n[n.length - 1], true);        
xhr.send(null);                                 
