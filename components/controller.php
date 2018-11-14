<?php 

class GetterRequest extends PDO
{
    var $pdo;
    function __construct()
    {
        $host = "localhost";
        $bd = "akt";
        $user = "root";
        $password = "";
        $this->reqFetch = array();
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage());
        }
    }

    function getCol($table, $col) {
        $sql = "SELECT * FROM ".$table;
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $reqArray = array();
        while($getIt = $req->fetch()) {
            array_push($reqArray, $getIt[$col]);
        }
        $req->closeCursor();
        return $reqArray;
    }

    function getAll($table)
    {
        $sql = "SELECT * FROM " . $table;
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $reqArray = $req->fetchAll();
        return $reqArray;
    }
}
/*EXEMPLE

$Articles = new GetterRequest;
var_dump($Articles->getAll('akt_blog')[2]['blog_title']);
foreach ($Articles->getAll('akt_blog') as $article) {
    echo $article['blog_title'];
}
*/