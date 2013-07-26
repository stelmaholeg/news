<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body> 
        <?php 
        session_start();
        
        if (!$_SESSION['login'] == 'admin')
            header('Location: ./add-news.php');    
        else    
            echo 'Вы ввели неверную комбинацию логин/пароль!';
         session_destroy();
         
         
         include "view.php";
         loginForm();
        ?>
        
    </body>
</html>
