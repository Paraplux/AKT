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

    // function monParallax() {
    //     var positionScroll = $(window).scrollTop();
    //     $('.collection-head-thumb').css('backgroundPosition', "50% " + -(positionScroll / 6) + "px");
    //     $('.collection-head-title').css('top', (318 + (positionScroll / 2.5)) + "px");
    // }

    // $(window).on('scroll', function () {
    //     monParallax();
    // });
})