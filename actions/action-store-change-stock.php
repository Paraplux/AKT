<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST)) {
    include '../components/db.php';

    $req = $pdo->prepare('UPDATE akt_store SET qty = :qty WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['change-stock-id'],
        ':qty' => $_POST['change-stock-value']
    ));
    $req->closeCursor();
    $_SESSION['flash']['success']['admin_store'] = "Le stock de l'article a bien été modifié";
    header('Location: ../views/admin.php');
    exit();
} else {
    $_SESSION['flash']['fail']['admin_store_variation'] = "Erreur veuillez réessayer";
    header('Location: ../views/admin.php');
    exit();
}