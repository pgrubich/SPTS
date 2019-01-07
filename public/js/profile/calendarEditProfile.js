var addTrainingButton = document.getElementById("show-loc");

addTrainingButton.addEventListener('click',function(){
    if(document.getElementById('edit-loc').style.display == "none"){
        document.getElementById('edit-loc').style.display = "block"
    } else {
        document.getElementById('edit-loc').style.display = "none"
    }
},false);