<?php 
include '../components/header.php';
include '../components/navbar.php';

/*CALLING CONTROLLER*/
include '../components/controller.php';
$textDefil = new GetterRequest;
?>

<link rel="stylesheet" href="../css/anim-home.css">
<link rel="stylesheet" href="../css/home.css">

<?php 
?>

<div class="defil-container welcomeHide">
    <div class="defil">
        <?= $textDefil->getCol('akt_admin', 'home_defil')[0]; ?>
    </div>
</div>

<div class="container">
    <div class="home-page">
        <div class="presentation welcomeHide">  
            <div class="presentation-content">
                <h1 class="home-h1">Une histoire</h1>
                <div class="home-intro">
                    <p>
                        J’ai créé <strong>AKT Jewels</strong> début 2012 par amour des beaux objets. Pour moi, un bel objet est un objet qui a un intérêt esthétique mais aussi une <strong>histoire</strong>. L’histoire que je voulais que mes objets racontent est une histoire de <strong>paix et de liberté</strong>.
                    </p>
                    <p>
                        C’est pourquoi j’ai choisi symboliquement d’utiliser des matériaux symbolisant la violence et la mort, de les <strong>détruire</strong> et de les refaire vivre à travers des créations qui incarnent <strong>la paix et la liberté</strong>.
                    </p>
                    <p class="intro-signature">Francois Ghys</p>
                </div>
            </div>
            <div class="presentation-thumb"> 
                <img src="../images/home/Francois-Ghys.jpg" alt="">
            </div>
        </div>
    
        <div class="flagship welcomeHide">
        <h2 class="home-h2"><div>BEST SALES</div></h2>
            <div class="main-gallery js-flickity"
                    data-flickity-options='{"cellAlign": "center", "wrapAround": true }'>
                <div class="gallery-cell">
                    <img class="gallery-cell-thumb" src="../images/jewelry/brace-1.jpg" alt="">
                    <div class="gallery-cell-body">PRIX : 500$</div>
                </div>
                <div class="gallery-cell">
                    <img class="gallery-cell-thumb" src="../images/jewelry/brace-1.jpg" alt="">
                    <div class="gallery-cell-body">PRIX : 500$</div>
                </div>
                <div class="gallery-cell">
                    <img class="gallery-cell-thumb" src="../images/jewelry/brace-2.jpg" alt="">
                    <div class="gallery-cell-body">PRIX : 500$</div>
                </div>
                <div class="gallery-cell">
                    <img class="gallery-cell-thumb" src="../images/jewelry/brace-3.jpg" alt="">
                    <div class="gallery-cell-body">PRIX : 500$</div>
                </div>
                <div class="gallery-cell">
                    <img class="gallery-cell-thumb" src="../images/jewelry/brace-4.jpg" alt="">
                    <div class="gallery-cell-body">PRIX : 500$</div>
                </div>
            </div>
            
        </div>
    
    </div>
</div>

<?php include '../components/footer.php'; ?>