<?php
    include '../components/db.php';

    $req = $pdo->prepare('SELECT cat, cat_format, thumb_1 FROM akt_store WHERE is_thumb = "true"');
    $req->execute();
    $storeDatas = $req->fetchAll();
    $req->closeCursor();
