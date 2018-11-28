<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<a href="../views/cart" class="cart ">
    <span class="counter">
        <?php 
        if (!isset($_SESSION['cart'])) {
            echo '0';
        } else {
            echo(array_sum($_SESSION['cart'])); 
        }
        ?>
    </span>
</a>