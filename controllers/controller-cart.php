<?php

include '../components/functions.php';
include '../components/db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['cart'])) {

    $idArray = array();

    foreach ($_SESSION['cart'] as $id => $qty) {
        array_push($idArray, $id);
    }
    $IDs = implode(',', array_map('intval', $idArray));

    $req = $pdo->prepare("SELECT * FROM akt_store WHERE id IN ($IDs)");
    $req->execute();
    $itemsCart = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();

    $total = array();
    foreach ($itemsCart as $item) {
        
        
        $price = $item['prix'];
        $qty = $_SESSION['cart'][$item['id']]['qty'];

        $tmpPrice = $qty * $price;
        array_push($total, $tmpPrice);
    }

    $totalPrice = array_sum($total);
}
if(isset($_SESSION['shipping'])) {
    
    if ($_SESSION['shipping'] === 'france') {
        $shipping = 5;
    } else if ($_SESSION['shipping'] == 'europe') {
        $shipping = 10;
    } else {
        $shipping = 15;
    }

} else {
    $shipping = 5;
}
if(isset($totalPrice)) {
    $totalPrice += $shipping;
}

