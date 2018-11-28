<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/db.php';

if (!empty($_POST)) {
    /*GET THE THUMB AND DELETE IT FROM SERVER*/
    $req = $pdo->prepare('SELECT blog_thumb FROM akt_blog WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['blog-id-delete'],
    ));
    $f = $req->fetch();
    unlink($f['blog_thumb']);
    $req->closeCursor();

    /*DELETE THE LINE IN DB*/
    $req = $pdo->prepare('DELETE FROM akt_blog WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['blog-id-delete'],
    ));
    $req->closeCursor();
    $_SESSION['flash']['success']['admin_blog'] = "L'article a bien été supprimé";
    header('Location: ../views/admin');
    exit();
}
