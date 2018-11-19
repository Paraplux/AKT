<?php
    foreach($storeDatas as $storeData) {
    $req = $pdo->prepare('SELECT * FROM akt_store WHERE cat_format = :cat_format');
    $req->execute(array(
        ':cat_format' => $storeData['cat_format'],
    ));
    ${$storeData['cat_format'] . 'Datas'} = $req->fetchAll();
    $req->closeCursor();

    if ($_GET['cat'] = $storeData['cat_format']) {
        $categoryData = ${$storeData['cat_format'] . 'Datas'};
    } else {
        header('Location: ../views/store.php');
    }
}