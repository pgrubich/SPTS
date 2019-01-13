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
    
    for(var i = 0; i < responseObject[0].tr_tr.length; i++){
        actualTableContent+= "<tr><td>"+responseObject[0].tr_tr[i].date+"</td>";
        actualTableContent+= "<td>"+responseObject[0].tr_tr[i].begin_time.slice(0, -3)+" - "+responseObject[0].tr_tr[i].end_time.slice(0, -3)+"</td>";
        actualTableContent+= "<td>"+responseObject[0].tr_tr[i].place+"</td>";
        actualTableContent+= "<td>"+responseObject[0].tr_tr[i].place+"</td>";
        actualTableContent+= "<td>"+responseObject[0].tr_tr[i].status+"</td>";
        actualTableContent+= "<td style='text-align: center;font-size: 30px;'><span id='expand"+i+"'>+</span></td>";
        actualTableContent+="</tr><tr><td id='slide"+i+"' colspan='6'><p>BLAB</p><p>BLAB</p><p>BLAB</p><p>BLAB</p><p>BLABLABLABLABLALVLASLDALSDLASLDLAS</p></tr>";
    }



    var tableContainer = document.getElementById('table-container');

    tableContainer.innerHTML = actualTableContent



    for(var i = 0; i < responseObject[0].tr_tr.length; i++){
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


    }
};
xhttp.open("GET", 'http://pri.me/api/profiles/'+id, true);
xhttp.send();






