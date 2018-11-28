<?php
include '../components/header.php';
include '../components/navbar.php';
include '../controllers/controller-cart.php';

if(!isset($_SESSION['payed']) || $_SESSION['payed'] != 'true') {
  header('Location: ./home');
  exit();
} else {
  unset($_SESSION['payed']);
}

?>

<link rel="stylesheet" href="../css/ticket.css">
  <div class="ticket-container">
    <div class="ticket">
      <p class="title">AKT JEWELS</p>
      <p class="slogan">Creating mo' with ammo</p>
      <p class="date">21 - 12 - 2018</p>
      <?php
      if (isset($_SESSION['cart'])) :
        foreach ($itemsCart as $item) :
      ?>
        <a href="./item?ref=<?= $item['ref'] . "&color=" . $item['color_format']; ?>"><?= $item['name']; ?> (<?= $item['color']; ?>) - Ref :  <?= $item['ref'] ?></a>
        <div>Qty : <?= $_SESSION['cart'][$item['id']] ?> x <strong><?= $item['prix']; ?> €</strong></div>
        <hr>
        <?php
        endforeach;
        ?>
        <p>-----------------------------------------</p> 
        <p><strong>TOTAL TTC : <?= $totalPrice ?> $</strong></p>
    <?php
    else :
    ?>
    <p><strong>Votre panier est vide!</strong></p>
    <?php 
    endif;
    ?>
      <p>*****************************************</p>
      <p class="thank">AKT Jewels thanks you !</p>
      <p>*****************************************</p>
    </div>
  </div>
  <div class="payement-button-container">
    <div class="payement-button">
      PAYED
    </div>
  </div>

<?php
include '../components/footer.php';
?>