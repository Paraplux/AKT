<?php 
include '../components/header.php';
include '../components/navbar.php';
?>
<link rel="stylesheet" href="../css/welcome.css">
<script src="js/home.js"></script>


<div id="animation">
    <span id="a">A</span>
    <span id="k">K</span>
    <span id="t">T</span>
    <span id="jewels">JEWELS</span>
</div>

<div class="presentation">
    <div class="presentation-content">
        <h1>titre</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est rerum tenetur consequuntur dolor consectetur sed laborum facilis voluptatem architecto deserunt ipsa magnam repellendus, reiciendis officia quibusdam harum doloribus eum velit!</p>
    </div>
    <div class="presentation-thumb"> 
        <body onload="randomImg()">
            <img src="../images/Francois-Ghys.jpg" alt="">
            <img src="../Images/GIF/Not sure.gif" alt="">
            <img src="../Images/GIF/nice.gif" alt="">
        </body> 
    </div>
</div>

<div class="flagship">
    <h2 class="flagship-title">Les plus vendus</h2>


    <div class="flagship-item"><img src="../images/Francois-Ghys.jpg" alt=""></div>
    <div class="flagship-item"><img src="../images/Francois-Ghys.jpg" alt=""></div>
    <div class="flagship-item"><img src="../images/Francois-Ghys.jpg" alt=""></div>

</div>


<script src="../js/welcome.js"></script>
<?php
include '../components/footer.php';
?>