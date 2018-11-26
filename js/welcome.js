$(document).ready(function() {
    $('.dismiss').on('click', function(){
        $('.welcome-popup').slideUp('slow');
    });

    $('.rgpd-buttons').on('click', function () {
        $('.welcome-popup').slideUp('slow');
    });
})