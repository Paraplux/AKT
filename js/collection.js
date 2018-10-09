$(document).ready(function () {
    $('.carousel-sec').addClass('filter-blur-opacity');
    $('.carousel-sec').hide();
    $('.toggle-carousel-main').hide();
    $('.object-main').on('dblclick', function () {
        var clickedCarousel = $(this).attr('id');
        $('.carousel-sec').toggleClass('filter-blur-opacity');
        $('.carousel-sec').hide(function () {
            carouselToToggle = clickedCarousel.replace('-toggler', "");
            console.log(carouselToToggle);
            $('.' + carouselToToggle).show();
            $('.carousel-main').slideUp();
            $('.toggle-carousel-main').show();
        }
        );
    });

    $('.toggle-carousel-main').on('click', function () {
        $('.carousel-main').slideDown();
        $('.toggle-carousel-main').hide();
        $('.carousel-sec').toggleClass('filter-blur-opacity');
    });
})
