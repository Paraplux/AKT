<?php 

class GetterRequest extends PDO
{
    var $pdo;
    function __construct()
    {
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

        
        $this->reqFetch = array();
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage());
        }
    }

    function getCol($table, $col, $order = 'DESC', $where = '') {
        $sql = "SELECT * FROM $table ORDER BY id $order $where";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $reqArray = array();
        while($getIt = $req->fetch()) {
            array_push($reqArray, $getIt[$col]);
        }
        $req->closeCursor();
        return $reqArray;
    }

    function getAll($table, $order = 'DESC', $where = '')
    {
        $sql = "SELECT * FROM $table ORDER BY id $order $where";
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