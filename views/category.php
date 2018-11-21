<?php 
include '../components/header.php';
include '../components/navbar-reverse.php';
include '../controllers/controller-store.php';
include '../controllers/controller-category.php';
?>


<link rel="stylesheet" href="../css/navbar-reverse.css">
<link rel="stylesheet" href="../css/category.css">

<div class="container">

        <!-- MENU -->
    <div class="item-cat-navigation">
        <?php foreach($categoryNavs as $categoryNav) : ?>
        <span class="item-cat-links"><a href="./category.php?cat=<?= $categoryNav['name_format']?>"><?= $categoryNav['name']?></a></span>
        <?php endforeach; ?>
    </div>
    
        <!-- ENTETE -->
    <div class="item-cat-presentation">
        <div class="item-cat-presentation-content">
           <h1 class="item-cat-title-bracelet"><?= $categoryData['name']?></h1>
                <p class="item-cat-presentation-text"><?= $categoryData['content'] ?></p>
        </div> 
        <div class="item-cat-presentation-thumb">
            <img class="main-bracelet" src="<?= $categoryData['thumb'] ?>" alt="">
        </div>
    </div>

        <!-- OBJETS -->
    <div class="item-cat-mosaic">
        <?php foreach($eachCategoryDatas as $eachCategoryData) : ?>
        <div class="item-cat-container">
            <div class="grid">
                <a href="./item.php?ref=<?= $eachCategoryData['ref']."&color=". $eachCategoryData['color']; ?>">
                    <figure class="effect-sarah-bracelet">
                        <figcaption>
                            <img class="bracelet" src="<?= $eachCategoryData['thumb_1']; ?>" alt="">
                            <h2><?= $eachCategoryData['name'] ;?></h2><span><?= $eachCategoryData['color']; ?></span>
                            <p><?= $eachCategoryData['prix']; ?> €</p>
                        </figcaption>			
                    </figure>
                </a>
                <div class="panier"><a href="about.php"></a></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
include '../components/footer.php';
?>

