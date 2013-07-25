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
            echo 'Данные успешно загруженны в базу!';
        elseif($_SESSION['flag_old_twit'])        
             echo 'Твит(ы) с таким текстом уже есть в базе данных!';             
        session_destroy();
        ?>
        <div>
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
        </div>
        
        <br>
        <br>
        <form action="insert_data.php" method="post">  
            <legend>Считать твитты</legend>
            Количество последних твиттов<br>
            <input type="text" name="twit_count" value="1"><br>
            <input type="submit" value="Дабавить твит" name="twit_button">
        </form> 
        </div>    

     </body>
</html>
