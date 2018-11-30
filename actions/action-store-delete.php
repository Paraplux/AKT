<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/db.php';

if (!empty($_POST)) {
    /*Select the item to delete*/
    $req = $pdo->prepare('SELECT * FROM akt_store WHERE id = :id');
    $req->execute(array(
        ':id' =>$_POST['store-id-delete'],
    ));
    $d = $req->fetch();
    $req->closeCursor();

    /*DELETE THE LINE IN DB*/
    $req = $pdo->prepare('DELETE FROM akt_store WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['store-id-delete'],
    ));
    $req->closeCursor();

    /*If the item to delete has variation = false -> Make a new clone-parent*/
    if($d['variation'] == 'false') {
        $req = $pdo->prepare('UPDATE akt_store SET variation = "false" WHERE ref = :ref LIMIT 1');
        $req->execute(array(
            ':ref' => $d['ref'],
        ));
        $req->closeCursor();
        $_SESSION['flash']['success']['admin_store'] = "The article has been deleted";
        header('Location: ../admin58624/admin42685');
        exit();
    } else {
        $_SESSION['flash']['success']['admin_store'] = "The article has been deleted";
        header('Location: ../admin58624/admin42685');
        exit();
    }

    
}