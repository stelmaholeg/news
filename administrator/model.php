<?php

function checkLogin(){
    require_once "../mysql_connect.php";
    try  {
            $select_query = "SELECT * FROM users WHERE username='".$_POST['username']."' AND pass='".$_POST['pass']."'";
            $rows = $db->query($select_query);
            $error_array = $db->errorInfo(); 
            if($db->errorCode() != 0000) 
                echo "SQL ошибка: " . $error_array[2] . '<br />'; 
    }
    catch(PDOException $e) {
            die("Error: ".$e->getMessage());
    }
    if ($rows == 1){    
        session_start();
        $_SESSION['login'] = 'admin'; 
        return true;
       // header('Location: controller.php?task=addnews');    
    }
    else{
         session_start();
         $_SESSION['login'] = 'guest';
         //header('Location: index.php');    
    }
    return false;
}

function getNews(){
    require_once "../mysql_connect.php";
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
    
    $abc = $STH->fetchAll();
    return  $abc; 
}

function insertDB($article)    
{
    if ($article['date'] == "")
        $article['date'] = date("Y-m-d H:i:s");
    include "../mysql_connect.php";
    try{
       
       $insert_query = "INSERT INTO news 
              (title, text, author, date)  VALUES 
              ('$article[title]', '$article[text]','$article[author]','$article[date]')";
     
       $rows = $db->exec($insert_query);
       
       $error_array = $db->errorInfo(); 
       if($db->errorCode() != 0000) 
           return FALSE; 
    }
    catch(PDOException $e)
    {
        return FALSE;
    }
    
    return TRUE;
}
//else {
//     die('ошибка доступа');
//}


function updateDB($article)    
{
    if ($article['date'] == "")
        $article['date'] = date("Y-m-d H:i:s");
    include "../mysql_connect.php";
    try{
       
       $update_query = "UPDATE news SET title='$article[title]', text='$article[text]', author='$article[author]', date='$article[date]' WHERE news_id='$article[news_id]'";
     
       $rows = $db->exec($update_query);
       
       $error_array = $db->errorInfo(); 
       if($db->errorCode() != 0000) 
           return FALSE; 
    }
    catch(PDOException $e)
    {
        return FALSE;
    }
    
    return TRUE;
}

function isNew($text)
{
    include "../mysql_connect.php";
    try {
        $select_query = "SELECT * FROM news WHERE text='".$text."'";        
	$rows = $db->query($select_query);        
	$error_array = $db->errorInfo(); 
	if($db->errorCode() != 0000) 
            echo "SQL ошибка: " . $error_array[2] . '<br />';                       
    }
    catch(PDOException $e){
            die("Error: ".$e->getMessage());
    }
    
    if ($rows->rowCount() != 0){   
        return FALSE;
    }
    else {
         return TRUE;
    }
}

function delNews(){
    include "../mysql_connect.php";
    if (isset($_POST['del_button'])){
        try {
            $select_query = "DELETE FROM news WHERE news_id='".$_POST['news_id']."'";        
            $rows = $db->query($select_query);        
            $error_array = $db->errorInfo(); 
            
            if($db->errorCode() != 0000){                 
                return false;
            }
            return true;
        }
        catch(PDOException $e){
            return false;           
        }
    }
    else 
        return false;
}

if ($_GET['task'] == 'del'){
    if (delNews())
        header('Location: ./controller.php?task=editnews');
    else
        header('Location: ./controller.php?task=editnews&delerror');
}



?>
