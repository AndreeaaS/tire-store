<?php
defined('CHECK') or die ('Access denied');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="windows-1251"/>
	<title>shina38-auto.ru</title>
	
	<link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>style/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>style/nivo-zoom.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>/style/calc.css" media="all"/>
	<script type="text/javascript" src="<?=TEMPLATE?>js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?=TEMPLATE?>js/jquery-ui.js"></script>
   	<script type="text/javascript" src="<?=TEMPLATE?>js/jquery-ui-1.8.22.custom.min.js"></script>
    <script type="text/javascript" src="<?=TEMPLATE?>js/workscripts.js"></script>
    <script type="text/javascript" src="<?=TEMPLATE?>js/jquery.cookie.js"></script>
    <script type="text/javascript"> var url_query = '<?=$_SERVER['QUERY_STRING'];?>'</script> 
    <script type="text/javascript" src="<?=TEMPLATE?>js/maskedinput.js"></script>
    <script type="text/javascript" src="<?=TEMPLATE?>js/enter-form.js" ></script>
    <script type="text/javascript" src="<?=TEMPLATE?>js/nivoZoom.js"></script>
    <script type="text/javascript" src="<?=TEMPLATE?>js/jquery.nivo.zoom.pack.js"></script>
    <script type="text/javascript" src="<?=TEMPLATE?>js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="<?=TEMPLATE?>js/calculator.js"></script>
    <script type="text/javascript" src="<?=TEMPLATE?>js/jTabs.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
        
    
</head>
<body>

	
<div class="wrapper">
	<header>
	<div class="header__top-block">
		<ul class="top-block__top-menu">
			<li class="top-menu__item top-menu__item-city">Ваш город -  <span class="top-menu__item-city_red">Иркутск</span></li>
			<li class="top-menu__item"><a class="top-menu__item-link" href="?view=page&amp;page_id=4">О нас</a></li>
			<li class="top-menu__item"><a class="top-menu__item-link"  href="?view=page&amp;page_id=8">Магазины</a></li>
			<li class="top-menu__item"><a class="top-menu__item-link" href="?view=page&amp;page_id=6">Контакты</a></li>
            
           <!-- <li class="top-menu__item"><a class="top-menu__item-link" href="contacts.php">Покупка в кредит</a></li> -->
		</ul>
	
    <?php if(!$_SESSION['auth']['user']): ?>
    <p class="top-block__reg-auth-title" align="right">
    <?php if (isset($_SESSION['auth']['error'])){
        echo "<a style='color: red; margin-top: 2px; font:bold 13px Verdana, sans-serif;'>". $_SESSION['auth']['error'] ."</a>";
        unset($_SESSION['auth']);
        
    }; ?>
    <a id="enter-button" class="reg-auth-title__link_enter">Вход</a>
    <a class="reg-auth-title__link_registration" href="?view=registration">Регистрация</a>
    </p>
    <?php else:  ?>
    <p  class="top-block__reg-auth-title" align="right">
        <a href="?view=personal&amp;customer_id=<?=(int)$_SESSION['auth']['customer_id']?>" style="font:bold 15px  Verdana, sans-serif; color: #1FA6D7; text-decoration: none;" class="Welcome">Добро пожаловать, <?=htmlspecialchars($_SESSION['auth']['user'])?></a>
        <a href="?do=logout" class="reg-auth-title__link_escape">Выход</a>
       <!--  <a class="reg-auth-title__link_registration" href="?view=registration">Регистрация</a> -->
    </p>
    <?php endif;?>
	
	
	
	</div>
	<!-- <div class="header__top-line"></div> -->
			<a href="index.php"><img class="header__logo" src="<?=TEMPLATE?>images/logo2.jpg" alt="Интернет-магазин сотовых телефонов"></a>
		<img class="header__slogan" src="<?=TEMPLATE?>images/slogan2.jpg" alt="Лучшие сотовые телефоны"/>
	<!--	<div class="header__contacts">
			<p><strong>Телефон:</strong> <br> <span>8 (904) 131 03 99</span></p>
			<p><strong>Режим работы:</strong><br> 
			Будние дни: с 9:00 до 18:00<br>
			Суббота, Воскресенье - выходные</p>
			</div> -->
            <div class="right-bar__basket_top">
					
					<div>
                        <img class="basket-image" src="<?=TEMPLATE?>images/cart-icon2.png"/>
						<p>
                        <?php if ($_SESSION['total_quantity']): ?>
                            Товаров в корзине:<br />
                            <span><?=$_SESSION['total_quantity']?></span> на сумму <span><?=$_SESSION['total_sum']?></span> руб.
                            
                            <?php else: ?>
                                <a class="empty__cart-p"  href="?view=cart"><p style="font:15px Verdana, sans-serif; font-weight: bold; color: #2B2B2B;">Корзина пуста</p></a>
                        <?php endif; ?>
                        </p>
                        
                        <?php if ($_SESSION['total_quantity']): ?>
                         <a href="index.php?view=cart"  class="goto_cart" id="checkout-order">Оформить заказ</a>
                       <!--  <a href="?view=cart"><img class="lol" src="<?=TEMPLATE?>images/oformit.jpg" alt="Оформить заказ"/></a> -->
                        <?php endif; ?>
					</div> 
			</div> <!-- .right-bar__basket_top -->
	
		</header>
	<!-- Форма входа --> 	
        <div id="enter_form">
	<div class="top-line">
		<center><p style="font:20px Verdana,sans-serif; ">Войти на сайт</p></center>
		<div class="close">
			<span id="enter_from-Close" style="color: black;">X</span>
		</div>
	</div>
	<form action="#" name="enter_form" class="enter_form" method="post">
		
		<label for="user-email">Email: <span>*</span></label><br/>
		<input type="text" name="user-email" id="user-email"/>
		
		<label for="user-password">Пароль: <span>*</span></label><br/>
		<input type="password" name="user-password" id="user-password"/>
		<!-- <input type="submit" name="auth" value="Войти" /> -->
    <button value="auth" name="auth" class="submit" id="auth-button">Войти</button> 
		<p class="text"> <span>*</span> - Обязательные поля</p>

	</form>
    
        </div> <!-- #enter_from -->
        <div id="backgroundPopup"></div>
		
		<div id="wrapper__menu-block">
   		<ul class="wrapper__menu">
    			<li class="menu__item menu__item-first"><a class="menu__item-link" href="<?=PATH?>">Главная</a></li>
    			<li class="menu__item"><a class="menu__item-link" href="?view=category&season=summer">Летние шины</a> </li>
     			<li class="menu__item"><a class="menu__item-link" href="?view=category&season=winter">Зимние шины</a></li>
   				<li class="menu__item"><a class="menu__item-link" href="?view=page&amp;page_id=7">Оплата и доставка</a></li> 
                <li class="menu__item"><a class="menu__item-link" href="?view=calc">Шинный калькулятор</a></li>
     			<li style="padding-right: 75px;" class="menu__item"> <form   class="search">
  <input type="hidden" name="view" value="search" />
  <input type="text" name="search" placeholder="поиск по сайту" class="input" />
  <input type="submit" name="" value="" class="submit" />
</form> </li> 
     	</ul>
     	</div>
    
    <div class="top-menu">
	<ul class="top-menu__menu-list">
		
		<li class="menu-list__item"><img class="menu-list__img" src="<?=TEMPLATE?>images/new-32.png" alt=""><a class="menu-list__link" href="?view=new">Новинки</a><li>
		<li class="menu-list__item"><img class="menu-list__img" src="<?=TEMPLATE?>images/bestprice-32.png" alt=""><a class="menu-list__link" href="?view=hits">Лидеры продаж</a></li>
		<li class="menu-list__item"><img class="menu-list__img" src="<?=TEMPLATE?>images/sale-32.png" alt=""><a class="menu-list__link" href="?view=sale">Распродажа</a></li>
	</ul>

			
		
	<!-- Корзина-->
		<!--<p style="display: inline; float: right" align="right" class="top_menu__basket"><img class="top_menu__basket-img" src="<?=TEMPLATE?>images/cart-icon.png" alt="cart-icon.png"><a class="top-menu__basket-link" href="#">Корзина пуста<a></p> -->
		<div class="top-menu__bottom-line"></div>	

		</div>
		<div class="header__top-line"></div>