<?php 
include '../components/header.php';
include '../components/navbar.php';
include '../controllers/controller-home.php';
?>

<link rel="stylesheet" href="../css/anim-home.css">
<link rel="stylesheet" href="../css/home.css">


<div class="defil-container welcomeHide">
    <div class="defil"><?= $homeData; ?></div>
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
        <h2 class="home-h2"><div>TAKE A LOOK</div></h2>
            <div class="main-gallery js-flickity"
                    data-flickity-options='{"cellAlign": "center", "wrapAround": true }'>
                    <?php
                    for($i = 0; $i < 5; $i++) : 
                    ?>
                <div class="gallery-cell">
                    <a href="./item.php?ref=<?= $topItems[$i]['ref'] . "&color=" . $topItems[$i]['color_format']; ?>">
                        <img class="gallery-cell-thumb" src="<?= $topItems[$i]['thumb_1'] ;?>" alt="">
                        <div class="gallery-cell-body">
                            <span class="gallery-cell-body-name"><?= $topItems[$i]['name']; ?></span>
                            <span class="gallery-cell-body-prix"><?= $topItems[$i]['prix']; ?> €</span>
                        </div>
                    </a>
                </div>
                    <?php
                    endfor;
                    ?>
            </div>
            
        </div>
    
    </div>
</div>

<?php include '../components/footer.php'; ?>