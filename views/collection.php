<?php 
include '../components/header.php';
include '../components/navbar.php';
include '../controllers/controller-collection-category.php';
?>

<link rel="stylesheet" href="../css/collection.css">


    <div class="collection-head">
        <div class="collection-head-thumb"><img src="../images/collection_thumbs/collection-head.jpg" alt=""></div>
        <span class="collection-head-title"><span>COLLECTION</span></span>
    </div>
    <div class="collection-mozaic">

        <?php 
        foreach($catDatas as $catData):
            ?>
        <div class="collection-cat-head">
            <div class="collection-cat-thumb"><img src="<?= $catData['small_link']; ?>" alt=""></div>
            <span class="collection-cat-title"><span><?= $catData['cat']; ?></span></span>
        </div>
        <div class="collection-cat-mozaic">
            <?php 
            include '../controllers/controller-collection-item.php';
            foreach($collectionDatas as $collectionData):
            ?>
            <div class="collection-cat-item" target="<?= $collectionData['id']; ?>">
                <img src="<?= $collectionData['square_link']; ?>" alt="">
            </div>
            <div class="collection-fullscreen" target="<?= $collectionData['id']; ?>">
                    <img src="<?= $collectionData['med_link'] ;?>" alt="">
            </div>
            <a class="collection-cat-item-resp" href='<?= $collectionData["med_link"]; ?>' target='_blank'>
                <img src="<?= $collectionData['square_link']; ?>" alt="">
            </a>
            <?php endforeach; ?>            
        </div>
        <?php endforeach; ?>
        <div class="fullscreen-brightness"></div>
        <span class="fullscreen-brightness-remove"><i class="fas fa-times"></i></span>
    </div>

<script src="../js/collection.js"></script>

<?php
include '../components/footer.php';
?>