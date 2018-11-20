<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) {

    $cartRef = $_POST['cart_ref'];
    $cartColor = $_POST['cart_color'];

    include '../components/db.php';

    $req = $pdo->prepare('SELECT id FROM akt_store WHERE ref = :ref AND color = :color');
    $req->execute(array(
        ':ref' => $cartRef,
        ':color' => $cartColor,
    ));
    $cartData = $req->fetch();
    $req->closeCursor();
    array_push($_SESSION['cart'], $cartData['id']);

    header('Location: ../views/item.php');
}