<?php 

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
$total = $_POST['charge'] * 100;

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
        $customerID = $data['stripe_id'];
    } else {
        $customer = $stripe->api('customers', [
            'source' => $token,
            'description' => $name,
            'email' => $email,
            'metadata' => [
                "Facturation Adress" => "",
                "Adress" => $address1,
                "Adress (optional)" => $address2,
                "City" => $addressCity,
                "Zip Code" => $addressZip,
                "State (optional)" => $addressState,
                "Country" => $addressCountry,
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
        'metadata' => [
            "Shipping Adress" => "",
            "Adress" => $address1,
            "Adress (optional)" => $address2,
            "City" => $addressCity,
            "Zip Code" => $addressZip,
            "State (optional)" => $addressState,
            "Country" => $addressCountry,
        ],
        
        
    ]);
    die('Votre paiement a bien été enregistré');
} else {
    echo 'echec'; /*MESSAGE ERREUR*/
}