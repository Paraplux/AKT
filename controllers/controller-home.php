<?php

include '../components/db.php';

$req = $pdo->prepare('SELECT home_defil FROM akt_admin');
$req->execute();
$homeData = $req->fetch()[0];
$req->closeCursor();

$req = $pdo->prepare('SELECT * FROM akt_store');
$req->execute();
$topItems = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();

shuffle($topItems);

