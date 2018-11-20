<?php 
include '../components/header.php';
include '../components/navbar-reverse.php';
include '../controllers/controller-item.php';
?>

<link rel="stylesheet" href="../css/navbar-reverse.css">
<link rel="stylesheet" href="../css/item.css">

<div class="container">
    <div class="product">
        <div class="product-thumb">
            <img src="<?= $refData['thumb_1']; ?>" alt="">
        </div>
        <div class="product-cart">
            <form action="" method="">
                <div class="product-title">
                    <h1><?= $refData['name']; ?> Dont l'id est = <?= $refData['id']; ?></h1>
                    <h1><?= $refData['prix']; ?></h1>
                </div>
                <div class="product-variation">
                    <select>
                        <option>Bleu</option> 
                        <option>Marron</option>
                        <option>Beige</option>
                    </select>
                </div>
                <div class="product-desc">
                    <?= $refData['item_description']; ?>
                </div>
                <div class="product-buy">
                    <button class="product-buy-button" type="submit">Add to cart</button>
                </div>
        </form>
        </div>
    </div>
</div>


<script src="../js/flickity.js"></script>

<?php
include '../components/footer.php';
?>