<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) {
    foreach($_SESSION['cart'] as $key => $value) {
        if($key == $_POST['id_to_change']) {
            $_SESSION['cart'][$key]['qty'] = $_POST['qty_to_change'];
        } 
    }

    header('Location: ../views/cart.php');
} else {
    header('Location: ../views/cart.php');
}