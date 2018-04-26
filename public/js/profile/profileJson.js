$(function(){

    function loadRates() {

        $.getJSON('http://pri.me/profiles/1.json')
        .done (function(data){
            var msg = "";
            var description = "<h4>Profil</h4>"
            var offert = "<h4>Oferta :</h4> "
            $.each(data, function(index, element) {
                msg+= "<p>"+element.name+"</p>";
                msg+= "<p>"+element.surname+"</p>";
                msg+= "<p>"+element.phone+"</p>";
                msg+= "<p>"+element.email+"</p>";

                $.each(element.tr_loc,function(ind,ele){
                    msg+= "<p>"+ele.city+", "+ele.voivodeship+"</p>";
                });
                description += element.description;
                $.each(element.tr_cert, function(ind,ele){
                    description+= "</br>certyfikaty : </br>"
                    description+= ele.name_of_institution;
                    description+= " - "+(ele.name_of_course);
                    description+= " :  "+(ele.begin_date);
                    description+= " - "+(ele.end_date);
                });
                $.each(element.tr_pl,function(ind,ele){
                    description+= "</br> Lokaliacja : "+ele.place;
                });
                $.each(element.tr_off,function(ind,ele){
                    offert+= "<p>"+ele.name+" - "+ele.price+" zł"+"</p>";
                });
             });
        
            $("#cennik").html(offert);
            $("#informations").html(msg);
            $("#profil1").html(description);
            
        
        });    
        
        
        }
        
        loadRates();
        





})





