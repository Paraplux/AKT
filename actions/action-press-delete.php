<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/db.php';

if (!empty($_POST)) {
    /*DELETE THE LINE IN DB*/
    $req = $pdo->prepare('DELETE FROM akt_press WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['press-id-delete'],
    ));
    $req->closeCursor();
    $_SESSION['flash']['success']['admin_press'] = "La critique a bien été supprimé";
    header('Location: ../admin58624/admin42685');
    exit();
}