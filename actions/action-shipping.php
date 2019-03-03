<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST)) {
    $_SESSION['shipping'] = $_POST['shipping'];
    header('Location: ../cart');
} else {
    header('Location: ../cart');
}