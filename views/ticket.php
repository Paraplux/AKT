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
<link rel="stylesheet" href="../css/print.css" media="print">
  <div class="ticket-container">
    <div class="ticket">
      <p class="title">AKT JEWELS</p>
      <p class="slogan">Creating mo' with ammo</p>
      <?php
      $date = date("d-m-Y");
      Print($date);
      ?>
  <br>
      <?php
      if (isset($_SESSION['cart'])) :
        foreach ($itemsCart as $item) :
      ?>
        <a href="./item?ref=<?= $item['ref'] . "&color=" . $item['color_format']; ?>"><?= $item['name']; ?> (<?= $item['color']; ?>) - Ref :  <?= $item['ref'] ?></a>
        <div>Qty : <?= $_SESSION['cart'][$item['id']]['qty'] ?> x <strong><?= $item['prix']; ?> €</strong></div>
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
      <p class="ticket-point">*****************************************</p>
      <p class="thank">AKT Jewels thanks you !</p>
      <p class="ticket-point">*****************************************</p>
    </div>
  </div>
  <div class="payement-button-container">
    <div class="payement-button">
    <a href="javascript:window.print()"><p>PRINT</p></a>
    </div>
  </div>

<?php
include '../components/footer.php';
unset($_SESSION['cart']);
?>