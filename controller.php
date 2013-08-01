<?php
include './head.php';
include './administrator/model.php';
include './administrator/view.php';
$news_id = $_GET['article'];

$row = model::getArticle($news_id);
view::viewArticle($row);
include './foot.php'
?>
