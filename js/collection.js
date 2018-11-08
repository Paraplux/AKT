$(document).ready(function () {
    $('.carousel-sec').hide(0);
    $('.carousel-sec.carousel-01').show(0);
    $('.object-main').on('dblclick', function () {
        var clickedCarousel = $(this).attr('id');
        carouselToToggle = clickedCarousel.replace('-toggler', "");
        $('.carousel-sec').hide(0);
        $('.' + carouselToToggle).show(0);
    });

    function myParallax() {
        var positionScroll = $(window).scrollTop();
        $('.collection-head-title').css('top', (318 + (positionScroll / 2.5)) + "px");
    }
    function myRespParallax() {
        var positionScroll = $(window).scrollTop();
        $('.collection-head-title').css('top', (159 + (positionScroll / 2.5)) + "px");
    }

    screenWidth = $(window).width();

    if (screenWidth < 780) {
        $(window).on('scroll', function () {
            myRespParallax();
        });
    } else {
        $(window).on('scroll', function () {
            myParallax();
        });
    }
})
