$(document).ready(function() {
    var cpt = 4;
    setInterval( function() {
        if (cpt > 1) {
            cpt--;
        } else {
            window.location.replace("../views/home");
        }
        $('#timer').html(cpt);
    }
        ,1000)
})