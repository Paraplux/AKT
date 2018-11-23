<?php 

include '../components/db.php';

$req = $pdo->prepare('SELECT name, name_format FROM akt_store_cat');
$req->execute();
$categoryNavs = $req->fetchAll();
$req->closeCursor();