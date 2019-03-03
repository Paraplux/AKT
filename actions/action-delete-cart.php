<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST)) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($key == $_POST['id_to_del']) {
            unset($_SESSION['cart'][$key]);
        }
    }

    header('Location: ../cart.php');
} else {
    header('Location: ../cart.php');
}