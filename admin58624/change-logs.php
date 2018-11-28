<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST)) {

    if (empty($_POST['new-username'])) {
        $_SESSION['flash']['fail']['auth'] = "Empty, try again";
    }

    if (empty($_POST['new-password'])) {
        $_SESSION['flash']['fail']['auth'] = "Empty, try again";
    }

    if (empty($_SESSION['flash'])) {
        include '../components/db.php';

        $req = $pdo->prepare('UPDATE akt_admin SET login = :username, password = :password');
        $password = password_hash($_POST['new-password'], PASSWORD_BCRYPT);
        $req->execute(array(
            ':username' => $_POST['new-username'],
            ':password' => $password
        ));
        $req->closeCursor();
        $_SESSION['flash']['success']['auth'] = "Perfect! Your logs are now changed !";
        header('Location: ./admin42685');
        exit();
    } else {
        header('Location: ./4562894');
        exit();
    }

}