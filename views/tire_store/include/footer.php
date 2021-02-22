<?php
defined('CHECK') or die ('Access denied');
?>

<footer style="width: 1200px; margin: 0 auto;">
<div class="footer-block">
	<div class="footer__bottom-line"></div>
<div class="footer__left-block-list">
	<h4 class="left-block-list__item left-block-list__item1">Служба поддержки</h4>
	<h3 class="left-block-list__item left-block-list__item2">8 (904) 131-03-99</h3>
	<p class="left-block-list__item left-block-list__item3">
		Режим работы:<br/>
		Будние дни: с 9:00 до 18:00<br/>
		Суббота, воскресенье - выходной
	</p>
</div>

<div class="footer__main-block">
	<p class="main-block__paragraph">Сервис и Помощь</p>
	<ul class="main-block__main-list">
    <?php //print_arr($pages); ?>
    <?php for ($i = 0; $i <=2; $i++): ?>
        <li class="main-list__item"><a class="main-list__link" href="?view=page&amp;page_id=<?=$pages[$i]['page_id']?>"><?=$pages[$i]['title']?></a></li>
    <?php endfor; ?>
	</ul>
</div>

<div class="footer__main-block">
	<p class="main-block__paragraph">О компании:</p>
	<ul class="main-block__main-list">
    <?php for ($i = 3; $i <=5; $i++): ?>
        <li class="main-list__item"><a class="main-list__link" href="?view=page&amp;page_id=<?=$pages[$i]['page_id']?>"><?=$pages[$i]['title']?></a></li>
    <?php endfor; ?>
	</ul>
</div>

<div class="footer__main-block footer__main-block_last">
	<p class="main-block__paragraph">Навигация:</p>
	<ul class="main-block__main-list">
		<li class="main-list__item"><a class="main-list__link" href="<?=PATH?>">Главная страница</a></li>
		<li class="main-list__item"><a class="main-list__link" href="">Обратная связь</a></li>
	</ul>
	<p class="main-block__paragraph">Рассказать о сайте:</p>
	
	<!-- Pluso скрипт вставки иконок социальных сетей -->
	<script type="text/javascript">(function() {
  		if (window.pluso)if (typeof window.pluso.start == "function") return;
  			if (window.ifpluso==undefined) { window.ifpluso = 1;
   				var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    				s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    					s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
   							var h=d[g]('body')[0];
    							h.appendChild(s);
  									}})();</script>
										<div class="pluso" data-background="transparent" data-options="small,round,line,horizontal,nocounter,theme=08" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print"></div>
	<!-- -->									
</div>




</div>
</footer>