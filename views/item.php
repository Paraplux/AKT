<?php 
include '../components/header.php';
include '../components/navbar-reverse.php';
include '../controllers/controller-item.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="../css/navbar-reverse.css">
<link rel="stylesheet" href="../css/item.css">
<link rel="stylesheet" href="../css/addtocart.css">

<div class="container">
    <div class="product">
        <div class="product-thumb">
            <img src="<?= $refData['thumb_1']; ?>" alt="">
        </div>
        <div class="product-cart">
                <div class="product-title">
                    <h1><?= $refData['name']; ?> Dont la couleur est = <?= $refData['color']; ?></h1>
                    <h1><?= $refData['prix']; ?></h1>
                </div>
                <div class="product-variation">                 
                    <?php foreach ($variationDatas as $variationData) : ?>
                    <a href="item.php?ref=<?= $variationData['ref']; ?>&color=<?= $variationData['color']; ?>">
                        <?= $variationData['color']; ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <div class="product-desc">
                    <?= $refData['item_description']; ?>
                </div>
                <div class="product-buy">
                    <form id="cart_submit">
                    <input name="cart_ref" value="<?= $refData['ref'];?>" type="hidden">
                    <input name="cart_color" value="<?= $refData['color'];?>" type="hidden">
                    <div class="AddToCartDiv">
                        <?php include '../components/addtocart.php'; ?>
                        <div>
                            <?php include '../components/countcart.php'; ?>
                        </div>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>


<script src="../js/flickity.js"></script>
<script src="../js/addtocart.js"></script>

<?php
include '../components/footer.php';
?>