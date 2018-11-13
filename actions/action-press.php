<?php

if (isset($_POST)){
    $errors = array();

        if (empty($_POST['admin_press_title'])){
            $errors ['admin_press_title'] = "Le champ est vide";
        }

        if (empty($_POST['admin_press_content'])){
            $errors ['admin_press_content'] = "Le champ est vide";
        }

        if (empty($_POST['admin_press_signature'])){
            $errors ['admin_press_signature'] = "Le champ est vide";
        }

        if (empty($_POST['admin_press_link'])){
            $errors ['admin_press_link'] = "Le champ est vide";
        }

if (empty($errors)){
include '../components/db.php';
$req= $pdo->prepare("INSERT INTO akt_press SET press_title = :press_title, press_corpus = :press_corpus, press_signature = :press_signature, press_link = :press_link");
$req->bindValue(":press_title", $_POST['admin_press_title']);
$req->bindValue(":press_corpus", $_POST['admin_press_content']);
$req->bindValue(":press_signature", $_POST['admin_press_signature']);
$req->bindValue(":press_link", $_POST['admin_press_link']);
$req->execute();
$req->closeCursor();
header('Location: ../views/admin.php');
exit();
    }
}
