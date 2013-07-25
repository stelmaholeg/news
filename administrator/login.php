<?php


if ($_POST['login_button'])
{
require_once "../mysql_connect.php";
try
{

        $select_query = "SELECT * FROM users WHERE username='".$_POST['username']."' AND pass='".$_POST['pass']."'";
        
	$rows = $db->query($select_query);
        
	$error_array = $db->errorInfo(); 
	if($db->errorCode() != 0000) 
            echo "SQL ошибка: " . $error_array[2] . '<br />';               
        
}
catch(PDOException $e)
{
	die("Error: ".$e->getMessage());
}
    if ($rows == 1){    
        session_start();
        $_SESSION['login'] = 'admin';    
        header('Location: add-news.php');    
    }
    else
    {
         session_start();
         $_SESSION['login'] = 'guest';
         header('Location: index.php');    
    }
}
 else {
     die('ошибка доступа');
 }
?>
