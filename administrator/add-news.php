<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>  
       <?php 
        session_start();
        if ($_SESSION['flag_insert'])
            echo 'Данные успешно загружены в базу!';
        elseif($_SESSION['flag_old_twit'])        
             echo 'Твит(ы) с таким текстом уже есть в базе данных!';             
        session_destroy();
        ?>
        <?php
            include 'view.php';            
            newsForm();
        ?>
        <br>
        <br>
        <?php                     
            twitForm();
        ?>
     </body>
</html>
