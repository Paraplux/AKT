<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_POST)) {

    if (!filter_var($_POST['newsletter_email'], FILTER_VALIDATE_EMAIL) || empty($_POST['newsletter_email'])) {
        $_SESSION['flash']['fail']['newsletter_email'] = "Le champ n'est pas conforme";
    }

    if (empty($_SESSION['flash']['fail'])) {
        include '../components/db.php';

        $req = $pdo->prepare('SELECT email FROM akt_newsletter WHERE email = :email');
        $req->execute(array(
            ':email' => $_POST['newsletter_email'],
        ));
        $data = $req->fetch();
        $req->closeCursor();

        if ($data) {
            $req = $pdo->prepare('DELETE FROM akt_newsletter WHERE email = :email');
            $req->execute(array(
                ':email' => $_POST['newsletter_email'],
            ));
            $req->closeCursor();
            $_SESSION['flash']['success']['unsub'] = 'Vous êtes maintenant désabonné à la newsletter';
            header('Location: ../views/unsubscribe.php');
            exit();
        } else {
            $_SESSION['flash']['fail']['not_sub'] = "Vous n'êtes pas abonné";
            header('Location: ../views/unsubscribe');
        }
    } else {
        header('Location: ../views/unsubscribe');
    }
}