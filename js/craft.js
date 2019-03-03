$(document).ready(function () {
    $(window).scroll(function () {
        // Récupération du scroll maximum
        var maxScroll = $('.container').height() - $(window).height();
        //Récupération du scroll à l'instant t
        var scroll = $(window).scrollTop();
        //Création de la variable de position qui va varier de 0 à la
        // longueur du svg ici
        var pos = scroll * 1700 / maxScroll;
        // Changement du dashoffset en fonction de la variable pos
        $('.filling').css('stroke-dashoffset', 1750 + pos);
    });
});