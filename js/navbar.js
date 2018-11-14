$(document).ready(function(){
    $('#display-resp-nav-sidebar').on('click', function() {
        $('.resp-nav-sidebar').css('display', 'flex');
        $('#hide-resp-nav-sidebar').css('display', 'block');
        $('#display-resp-nav-sidebar').css('display', 'none');
    });
    $('#hide-resp-nav-sidebar').on('click', function () {
        $('.resp-nav-sidebar').css('display', 'none');
        $('#hide-resp-nav-sidebar').css('display', 'none');
        $('#display-resp-nav-sidebar').css('display', 'block');
    });
});