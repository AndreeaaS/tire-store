

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Список страниц</h1>
		<a href="?view=add_page"><button value="" name="" class="add_button" >Добавить страницу</button></a>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?=ADMIN_TEMPLATE?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?=ADMIN_TEMPLATE?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<?php if($count_new_orders > 0): ?>
				<!--  start message-yellow -->
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">Системное сообщение. <a href="?view=new_orders">У Вас имеются необработанные заказы (<?=$count_new_orders?>)</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="<?=ADMIN_TEMPLATE?>images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				<?php endif; ?>
				
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					
					<th class="table-header-repeat line-left minwidth-1"><a href="">№</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Название страницы</a></th>
					<th class="table-header-repeat line-left"><a href="">Сортировка</a></th>
					
					
					<th class="table-header-options line-left"><a href="">Действие</a></th>
				</tr>
				<?php $i = 1; ?>

				<?php foreach ($pages as $item): ?>
				<tr>
					
					<td><?=$i?></td>
					<td><?=$item['title']?></td>
					<td><?=$item['position']?></td>
					
					
					<td class="options-width" style="text-align: center;">

					<a href="" title="Изменить" class="icon-1 info-tooltip"></a>
					<a href="" title="Удалить" class="del icon-2 info-tooltip"></a>
					
					</td>
				</tr>
				
				<?php $i++; ?>
     			<?php endforeach; ?>
				
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			
			
		
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>

	</table>
	
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    

 
</body>
</html>