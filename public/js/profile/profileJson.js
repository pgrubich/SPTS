

$(function(){

    function loadRates() {
        var id = window.location.href.slice(-1);
        $.getJSON('http://pri.me/api/profiles/'+id)
        .done (function(data){
            var msg = "";
            var reviews = "<h2 id='reviews-info'>Opinie</h2>";
            var description = "<h2 id='profile-info'>Profil</h2>"
            var offert = "<h2 id='prices-info'>Cennik</h2> "
            $.each(data, function(index, element) {
                msg+= "<li>"+element.name+" "+element.surname+"</li>";
                msg+= "<li>"+element.phone+"</li>";
                msg+= "<li>"+element.email+"</li>";
                if(element.facebook){
                    msg+= "<li>Fb: "+element.facebook+"</li>";
                }
                if(element.instagram){
                    msg+= "<li>Inst:"+element.instagram+"</li>";
                }



                $.each(element.tr_loc,function(ind,ele){
                    msg+= "<li>"+ele.city+", "+ele.voivodeship+"</li>";
                });
                description +="<p>"+ element.description+"</p>";
                $.each(element.tr_cert, function(ind,ele){
                    description+= "Certyfikaty : </br>"
                    description+= ele.name_of_institution;
                    description+= " - "+(ele.name_of_course);
                    description+= " :  "+(ele.begin_date);
                    description+= " - "+(ele.end_date);
                });
                $.each(element.tr_pl,function(ind,ele){

                    description+= "</br> </br> Lokaliacja : "+ele.place;
                });
                $.each(element.tr_uni,function(ind,ele){
                    description+= "</br></br>  Wykształcenie : "+ele.university;
                    description+= " - "+ele.course;
                    description+= " - "+(ele.degree);
                    description+= " :  "+(ele.begin_date);
                    description+= " - "+(ele.end_date);
                });
                $.each(element.tr_off,function(ind,ele){
                    offert+= "<p>"+ele.name+" - "+ele.price+" zł"+"</p>";
                    
                });
                $.each(element.tr_op,function(ind,ele){
                    reviews+= "<div class='small-container'>";
                    reviews+= ele.name+" "+ele.surname;
                    reviews+= "<span> Ocena: "+ele.rating+ "</span>";
                    reviews+= "<p>"+"Treść: "+ele.description+ "</p>";
                    reviews+= "</div>";
                    
                    
                });
             });
            $(".categories:eq(2)").html(offert);
            $(".categories:eq(4)").prepend(reviews);
            $(".detail-list").html(msg);
            $(".categories:first").html(description);
            
        
        });    
        
        
        }
        
        loadRates();
        





})





