$(document).ready(function() {
    if (localStorage.getItem('rgpdState') != 'shown') {
        $('.welcome-popup').css('display', 'flex');
    }
    $('.dismiss').on('click', function(){
        $('.welcome-popup').fadeOut('slow');
        localStorage.setItem('rgpdState', 'shown');
    });
    
    $('.rgpd-buttons').on('click', function () {
        $('.welcome-popup').fadeOut('slow');
        localStorage.setItem('rgpdState', 'shown');
    });
});