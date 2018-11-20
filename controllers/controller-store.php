<?php
    include '../components/db.php';

    $req = $pdo->prepare('SELECT name, name_format, thumb FROM akt_store_cat');
    $req->execute();
    $storeDatas = $req->fetchAll();
    $req->closeCursor();
