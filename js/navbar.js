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
    $(window).resize(function() {
        if ($(window).width() <= 770) {
            if ($('.resp-nav-sidebar').css('display') == 'none') {
                $('#display-resp-nav-sidebar').css('display', 'block');
            } else {
                $('#display-resp-nav-sidebar').css('display', 'none');
            }
        } else if ($(window).width() > 770) {
            $('.resp-nav-sidebar').css('display', 'none');
            $('#hide-resp-nav-sidebar').css('display', 'none');
            $('#display-resp-nav-sidebar').css('display', 'none');
        }
    })
});