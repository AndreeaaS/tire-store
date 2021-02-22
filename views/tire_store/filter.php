<?php
defined('CHECK') or die ('Access denied');
?>
<div class="center__catalog-index" style="min-height: 800px;">

<h1 style="font-family: Verdana, sans-serif; color: #0067AE; font-weight: normal;">Подбор по параметрам</h1>
<?php if ($products['notfound']): // если ничего не найдено или ошибка?>
<?php echo $products['notfound']; ?>
<?php else: // если есть результаты поиска?> 
<!-- Табличный вид -->

<div  id="catalog__product-table-block-search" style="display: block;">

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
<p>Цена : <span><?=$product['price']?>.</span></p>
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
<a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><button value="" name="" class="addtocart_submit" id="auth-button">Добавить в корзину</button></a>
<!-- <a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><img class="product-table__addtocard" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину" title="Добавить в корзину"/></a>-->

<?php else: ?>
<p><br/>Товар отсутствует в продаже</p>
<?php endif; ?>

</div>

<!-- <a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><img class="product-table__addtocard" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину" title="Добавить в корзину"/></a>-->

</div> <!-- .catalog_products-table -->
<?php endforeach; ?>
<div style="clear: both;"><?php  if($pages_count > 1) pagination($current_page, $pages_count); ?></div> 

</div>      

<!-- Конец вывода табличного вида --> 
<?php endif; ?>
    </div> <!-- .center__catalog-index -->