<?php

/*VERSION TEST*/
$host = "localhost";
$bd = "akt";
$user = "root";
$password = "";


/*VERSION LIVE*/
// $host = "marcboucvd0632.mysql.db";
// $bd = "marcboucvd0632";
// $user = "marcboucvd0632";
// $password = "Kmle0632";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}