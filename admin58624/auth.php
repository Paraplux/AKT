<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(isset($_POST)) {

    if(empty($_POST['auth-username'])) {
        $_SESSION['flash']['fail']['auth'] = "Incorrect logs, try again";
    }

    if(empty($_POST['auth-password'])) {
        $_SESSION['flash']['fail']['auth'] = "Incorrect logs, try again";
    }

    if(empty($_SESSION['flash'])) {
        include '../components/db.php';

        $req = $pdo->prepare('SELECT login, password FROM akt_admin WHERE login = :username');
        $req->execute(array(
            ':username' => $_POST['auth-username'],
        ));
        $d = $req->fetch();
        $req->closeCursor();

        if($d == null) {
            $_SESSION['flash']['fail']['auth'] = "Incorrect logs, try again";
            header('Location: ./4562894');
            exit();
        } elseif(password_verify($_POST['auth-password'], $d['password'])) {
            $_SESSION['auth'] = $d;
            $_SESSION['flash']['success']['auth'] = "Perfect, you are now, logged in";
            header('Location: ./admin42685');
            exit();
        } else {
            $_SESSION['flash']['fail']['auth'] = "Incorrect logs, try again";
            header('Location: ./4562894');
            exit();
        }
    } else {
        $_SESSION['flash']['fail']['auth'] = "Incorrect logs, try again";
        header('Location: ./4562894');
        exit();
    }

}