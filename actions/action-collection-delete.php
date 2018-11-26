<?php

include '../components/db.php';

if (!empty($_POST)) {
    /*GET THE THUMB AND DELETE IT FROM SERVER*/
    $req = $pdo->prepare('SELECT tiny_link, small_link, med_link, square_link FROM akt_collection WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['trash-value-id'],
    ));
    $f = $req->fetchAll();
    unlink($f['tiny_link']);
    unlink($f['small_link']);
    unlink($f['med_link']);
    unlink($f['square_link']);
    $req->closeCursor();

    /*DELETE THE LINE IN DB*/
    $req = $pdo->prepare('DELETE FROM akt_collection WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['trash-value-id'],
    ));
    $req->closeCursor();
}
