<?php defined('CHECK') or die('Access denied'); ?>
<div class="content">
	
<h2>Добавление категории</h2>
<?php
if(isset($_SESSION['add_brand']['res'])){
    echo $_SESSION['add_brand']['res'];
    unset($_SESSION['add_brand']);
}

?>

<form action="" method="post">
				
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название категории:</td>
		<td><input class="head-text" type="text" name="brand_name" /></td>
	  </tr>
      <tr>
		
	</table>
	
	<input style="margin-top: 10px;" type="image" src="<?=ADMIN_TEMPLATE?>images/save_btn.jpg" /> 



</form>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>