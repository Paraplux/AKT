<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST)) {

    if (empty($_POST['home_defil'])) {
        $_SESSION['flash']['fail']['home_defil'] = "The message input is empty !";
    }

    if (empty($_SESSION['flash'])) {
        include '../components/db.php';
        $req = $pdo->prepare('UPDATE akt_admin SET home_defil = ? WHERE id=1');
        $req->execute([$_POST['home_defil']]);
        $req->closeCursor();
        $_SESSION['flash']['success']['admin_defil'] = "The home message has been changed!";
        header('Location: ../admin58624/admin42685');
        exit();
    } else {
        header('Location: ../admin58624/admin42685');
        exit();
    }
}