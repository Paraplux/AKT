<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) {

    $cartRef = $_POST['cart_ref'];
    $cartColor = $_POST['cart_color'];

    include '../components/db.php';

    $req = $pdo->prepare('SELECT ref, id, qty, prix FROM akt_store WHERE ref = :ref AND color_format = :color_format');
    $req->execute(array(
        ':ref' => $cartRef,
        ':color_format' => $cartColor,
    ));
    $cartID = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    if($cartID['qty'] == 0) {
        echo "Sorry the article is not available, contact the administrator";
    } else {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array(
                $cartID['id'] => [
                    'ref' => $cartID['ref'],
                    'qty' =>  intval(1),
                    'u_price' => $cartID['prix']
                ],
            );
        } else if (!isset($_SESSION['cart'][$cartID['id']])) {
            $_SESSION['cart'][$cartID['id']] = [
                'ref' => $cartID['ref'],
                'qty' => intval(1),
                'u_price' => $cartID['prix']
            ];
        } else if (isset($_SESSION['cart'][$cartID['id']])) {
            $qty = $_SESSION['cart'][$cartID['id']]['qty'];
            $qty++;
            $_SESSION['cart'][$cartID['id']]['qty'] = $qty;
        } else {
            echo "Problem ! Contact the administrator";
        }
    }
}
