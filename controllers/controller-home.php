<?php

include '../components/db.php';

$req = $pdo->prepare('SELECT home_defil FROM akt_admin');
$req->execute();
$homeData = $req->fetch()[0];
$req->closeCursor();