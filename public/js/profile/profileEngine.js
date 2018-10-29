jQuery(function($)
{
    $.scrollTo(0);

    $('#link1').click(function() { $.scrollTo($('.categories:eq(0)'),500); });
    $('#link2').click(function() { $.scrollTo($('.categories:eq(2)'), 500); });
    $('#link3').click(function() { $.scrollTo($('.categories:eq(3)'), 500); });
    $('#link4').click(function() { $.scrollTo($('.categories:eq(4)'), 500); });
    $('#link5').click(function() { $.scrollTo($('.categories:eq(5)'), 500); });
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




