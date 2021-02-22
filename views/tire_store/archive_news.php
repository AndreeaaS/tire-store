<?php
defined('CHECK') or die ('Access denied');
?>

<div class="bread-crumbs">
    <a href="<?=PATH?>">Главная</a> /  <span>Все новости</span>	
</div>	<!-- .bread-crumbs -->

<div class="center__content-txt" style="min-height: 800px;">
    <?php if($all_news): ?>
        <?php foreach($all_news as $item): ?>
            <h2><a href="?view=news&amp;news_id=<?=$item['news_id']?>"><?=$item['title']?></a></h2>
            <span class="news_date"><?=$item['date']?></span>
            <br /> <br />
            <?=$item['anons']?>
            <p><a href="?view=news&amp;news_id=<?=$item['news_id']?>">Подробнее...</a></p>
        <?php endforeach; ?>
        <?php if($pages_count > 1) pagination($current_page, $pages_count); ?>
    <?php else: ?>
        <div class="error">Новостей пока нет.</div>
    <?php endif; ?>
</div> <!-- .center__content-txt-->