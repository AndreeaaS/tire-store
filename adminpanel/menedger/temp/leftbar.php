<?php defined('CHECK') or die('Access denied'); ?>
	<div class="content-main">
    <?php if($count_new_orders > 0): ?>
    <p class="new_orders"><a href="?view=new_orders">Присутствуют необработанные заказы (<?=$count_new_orders?>)</a></p>
    <?php endif; ?>
		<div class="leftBar">
			<ul class="nav-left">
				<li><a href="#" class="nav-activ">Основные страницы</a></li>
				<li><a href="#">Информеры</a></li>
				<li><a href="?view=brands">Основные категории</a></li>
                <!-- Аккордеон -->
                <ul class="left-bar__list" id="accordion">
                             <?php foreach($category as $key => $item): ?>
                                <?php if (count($item) > 1):  //Если это родительская категория ?>
                                <h3><li><a href="#"><?=$item[0]?></a></li></h3>
                                    <ul class="left-bar__list-sublist">
    									<li>- <a href="?view=category&number_category=<?=$key?>">Все модели</a></li>
                                        <?php foreach($item['sub'] as $key => $sub): ?>
                                            <li>- <a href="?view=category&number_category=<?=$key?>"><?=$sub?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                 <?php elseif($item[0]): // Если самостоятельная категория?> 
                                    <li> <a href="?view=category&number_category=<?=$key?>"><?=$item[0]?></a></li>  
                                <?php endif; ?>
                            <?php endforeach; ?>                                
                                   
			     </ul> 
                 <!-- Аккордеон -->
                
				<li><a href="#">Новости</a></li>
				<li><a href="#">Пользователи</a></li>
			</ul>
		</div> <!-- .leftBar -->