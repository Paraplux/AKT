<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar-reverse.php';
include '../controllers/controller-cart.php';
include '../controllers/controller-quicknav.php';
?>


<link rel="stylesheet" href="../css/navbar-reverse.css">
<link rel="stylesheet" href="../css/cart.css">


<div class="container">

    <!-- MENU -->
    <div class="item-cat-navigation">
        <?php foreach ($categoryNavs as $categoryNav) : ?>
        <span class="item-cat-links"><a href="./category.php?cat=<?= $categoryNav['name_format'] ?>"><?= $categoryNav['name'] ?></a></span>
        <?php endforeach; ?>
    </div>
    <hr>
    
    <?php
    if(isset($_SESSION['cart'])) : 
        foreach ($itemsCart as $item) :
    ?>
    <a href="./item.php?ref=<?= $item['ref'] . "&color=" . $item['color_format']; ?>"><?= $item['name']; ?> - <?= $item['color']; ?></a>
    <div><?= $_SESSION['cart'][$item['id']] ?> - <strong><?= $item['prix']; ?> €</strong></div>
    <hr>
    <?php
        endforeach;
    ?>
        <p><strong>TOTAL : <?= $totalPrice ?></strong></p>
    <?php
    else :
    ?>
    <p><strong>Votre panier est vide!</strong></p>
    <?php 
    endif; 
    ?>
    

    <hr>
    <a href="../actions/clean-cart.php">Vider le panier</a>
</div>