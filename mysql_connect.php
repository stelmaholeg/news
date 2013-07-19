<?php

$driver = "mysql";
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "news";
$table = "news";

try {    
    $connect_str = $driver . ':host='. $host . ';dbname=' . $dbname;
    $db = new PDO($connect_str, $user, $pass);
}  
catch(PDOException $e) {  
    echo $e->getMessage();  
}
?>
