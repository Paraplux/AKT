<?php 

include '../components/db.php';

/* ---BLOG--- */
$req = $pdo->query('SELECT * FROM akt_blog ORDER BY blog_date DESC');
$blogDatas = $req->fetchAll();
$req->closeCursor();


/* ---PRESS--- */

$req = $pdo->query('SELECT * FROM akt_press');
$pressDatas = $req->fetchAll();
$req->closeCursor();
