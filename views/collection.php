<?php 
include '../components/header.php';
include '../components/navbar.php';

/*CALLING CONTROLLER*/
include '../components/controller.php';
include '../components/db.php';
?>

<link rel="stylesheet" href="../css/fullscreen.css">
<link rel="stylesheet" href="../css/collection.css">


    <div class="collection-head">
        <div class="collection-head-thumb"><img src="../images/collection_thumbs/collection-head.jpg" alt=""></div>
        <span class="collection-head-title"><span>COLLECTION</span></span>
    </div>
    <div class="collection-mozaic">

        <?php 
        $req = $pdo->prepare("SELECT * FROM akt_collection WHERE is_thumb = 'TRUE'");
        $req->execute();
        $cats = $req->fetchAll();
        foreach($cats as $cat):
        ?>
        <div class="collection-cat-head">
            <div class="collection-cat-thumb"><img src="<?= $cat['small_link']; ?>" alt=""></div>
            <span class="collection-cat-title"><span><?= $cat['cat']; ?></span></span>
        </div>
        <div class="collection-cat-mozaic">
            <?php 
            $reqBis = $pdo->prepare("SELECT * FROM akt_collection WHERE cat_format = :cat_format");
            $reqBis->execute(array(
                ':cat_format' => $cat['cat_format'],
            ));
            $catsBis = $reqBis->fetchAll();
            foreach($catsBis as $catBis):
            ?>
            <div class="collection-cat-item" target="<?= $catBis['id']; ?>">
                <img src="<?= $catBis['square_link']; ?>" alt="">
            </div>
            <div class="collection-fullscreen" target="<?= $catBis['id']; ?>">
                    <img src="<?= $catBis['med_link'] ;?>" alt="">
            </div>
            <a class="collection-cat-item-resp" href='<?= $catBis["med_link"]; ?>' target='_blank'>
                <img src="<?= $catBis['square_link']; ?>" alt="">
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