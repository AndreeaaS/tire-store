<?php defined('CHECK') or die('Access denied'); ?>
<div class="content">
	<h2>Необработанные заказы</h2>

<?php if($new_orders): ?>
<table class="tabl" cellspacing="1">
    <tr>
        <th class="number">№ заказа</th>
        <th class="str_name" style="width:280px;">Покупатель</th>
        <th class="str_sort">Дата</th>
        <th class="str_action">Действие</th>
    </tr>
<?php foreach($new_orders as $item): ?>
<tr>
    <td><?=$item['order_id']?></td>
    <td class="name_page"><?=$item['name']?></td>
    <td><?=$item['order_date']?></td>
    <td><a href="?view=show_order&amp;order_id=<?=$item['order_id']?>" class="edit">Просмотр</a></td>
</tr>
<?php endforeach; ?>
</table>
<?php else: ?>
<div class="success">Необработанных заказов не наблюдается.</div>
<?php endif; ?>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>