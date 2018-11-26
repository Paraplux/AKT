<?php 

include '../components/db.php';

/* ---BLOG--- */
$req = $pdo->prepare('SELECT * FROM akt_blog');
$req->execute();
$blogDatas = $req->fetchAll();
$req->closeCursor();


/* ---PRESS--- */

$req = $pdo->prepare('SELECT * FROM akt_press');
$req->execute();
$pressDatas = $req->fetchAll();
$req->closeCursor();