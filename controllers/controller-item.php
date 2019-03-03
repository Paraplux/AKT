<?php 

include '../components/db.php';

if(!isset($_GET['ref']) || !isset($_GET['color'])) {
    header('Location: ../store');
}
$currentRef = $_GET['ref'];
$currentColor = $_GET['color'];

$req = $pdo->prepare('SELECT * FROM akt_store WHERE ref = :currentRef AND color_format = :currentColor');
$req->execute(array(
    ':currentRef' => $currentRef,
    ':currentColor' => $currentColor,
));
$refData = $req->fetch();
$req->closeCursor();

if(empty($refData)) {
    header('Location: ../store');
}


$req = $pdo->prepare('SELECT ref, color, color_format FROM akt_store WHERE ref = :currentRef');
$req->execute(array(
    ':currentRef' => $currentRef,
));
$variationDatas = $req->fetchAll();
$req->closeCursor();
?>
