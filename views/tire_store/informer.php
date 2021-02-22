
<?php
defined('CHECK') or die ('Access denied');
?>

<div class="bread-crumbs">
    <a href="<?=PATH?>">Главная</a> / <span><?=$text_informer['informer_name']?></span> / <span><?=$text_informer['link_name']?></span>	
</div>	<!-- .bread-crumbs -->

<div class="center__content-txt">
    <?php if($text_informer): ?>
        <h1><?=$text_informer['link_name']?></h1>
        <?=$text_informer['text']?>
    <?php else: ?>
        <div class="error">Данной страницы не существует!</div>
    <?php endif; ?>
</div> <!-- .center__content-txt-->