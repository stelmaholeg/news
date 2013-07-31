<?php
class view{
        static function menu(){
            ?>
                <div style="fixed">
                    <a href="./controller.php?task=addnews">Добавить новость</a> |
                    <a href="./controller.php?task=editnews">Редактировать новости</a>
                    <a style="float:right" href="./controller.php?task=logout">Выход</a>
                    <div style="clear:both"></div>
                </div>

            <?
        }
        static function newsForm($form_action = "controller.php?task=addnews", $values = null)
        {
            ?>
                <div>
                    <form action="<?=$form_action;?>" method="post">
                        <input type="hidden" name="news_id" value="<?=$values['news_id']?>"/><br>
                        Заголовок<br>
                        <input type="text" name="title" value="<?=$values['title']?>"/><br>
                        Автор<br>
                        <input type="text" name="author" value="<?=$values['author']?>"/><br>
                        Дата<br>
                        <input type="text" name="date" value="<?=$values['date']?>"/><br>
                        Текст статьи<br>
                        <textarea name="text" cols="50" rows="10"/><?=$values['text']?></textarea><br>
                        <input type="submit" value="Отправить" name="news_button">
                    </form> 
                 </div>
            <?            
         }
         
         static function loginForm()
         {
            ?>
            <form action="controller.php?task=login" method="post">
                Логин<br>
                <input type="text" name="username"/><br>
                Пароль<br>
                <input type="password" name="pass"/><br>           
                <input type="submit" value="Войти" name="login_button">
            </form>  
            <?            
         }
         
         static function twitForm()
         {
         ?>
         <form action="controller.php?task=twit" method="post">  
            <legend>Считать твитты</legend>
            Количество последних твиттов<br>
            <input type="text" name="twit_count" value="1"><br>
            <input type="submit" value="Дабавить твит" name="twit_button">
        </form> 
        <?            
        }        
        
        static function message(){
            session_start();        
            if ($_SESSION['login'] == 'guest')        
                die ('Вы ввели неверную комбинацию логин/пароль!');

            if ($_SESSION['flag_insert'])
            {
                echo 'Данные успешно загружены в базу!';
                unset($_SESSION['flag_insert']);
            }
            elseif($_SESSION['flag_old_twit']){        
                echo 'Твит(ы) с таким текстом уже есть в базе данных!';  
                unset($_SESSION['flag_old_twit']);
            }
            
            if ($_SESSION['flag_del'] == "ok")            
                echo "запись была успешно удалена";
            elseif ($_SESSION['flag_del'] == "error")
                echo "не удалось удалить запись из базы данных";            
            unset($_SESSION['flag_del']);
        }
        
        static function editNews($row){
            echo "<h4>".$row['title']."</h4><br>";  
            echo $row['text']. "<br>";
            echo $row['author']. "<br>"; 
            echo $row['date']. "<br>";
            ?>
            <form action="./model.php?task=del" method="post">
                <input type="hidden" name='news_id' value="<?=$row['news_id']?>">
                <input type="submit" name='del_button' value="Удалить">
            </form>    
            <a href="#" onclick="$('#edit-form<?=$row['news_id']?>').toggle();">Редактировать</a>   
            <div id='edit-form<?=$row['news_id']?>' style="display: none"><?php view::newsForm("controller.php?task=editnews",$row);?></div>
            <hr>
            <?
        }
}
?>
