$(document).ready(function() {
    var cpt = 5;
    setInterval( function() {
        if (cpt > 0) {
            cpt--;
        } else {
            window.location.replace("../views/home.php");
        }
        $('#timer').html(cpt);
    }
        ,1000)
})