<?php
defined('CHECK') or die ('Access denied');
?>
<!-- Блок левого бара -->
		<div id="content__left-bar">
			<div class="left-bar__cont">
                    <!-- Меню категорий -->
                    <h4><span> Производители</span></h4> 
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
                    <!-- Меню категорий -->
                        
                        <div class="right-block__block-news" style="text-align: center;">
            <center><img id="block-news__img1" src="<?=TEMPLATE?>images/img-prev.png" alt=""></center>
	<div id="block-news__newsticker">
		<ul class="newsticker__news-list">
			<!-- Запрос к БД на вывод новостей -->
			<?php
				$query = mysql_query("SELECT * FROM news 
                                        ORDER BY date DESC");
				if (mysql_num_rows($query) > 0) //проверка результата запроса
				{
				$row = mysql_fetch_array($query); //создается переменная, в которую помещаются выбранные в запросе товары
				//цикл вывода товаров с БД
				do {

					echo '

					<li class="news-list__item">
					<span class="news-list__item-date">'.$row["date"].'</span>
					<a class="news-list__item-link" href="?view=news&amp;news_id='.$row["news_id"].'">'.$row["title"].'</a>
					<p class="news-list__item-description">'.$row["anons"].'</p>
					</li>
					
					';
				}

				while ($row = mysql_fetch_array($query)); //пока в переменной что-то есть
				}
                
                else{
                    echo '<p>В данный момент новостей нет.</p>'; 
                };
			

			?>

		</ul>
	</div>
	<center><img id="block-news__img2" src="<?=TEMPLATE?>images/img-next.png" alt=""/></center>
        <center><a href="?view=archive_news" class="news__button">Все новости</a></center>
    </div> <!-- .right-block__block-news -->
                        
                        <!-- Информеры -->
                        <?//php foreach($informers as $informer): ?>
                           <!-- <div class="left-bar__info">-->
                              <!--  <h3><?=$informer[0]?></h3>-->
                                <?php // foreach($informer['sub'] as $key => $sub) : ?>
                                   <!--  <p class="lol">- <a href="?view=informer&informer_id=<?=$key?>"><?=$sub?></a></p>-->
                                <?php //endforeach;?>
                            </div> <!-- .left-bar_info -->
                        <?php // endforeach;?>
						
                        <!-- Информеры -->
			</div>
		</div>