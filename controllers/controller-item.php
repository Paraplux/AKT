<?php 

include '../components/db.php';


$currentRef = $_GET['ref'];
$currentColor = $_GET['color'];

$req = $pdo->prepare('SELECT * FROM akt_store WHERE ref = :currentRef AND color_format = :currentColor');
$req->execute(array(
    ':currentRef' => $currentRef,
    ':currentColor' => $currentColor,
));
$refData = $req->fetch();
$req->closeCursor();


$req = $pdo->prepare('SELECT ref, color, color_format FROM akt_store WHERE ref = :currentRef');
$req->execute(array(
    ':currentRef' => $currentRef,
));
$variationDatas = $req->fetchAll();
$req->closeCursor();
?>