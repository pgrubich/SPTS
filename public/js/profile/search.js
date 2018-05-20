// show dyscipline list

var arrow = document.getElementById("show-dyscyplines");
var sharp = document.getElementById("hide-dyscyplines");

arrow.addEventListener('click',openList,false);
sharp.addEventListener('click',closeList,false);


function openList(){

    document.getElementById("dyscpiline-list").style.width = "100%";
}

function closeList(){
    document.getElementById("dyscpiline-list").style.width = "0%";
}


//insert dysciplines to overlay from json file





var xhr = new XMLHttpRequest();                 

xhr.onload = function() {                       
  if(xhr.status === 200) {
    responseObject = JSON.parse(xhr.responseText);  
    
    var singleRecord = document.getElementsByClassName("dyscypline-record");                    
    for (var i = 0; i < 12; i++){
        var column1 ='';
        column1 += responseObject.Dysciplines[i].Name;
        singleRecord[i].textContent = column1;
    }
    for (var i = 12; i < 24; i++){
        var column2 ='';
        column2 += responseObject.Dysciplines[i].Name;
        singleRecord[i].textContent = column2;
    }
    for (var i = 24; i < 36; i++){
        var column3 ='';
        column3 += responseObject.Dysciplines[i].Name;
        singleRecord[i].textContent = column3;
    }
    for (var i = 36; i < responseObject.Dysciplines.length; i++){
        var column4 ='';
        column4 += responseObject.Dysciplines[i].Name;
        singleRecord[i].textContent = column4;
    }   
    /*
    var columns = document.getElementsByClassName("column");
    columns[0].innerHTML= column1;
    columns[1].innerHTML= column2;
    columns[2].innerHTML= column3;
    columns[3].innerHTML= column4;
    console.log(column4);
    console.log(responseObject.Dysciplines.length);

    */


  }
};

 xhr.open('GET', 'http://pri.me/api/dyscyplines.json', true);        
xhr.send(null);                                 



//picking dyscyplines

var dysciplinesList = document.getElementsByClassName("dyscypline-record");
var dyscyplineBox = document.getElementById("dyscypline-box");
for (var i = 0; i < dysciplinesList.length; i++) {
    dysciplinesList[i].addEventListener('click',pickDyscypline,false)
}

function pickDyscypline(){
    dyscyplineBox.firstChild.textContent = this.textContent;
    document.getElementById("dyscpiline-list").style.width = "0%";
}


//going to searchresults

var searchButton = document.getElementById("search-button");
searchButton.addEventListener('click',searchResult,false);
var cityInput = document.getElementById("city-input");
function searchResult(){
    var dysc = dyscyplineBox.firstChild.textContent.split(' ').join('');
    var city = cityInput.value;
    document.location.href = "/"+dysc+"/"+city;
}


