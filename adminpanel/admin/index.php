<?php

// запрет прямого обращения
define('CHECK', TRUE);

session_start();

if($_GET['do'] == "logout"){
    unset($_SESSION['auth']);
}

if (!$_SESSION['auth']['admin'] or ($_SESSION['auth']['role'] != 2 )){
// подключение авторизации
unset($_SESSION['auth']['admin']);
include $_SERVER['DOCUMENT_ROOT'].'/adminpanel/authorization/index.php';
};

// подключение файла конфигурации
require_once '../../config.php';

//подключение файла функций пользовательской части
require_once '../../functions/functions.php';

//подключение файла функций админской части
require_once 'functions/functions.php';

// получение количества новых заказов
$count_new_orders = count_new_orders();

//получение массива каталога
$category = catalog();

// получение динамичной части шаблона #content
$view = empty($_GET['view']) ? 'pages' : $_GET['view'];

switch($view){
    case('pages'):
        // страницы
        $pages = pages();
        $title = "Список страниц";
    break;
    
    case('informers'):
        // информеры
    break;
    
    case('brands'):
        $title = "Список категорий";
    break;
    
    case('add_brand'):
        if($_POST){
            if(add_brand()) redirect('?view=brands');
                else redirect();
        }
        $title = "Добавление категории";
    break;
    
    case('edit_brand'):
        $brand_id = (int)$_GET['brand_id'];
        $brand_name = $category[$brand_id][0];
        if($_POST){
            if(edit_brand($brand_id)) redirect('?view=brands');
                else redirect();
        }
        $title = "Редактирование категории";
    break;
    
    case('del_brand'):
        $brand_id = (int)$_GET['brand_id'];
        del_brand($brand_id);
        redirect();
    break;
    
    case('category'):
        $cat = (int)$_GET['number_category'];
        
        // постраничная навигация
        $goods_for_page = 8; // количество товаров на страницу
        if (isset($_GET['current_page'])){
            $current_page = (int)$_GET['current_page'];
            if($current_page < 1) $current_page = 1;
        }else{
            $current_page = 1;
        }
        
        $count_goods = count_goods($cat); // общее количество товаров
        //echo $count_goods;
        $pages_count = ceil($count_goods / $goods_for_page); // количество страниц, ceil() - округление в бОльшую сторону
        if (!$pages_count) $pages_count = 1; // должна быть хотя бы одна страница
        if ($current_page > $pages_count) $current_page = $pages_count; // если запрошенная страница больше MAX
        
        $start_position = ($current_page -1) * $goods_for_page; // начальная позиция для запроса
        
        $products = products($cat, $start_position, $goods_for_page); // получение массива из модели
        $title = "Редактирование каталога";
    break;
    
    case('add_product'):
        $brand_id = (int)$_GET['brand_id'];
        if($_POST){
            if(add_product()) redirect("?view=category&number_category=$brand_id");
                else redirect();
        }
        $title = "Добавление товара";
    break;
    
    case('new_orders'):
        $new_orders = new_orders();
    break;
    
    case('show_order'):
        $order_id = abs((int)$_GET['order_id']);
        $show_order = show_order($order_id);
    break;
    
    
    
    case('users'):
        // постраничная навигация
        $goods_for_page = 15; // количество пользователей на страницу
        if (isset($_GET['current_page'])){
            $current_page = (int)$_GET['current_page'];
            if($current_page < 1) $current_page = 1;
        }else{
            $current_page = 1;
        }
        
        $count_rows = count_users(); // общее количество пользователей
        //echo $count_goods;
        $pages_count = ceil($count_rows / $goods_for_page); // количество страниц, ceil() - округление в бОльшую сторону
        if (!$pages_count) $pages_count = 1; // должна быть хотя бы одна страница
        if ($current_page > $pages_count) $current_page = $pages_count; // если запрошенная страница больше MAX
        
        $start_position = ($current_page -1) * $goods_for_page; // начальная позиция для запроса
        
        $users = get_users($start_position, $goods_for_page);
    break;
    
    case('add_customer'):
        $roles = get_roles();
        if($_POST){
            if(add_customer()) redirect("?view=users");
                else redirect();
        }
    break;
    
    default:
    // если из адресной строки получено имя несуществующего вида
    $view = 'pages';
}

// HEADER
include ADMIN_TEMPLATE.'header.php';

// CONTENT
include 'temp/'.$view.'.php';

?>