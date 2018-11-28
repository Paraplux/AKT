$(document).ready(function(){
    $('#display-collection-modal').on('click', function(){
        $('.collection-modal').css('display', 'block');
        $('#display-resp-nav-sidebar').css('display', 'none');
    });
    $('#hide-collection_modal').on('click', function(){
        $('.collection-modal').css('display', 'none');
        $('#display-resp-nav-sidebar').css('display', 'block');
    })
});