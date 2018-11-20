<?php 
include '../components/header.php';
include '../components/navbar-reverse.php';
include '../controllers/controller-store.php';
?>

<link rel="stylesheet" href="../css/navbar-reverse.css">
<link rel="stylesheet" href="../css/store.css">

<div class="container">
    <?php if(empty($storeDatas)) : ?>
        <h1>Pas de catégorie définie</h1>
    <?php endif; ?>
    <div class="store-tiles">
       <?php
       foreach ($storeDatas as $storeData):
       ?>
        <figure class="effect-apollo blue-apollo">
            <img src="<?= $storeData['thumb'];?>" alt="img18" />
            <figcaption>
                <h2>Check out our <?= $storeData['name'];?>...</h2>
                <a href="../views/category.php?cat=<?= $storeData['name_format'];?>"></a>
                <p>View More</p>
            </figcaption>
        </figure>
       <?php endforeach; ?>
    </div>
</div>

<?php
include '../components/footer.php';
?>