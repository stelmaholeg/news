<?php

$driver = "mysql";
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "news";
$table = "news";

try {    
    $connect_str = $driver . ':host='. $host . ';dbname=' . $dbname.";charset=utf8";
    $db = new PDO($connect_str, $user, $pass);
    $db->exec("set names utf8");    
}  
catch(PDOException $e) {  
    echo $e->getMessage();  
}
?>
