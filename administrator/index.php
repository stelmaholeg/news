<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body> 
        <?php 
        session_start();
        
        if ($_SESSION['login'] == 'admin')
            echo 'Вы ввели неверную комбинацию логин/пароль!';
         session_destroy();
        ?>
        <form action="login.php" method="post">
            Логин<br>
            <input type="text" name="username"/><br>
            Пароль<br>
            <input type="password" name="pass"/><br>
            
            <input type="submit" value="Войти" name="login_button">
        </form>     
    </body>
</html>
