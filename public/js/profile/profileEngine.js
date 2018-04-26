jQuery(function($)
{


    $.scrollTo(0);

    $('#link1').click(function() { $.scrollTo($('#profil1'),500); });
    $('#link2').click(function() { $.scrollTo($('#kalendarz'), 500); });
    $('#link3').click(function() { $.scrollTo($('#cennik'), 500); });
    $('#link4').click(function() { $.scrollTo($('#xyz'), 500); });
    $('#link5').click(function() { $.scrollTo($('#opinie'), 500); });




});


$(document).ready(function() {
    var NavY = $('#profileNav').offset().top;

    var stickyNav = function(){
        var ScrollY = $(window).scrollTop();

        if (ScrollY > NavY) {
            $('#profileNav').addClass('sticky');
        } else {
            $('#profileNav').removeClass('sticky');
        }
    };

    stickyNav();
    $(window).scroll(function() {
        stickyNav();
    });
});




