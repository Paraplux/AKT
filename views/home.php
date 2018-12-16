<?php 
include '../components/header.php';
include '../components/navbar.php';
include '../components/welcome-popup.php';
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
                        AKT is an <strong>art editor</strong> based in France near Geneva.
                    </p> <br>
                    <p>
                        AKT creates art objects from weapons, destroyed by the <strong>Swiss Foundation for Mine Action.</strong>
                        The Swiss Foundation for Mine Action is a non-governmental organization
                        where former soldiers organize <strong>the destruction of weapons</strong> around the world in
                        conflict zones to <strong>protect civilian populations</strong>.
                        The metal collected is transformed at l’<strong>Ecole Nationale des Arts et Métiers</strong> in Cluny/Burgundy. In their laboratory and Foundry, we turn the metal used to
                        produce the jewels into a <strong>jewerly</strong> standart stainless steel.
                        Some pieces of the collection are made with a mixed of the metal from the
                        weapons and solid silver.
                    </p>
                    <p>
                        All of our creations are entirely <strong>made in France</strong>, from the preparation of the
                        raw material to the finished product.
                        Our designers and craftsmen create in a small workshop in France, objects
                        with an <strong>excellent quality</strong> and a bold design.
                        Our <strong>ambition</strong> is to create objects with with a bold design and a meaningful
                        story.
                        We want to <strong>honor</strong> with you the <strong>women and men</strong> who fight for <strong>peace and freedom</strong>.
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
                    <a href="./item?ref=<?= $topItems[$i]['ref'] . "&color=" . $topItems[$i]['color_format']; ?>">
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