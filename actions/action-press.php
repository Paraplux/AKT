<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST)){

    if (empty($_POST['admin_press_title'])){
        $_SESSION['flash']['fail']['admin_press_title'] = "You didn't type any title";
    }

    if (empty($_POST['admin_press_content'])){
        $_SESSION['flash']['fail']['admin_press_content'] = "You didn't type any review";
    }

    if (empty($_POST['admin_press_signature'])){
        $$_SESSION['flash']['fail']['admin_press_signature'] = "The signature field is empty";
    }

    if (empty($_POST['admin_press_link'])){
        $_SESSION['flash']['fail']['admin_press_link'] = "The link field is empty";
    }

    if (empty($_SESSION['flash'])){
        include '../components/db.php';
        $req= $pdo->prepare("INSERT INTO akt_press SET press_title = :press_title, press_corpus = :press_corpus, press_signature = :press_signature, press_link = :press_link");
        $req->bindValue(":press_title", $_POST['admin_press_title']);
        $req->bindValue(":press_corpus", $_POST['admin_press_content']);
        $req->bindValue(":press_signature", $_POST['admin_press_signature']);
        $req->bindValue(":press_link", $_POST['admin_press_link']);
        $req->execute();
        $req->closeCursor();
        $_SESSION['flash']['success']['admin_press'] = "The review has been added !";
        header('Location: ../admin58624/admin42685');
        exit();
    } else {
        header('Location: ../admin58624/admin42685');
        exit();
    }
}
