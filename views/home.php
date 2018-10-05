<?php 
include '../components/header.php';
include '../components/navbar.php';
?>
<link rel="stylesheet" href="../css/welcome.css">


<div id="animation">
    <span id="a">A</span>
    <span id="k">K</span>
    <span id="t">T</span>
    <span id="jewels">JEWELS</span>
</div>

<div class="presentation welcomeHide">
    <div class="presentation-content">
        <h1>titre</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est rerum tenetur consequuntur dolor consectetur sed laborum facilis voluptatem architecto deserunt ipsa magnam repellendus, reiciendis officia quibusdam harum doloribus eum velit!</p>
    </div>
    <div class="presentation-thumb"> 
        <img src="../images/Francois-Ghys.jpg" alt="">
    </div>
</div>

<div class="flagship welcomeHide">
    <h2 class="flagship-title">Les plus vendus</h2>
    
    <div class="main-gallery js-flickity"
            data-flickity-options='{ "cellAlign": "left", "contain": true }'>
        <div class="gallery-cell"><img src="../images/thumb-ammo.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/thumb-military.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/thumb-forge.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/thumb-statue.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/Francois-Ghys.jpg" alt=""></div>
    </div>

</div>


<script src="../js/welcome.js"></script>
<script src="../js/flickity.js"></script>
<?php
include '../components/footer.php';
?>