$(document).ready(function () {
    $('.welcomeHide').hide();
    $('.welcomeHide').fadeOut();
    $('#navigation').slideUp();
    function hideAKT() {
        $('#animation').hide();
    }
    function showMENU() {
        $('#navigation').slideDown();
    }
    function showPage() {
        $('.welcomeHide').fadeIn(500);

    }
    setTimeout(hideAKT, 2000);
    setTimeout(showMENU, 2000);
    setTimeout(showPage, 2500);

});