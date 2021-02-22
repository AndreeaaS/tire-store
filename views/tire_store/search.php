<?php
defined('CHECK') or die ('Access denied');
?>
    <div class="center__catalog-index">
        <h1 style="font-family: Verdana, sans-serif; color: #0067AE; font-weight: normal;">Результаты поиска</h1>
        <?php if ($result_search['notfound']): // если ничего не найдено или ошибка?>
            <?php echo $result_search['notfound']; ?>
        <?php else: // если есть результаты поиска?> 
            <!-- Табличный вид -->
        <div class="view-sort">
					Вид:
					<a style="cursor: pointer;" class="grid_list" id="view_grid" ><img id="view_grid1" src="<?=TEMPLATE?>images/vid-tabl.jpg" alt="Табличный вид" title="Табличный вид"/></a>
					<!-- <a style="cursor: pointer;" class="grid_list" id="view_list" ><img id="view_list1" src="<?=TEMPLATE?>images/vid-line.jpg" alt="Линейный вид" title="Линейный вид"/></a> -->
					&nbsp;&nbsp;
					Сортировать по:
                    <a id="param_order" class="sort__top" style="color: #F6C011;"><?=$order?></a>
                    <div id="sort__wrapper">
                    <?php foreach($order_p as $key => $value): ?>
                        <?php if($value[0] == $order) continue; ?>
                        <a href="?view=search&amp;search=<?=$_GET['search']?>&amp;order_by=<?=$key?>&amp;current_page=<?=$current_page?>" class="sort__top"><?=$value[0]?></a>
                    <?php endforeach; ?>
                    
                    </div>
				
				</div> <!-- .view-sort -->
                <div  id="catalog__product-table-block-search" style="display: block;">
                
        <?php foreach($result_search as $product): ?>
        <div class="catalog__product-table">
					<h2><a href="?view=product&goods_id=<?=$product['goods_id']?>"><?=$product['name']?></a></h2>	
					<div class="product-table__img-main">
						<div class="product-table__img">
							<a href="?view=product&goods_id=<?=$product['goods_id']?>"><img src="<?=TEMPLATE?>images/<?=$product['image']?>" title="<?=$product['name']?>" alt="<?=$product['name']?>"  height="113" /></a>
							<div> <!-- Инонки -->
                                <?php if ($product['hits']) echo '<img src=" '.TEMPLATE.'images/ico-cat-lider.png" alt="Лидеры продаж" title="Лидеры продаж"/>' ?>
                                <?php if ($product['new']) echo '<img src=" '.TEMPLATE.'images/ico-cat-new.png" alt="Новинка" title="Новинка"/>' ?>
                                <?php if ($product['sale']) echo '<img src=" '.TEMPLATE.'images/ico-cat-sale.png" alt="Распродажа" title="Распродажа"/>' ?>
								
							</div><!-- .Инонки -->
						</div>
					</div>
					<p class="product-table__more"><a href="?view=product&goods_id=<?=$product['goods_id']?>">подробнее...</a></p>
					<p>Цена : <span><?=$product['price']?>.</span></p>
                    <a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><button value="" name="" class="addtocart_submit" id="auth-button">Добавить в корзину</button></a>
					<!-- <a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><img class="product-table__addtocard" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину" title="Добавить в корзину"/></a>-->
               
                </div> <!-- .catalog_products-table -->
                <?php endforeach; ?>
                     <div style="clear: both;"><?php  if($pages_count > 1) pagination($current_page, $pages_count); ?></div> 
                
          </div>      
         
        <!-- Конец вывода табличного вида --> 
        <?php endif; ?>
    </div> <!-- .center__catalog-index -->