<?php

function twitter($count = 1){
    ini_set('display_errors', 1);
    require_once('TwitterAPIExchange.php');

    $settings = array(
        'oauth_access_token' => "742353644-sD3jbvlaR8Bi8q0Kl1dTvqmYswUr8910LBEGyoPU",
        'oauth_access_token_secret' => "I86O5rzzduYhJpTlvHNXib5aq9pptuI80D5sPdebI",
        'consumer_key' => "cPhL5vc6zrLZa76e62Ncw",
        'consumer_secret' => "YYSJvtJCONXiL495ZwCY6Y3z2SXGqkhaGzLIxiPw"
    );

    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $screen_name = 'MajestyTeam';
    //$count = 1;
    $getfield = "?screen_name=$screen_name&count=$count";
    $requestMethod = 'GET';
    $twitter = new TwitterAPIExchange($settings); 

    $twits = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
    $twits = json_decode($twits);
   
   //    print_r($obj);

    
    
    for($i = 0; $i < $count; $i++)
    {
      $result[$i]['date'] = date("Y-m-d H:i:s", strtotime($twits[$i]->{'created_at'}));
      $result[$i]['text'] =  $twits[$i]->{'text'};
      $result[$i]['author'] =  $screen_name;
      $result[$i]['title'] = "";
    }
   return $result;
}
?>
