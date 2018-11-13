<?php 

if (isset($_POST)) {
    $errors = array();

    if (empty($_POST['home_defil'])) {
        $errors['home_defil'] = "Le champ est vide";
    }

    if (empty($errors)) {
        include '../components/db.php';
        $req = $pdo->prepare('UPDATE akt_admin SET home_defil = ? WHERE id=1');
        $req->execute([$_POST['home_defil']]);
        $req->closeCursor();
        header('Location: ../views/admin.php');
        exit();
    }
}