<?php defined('CHECK') or die('Access denied'); ?>
<div class="content">
	<h2>Добавление товара</h2>
<?php
if(isset($_SESSION['add_product']['res'])){
    echo $_SESSION['add_product']['res'];
}
?>

<form action="" method="post" enctype="multipart/form-data">
				
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название товара:</td>
		<td><input class="head-text" type="text" name="name" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена:</td>
		<td><input class="head-text" type="text" name="price" value="<?=$_SESSION['add_product']['price']?>" /></td>
	  </tr>
       <tr>
		<td class="add-edit-txt">Ключевые слова</td>
		<td><input class="head-text" type="text" name="keywords" value="<?=$_SESSION['add_product']['keywords']?>"/></td>
	  </tr>
       <tr>
		<td class="add-edit-txt">Описание:</td>
		<td><input class="head-text" type="text" name="description" value="<?=$_SESSION['add_product']['description']?>"/></td>
	  </tr>
      
      <tr>
		<td class="add-edit-txt">Ширина:</td>
		<td><input style="width: 40px;" class="head-text" type="text" name="width" value="<?=$_SESSION['add_product']['width']?>"/></td>
	  </tr>
      
      <tr>
		<td class="add-edit-txt">Высота:</td>
		<td><input style="width: 40px;" class="head-text" type="text" name="height" value="<?=$_SESSION['add_product']['height']?>"/></td>
	  </tr>
      
      <tr>
		<td class="add-edit-txt">Диаметр</td>
		<td><input style="width: 40px;" class="head-text" type="text" name="Radius" value="<?=$_SESSION['add_product']['Radius']?>"/></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Наличие</td>
		<td><input style="width: 40px;" class="head-text" type="text" name="available" /></td>
	  </tr>
      
      <tr>
		<td class="add-edit-txt">Сезон</td>
		<td><select style="width: 80px; padding: 4px;" name="season">
            <option value="summer">Лето</option>
            <option value="winter">Зима</option>
        </select></td>
	  </tr>
      <tr>
		<td>Категория:</td>
		<td>
        <?php //print_arr($category); ?> 
        <select class="select-inf" name="category" multiple="" size="10" style="height: auto;">
        	
            <?php foreach($category as $key => $item): ?>
               
                <?php if($item[0]): // если самостоятельная категория ?>
                <option <?php if($key == $brand_id) echo "selected" ?> value="<?=$key?>"><?=$item[0]?></option>
                <?php endif; // конец условия самостоятельная категория ?>
            <?php endforeach; ?>
        </select>
        </td>
	  </tr> 
       <tr>
		<td>Картинка товара:</td>
		<td><input type="file" name="baseimg" /></td>
	  </tr>
      <tr>
		<td>Краткое описание:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea id="editor1" class="anons-text" name="anons"><?=$_SESSION['add_product']['anons']?></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1' );
</script>
		</td>
	  </tr>
      <tr>
		<td>Подробное описание:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea id="editor2" class="anons-text" name="content"><?=$_SESSION['add_product']['content']?></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor2' );
</script>
		</td>
	  </tr>
      <!--<tr>
        <td>Картинки галереи:</td>
        <td></td>
      </tr>  
      <tr>
        <td id="btnimg">
            <div><input type="file" name="galleryimg[]" /></div>
        </td>
      </tr>
      <tr>
        <td>
            <input type="button" id="add" value="Добавить поле" />
            <input type="button" id="del" value="Удалить поле" />
        </td>
      </tr> -->
      <tr> 
        <td>Отметить как:</td>
        <td><input type="checkbox" name="new" value="1" /> Новинка <br />
        	<input type="checkbox" name="hits" value="1" /> Лидер продаж <br />
            <input type="checkbox" name="sale" value="1" /> Распродажа <br /></td>
      </tr>
      </tr>
      <tr>
        <td>Показывать:</td>
        <td><input type="radio" name="visible" value="1" checked="" /> Да <br />
        <input type="radio" name="visible" value="0" /> Нет</td>
      </tr>  
	</table>
	
	<input type="image" src="<?=ADMIN_TEMPLATE?>images/save_btn.jpg" /> 
</form>
<?php unset($_SESSION['add_product']); ?>	
	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>