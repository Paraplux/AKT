<?php 
include '../components/header.php';
include '../components/navbar.php';
?>

<link rel="stylesheet" href="../css/anim-home.css">
<link rel="stylesheet" href="../css/home.css">

<div id="animation">
    <span id="a">A</span>
    <span id="k">K</span>
    <span id="t">T</span>
    <span id="jewels">JEWELS</span>
</div>


    <div class="home-page">
        <div class="defil-container welcomeHide">
            <div class="defil">AKT JEWELS se déplace à Berlin ! Suivez nous sur les réseaux sociaux !</div>
        </div>
        <div class="presentation welcomeHide">  
            <div class="presentation-content">
                <h1 class="home-h1">François Ghys</h1>
                <p class="home-intro">
                    UN REVE D'ENFANT<br>
                    « J’ai toujours rêvé de fabriquer de beaux objets. Des objets au design affirmé, que l’on aime et que l’on garde. Des objets qui ont une histoire et qui expriment des valeurs.<br>
                    Il y a 2 ans, j’ai décidé de transformer ce rêve en réalité : c’est ainsi que l’aventure AKT a commencé »<br>
                    François Ghys, fondateur de AKT Jewels.
                </p>
            </div>
            <div class="presentation-thumb"> 
                
            </div>
        </div>

    <div class="flagship welcomeHide">
    <h2 class="home-h2"><div>BEST SALES</div></h2>
    
    <div class="main-gallery js-flickity"
            data-flickity-options='{"cellAlign": "center", "contain": true, "wrapAround": true }'>
        <div class="gallery-cell"><img src="../images/jewelry/brace-1.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/jewelry/brace-2.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/jewelry/brace-3.jpg" alt=""></div>
        <div class="gallery-cell"><img src="../images/jewelry/brace-4.jpg" alt=""></div>
    </div>

</div>


<script src="../js/flickity.js"></script>
<script src="../js/welcome.js"></script>
<script src="../js/home.js"></script>
<?php
include '../components/footer.php';
?>