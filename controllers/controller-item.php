<?php 

include '../components/db.php';


$currentRef = $_GET['ref'];

$req = $pdo->prepare('SELECT * FROM akt_store WHERE ref = :currentRef');
$req->execute(array(
    ':currentRef' => $currentRef,
));
$refData = $req->fetch();
$req->closeCursor();