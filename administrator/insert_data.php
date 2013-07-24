<?php
   /* require_once "mysql_connect.php";
    $title = $_POST['title'];
    $text = $_POST['text'];
     
    mysql_query("INSERT INTO news SET title=".$title." text=".$text);    */


if (!isset($_POST['text']))
{
    require_once "../mysql_connect.php";
    try{
       // вставляем несколько строк в таблицу из прошлого примера
       $insert_query = "INSERT INTO news 
              (title, text, author, date)  VALUES 
              ('$_POST[title]', '$_POST[text]','$_POST[author]','$_POST[date]')";///
       //$insert_query = "INSERT INTO news SET title='".$title."', text='".$text."'";
       $rows = $db->exec($insert_query);
       $error_array = $db->errorInfo(); 
       if($db->errorCode() != 0000) 
           echo "SQL ошибка: " . $error_array[2] . '<br />';   
    }
    catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }
    session_start();
    $_SESSION['flag_insert'] = TRUE;
    header('Location: ./add-news.php');
}
else {
     die('ошибка доступа');
}
?>
