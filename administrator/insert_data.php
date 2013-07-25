<?php



function insertDB($article)    
{
    if ($article['date'] == "")
        $article['date'] = date("Y-m-d H:i:s");
    include "../mysql_connect.php";
    try{
       
       $insert_query = "INSERT INTO news 
              (title, text, author, date)  VALUES 
              ('$article[title]', '$article[text]','$article[author]','$article[date]')";
     
       $rows = $db->exec($insert_query);
       
       $error_array = $db->errorInfo(); 
       if($db->errorCode() != 0000) 
           return FALSE; 
    }
    catch(PDOException $e)
    {
        return FALSE;
    }
    
    return TRUE;
}
//else {
//     die('ошибка доступа');
//}

function isNew($text)
{
    include "../mysql_connect.php";
    try {
        $select_query = "SELECT * FROM news WHERE text='".$text."'";        
	$rows = $db->query($select_query);        
	$error_array = $db->errorInfo(); 
	if($db->errorCode() != 0000) 
            echo "SQL ошибка: " . $error_array[2] . '<br />';                       
    }
    catch(PDOException $e){
            die("Error: ".$e->getMessage());
    }
    
    if ($rows->rowCount() != 0){   
        return FALSE;
    }
    else {
         return TRUE;
    }
}

if (isset($_POST['news_button'])){
    if (insertDB($_POST))//функция вернет TRUE если данные успешно добавленны
    {
        session_start();
        $_SESSION['flag_insert'] = TRUE;
        header('Location: ./add-news.php');
    }
}elseif (isset($_POST['twit_button'])){
    include('../twitter/index.php');
    $twits = twitter((int)$_POST['twit_count']);
    echo "<pre>";
    print_r($twit);            
    echo "</pre>";
    
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
    header('Location: ./add-news.php');
}


?>
