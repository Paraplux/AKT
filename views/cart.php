<?php

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

    foreach ($itemsCart as $item) {
        echo $_SESSION['cart'][$item['id']] . "<br>";
        echo $item['name'] . "<br>";
        echo $item['color'] . "<br>";
        echo "<hr>";
    }
}

?>

<a href="../actions/clean-cart.php">Vider le panier</a>

