$(document).ready(function() {
    var cpt = 4;
    setInterval( function() {
        if (cpt > 1) {
            cpt--;
        } else {
            window.location.replace("../home");
        }
        $('#timer').html(cpt);
    }
        ,1000)
})