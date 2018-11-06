$(document).ready(function () {
    $('.filling').css('height', '0%');
    $(window).scroll(function (event) {
        // Récupération du scroll maximum
        var maxScroll = $('.container').height() - $(window).height();
        var scroll = $(window).scrollTop();
        var fill = scroll * 1539/ maxScroll;
        // Changement de la hauteur en fonction de maxScroll
        $('.filling').css('stroke-dashoffset', - (1600 - fill));
    });
});