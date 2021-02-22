<?php defined('CHECK') or die('Access denied'); ?>
<div class="content">
	<h2>Просмотр заказа № <?=$order_id?></h2>

<?php if($show_order): ?>
<?php print_arr($show_order) ?>
<?php else: ?>
<div class="error">Заказа с данным номером не существует!</div>
<?php endif; ?>
	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>