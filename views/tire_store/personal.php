<?php
defined('CHECK') or die ('Access denied');
?>


<div id="content__order">
			
           

<h2>Личный кабинет. <?=$_SESSION['auth']['user_second_name']?> <?=$_SESSION['auth']['user']?></h2>

		<h2 style="font-family: Verdana, sans-serif; font-weight: normal; margin-top: 40px;">Состав заказа</h2><br/>
            <div class="checkout-order__top-line"></div>
    	<table class="content__order-main-table"  cellspacing="0" cellpadding="0">
                    <tr>
						<td class="z_top">&nbsp;&nbsp;&nbsp;&nbsp;наименование</td>
						<td class="z_top" aling="center">количество</td>
						<td class="z_top" align="center">стоимость</td>
						<td class="z_top" align="center">&nbsp;</td>
					</tr>
    
					<tr style="border: 1px solid #DEE7EC;">
						<td class="z_name">
                        <div class="product-line__img" style="width: 70px; text-align: center;">
							<a href="?view=product&goods_id=<?=$key?>"><img src="<?=TEMPLATE?>images/<?=$item['image']?>" title="<?=$item['name']?>" height="70px" /></a>
						</div>
                            <a href="?view=product&goods_id=<?=$key?>"><?=$item['name']?></a>
						</td>
						<td class="z_kol"><?=$item['qty']?></td>
						<td class="z_price"><?=$item['price']?></td>
					<!-- 	<td class="z_del"><a href="?view=cart&delete=<?=$key?>"><img src="<?=TEMPLATE?>images/delete.jpg" title="удалить товар из заказа" alt="удалить товар из заказа"/></a> -->
						</td>
                        
					</tr>
                 
                    <tr >
						<td class="z_bot">&nbsp;&nbsp;&nbsp;&nbsp;Итого</td>
						<td class="z_bot" colspan="2" align="right"><?=$_SESSION['total_quantity']?> шт&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$_SESSION['total_sum']?> руб.</td>
						<td class="z_bot" align="center">&nbsp;</td>
					</tr>
        </table>	
			 
					
					

