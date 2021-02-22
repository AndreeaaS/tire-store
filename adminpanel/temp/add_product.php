<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Добавление товара</h1></div>

<?php
if(isset($_SESSION['add_product']['res'])){
    echo $_SESSION['add_product']['res'];
}
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		
	<form action="" method="post" enctype="multipart/form-data">
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Название товара:</th>
			<td><input type="text" class="inp-form" name="name" /></td>
			<td></td>
		</tr>

		<tr>
			<th valign="top">Цена:</th>
			<td><input type="text" class="inp-form_size" name="price" value="<?=$_SESSION['add_product']['price']?>"/></td>
			<td></td>
		</tr>

		<tr>
		<th valign="top">Category:</th>
		<td>	
		<select  class="styledselect_form_1" name="category">
			<?php foreach($category as $key => $item): ?>
               
                <?php if($item[0]): // если самостоятельная категория ?>
                	 <option <?php if($key == $brand_id) echo "selected" ?> value="<?=$key?>"><?=$item[0]?></option>
                <?php endif; // конец условия самостоятельная категория ?>
            <?php endforeach; ?>
			
		</select>
		</td>
		<td></td>
		</tr>

		<tr>
			<th valign="top">Ключевые слова:</th>
			<td><input type="text" class="inp-form" name="keywords" value="<?=$_SESSION['add_product']['keywords']?>"/></td>
			<td></td>
		</tr>

		
		<tr>
			<th valign="top">Ширина:</th>
			<td><input type="text" class="inp-form_size" name="width" value="<?=$_SESSION['add_product']['width']?>"/></td>
			<td></td>
		</tr>

		<tr>
			<th valign="top">Высота:</th>
			<td><input type="text" class="inp-form_size" name="height" value="<?=$_SESSION['add_product']['height']?>"/></td>
			<td></td>
		</tr>

		<tr>
			<th valign="top">Диаметр:</th>
			<td><input type="text" class="inp-form_size" name="Radius" value="<?=$_SESSION['add_product']['Radius']?>"/></td>
			<td></td>
		</tr>

		<tr>
			<th valign="top">Наличие:</th>
			<td><input type="text" class="inp-form_size" name="available" /></td>
			<td></td>
		</tr>
		
		
		<tr>
		<th valign="top">Сезон:</th>
		<td>	
		<select  class="styledselect_form_1" name="season">
			<option value="summer">Лето</option>
            <option value="winter">Зима</option>
		</select>
		</td>
		<td></td>
		</tr> 
		
		<tr>
		<th valign="top">Описание:</th>
		<td><textarea rows="" cols="" id="editor1" class="form-textarea" name="description" value="<?=$_SESSION['add_product']['description']?>"></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1' );
</script>
		</td>
		<td></td>
	</tr>
		
	
	<tr>
	<th>Картинка товара:</th>
	<td><input type="file" class="file_1" /></td>
	
	</tr>

	<tr>
			<th valign="top">Отметить как:</th>
			<td><input  type="checkbox" name="new" value="1" /> Новинка <br /><br />
        	<input type="checkbox" name="hits" value="1" /> Лидер продаж <br /><br />
            <input type="checkbox" name="sale" value="1" /> Распродажа <br /></td>
			<td></td>
		</tr>

	<tr>
		<th valign="top">Показывать:</th>
		<td>	
		<select  class="styledselect_form_1" name="visible">
			<option value="1">Да</option>
            <option value="0">Нет</option>
		</select>
		</td>
		<td></td>
	</tr> 
	
		<th>&nbsp;</th>
		<td valign="top">
			<button value="" style="margin-top: 10px; margin-left: -3px;" name="" class="add_button" >Сохранить</button>
			

		</td>
		<td></td>
	</tr>
	</table>
	<!-- end id-form  -->
	</form>
	</td>
	<td>

	

</td>
</tr>

</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
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
<!--  end content-outer -->

 <?php unset($_SESSION['add_product']); ?>

<div class="clear">&nbsp;</div>
    

 
</body>
</html>