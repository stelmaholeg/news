<?php
include "../head.php";
include 'model.php';
include "view.php";


function addNews()
{      
    if (isset($_POST['news_button'])){
        if (model::insertDB($_POST))//функция вернет TRUE если данные успешно добавленны
        {
            session_start();
            $_SESSION['flag_insert'] = TRUE;
            header('Location: ./controller.php?task=addnews');
        }
        unset($_POST);
    }
    
    view::newsForm();
    echo "<br> <br>";
    view::twitForm();
}

function editNews()
{
    if(isset($_POST['news_button']))
    {
       model::updateDB($_POST);
       header('Location: ./controller.php?task=editnews');
       unset($_POST);
    } 
    $rows = model::getNews();
    foreach ($rows as $row){  
        view::editNews($row);
    }
}

function login()
{    
    if (isset($_POST['login_button'])){
        $loginTrue = model::checkLogin();
        if ($loginTrue){
            //если ввели правильные данные пперенаправляем пользователя в админку
            session_start();  
            $_SESSION['login'] = 'admin';
            header('Location: ./controller.php?task=addnews');
        }
        else{
            //если ввели неправильные данные выводим сообщение и остаемся на той же странице
            echo "Вы ввели неверные данные";
        }
    }
    view::loginForm();
     
}

function logout()
{
    session_start();   
    $_SESSION['login'] = 'guest';     
    session_destroy();   
    header('Location: ./controller.php?task=login');
}

function twit()
{
    if (isset($_POST['twit_button'])){
        include('./twitter/twitter.php');
        if (!empty($_POST['twit_count']))
            $twits = twitter((int)$_POST['twit_count']);
        else
            $twits = twitter();
        foreach ($twits as $twit) {
            if (isNew($twit['text'])) {
                if (insertDB($twit)) {
                    session_start();
                    $_SESSION['flag_insert'] = TRUE;               
                }
            } else {
                session_start();
                $_SESSION['flag_insert'] = FALSE;
                $_SESSION['flag_old_twit'] = TRUE;
            }
        }
        header('Location: ./controller.php?task=addnews');
    }
}

function del()
{
    $del_ok = model::delNews();
    if ($del_ok){
        session_start();
        $_SESSION['del'] = "ok";        
        header('Location: ./controller.php?task=editnews');
    }else{
        session_start();
        $_SESSION['del'] = "error";       
        header('Location: ./controller.php?task=editnews');
    }    
}

session_start();   
if ($_SESSION['login'] == 'admin')
{
    view::menu();      
    view::message();
    
    switch ($_GET['task']){
        case 'logout':  
            logout(); break;
        case 'editnews': 
            editNews(); break;
        case 'twit':  
            twit(); break;
        case 'addnews': 
            addNews(); break;
        case 'del':
            del(); break;
        default:
            die ('Ошибка вызова метода');
    }
}
else 
{
     login();
}

include "../foot.php";
?>
