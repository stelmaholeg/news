<?php
class view{
        static function menu(){
            ?>
                <div style="fixed">
                    <a href="./controller.php?task=addnews">Добавить новость</a> |
                    <a href="./controller.php?task=editnews">Редактировать новости</a>
                </div>
            <?
        }
        static function newsForm($form_action = "controller.php", $values = null)
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
            <form action="controller.php" method="post">
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
         <form action="controller.php" method="post">  
            <legend>Считать твитты</legend>
            Количество последних твиттов<br>
            <input type="text" name="twit_count" value="1"><br>
            <input type="submit" value="Дабавить твит" name="twit_button">
        </form> 
        <?            
        }
}
?>
