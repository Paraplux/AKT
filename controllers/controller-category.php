<?php

    include '../components/db.php';
    
    $req = $pdo->prepare('SELECT name, name_format FROM akt_store_cat');
    $req->execute();
    $categoryNavs = $req->fetchAll();
    $req->closeCursor();
        
    /* --- Depends on current page --- */

    $currentCat = $_GET['cat'];


    $req = $pdo->prepare('SELECT name, content, thumb FROM akt_store_cat WHERE name_format = :currentCat');
    $req->execute(array(
        ':currentCat' => $currentCat,
    ));
    $categoryData = $req->fetch();
    $req->closeCursor();


    $req = $pdo->prepare('SELECT * FROM akt_store WHERE cat_format = :currentCat AND variation ="false"');
    $req->execute(array(
        ':currentCat' => $currentCat,
    ));
    $eachCategoryDatas = $req->fetchAll();
    $req->closeCursor();