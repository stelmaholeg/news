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
            Заголовок<br>
            <input type="text" name="title"/><br>
            Автор<br>
            <input type="text" name="author"/><br>
            Дата<br>
            <input type="text" name="date"/><br>
            Текст статьи<br>
            <textarea name="text" cols="50" rows="10"/></textarea><br>
            <input type="submit" value="Отправить" name="news_button">
        </form>      
     </body>
</html>
