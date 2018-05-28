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

course.style.display = "none";
uni.style.display = "none";
price.style.display = "none";

var click1 = document.getElementById("show-course");
var click2 = document.getElementById("show-uni");
var click3 = document.getElementById("show-price");

click1.addEventListener('click',function(){showHide(1);},false);
click2.addEventListener('click',function(){showHide(2);},false);
click3.addEventListener('click',function(){showHide(3);},false);

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
  
    }
    
}