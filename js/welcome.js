$(document).ready(function () {
    $('#navigation').hide();
    $('#navigation').slideUp();
    function hideAKT() {
        $('#animation').hide();
    }
    function showMENU() {
        $('#navigation').slideDown();
    }
    setTimeout(hideAKT, 2000);
    setTimeout(showMENU, 2000);
});