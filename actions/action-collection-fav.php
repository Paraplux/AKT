<?php

include '../components/db.php';

if(!empty($_POST)) {
    $req = $pdo->prepare('UPDATE akt_collection SET is_thumb = "false" WHERE cat_format = :cat_format');
    $req->execute(array(
        ':cat_format' => $_POST['fav-value-cat'],
    ));
    $req->closeCursor();

    $req = $pdo->prepare('UPDATE akt_collection SET is_thumb = :is_thumb WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['fav-value-id'],
        ':is_thumb' => 'true',
    ));
    $req->closeCursor();
}
