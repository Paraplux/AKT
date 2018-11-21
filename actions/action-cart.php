<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) {

    $cartRef = $_POST['cart_ref'];
    $cartColor = $_POST['cart_color'];

    include '../components/db.php';

    $req = $pdo->prepare('SELECT id FROM akt_store WHERE ref = :ref AND color_format = :color_format');
    $req->execute(array(
        ':ref' => $cartRef,
        ':color_format' => $cartColor,
    ));
    $cartID = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(
            $cartID['id'] => "1",
        );
    } else if (!isset($_SESSION['cart'][$cartID['id']])) {
        $_SESSION['cart'][$cartID['id']] = 1;
    } else if (isset($_SESSION['cart'][$cartID['id']])) {
        $qty = $_SESSION['cart'][$cartID['id']];
        $qty++;
        $_SESSION['cart'][$cartID['id']] = $qty;
    } else {
        echo "Problème, contactez l'administrateur du site";
    }
}
