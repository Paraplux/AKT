$(document).ready(function() {
    if (localStorage.getItem('rgpdState') != 'shown') {
        $('.welcome-popup').css('display', 'flex');
        localStorage.setItem('rgpdState', 'shown');
    }
    $('.dismiss').on('click', function(){
        $('.welcome-popup').fadeOut('slow');
    });

    $('.rgpd-buttons').on('click', function () {
        $('.welcome-popup').fadeOut('slow');
    });
});