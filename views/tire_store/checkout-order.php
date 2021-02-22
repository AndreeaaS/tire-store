<?php
defined('CHECK') or die ('Access denied');
?>
<?php if($_SESSION['auth']['user']):  // проверка авторизации?>
<!-- Если пользователь авторизирован -->
    <div class="order-page">
    
<?php
   
   if (isset($_SESSION['order']['res'])){
        echo $_SESSION['order']['res'];
        unset($_SESSION['order']);
   }else{
    
   }
?>

    
    <center><h1 style="font-family: Verdana, sans-serif; font-weight: normal;">Оформление заказа</h1></center><br/>
    
    <form method="post" action="#">
			<h2 style="font-family: Verdana, sans-serif; font-weight: normal;">Информация о покупателе</h2>
            <div class="checkout-order__top-line"></div>
			<table class="content__order-data" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td class="order-txt"><span style="color: red;">*</span>Фамилия</td>
					<td class="order-input"><input style="padding-left: 5px;" type="text" name="second_name" value="<?=$_SESSION['auth']['user_second_name']?>"/></td>
					<td class="order-prim"><?php if($_SESSION['order']['error2']): ?> <p style="color: red;">Не заполнена фамилия</p> <?php unset($_SESSION['order']['error2']) ?> <?php else: ?> Пример: Иванов <?php endif; ?></td>
				</tr>
                
                <tr>
					<td class="order-txt"><span style="color: red;">*</span>Имя</td>
					<td class="order-input"><input style="padding-left: 5px;" type="text" name="name" value="<?=$_SESSION['auth']['user']?>"/></td>
					<td class="order-prim"><?php if($_SESSION['order']['error1']): ?> <p style="color: red;">Не заполнено имя</p> <?php unset($_SESSION['order']['error1']) ?> <?php else: ?> Пример: Иван <?php endif; ?></td>
				</tr>
                
                <tr>
					<td class="order-txt"><span style="color: red;">*</span>Отчество</td>
					<td class="order-input"><input style="padding-left: 5px;" type="text" name="otchestvo" value="<?=$_SESSION['auth']['user_otchestvo']?>"/></td>
					<td class="order-prim"><?php if($_SESSION['order']['error3']): ?> <p style="color: red;">Не заполнено отчество</p> <?php unset($_SESSION['order']['error3']) ?> <?php else: ?> Пример: Иванович <?php endif; ?></td>
				</tr>

				<tr>
					<td class="order-txt"><span style="color: red;">*</span>E-mail</td>
					<td class="order-input"> <input style="padding-left: 5px;" type="text" name="email" value="<?=$_SESSION['auth']['email']?>"/></td>
					<td class="order-prim"><?php if($_SESSION['order']['error5']): ?> <p style="color: red;">Не заполнен email</p> <?php unset($_SESSION['order']['error5']) ?> <?php else: ?> Пример: test@mail.ru <?php endif; ?></td>
				</tr>

				<tr>
					<td class="order-txt"><span style="color: red;">*</span>Телефон</td>
					<td class="order-input"> <input style="padding-left: 5px;" id="user-phone" type="text" name="phone" value="<?=$_SESSION['auth']['phone']?>"/></td>
					<td class="order-prim"><?php if($_SESSION['order']['error4']): ?>  <p style="color: red;">Не заполнен контактный телефон</p> <?php unset($_SESSION['order']['error4']) ?> <?php else: ?> Пример: 8 999 999 99 99 <?php endif; ?></td>
				</tr>

				<tr>
					<td class="order-txt"><span style="color: red;">*</span>Адрес доставки</td>
					<td class="order-input" style=""> <input style="padding-left: 5px; " type="text" name="address" value="<?=$_SESSION['auth']['address']?>"/></td>
					<td class="order-prim"><?php if($_SESSION['order']['error6']): ?> <p style="color: red;">Не заполнен адрес</p> <?php unset($_SESSION['order']['error6']) ?> <?php else: ?> Пример: г.Иркутск, ул.Байкальская, д.203, кв.23 <?php endif; ?></td>
				</tr>

				
			</table>
            
            <div class="delivery-method">
				<h2 style="font-family: Verdana, sans-serif; font-weight: normal;">Способы доставки</h2>
                <div class="checkout-order__top-line"></div>
                <?php foreach($delivery as $item): ?>
                <p><input type="radio" name="delivery" value="<?=$item['dostavka_id']?>"/>&nbsp;<?=$item['name']?></p>
                <?php endforeach; ?>
                
			</div>
            
            <h2 style="font-family: Verdana, sans-serif; font-weight: normal;">Состав заказа</h2><br/>
            <div class="checkout-order__top-line"></div>
    	<table class="content__order-main-table"  cellspacing="0" cellpadding="0">
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
						<td class="z_kol"><?=$item['qty']?></td>
						<td class="z_price"><?=$item['price']?></td>
					<!-- 	<td class="z_del"><a href="?view=cart&delete=<?=$key?>"><img src="<?=TEMPLATE?>images/delete.jpg" title="удалить товар из заказа" alt="удалить товар из заказа"/></a> -->
						</td>
                        
					</tr>
     <?php endforeach; ?>               
                    <tr >
						<td class="z_bot">&nbsp;&nbsp;&nbsp;&nbsp;Итого</td>
						<td class="z_bot" colspan="2" align="right"><?=$_SESSION['total_quantity']?> шт&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$_SESSION['total_sum']?> руб.</td>
						<td class="z_bot" align="center">&nbsp;</td>
					</tr>
        </table>
            
            
            
           	<h2 style="font-family: Verdana, sans-serif; font-weight: normal;">Дополнительная информация</h2>
            <div class="checkout-order__top-line"></div>
            <table class="content__order-data" border="0" cellpadding="0" cellspacing="0">
            <tr>
					<td class="order-txt" style="vertical-align: top; width:15%;">Комментарий к заказу</td><br/>
					<td class="order-txtarea"><textarea name="comment_for_delivery" style="width: 85%;"><?=$_SESSION['order']['comment']?></textarea></td>
				<!--	<td class="order-prim" style="vertical-align: top;">Пример: Позвоните, пожауйлста, вечером с 18:00 до 23:00</td> -->
			</tr>
            </table>
            <button style="float: right; cursor:pointer; text-decoration: none;" class="confirm__order-submit" name="confirm__checkout-order" value="confirm__checkout-order"  id="confirm__checkout-order"> Оформить заказ </button>
            </form>
<?php
   
   if (isset($_SESSION['order']['res'])){
   unset($_SESSION['order']);
   }else{}
?>
    </div>
<?php else: // если пользователь не авторизован?>
    <div class="order-page">
        <h1 style="font-family: Verdana, sans-serif; font-weight: normal;">Авторизация</h1><br />
        <h4 style="font-weight: normal; ">Для продолжения оформления заказа Вам необходимо авторизоваться:</h4>
        
        <!-- Зарегистрированный пользователь -->
        <div class="order-page__reg-user">
            <div class="auth-title">
                <h3 style="color: #434343; font-family: Verdana, sans-serif; font-weight: normal;">Я зарегистрированный пользователь</h3>
            </div>
            
            <div class="form__auth-block">
            <p>Мы рады снова видеть Вас на нашем сайте!</p><br />
            
            <form action="#" method="post" class="form__auth-block__form">
                	<label for="user-email">Email: <span>*</span></label><br/>
		              <input type="text" name="user-email" id="user-email"/><br />
		
                    <label for="user-password">Пароль: <span>*</span></label><br/>
	                   	<input type="password" name="user-password" id="user-password"/><br />
                        <button style="font:14px Verdana, sans-serif; font-weight: bold;" value="auth" name="auth" class="order__enter-submit" id="auth-button">Войти</button>
            </form>
            
            </div>
            
        </div>
         <!-- .Зарегистрированный пользователь -->
        
         <!-- Новый пользователь -->
        <div class="order-page__new-user">
            <div class="auth-title">
                <h3 style="color: #434343; font-family: Verdana, sans-serif; font-weight: normal;">Я новый пользователь</h3>
            </div>
            
            <div class="offer-to-reg">
                <p>Для продолжения оформления заказа Вам необходимо <br/> заполнить минимальный набор полей.</p><br/>
                <p>Это займет всего пару минут.</p>
                <a href="index.php?view=registration" style=" float: left; margin-top: 20px; height: 20px; text-decoration: none;" class="order_submit" id="new-reg__order">Зарегистрироваться</a>
            </div>
            
        </div>
         <!-- .Новый пользователь -->
    </div>
<?php endif; // конец условия проверки авторизации?>
