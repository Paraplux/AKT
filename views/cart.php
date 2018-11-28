<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar-reverse.php';
include '../controllers/controller-cart.php';
include '../controllers/controller-quicknav.php';
?>


<script src="https://js.stripe.com/v3/"></script>
<link rel="stylesheet" href="../css/navbar-reverse.css">
<link rel="stylesheet" href="../css/cart.css">


<div class="container">

    <!-- MENU -->
    <div class="item-cat-navigation">
        <?php foreach ($categoryNavs as $categoryNav) : ?>
        <span class="item-cat-links"><a href="./category?cat=<?= $categoryNav['name_format'] ?>"><?= $categoryNav['name'] ?></a></span>
        <?php endforeach; ?>
    </div>
    <hr>
    
    <?php
    if(isset($_SESSION['cart'])) : 
        foreach ($itemsCart as $item) :
    ?>
    <a href="./item?ref=<?= $item['ref'] . "&color=" . $item['color_format']; ?>"><?= $item['name']; ?> - <?= $item['color']; ?></a>
    <div><?= $_SESSION['cart'][$item['id']] ?> - <strong><?= $item['prix']; ?> €</strong></div>
    <hr>
    <?php
        endforeach;
    ?>
        <p><strong>TOTAL : <?= $totalPrice ?></strong></p>
    <?php
    else :
    ?>
    <p><strong>Votre panier est vide!</strong></p>
    <?php 
    endif; 
    ?>
    

    <hr>
    <a href="../actions/clean-cart.php">Vider le panier</a>
    <br><br><br><hr>


    <form action="../actions/action-payment.php" method="post" id="payment-form">
        <div class="form-row">
            <input value="Bouchez Marc" type="text" name="name" required placeholder="Your name">
            <input value="theparaplux@test.com" type="email" name="email" required placeholder="Your@mail.com">
            <input value="123 rue des ténèbres" type="text" name="address_1" required placeholder="Your address">
            <input value="Appartemment 666" type="text" name="address_2" placeholder="Your address(Optional)">
            <input value="Noir sur marne" type="text" name="address_city" required placeholder="Your city">
            <input value="62666" type="text" name="address_zip" required placeholder="Your zip code">
            <input value="Pas de Satan" type="text" name="address_state" placeholder="Your state">
            <input value="Gilet Jaunes" type="text" name="address_country" required placeholder="Your country">
            <input type="hidden" name="charge" value="<?= $totalPrice;?>">
        </div>
        <div class="form-row">
            <label for="card-element">
                Credit or debit card
            </label>
            <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>
        <button>Submit Payment</button>
</form>
</div>

<script>
        // Create a Stripe client.
var stripe = Stripe('pk_test_7s41AoT8qXwjD75MBW59EFia');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
