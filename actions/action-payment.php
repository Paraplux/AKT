<?php 

include '../controllers/controller-cart.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$name = $_POST['name'];
$email = $_POST['email'];
$address1 = $_POST['address_1'];
$addressCity = $_POST['address_city'];
$addressZip = $_POST['address_zip'];
$addressCountry = $_POST['address_country'];
$addressState;
$address2;
if (empty($_POST['address_state'])) {
    $addressState = "null";
} else {
    $addressState = $_POST['address_state'];
}

if (empty($_POST['address_state'])) {
    $address2 = "null";
} else {
    $address2 = $_POST['address_2'];
}

$token = $_POST['stripeToken'];


$total = $totalPrice * 100;

$cart = array();
foreach ($_SESSION['cart'] as $d) {
    array_push($cart, $d);
}
$recap = array();
for ($i = 1; $i <= count($cart); $i++) {
    $recap += [
        'Reference - ' . $i => $cart[$i-1]['ref'],
        'Size - ' . $i => $cart[$i-1]['size'],
        'Type - ' . $i => $cart[$i-1]['color'],
        'Qty - ' . $i => $cart[$i-1]['qty'],
        'Unit price - ' . $i => $cart[$i-1]['u_price'],
    ];
};

if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($token) && !empty($address1) && !empty($addressCity) && !empty($addressZip) && !empty($addressCountry)) {
    require '../components/class.stripe.php';
    require '../components/db.php';
    $stripe = new Stripe('sk_test_wqaeo0cRgMszWLTOnmPRPJWW');

    $req = $pdo->prepare('SELECT email, stripe_id FROM akt_customers WHERE email = :email');
    $req->execute(array(
        'email' => $email,
    ));
    $data = $req->fetch();
    if($data) {
        $customer = $stripe->update($data['stripe_id'], [
            'source' => $token,
        ]);
        $customerID = $data['stripe_id'];
    } else {
        $customer = $stripe->api('customers', [
            'source' => $token,
            'description' => $name,
            'email' => $email,
            'metadata' => [
                "This represent" => "Shipping informations of the client",
                "Adress" => $address1,
                "Adress (optional)" => $address2,
                "City" => $addressCity,
                "Zip Code" => $addressZip,
                "State (optional)" => $addressState,
                "Country" => $addressCountry
            ],
        ]);

        $req = $pdo->prepare('INSERT INTO akt_customers set name = :name, stripe_id = :stripe_id, email = :email');
        $req->execute(array(
            ':name' => $name,
            ':stripe_id' => $customer->id,
            ':email' => $email,
        ));
        $req->closeCursor();

        $customerID = $customer->id;
    }
    
    $stripe->api('charges', [
        'amount' => $total,
        'currency' => 'usd',
        'customer' => $customerID,
        'metadata' => $recap,
        
        
    ]);
    $to = $_POST['email'];
    $subject = 'Votre commande chez AKT Jewels !';
    $message = "Votre commande a bien été prise en compte et sera traité d'ici peu";

    $headers = 'From: akt@example.com' . "\r\n" .
               'Reply-To: akt@example.com' . "\r\n";

    mail($to, $subject, $message, $headers);
    $_SESSION['payed'] = 'true';
    header('Location: ../ticket');
    exit();
} else {
    $_SESSION['form-payement']['error'] = "Le formulaire n'est pas complet.";
    header('Location: ../cart.php');
}