<?php 

include '../components/db.php';

/* ---HOME--- */
$req = $pdo->prepare('SELECT home_defil FROM akt_admin');
$req->execute();
$homeData = $req->fetch()[0];
$req->closeCursor();


/* ---BLOG--- */
$req = $pdo->prepare('SELECT id, blog_title, blog_date FROM akt_blog');
$req->execute();
$blogDatas = $req->fetchAll();
$req->closeCursor();


/* ---PRESS--- */
$req = $pdo->prepare('SELECT * FROM akt_press');
$req->execute();
$pressDatas = $req->fetchAll();
$req->closeCursor();


/* ---STORE--- */

$req = $pdo->prepare('SELECT * FROM akt_store_cat');
$req->execute();
$storeCatDatas = $req->fetchAll();
$req->closeCursor();