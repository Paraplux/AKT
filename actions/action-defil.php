<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST)) {

    if (empty($_POST['home_defil'])) {
        $_SESSION['flash']['fail']['home_defil'] = "Le champ est vide !";
    }

    if (empty($_SESSION['flash'])) {
        include '../components/db.php';
        $req = $pdo->prepare('UPDATE akt_admin SET home_defil = ? WHERE id=1');
        $req->execute([$_POST['home_defil']]);
        $req->closeCursor();
        $_SESSION['flash']['success']['admin_defil'] = "Le message d'accueil a bien été changé !";
        header('Location: ../views/admin.php');
        exit();
    } else {
        header('Location: ../views/admin.php');
        exit();
    }
}