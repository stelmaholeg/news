<?php
error_reporting(E_ALL);

require_once "./head.php";

require_once "./mysql_connect.php";
try
{
    # поскольку это обычный запрос без placeholder’ов,
    # можно сразу использовать метод query()  
    $STH = $db->query('SELECT * FROM `news`');
    # устанавливаем режим выборки
    $STH->setFetchMode(PDO::FETCH_ASSOC);  
}
catch(PDOException $e)
{
    die("Error: ".$e->getMessage());
}

while($row = $STH->fetch()) {
    echo "<h4>".$row['title']."</h4><br>";  
    echo $row['text']. "<br>";
    echo $row['author']. "<br>";  
    echo $row['date']. "<hr>";  
}
?>
