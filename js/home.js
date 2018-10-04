function randomImg(){
    document.getElementById('randomImg').src = "images/image" + Math.round(Math.random()*4+1) + ".gif";
 }