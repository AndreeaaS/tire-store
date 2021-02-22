<?php
defined('CHECK') or die ('Access denied');
?>

 <div class="center__catalog-index">
            <div class="bread-crumbs">
				
                <a href="<?=PATH?>">Главная</a> /  <span><?=$brand_name[0]['brand_name'];?></span>	
	        </div>	<!-- .bread-crumbs -->
                <?php switch($season){
            case('summer'):
                echo "<p style='color: #F2B111; padding-left: 15px; margin-top: -15px; font:25px Verdana, sans-serif; border-bottom: 1px solid #03A3DB; padding-bottom: 5px;'> Летние шины </p>";
            break;
            
            case('winter'):
                echo "<p style='color: #F2B111; padding-left: 15px; margin-top: -15px; font:25px Verdana, sans-serif; border-bottom: 1px solid #03A3DB; padding-bottom: 5px;'> Зимние шины  </p>";
            break;
        };
        if (!$_GET['season']){
        $get = getbrand($cat);
        echo "<p style='color: #F2B111; padding-left: 15px; margin-top: -15px; font:25px Verdana, sans-serif; border-bottom: 1px solid #03A3DB; padding-bottom: 5px;'> Шины ".$get." </p>";
        };
        ?>
                <div class="view-sort">
					Вид:
					<a style="cursor: pointer;" class="grid_list" id="view_grid" ><img id="view_grid1" src="<?=TEMPLATE?>images/vid-tabl.jpg" alt="Табличный вид" title="Табличный вид"/></a>
					<a style="cursor: pointer;" class="grid_list" id="view_list" ><img id="view_list1" src="<?=TEMPLATE?>images/vid-line.jpg" alt="Линейный вид" title="Линейный вид"/></a>
					&nbsp;&nbsp;
					Сортировать по:
                    <a id="param_order" class="sort__top" style="color: #F6C011;"><?=$order?></a>
                    <div id="sort__wrapper">
                    <?php foreach($order_p as $key => $value): ?>
                        <?php if($value[0] == $order) continue; ?>
                        <a href="?view=category&amp;number_category=<?=$cat?>&amp;season=<?=$season?>&amp;order_by=<?=$key?>&amp;current_page=<?=$current_page?>" class="sort__top"><?=$value[0]?></a>
                    <?php endforeach; ?>
                    
                    </div>
				
				</div> <!-- .view-sort -->
                

<?php //foreach($products as $product): ?>
<?php   if(!isset($_COOKIE['display'])) $_COOKIE['display'] == ('view_grid'); ?>  
        
        <!-- Табличный вид -->
        
                <div  id="catalog__product-table-block">
                <?php if($products): // если получены товары категории ?>
                
        <?php foreach($products as $product): ?>
        <?php $available = (int)$product['available']; ?>
         
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
					<p>Цена : <span><?=$product['price']?> руб.</span></p>
                    
                    <div>
                    
                    <?php if($available > 0): ?>
                    <?php
                        echo "<select id='select_number' name='select_count' oncahnge='this.form.submit()'>";
                    ?>
                            <?php for($i=1; $i<=$available; $i++):?>
   
                                <option value="<?=$i?>" <?php // if ($i == 4) {echo "selected";} ?>><?=$i?></option>;
                            <?php endfor;?>
                    <?php
                        echo "</select>";
                    ?>
                    <a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><button  value="" name="" class="addtocart_submit" id="auth-button">Добавить в корзину</button></a>
					<!-- <a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><img class="product-table__addtocard" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину" title="Добавить в корзину"/></a>-->
                    
                    <?php else: ?>
                <p><br/>Товар отсутствует в продаже</p>
                <?php endif; ?>
                
                    </div>
                    
                </div> <!-- .catalog_products-table -->
                <?php endforeach; ?>
                    <div style="clear: both;"><?php if($pages_count > 1) pagination($current_page, $pages_count); ?></div>
                <?php else: ?> 
    <p style="font:bold 20px Verdana,sans-serif; color: #00678C; text-align: center; ">Данной категории не существует, пока что...</p> 
<?php endif; ?>
          </div>      
         
        <!-- Конец вывода табличного вида --> 
       
       
       <!-- Линейный вид -->
       
       <div  id="catalog__product-line-block">
					<?php if($products): // если получены товары категории ?>
                        <?php foreach($products as $product): ?>
                        <?php $available = (int)$product['available']; ?>
            <div style="border-bottom: 1px solid #DEE7EC;" class="catalog__product-line">
                    <div class="product-line__img" style="width: 100px; text-align: center;">
						<a href="?view=product&goods_id=<?=$product['goods_id']?>"><img src="<?=TEMPLATE?>images/<?=$product['image']?>" title="<?=$product['name']?>" alt="<?=$product['name']?>"  height="113"/></a>
					</div>
					   <div class="product-line__price">
						  <p>Цена : <span><?=$product['price']?>.</span></p>
                          <?php if($available > 0): ?>
                           <a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><button value="" name="" class="addtocart_submit-mini" id="auth-button">Добавить в корзину</button></a>
			             <?php else: ?>
                        <p style="display: block; width: 150px;">Товар отсутствует<br /> в продаже</p>
                        <?php endif; ?>
                          <!--<a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><img src="<?=TEMPLATE?>images/addcard-table.jpg" class="product-line__price-addcard-table" alt="Добавить в корзину"/></a> -->
						      <div> <!-- Инонки -->
                                <?php if ($product['hits']) echo '<img src=" '.TEMPLATE.'images/ico-line-lider.jpg" alt="Лидеры продаж" title="Лидеры продаж"/>' ?>
                                <?php if ($product['new']) echo '<img src=" '.TEMPLATE.'images/ico-line-new.jpg" alt="Новинка" title="Новинка"/>' ?>
                                <?php if ($product['sale']) echo '<img src=" '.TEMPLATE.'images/ico-line-sale.jpg" alt="Распродажа" title="Распродажа"/>' ?>
								
							</div><!-- .Инонки -->
						  <p class="product-line__more"><a href="?view=product&goods_id=<?=$product['goods_id']?>">подробнее...</a></p>
					   </div>
				    <div class="product-line__description">
					   <h2><a href="?view=product&goods_id=<?=$product['goods_id']?>"><?=$product['name']?></a></h2>
					   <p><?=$product['anons']?></p>
					   
				    </div>
            </div>
                   <?php endforeach; ?>
                   <div style="clear: both;"><?php if($pages_count > 1) pagination($current_page, $pages_count); ?></div>
                 <?php else: ?> 
    <p style="font:bold 20px Verdana,sans-serif; color: #00678C; text-align: center; ">Данной категории не существует, пока что...</p> 
<?php endif; ?>  
        </div><!-- .catalog_products-line -->
       
         <!-- Конец вывода линейного вида -->
        
        </div> <!-- .center__catalog-index --> 