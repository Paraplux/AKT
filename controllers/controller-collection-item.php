<?php 

include '../components/db.php';

    $req = $pdo->prepare("SELECT * FROM akt_collection WHERE cat_format = :cat_format");
    $req->execute(array(
        ':cat_format' => $catData['cat_format'],
    ));
    $collectionDatas = $req->fetchAll();
    $req->closeCursor();
