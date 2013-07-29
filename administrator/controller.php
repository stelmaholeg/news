<?php
include "../head.php";
include 'model.php';
include "view.php";
view::menu();

function message(){
    session_start();        
    if ($_SESSION['login'] == 'guest')        
        die ('Вы ввели неверную комбинацию логин/пароль!');
    
    if ($_SESSION['flag_insert'])
            echo 'Данные успешно загружены в базу!';
    elseif($_SESSION['flag_old_twit'])        
            echo 'Твит(ы) с таким текстом уже есть в базе данных!';       
    session_destroy();
}

function addNews(){  
     view::newsForm();
     echo "<br> <br>";
     view::twitForm();
}

function editNews(){
    while($row = getNews()) {    
        echo "<h4>".$row['title']."</h4><br>";  
        echo $row['text']. "<br>";
        echo $row['author']. "<br>"; 
        echo $row['date']. "<br>";
    ?>
        <a href="#" onclick="$('#edit-form<?=$row['news_id']?>').toggle();">Редактировать</a>      
        <div id='edit-form<?=$row['news_id']?>' style="display: none"><?php newsForm("controller.php",$row);?></div>
        <hr>
    <?
    }
}

function login(){
     loginForm();
}

$loginTrue = false;
if (isset($_POST['login_button'])){
    $loginTrue = checkLogin();
}

message();

if ($_GET['task'] == 'addnews' || $loginTrue){
    addNews();
}

elseif ($_GET['task'] == 'editnews'){    
    editNews();
}

elseif($_GET['task'] == 'login')
{
    login();
}


elseif (isset($_POST['news_button'])){
    if (insertDB($_POST))//функция вернет TRUE если данные успешно добавленны
    {
        session_start();
        $_SESSION['flag_insert'] = TRUE;
        header('Location: ./controller.php?task=addnews');
    }
}

elseif (isset($_POST['twit_button'])){
    include('./twitter/twitter.php');
    if (!empty($_POST['twit_count']))
        $twits = twitter((int)$_POST['twit_count']);
    else
        $twits = twitter();
      
    foreach ($twits as $twit){
        if (isNew($twit['text']))
        {
            if (insertDB($twit)){
                session_start();
                $_SESSION['flag_insert'] = TRUE;               
            }
        }  else {
                session_start();
                $_SESSION['flag_insert'] = FALSE;
                $_SESSION['flag_old_twit'] = TRUE;
        }
    }
    header('Location: ./controller.php?task=addnews');
}

elseif(isset($_POST['edit_button']))
{
   updateDB($_POST);
   header('Location: ./controller.php?task=editnews');
}
 else {
     die('ошибка доступа');
}

include "../foot.php";
?>
