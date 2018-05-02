jQuery(function($)
{


    $.scrollTo(0);

    $('#link1').click(function() { $.scrollTo($('#profile-info'),500); });
    $('#link2').click(function() { $.scrollTo($('#calendar-info'), 500); });
    $('#link3').click(function() { $.scrollTo($('#prices-info'), 500); });
    $('#link4').click(function() { $.scrollTo($('#gallery-info'), 500); });
    $('#link5').click(function() { $.scrollTo($('#reviews-info'), 500); });




});


$(document).ready(function() {
    var NavY = $('#section-nav').offset().top;

    var stickyNav = function(){
        var ScrollY = $(window).scrollTop();

        if (ScrollY > NavY) {
            $('#section-nav').addClass('sticky');
        } else {
            $('#section-nav').removeClass('sticky');
        }
    };

    stickyNav();
    $(window).scroll(function() {
        stickyNav();
    });
});




