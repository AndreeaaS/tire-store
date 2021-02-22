<?php
defined('CHECK') or die ('Access denied');
?>


<div id="content__order">
			
           
<?php if($_SESSION['cart']):  // проверка корзины, если в ней что-то есть?>
<h2>Оформление заказа</h2>
<a href="?do=clear_cart" style="display: block; margin-top: -50px; " href=""><button style="float: right; margin-bottom: 10px; height: auto;" value="" name="" class="addtocart_submit" id="auth-button">Очистить корзину</button></a>
			<table class="content__order-main-table" border ="1" cellspacing="0" cellpadding="0">
				<form action="" method="post">
					<tr>
						<td class="z_top">&nbsp;&nbsp;&nbsp;&nbsp;наименование</td>
						<td class="z_top" aling="center">количество</td>
						<td class="z_top" align="center">стоимость</td>
						<td class="z_top" align="center">&nbsp;</td>
					</tr>
<?php foreach($_SESSION['cart'] as $key => $item): ?>
					<tr style="border: 1px solid #DEE7EC;">
						<td class="z_name">
                        <div class="product-line__img" style="width: 70px; text-align: center;">
							<a href="?view=product&goods_id=<?=$key?>"><img src="<?=TEMPLATE?>images/<?=$item['image']?>" title="<?=$item['name']?>" height="70px" /></a>
						</div>
                            <a href="?view=product&goods_id=<?=$key?>"><?=$item['name']?></a>
						</td>
						<td class="z_kol"><input id="id<?=$key?>" type="text" class="kolvo" value="<?=$item['qty']?>" name=""/></td>
						<td class="z_price"><?=$item['price']?></td>
						<td class="z_del"><a href="?view=cart&delete=<?=$key?>"><img src="<?=TEMPLATE?>images/delete.jpg" title="удалить товар из заказа" alt="удалить товар из заказа"/></a>
						</td>
					</tr>
<?php endforeach; ?>
				

				
					<tr>
						<td class="z_bot">&nbsp;&nbsp;&nbsp;&nbsp;Итого</td>
						<td class="z_bot" colspan="3" align="right"><?=$_SESSION['total_quantity']?> шт&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$_SESSION['total_sum']?> руб.</td>
						
					</tr>
				
			</table>
            <button style="" value="auth" name="auth" class="order_submit" id="auth-button">Быстрый заказ</button>
            <a href="index.php?view=checkout-order" style="margin-right: 40px; height: 20px; text-decoration: none;" class="order_submit" id="checkout-order">Оформить заказ</a>
            <a href="index.php?view=hits" style="float: left; display: block; text-decoration: none; height: 20px;"   class="order_submit" >Продолжить покупки</a> 
            
					<br><br><br><br>
    </form> 
			 
					
					
<?php else:  // если товаров нет?>
<?php echo $_SESSION['order']['success']; ?>
     <p style="margin-top: 20px; font:bold 20px Verdana,sans-serif; color: #00678C; text-align: center; ">Корзина пуста, <a class="goto_index" href="index.php?view=hits">перейти к просмотру товаров</a></p>
     <center><img style="margin-top: 1px;" src="<?=TEMPLATE?>images/empty-cart.jpg" alt="Корзина пуста" title="Корзина пуста" /></center>
<?php endif; // конец условия проверки корзины ?> 
		</div><!-- #content__order -->
        <?php unset($_SESSION['order']); ?>