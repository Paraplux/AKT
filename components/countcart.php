<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['cart'])) {
    $count = array();
    foreach ($_SESSION['cart'] as $key => $value) {
        array_push($count, $_SESSION['cart'][$key]['qty']);
    }
}

?>
<a href="../views/cart" class="cart ">
    <span class="counter">
        <?php 
        if (!isset($_SESSION['cart'])) {
            echo '0';
        } else {
            echo(array_sum($count)); 
        }
        ?>
    </span>
</a>