<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!empty($_POST)) {

    if(!filter_var($_POST['newsletter_email'], FILTER_VALIDATE_EMAIL) || empty($_POST['newsletter_email'])) {
        $_SESSION['flash']['fail']['newsletter_email'] = "The field is not conform";
    }

    if(empty($_SESSION['flash']['fail'])) {
        include '../components/db.php';

        $req = $pdo->prepare('SELECT email FROM akt_newsletter WHERE email = :email');
        $req->execute(array(
            ':email' => $_POST['newsletter_email'],
        ));
        $data = $req->fetch();
        $req->closeCursor();

        if($data) {
            $_SESSION['flash']['fail']['already_sub'] = 'You are already sub to the newsletter';
            header('Location: ../newsletter');
            exit();
        } else {
            $req = $pdo->prepare('INSERT INTO akt_newsletter SET email = :email');
            $req->execute(array(
                ':email' => $_POST['newsletter_email'],
            ));
            $req->closeCursor();
            $_SESSION['flash']['success']['sub'] = 'You are now sub to the newsletter';
            header('Location: ../newsletter');
            exit();
        }
    } else {
        header('Location: ../newsletter');
        exit();
    }
}