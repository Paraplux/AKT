<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) {
    include '../components/db.php';

    $req = $pdo->prepare('UPDATE akt_store SET prix = :prix WHERE id = :id');
    $req->execute(array(
        ':id' => $_POST['change-price-id'],
        ':prix' => $_POST['change-price-value']
    ));
    $req->closeCursor();
    $_SESSION['flash']['success']['admin_store'] = "Le prix de l'article a bien été modifié";
    header('Location: ../admin58624/admin42685');
    exit();
} else {
    $_SESSION['flash']['fail']['admin_store_variation'] = "Erreur veuillez réessayer";
    header('Location: ../admin58624/admin42685');
    exit();
}