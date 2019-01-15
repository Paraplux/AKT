<?php
    include '../components/db.php';

    /*Get the category in the url, default : empty*/
    $currentCat = isset($_GET['cat']) ? $_GET['cat'] : "";

    /*For the items*/
    $req = $pdo->prepare('SELECT * FROM akt_store WHERE cat_format = :currentCat AND variation ="false"');
    $req->execute(array(
        ':currentCat' => $currentCat,
    ));
    $eachCategoryDatas = $req->fetchAll();
    $req->closeCursor();
    
    /*If our request is empty, redirection*/
    if(empty($eachCategoryDatas)) {                       
        header('Location: ../views/store.php');   
    }

    /*For the presentation of the current category*/
    $req = $pdo->prepare('SELECT name, content, thumb FROM akt_store_cat WHERE name_format = :currentCat');
    $req->execute(array(
        ':currentCat' => $currentCat,
    ));
    $categoryData = $req->fetch();
    $req->closeCursor();

