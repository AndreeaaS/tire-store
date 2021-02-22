<?php
defined('CHECK') or die ('Access denied');
?>

<div class="bread-crumbs">
    <a href="<?=PATH?>">Главная</a> / <span><?=$get_page['title']?></span>	
</div>	<!-- .bread-crumbs -->

<div class="center__content-txt" style="min-height: 800px;">
    <?php if($get_page): ?>
        <center><h1><?=$get_page['title']?></h1></center>
        <?=$get_page['text']?>
    <?php else: ?>
        <div class="error">Данной страницы не существует!</div>
    <?php endif; ?>
</div> <!-- .center__content-txt-->