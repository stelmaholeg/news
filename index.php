<?php
//error_reporting(E_ALL);

require_once "./head.php";

require_once "./mysql_connect.php";
try
{
    # поскольку это обычный запрос без placeholder’ов,
    # можно сразу использовать метод query()  
    $STH = $db->query('SELECT * FROM `news` ORDER BY date DESC  limit 5');
    # устанавливаем режим выборки
    $STH->setFetchMode(PDO::FETCH_ASSOC);  
}
catch(PDOException $e)
{
    die("Error: ".$e->getMessage());
}

include ('./administrator/view.php');
while($row = $STH->fetch()) {
    view::editNews($row);
}
?>
