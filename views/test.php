<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
    
    $_SESSION['panier']['id'] = array();
    $_SESSION['panier']['qty'] = array();
}


    if (isset($_SESSION['cart'])) {
    foreach ($itemsCart as $item) {
        echo $_SESSION['cart'][$item['id']] . "<br>";
        echo $item['name'] . "<br>";
        echo $item['color'] . "<br>";
        echo "<hr>";
    }
} else {
    echo 'Votre panier est vide!';
}