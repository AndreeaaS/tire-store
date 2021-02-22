<?php
defined('CHECK') or die ('Access denied');
?>

<?php if($goods): //если есть запрошенный товар ?>
            <div class="bread-crumbs">
				<a href="<?=PATH?>">Главная</a> / <a href="?view=category&number_category=<?=$brand_name[0]['brand_id']?>"><?=$brand_name[0]['brand_name']?></a> / <span><?= $goods['full_name'];?></span>	
	        </div>	<!-- .bread-crumbs -->


<div class="center__catalog-detail" style="min-height: 700px;">
    <?php //print_arr($goods); ?>
				<h1 style="margin-left: 13px;"><?= $goods['full_name'];?></h1>

				<?php $available = (int)$goods['available']; ?>
						
					<div id="wrapper-page" style="width: 200px; height: 220px; float: left;;">
						<center><img src="<?=TEMPLATE?>images/big/<?=$goods['big_image'];?>" height="220" alt="<?= $goods['full_name'];?>" title="<?= $goods['full_name'];?>"/></center>
					</div>	
	
                
				<div class="catalog-detail__icon-detail">
				<?php if ($goods['new']) echo	'<img src="'.TEMPLATE.'images/ico-det-new.jpg" alt="Новинка" title="Новинка"/>' ?>
				<?php if ($goods['hits']) echo	'<img src="'.TEMPLATE.'images/ico-det-lider.jpg" alt="Лидер продаж" title="Лидер продаж"/>' ?>
				<?php if ($goods['sale']) echo	'<img src="'.TEMPLATE.'images/ico-det-sale.jpg" alt="Распродажа" title="Распродажа"/> ' ?>
				</div>

				<div class="catalog-detail__short-description">
					<?=$goods['anons'];?>
                    <strong>Ширина</strong> ... <?=$goods['width'];?> мм<br/><br/>
                    <strong>Высота</strong>  ... <?=$goods['height'];?> %<br/><br/>
                    <strong>Диаметр</strong> ... <?=$goods['Radius'];?>'<br/><br/>
                    <strong>Сезон</strong> ... <?=$goods['season'];?> <br/><br/>
                    <strong>В наличии</strong> : <?=$goods['available'];?> шт.
				<p class="catalog-detail__price-detail">Цена : <span><?=$goods['price'];?> руб.</span></p>
                
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
				<a href="?view=addtocart&goods_id=<?=$goods['goods_id']?>"><button value="" name="" class="addtocart_submit" id="addtocart_button">Добавить в корзину</button></a>
				<?php else: ?>
                <p>Товар отсутствует в продаже</p>
                <?php endif; ?>
                </div>
				
				<div class="clear"></div>
    <ul class="tabs">
        <li><a class="active" href="#">Описание</a></li>
        <li><a href="#">Характеристики</a></li>
        <li><a href="#">Отзывы</a></li>
    </ul>
    
    <div class="tabs_content">
    
    <div><?=$goods['description']?></div>
    <div><strong>Ширина</strong> ... <?=$goods['width'];?> мм<br/><br/>
                    <strong>Высота</strong>  ... <?=$goods['height'];?> %<br/><br/>
                    <strong>Диаметр</strong> ... <?=$goods['Radius'];?>'<br/><br/>
                    <strong>Сезон</strong> ... <?=$goods['season'];?> <br/><br/>
                    <strong>В наличии</strong> : <?=$goods['available'];?> шт.
				</div>
    <div></div>
    
    </div>

</div> <!-- .center__catalog-detail -->
<?php else : ?>
<div class="center__catalog-detail">
    <div style="margin: 20px 50px;" class="error">К сожалению, данного товара не существует!</div>
    </div> <!-- .center__catalog-detail -->
<?php endif; ?>