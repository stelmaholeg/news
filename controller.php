<?php
include './head.php';
include './administrator/model.php';
include './administrator/view.php';

class constructorSite
{
    function viewArticle($id)
    {
        $news_id = $_GET['article'];
        $rows = model::getNews();

        for ($i = 0; $i < count($rows); $i++){
            
            if ($rows[$i]['news_id'] == $news_id)
            {
                if ($i > 0)
                    $prev = $rows[$i-1]['news_id'];
                if ($i < count($rows) - 1);
                    $next = $rows[$i+1]['news_id'];

                view::viewArticle($rows[$i], $prev, $next);
                break;
            }
        }
    }
};

if (isset($_GET['article']))
    constructorSite::viewArticle($_GET['article']);


include './foot.php'
?>
