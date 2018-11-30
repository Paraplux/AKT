$(document).ready(function () {
    $a = $('.collection-cat-item').width();
    $('.collection-cat-item').height($a);
    $b = $('.collection-cat-thumb img').width();
    $('.collection-cat-thumb img').height($b / 2.5);

    $(window).resize(function() {
        $a = $('.collection-cat-item').width();
        $('.collection-cat-item').height($a);
        $b = $('.collection-cat-thumb img').width();
        $('.collection-cat-thumb img').height($b / 2.5);
    });



    $('.collection-cat-item').on('click', function () {
        $target = $(this).attr('target');
        $('.fullscreen-brightness-remove').css('display', 'block');
        $('.fullscreen-brightness').css('display', 'block');
        $('[target="'+ $target + '"]').fadeIn();

    });


    $('.fullscreen-brightness').on('click', function () {
        $('.fullscreen-brightness').css('display', 'none');
        $('.fullscreen-brightness-remove').css('display', 'none');
        $('.collection-fullscreen').fadeOut();
    });
    $('.fullscreen-brightness-remove').on('click', function () {
        $('.fullscreen-brightness-remove').css('display', 'none');
        $('.fullscreen-brightness').css('display', 'none');
        $('.collection-fullscreen').fadeOut();
    });
})