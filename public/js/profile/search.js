//cities search-input

function inputSearchCities(){
    var options = {
        types: ['(cities)'],
        componentRestrictions: {country: "pl"}
       };

    let input = document.getElementById('city-search');
    let autocomplete = new google.maps.places.Autocomplete(input, options);
}


//insert dysciplines to overlay from json file

var xhr = new XMLHttpRequest();                 

xhr.onload = function() {                       
  if(xhr.status === 200) {
    responseObject = JSON.parse(xhr.responseText);  
    let disciplineSelect = document.getElementById("disciplines-select");
    let disciplinesContent = ' <option selected>Dyscyplina</option>';
    
    responseObject.Dysciplines.map(function(obj){
        disciplinesContent+= '<option value="'+ obj.Name +'">'+obj.Name+'</option>'
    })
    disciplineSelect.innerHTML = disciplinesContent;
  }
};

 xhr.open('GET', 'http://pri.me/api/dyscyplines.json', true);        
xhr.send(null);                                 


//going to searchresults

var searchButton = document.getElementById("search-button");
searchButton.addEventListener('click',searchResult,false);
var cityInput = document.getElementById("city-search");
var disciplinesSelect = document.getElementById("disciplines-select");
function searchResult(){
    var dysc = disciplinesSelect.value.split(' ').join('_');
    var city = cityInput.value;
    localStorage.setItem("discipline",  disciplinesSelect.value); 
    localStorage.setItem("city", city); 
    document.location.href = "/"+dysc+"/"+city;
}


