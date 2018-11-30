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
    $_SESSION['flash']['success']['admin_store'] = "The artice stock has been updated";
    header('Location: ../admin58624/admin42685');
    exit();
} else {
    $_SESSION['flash']['fail']['admin_store_variation'] = "Error, try again";
    header('Location: ../admin58624/admin42685');
    exit();
}