<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Добавление пользователя</h1></div>

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
	
	
		
	<form action="" method="post">
		<!-- start id-form -->
		<?php
if(isset($_SESSION['add_customer']['res'])){
    echo $_SESSION['add_customer']['res'];
    
}

?>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>
			<th valign="top" style="font-size: 16px; width: 200px;">*Фамилия:</th>
			<td><input type="text" class="inp-form"  name="second_name" value="<?=$_SESSION['add_customer']['second_name']?>" /></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top" style="font-size: 16px; width: 200px;">*Имя:</th>
			<td><input type="text" class="inp-form"  name="name" value="<?=$_SESSION['add_customer']['name']?>" /></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top" style="font-size: 16px; width: 200px;">*Отчество:</th>
			<td><input type="text" class="inp-form"  name="otchestvo" value="<?=$_SESSION['add_customer']['otchestvo']?>" /></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top" style="font-size: 16px; width: 200px;">*Email:</th>
			<td><input type="text" class="inp-form"  name="email" value="<?=$_SESSION['add_customer']['email']?>" /></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top" style="font-size: 16px; width: 200px;">*Пароль:</th>
			<td><input type="text" class="inp-form"  name="password" value="<?=$_SESSION['add_customer']['password']?>" /></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top" style="font-size: 16px; width: 200px;">*Роль:</th>
			<td>
            <select  class="styledselect_form_1" name="id_role">
			<?php foreach($roles as $item): ?>
               
                
                	 <option value="<?=$item['id_role']?>"><?=$item['name_character']?></option>
                
            <?php endforeach; ?>
			
            </select>
            </td>
			<td></td>
		</tr>
	</form>	
		
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<a href="?view=add_brand"><button value="" name="" class="add_button" style="margin-left: 0;">Сохранить</button></a>
			
		</td>
		<td></td>
	</tr>
	</table>
	<!-- end id-form  -->

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

 
<?php unset($_SESSION['add_customer']); ?>
<div class="clear">&nbsp;</div>
    

</body>
</html>