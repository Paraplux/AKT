<?php 
include '../components/header.php';
include '../components/navbar-reverse.php';
include '../controllers/controller-item.php';
include '../controllers/controller-quicknav.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="../css/navbar-reverse.css">
<link rel="stylesheet" href="../css/item.css">
<link rel="stylesheet" href="../css/addtocart.css">

<div class="container">
    <!-- MENU -->
    <div class="item-cat-navigation">
        <?php foreach ($categoryNavs as $categoryNav) : ?>
        <span class="item-cat-links"><a href="./category?cat=<?= $categoryNav['name_format'] ?>"><?= $categoryNav['name'] ?></a></span>
        <?php endforeach; ?>
    </div>
    <hr>
    <div class="product">
        <div class="product-thumb">
            <div class="main-gallery js-flickity"
                    data-flickity-options='{"cellAlign": "center", "wrapAround": true, "imagesLoaded": true}'>
                    <?php
                    if($refData['thumb_1'] != null && 
                    $refData['thumb_2'] != null && 
                    $refData['thumb_3'] != null) {
                        $k = 3;
                    } else if ($refData['thumb_2'] != null ||
                        $refData['thumb_3'] != null) {
                        $k = 2;
                    } else {
                        $k = 1;
                    }
                    for ($i = 1; $i <= $k; $i++) :
                    ?>
                <div class="gallery-cell">
                    <img src="<?= $refData['thumb_'.$i]; ?>" alt=""> 
                </div>
                    <?php
                    endfor;
                    ?>
            </div>
        </div>
        <div class="product-cart">
                <div class="product-title">
                    <h1><?= $refData['name']; ?> (<?= $refData['color']; ?>)</h1>
                    <h2><?= $refData['prix']; ?> €</h2>
                </div>
                <div class="product-variation">                 
                    <?php foreach ($variationDatas as $variationData) : ?>
                    <a href="item?ref=<?= $variationData['ref']; ?>&color=<?= $variationData['color_format']; ?>">
                        <?= $variationData['color']; ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <div class="product-desc">
                    <?= $refData['item_description']; ?>
                </div>
                <div class="product-buy">
                    <form id="cart_submit" method="POST">
                    <label for="cart_size">Size : </label>
                    <input name="cart_size" type="text" value="Normal"><br>
                    <p>(<a href="../images/store/chart.png" target="_blank">Size table here</a>)</p>
                    <input name="cart_ref" value="<?= $refData['ref'];?>" type="hidden">
                    <input name="cart_color" value="<?= $refData['color_format'];?>" type="hidden">
                    <div class="add-to-cart-container">
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