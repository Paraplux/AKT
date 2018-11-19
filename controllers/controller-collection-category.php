<?php 

include '../components/db.php';

$req= $pdo->prepare("SELECT * FROM akt_collection WHERE is_thumb = 'TRUE'");
$req->execute();
$catDatas = $req->fetchAll();
$req->closeCursor();

