<?php

$host = "localhost";
$bd = "akt";
$user = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}