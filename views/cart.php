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

  <div class="cart">
    <p class="cart-thumb"> </p>
    <p class="cart-name">Name</p>
    <p class="cart-qty">Quantity</p>
    <p class="cart-price">Price</p>
  </div>
    <?php
    if(!empty($_SESSION['cart'])) : 
        foreach ($itemsCart as $item) :
    ?>


    <!-- MODIF -->

  <div class="cart">
    <div class="cart-thumb">
      <img src="<?= $item['thumb_1'] ?>" alt="">
    </div>
    <div class="cart-name">
      <a href="./item?ref=<?= $item['ref'] . "&color=" . $item['color_format']; ?>"><?= $item['name']; ?> - <?= $item['color']; ?></a>
    </div>
    <div class="cart-qty">
      <form class="change_qty_form" action="../actions/action-change-cart.php" method="POST">
          <input name="id_to_change" type="hidden" value="<?= $item['id'] ;?>">
          <input class="change_qty_input" name="qty_to_change" type="number" step="1" min="0" max="100" value="<?= $_SESSION['cart'][$item['id']]['qty'] ?>">
      </form>
      <form action="../actions/action-delete-cart.php" method="POST">
          <input name="id_to_del" type="hidden" value="<?= $item['id']; ?>">
          <button class="btn-unstyle"><i class="fas fa-trash-alt"></i></button>
      </form>
    </div>
    <div class="cart-price">
      <strong><?= $item['prix']; ?> €</strong></div>
    </div>



    <?php
        endforeach;
    ?>
          <p class="cart-total"><strong>TOTAL : <?= $totalPrice ?> €</strong></p>
          <hr>
          <a href="../actions/clean-cart.php">Clean the cart</a>
          <br><br><br><hr>
    <?php
    else :
    ?>
    <p><strong>Your cart is empty!</strong></p>
    <?php 
    endif; 
    ?>
    


    <?php
    if (!empty($_SESSION['cart'])) :
    ?>
    <br>
    <form class="change-shipping-form" action="../actions/action-shipping.php" method="POST">
      <h2>Shipping :</h2>
      <strong>France (5€) :</strong><input id="france" value="france" name="shipping" type="radio" class="change-shipping-input"><br>
      <strong>Europe (10€) :</strong><input id="europe" value="europe" name="shipping" type="radio" class="change-shipping-input"><br>
      <strong>International (15€) :</strong> <input id="international" value="international" name="shipping" type="radio" class="change-shipping-input"><br>
    </form>
    <form action="../actions/action-payment.php" method="post" id="payment-form">
        <div class="form-part">
            <div class="form-shipping">
                <h2>Shipping Information</h2>
                <?php if(isset($_SESSION['form-payement']['error'])) : ?>
                    <div class="error-payement">
                        <?= $_SESSION['form-payement']['error']; ?>
                    </div>
                <?php
                unset($_SESSION['form-payement']['error']);
                endif;
                ?>
                <label for="name">Your name</label>
                <label for="email">Your email</label><br>
                <input value="Dupont" type="text" name="name" required placeholder="Your name">
                <input value="Jean" type="email" name="email" required placeholder="Your@mail.com"><br>
                <label for="name">Adress</label>
                <label for="email">Adress (optional)</label><br>
                <input value="123 rue des coquelicots" type="text" name="address_1" required placeholder="Your address">
                <input value="" type="text" name="address_2" placeholder="Your address(Optional)"><br>
                <label for="name">City</label>
                <label for="email">Zipcode</label><br>
                <input value="Etaples" type="text" name="address_city" required placeholder="Your city">
                <input value="62630" type="text" name="address_zip" required placeholder="Your zip code"><br>
                <label for="name">State</label>
                <label for="email">Country</label><br>
                <input value="Haut de France" type="text" name="address_state" placeholder="Your state">
                <input value="France" type="text" name="address_country" required placeholder="Your country"><br>


            </div>
            <div class="form-checkout">
                <h2>Checkout Information</h2>
                <label for="card-element">
                    Credit or debit card
                </label><br><br>
                <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
                </div><br>
    
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
                <button>Submit Payment</button>
            </div>
        </div>
</form>
<?php
endif;
?>
</div>

<script>
  $(document).ready(function() {
    <?php
    if(isset($_SESSION['shipping'])) {
      $checked = $_SESSION['shipping'];
    } else {
      $checked = 'france';
    }
    ?>
    $('.change-shipping-input').removeAttr('checked');
    $('#<?= $checked ?>').attr('checked', true)

    $('.change_qty_input').change(function(){
      $('.change_qty_form').submit()
    })

    $('.change-shipping-input').change(function(){
      $('.change-shipping-form').submit()
    })

    $(document).on('submit', '.change_qty_form', function(){
      $.ajax({
        type: 'post',
        url: '../actions/action-change-cart.php',
        data: $(this).serialize()
            });
      });
      $(document).on('submit', '.change-shipping-form', function(){
      $.ajax({
        type: 'post',
        url: '../actions/action-shipping.php',
        data: $(this).serialize()
            });
      });
    })
</script>

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

<?php
include '../components/footer.php';
?>