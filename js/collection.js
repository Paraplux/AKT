$(document).ready(function () {
    $('.carousel-sec').hide(0);
    $('.carousel-sec.carousel-01').show(0);
    $('.object-main').on('dblclick', function () {
        var clickedCarousel = $(this).attr('id');
        carouselToToggle = clickedCarousel.replace('-toggler', "");
        $('.carousel-sec').hide(0);
        $('.' + carouselToToggle).show(0);
    });
})

