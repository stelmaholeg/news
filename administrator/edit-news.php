

<?php
   require_once "../head.php";
   include "../mysql_connect.php";
   include "./view.php";
?>   

<?
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
        echo $row['date']. "<br>";
    ?>
        <a href="#" onclick="$('#edit-form<?=$row['news_id']?>').toggle();">Редактировать</a>      
        <div id='edit-form<?=$row['news_id']?>' style="display: none"><?php newsForm("controller.php",$row);?></div>
        <hr>
    <?
    }
    //newsForm("update_data.php", $rows[0]);
?>

        