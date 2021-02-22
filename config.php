<?php
defined('CHECK') or die ('Access denied');
// домен
define('PATH', 'http://tire_store/');
// модель
define('MODEL', 'model/model.php');
// контроллер
define('CONTROLLER', 'controller/controller.php');
// вид
define('VIEWS', 'views/');
// активный шаблон
define('TEMPLATE', VIEWS.'tire_store/');
// сервер БД
define('HOST', 'localhost');
// пользователь 
define('USER', 'Andry');
// пароль
define('PASSWORD', 'admin');
// БД
define('DB', 'tire_store');
// название магазина - title
define('TITLE', 'Интернет-магазин автомобильных шин');
// email админа
define('ADMIN_EMAIL', 'Alyukov38@yandex.ru');
// количество товаров на страницу category.php
define('GOODS_FOR_PAGE_CAT', 9);
// количество товаров на страницу Айстопперы
define('GOODS_FOR_PAGE_EYESTOPPERS', 6);
// количество товаров на страницу поиска
define('GOODS_FOR_PAGE_SEARCH', 12);
// количество товаров на страницу Выбор по параметрам
define('GOODS_FOR_PAGE_FILTER', 20);
// папка шаблонов админской части
define('ADMIN_TEMPLATE', 'temp/');
mysql_connect(HOST, USER, PASSWORD) or die ('No connect to server');
mysql_select_db(DB) or die ('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die ('Cant set charset');
?>