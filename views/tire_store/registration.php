<?php
defined('CHECK') or die ('Access denied');
?>
<div class="block__registration">
<center><h2 style="font:30px bold Verdana,sans-serif;">Регистрация</h2></center>
<h2>Персональные данные</h2>
<center>
<?php
   
   if (isset($_SESSION['reg']['res'])){
        echo $_SESSION['reg']['res'];
        unset($_SESSION['reg']);
   }else{
    
   }
   
   ?>
   </center>
<form method="post" action="#">
<table style="" class="Registration_table" border="0" cellpadding="0" cellspacing="0">

				<tr>
					<td class="order-txt"><span style="color: red;">*</span>Фамилия</td>
					<td class="order-input"><input style="padding-left:10px;" type="text" name="second_name" value="<?=$_SESSION['reg']['second_name']?>" />
                    <span style="color: red;"><?php if ($_SESSION['reg']['error5'] == 'second_name'){
                    echo " &nbsp &nbsp*Заполните это поле, оно обязательное!";
                    unset($_SESSION['reg']['error5']);
                    } ?></span></td>
					
				</tr>
                
                <tr>
					<td class="order-txt"><span style="color: red;">*</span>Имя</td>
					<td class="order-input"><input style="padding-left:10px;" type="text" name="name" value="<?=$_SESSION['reg']['name']?>" />
                    <span style="color: red;"><?php if ($_SESSION['reg']['error'] == 'name'){
                    echo " &nbsp &nbsp*Заполните это поле, оно обязательное!";
                    unset($_SESSION['reg']['error']);
                    } ?></span></td>
					
				</tr>
                
                <tr>
					<td class="order-txt"><span style="color: red;">*</span>Отчество</td>
					<td class="order-input"><input style="padding-left:10px;" type="text" name="otchestvo" value="<?=$_SESSION['reg']['otchestvo']?>" />
                    <span style="color: red;"><?php if ($_SESSION['reg']['error6'] == 'otchestvo'){
                    echo " &nbsp &nbsp*Заполните это поле, оно обязательное!";
                    unset($_SESSION['reg']['error6']);
                    } ?></span></td>
					
				</tr>

				<tr>
					<td class="order-txt"><span style="color: red;">*</span>Контактный телефон</td>
					<td class="order-input"> <input id="user-phone" style="padding-left:10px;" type="text" name="phone" value="<?=$_SESSION['reg']['phone']?>"/>
                    <span style="color: red;"><?php if ($_SESSION['reg']['error1'] == 'phone'){
                    echo " &nbsp &nbsp*Заполните это поле, оно обязательное!";
                    unset($_SESSION['reg']['error1']);
                    } ?></span></td>
				    	
                </tr>

				<tr>
					<td class="order-txt"><span style="color: red;">*</span>Email</td>
					<td class="order-input"> <input style="padding-left:10px;"  type="text" name="email" placeholder="example@inbox.ru" value="<?=$_SESSION['reg']['email']?>"/>
                    <span style="color: red;"><?php if ($_SESSION['reg']['error2'] == 'email'){
                        echo " &nbsp &nbsp*Заполните это поле, оно обязательное!";
                        unset($_SESSION['reg']['error2']);
                        } ?></span>
                    </td>
				    
                </tr>

                <tr>
					<td class="order-txt"><span style="color: red;">*</span>Пароль</td>
					<td class="order-input"> <input style="padding-left:10px;" type="password" name="password"/>
                    <span style="color: red;"><?php if ($_SESSION['reg']['error3'] == 'pass'){
                        echo " &nbsp &nbsp*Заполните это поле, оно обязательное!";
                        unset($_SESSION['reg']['error3']);
                        } ?></span>
                    </td>
				</tr>

				<tr>
					<td class="order-txt" style="padding-bottom: 20px;"><span style="color: red;">*</span>Адрес доставки</td>
					<td class="order-input last"> <input style="padding-left:10px;" type="text" name="address" value="<?=$_SESSION['reg']['adres']?>"/>
                    <span style="color: red;"><?php if ($_SESSION['reg']['error4'] == 'adres'){
                        echo " &nbsp &nbsp*Заполните это поле, оно обязательное!";
                        unset($_SESSION['reg']['error4']);
                        } ?></span>
                    </td>
				</tr>

				
			</table>
            
            <center><input class="reg-submit" type="submit" name="reg" value="Зарегистрироваться"/></center>
   
   </form>
   
   <?php
   
   if (isset($_SESSION['reg']['res'])){
        
        unset($_SESSION['reg']);
   }else{
    
   }
   
   ?>
  
</div>