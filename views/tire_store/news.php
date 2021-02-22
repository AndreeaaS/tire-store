<?php
defined('CHECK') or die ('Access denied');
?>

<div class="bread-crumbs">
    <a href="<?=PATH?>">Главная</a> / <span><?=$news_text['title']?></span>	
</div>	<!-- .bread-crumbs -->

<div class="center__content-txt" style="min-height: 800px;">
    <?php if($news_text): ?>
        <center><h1><?=$news_text['title']?></h1></center>
        <span class="news_date"><?=$news_text['date']?></span>
        <br /><br />
        <?=$news_text['text']?>
    <?php else: ?>
        <div class="error">Данной новости не существует!</div>
    <?php endif; ?>
</div> <!-- .center__content-txt-->