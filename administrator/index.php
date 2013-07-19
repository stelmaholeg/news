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
            echo 'Данные с формы успешно загруженны в базу!';
         session_destroy();
        ?>
        <form action="insert_data.php" method="post">
            <input type="text" name="title"/><br>
            <textarea name="text" cols="50" rows="10"/></textarea><br>
            <input type="submit" value="Отправить">
        </form>            
    </body>
</html>
