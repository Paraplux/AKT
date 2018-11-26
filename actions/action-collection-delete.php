<?php

include '../components/db.php';

if (!empty($_POST)) {
    $req = $pdo->prepare('DELETE FROM akt_collection WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['trash-value-id'],
    ));
    $req->closeCursor();
}
