<?php
//$cart = json_decode('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=Eminem&count=2');
//print_r($cart);

require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "742353644-sD3jbvlaR8Bi8q0Kl1dTvqmYswUr8910LBEGyoPU",
    'oauth_access_token_secret' => "I86O5rzzduYhJpTlvHNXib5aq9pptuI80D5sPdebI",
    'consumer_key' => "cPhL5vc6zrLZa76e62Ncw",
    'consumer_secret' => "YYSJvtJCONXiL495ZwCY6Y3z2SXGqkhaGzLIxiPw"
);



    $url = 'https://api.twitter.com/1.1/followers/list.json';
$getfield = '?username=Eminem&skip_status=1';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();  
 

/*
    // Инициализируем сеанс CURL
    $ch = curl_init( $url );
    
    // Запускаем CURL
    if( $ch )
    {
        // Устанавливаем опцию для того, чтобы результат не вывелся на экран, а занёсся в переменную
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        
        // Выполяем
        $json = curl_exec( $ch );
        
        // Загоняем всё в массив (array вначале нужен для указания типа, т.е. тип - массив)
        $json = (array) json_decode($json);
    
        echo $json["test1"];
    }
*/



?>
