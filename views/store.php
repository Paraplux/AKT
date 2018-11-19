<?php 
include '../components/header.php';
include '../components/navbar-reverse.php';
include '../actions/controller-store.php';
?>

<link rel="stylesheet" href="../css/navbar-reverse.css">
<link rel="stylesheet" href="../css/store.css">

<div class="container">
    <div class="store-tiles">
       <?php 
       foreach ($storeDatas as $storeData):
       ?>
        <figure class="effect-apollo blue-apollo">
            <img src="<?= $storeData['thumb_1'];?>" alt="img18" />
            <figcaption>
                <h2>Check out our <?= $storeData['cat'];?>...</h2>
                <a href="./bracelet.php"></a>
                <p>View More</p>
            </figcaption>
        </figure>
       <?php endforeach; ?>
    </div>
</div>

<?php
include '../components/footer.php';
?>