<?php
//defined('CHECK') or die ('Access denied');

session_start();

require_once MODEL;

//подключение библиотеки наших функций 

require_once 'functions/functions.php';

//получение массива каталога
$category = catalog();

//получение массива информеров
$informers = informer();



// очистка корзины

if ($_GET['do'] == 'clear_cart'){
  clear_cart();
  redirect();  
};

//получение массива страниц
$pages = pages();

// регистрация

if ($_POST['reg']){
  registration();
  redirect();
};

// авторизация

if ($_POST['auth']){
  autorization();
  redirect();  
};

// выход пользователя 
if($_GET['do'] == 'logout'){
    logout();
    redirect(); 
};





// получение динамичной части шаблона id="content__center"
$view = empty($_GET['view']) ? 'hits' : $_GET['view'];
/*
if (empty($_GET['view'])){
    $view = 'hits';
} else
{
    $view = $_GET['view'];
}*/



/* === Проверка переменной $view === */
switch($view){
  case('hits'):
    // лидеры продаж
        $goods_for_page = GOODS_FOR_PAGE_EYESTOPPERS; // количество товаров на страницу
        if (isset($_GET['current_page'])){
            $current_page = (int)$_GET['current_page'];
            if($current_page < 1) $current_page = 1;
        }else{
            $current_page = 1;
        }
        
        $count_goods = count_goods_eyestoppers('hits'); // общее количество товаров
        $pages_count = ceil($count_goods / $goods_for_page); // количество страниц, ceil() - округление в бОльшую сторону
        if (!$pages_count) $pages_count = 1; // должна быть хотя бы одна страница
        if ($current_page > $pages_count) $current_page = $pages_count; // если запрошенная страница больше MAX
        
        $start_position = ($current_page -1) * $goods_for_page; // начальная позиция для запроса
        $eyestoppers = eyestopper('hits',$start_position,$goods_for_page);
  break;  
  
  case('new'):
    // новинки
     $goods_for_page = GOODS_FOR_PAGE_EYESTOPPERS; // количество товаров на страницу
        if (isset($_GET['current_page'])){
            $current_page = (int)$_GET['current_page'];
            if($current_page < 1) $current_page = 1;
        }else{
            $current_page = 1;
        }
        
        $count_goods = count_goods_eyestoppers('new'); // общее количество товаров
        $pages_count = ceil($count_goods / $goods_for_page); // количество страниц, ceil() - округление в бОльшую сторону
        if (!$pages_count) $pages_count = 1; // должна быть хотя бы одна страница
        if ($current_page > $pages_count) $current_page = $pages_count; // если запрошенная страница больше MAX
        
        $start_position = ($current_page -1) * $goods_for_page; // начальная позиция для запроса
        $eyestoppers = eyestopper('new',$start_position,$goods_for_page);
  break; 
  
  case('sale'):
    // распродажа
        $goods_for_page = GOODS_FOR_PAGE_EYESTOPPERS; // количество товаров на страницу
        if (isset($_GET['current_page'])){
            $current_page = (int)$_GET['current_page'];
            if($current_page < 1) $current_page = 1;
        }else{
            $current_page = 1;
        }
        
        $count_goods = count_goods_eyestoppers('sale'); // общее количество товаров
        $pages_count = ceil($count_goods / $goods_for_page); // количество страниц, ceil() - округление в бОльшую сторону
        if (!$pages_count) $pages_count = 1; // должна быть хотя бы одна страница
        if ($current_page > $pages_count) $current_page = $pages_count; // если запрошенная страница больше MAX
        
        $start_position = ($current_page -1) * $goods_for_page; // начальная позиция для запроса
        $eyestoppers = eyestopper('sale',$start_position,$goods_for_page);
  break;
  
  case('page'):
    //отдельная страница
        $page_id = abs((int)$_GET['page_id']);
        $get_page = get_page($page_id);
  break;
  
  case ('news'):
    //отдельная новость
    $news_id = abs((int)$_GET['news_id']);
    $news_text = get_news_text($news_id);
  break;
  
   case ('archive_news'):
    //все новости (архив новостей)
    // параметры для навигации
        $goods_for_page = 2; // количество товаров на страницу
        if (isset($_GET['current_page'])){
            $current_page = (int)$_GET['current_page'];
            if($current_page < 1) $current_page = 1;
        }else{
            $current_page = 1;
        }
        
        $count_rows = count_news(); // общее количество новостей
        //echo $count_goods;
        $pages_count = ceil($count_rows / $goods_for_page); // количество страниц, ceil() - округление в бОльшую сторону
        if (!$pages_count) $pages_count = 1; // должна быть хотя бы одна страница
        if ($current_page > $pages_count) $current_page = $pages_count; // если запрошенная страница больше MAX
        
        $start_position = ($current_page -1) * $goods_for_page; // начальная позиция для запроса
    $all_news = get_all_news($start_position, $goods_for_page);
  break;
  
  case ('informer'):
    //текст отдельного информера
    $informer_id = abs((int)$_GET['informer_id']);
    $text_informer = get_text_informer($informer_id);
  break;
  
  case('category'):
    // товары категории
        $cat = abs((int)$_GET['number_category']);
        $season = clear($_GET['season']);
        
        /* ===Сортировка=== */
        // массив параметров сортировки, ключи - то, что передаем в $_GET, значения - то, что показываем пользователю и часть SQL-запроса, передаваемый в MODEL
            $order_p = array(
                            'sort_standart' => array('Нет сортировки', 'goods_id'),
                            'priceA' => array('От дешевых к дорогим', 'price ASC'),
                            'priceD' => array('От дорогих к дешевым', 'price DESC'),
                            'dateA' => array('По дате добавления', 'date ASC'),
                            'nameA' => array('От А до Я', 'name ASC'),
                            'nameD' => array('От Я до А', 'name DESC'),
                            );
            $order_by_get = clear($_GET['order_by']); // получаем возможный параметр сортировки
            if(array_key_exists($order_by_get,$order_p)){
                $order = $order_p[$order_by_get][0];
                $order_sql = $order_p[$order_by_get][1];
            }else{
                // по умолчанию "Нет сортировки"
                $order = $order_p['sort_standart'][0];
                $order_sql = $order_p['sort_standart'][1];
            };
            
        /* ===Сортировка=== */
        
        // параметры для навигации
        $goods_for_page = GOODS_FOR_PAGE_CAT; // количество товаров на страницу
        if (isset($_GET['current_page'])){
            $current_page = (int)$_GET['current_page'];
            if($current_page < 1) $current_page = 1;
        }else{
            $current_page = 1;
        }
        
        $count_goods = count_goods($cat, $season); // общее количество товаров
        //echo $count_goods;
        $pages_count = ceil($count_goods / $goods_for_page); // количество страниц, ceil() - округление в бОльшую сторону
        if (!$pages_count) $pages_count = 1; // должна быть хотя бы одна страница
        if ($current_page > $pages_count) $current_page = $pages_count; // если запрошенная страница больше MAX
        
        $start_position = ($current_page -1) * $goods_for_page; // начальная позиция для запроса
        
        $brand_name =  brand_name($cat); // хлебные крошки
        $products = products($cat, $season, $order_sql, $start_position, $goods_for_page); // получение массива из модели
        
  break;
  
  case('addtocart');
    //добавление в корзину
    $goods_id = abs((int)$_GET['goods_id']);
    addtocart($goods_id);
    
    $_SESSION['total_sum'] = total_sum($_SESSION['cart']);
    //количество товара в корзине + защита от ввода несуществующего id товара (goods_id)
    total_quantity();
    redirect();
  break;
  
  case('cart'):
    /* корзина */
    // пересчет товаров в корзине
    if (isset($_GET['id'], $_GET['qty'])){
        
    
    $goods_id = abs((int)$_GET['id']);
    $qty = abs((int)$_GET['qty']);
    
    $qty = $qty - $_SESSION['cart'][$goods_id]['qty'];
    addtocart($goods_id, $qty);
    
    $_SESSION['total_sum'] = total_sum($_SESSION['cart']); // сумма заказа
    total_quantity(); //количество товара в корзине + защита от ввода несуществующего id товара (goods_id)
    redirect();
    };
    
    // удаление товара из корзины
    if (isset($_GET['delete'])){
        $id = abs((int)$_GET['delete']);
        if ($id){
           delete_from_cart($id);  
         ;
        redirect();                  
        }  
    };
  break;
  
  case('registration'):
    //регистрация
  break;
  
  case('checkout-order'):
    // страница оформления заказа
    // получение способов доставки
        $delivery = get_delivery();
        
        if ($_POST['confirm__checkout-order']){
           add_order();
        };
  break;
  
  case ('calc'):
  break;
  
  case('search'):
    // поиск
    /* ===Сортировка=== */
        // массив параметров сортировки, ключи - то, что передаем в $_GET, значения - то, что показываем пользователю и часть SQL-запроса, передаваемый в MODEL
            $order_p = array(
                            'sort_standart' => array('Нет сортировки', 'goods_id'),
                            'priceA' => array('От дешевых к дорогим', 'price ASC'),
                            'priceD' => array('От дорогих к дешевым', 'price DESC'),
                            'dateA' => array('По дате добавления', 'date ASC'),
                            'nameA' => array('От А до Я', 'name ASC'),
                            'nameD' => array('От Я до А', 'name DESC'),
                            );
            $order_by_get = clear($_GET['order_by']); // получаем возможный параметр сортировки
            if(array_key_exists($order_by_get,$order_p)){
                $order = $order_p[$order_by_get][0];
                $order_sql = $order_p[$order_by_get][1];
            }else{
                // по умолчанию "Нет сортировки"
                $order = $order_p['sort_standart'][0];
                $order_sql = $order_p['sort_standart'][1];
            };
            
        /* ===Сортировка=== */
    
    $goods_for_page = GOODS_FOR_PAGE_SEARCH; // количество товаров на страницу
        if (isset($_GET['current_page'])){
            $current_page = (int)$_GET['current_page'];
            if($current_page < 1) $current_page = 1;
        }else{
            $current_page = 1;
        }
        
        $count_goods = count_goods_search(); // общее количество товаров
        $pages_count = ceil($count_goods / $goods_for_page); // количество страниц, ceil() - округление в бОльшую сторону
        if (!$pages_count) $pages_count = 1; // должна быть хотя бы одна страница
        if ($current_page > $pages_count) $current_page = $pages_count; // если запрошенная страница больше MAX
        
        $start_position = ($current_page -1) * $goods_for_page; // начальная позиция для запроса
     $result_search = search($order_sql,$start_position,$goods_for_page);
  break;
  
  case ('filter'):
  // выбор по параметрам
        $startprice = (int)$_GET['start-price'];
        $endprice = (int)$_GET['end-price'];
        $width = (int)$_GET['width'];
        $height = (int)$_GET['height'];
        $radius = (int)$_GET['radius'];
        $brand = array();
        $season_search= array();
        if ($_GET['brand']){
            foreach($_GET['brand'] as $value) {
                  $value = (int)$value;
                  $brand[$value] = $value;
            };
        };
        $brand[$value] = $value;
        
        if ($_GET['season_search']){
            foreach ($_GET['season_search'] as $val){
                $val = clear($val);
                $season_search[$val] = $val;   
            };
        };
        $season_search[$val] = $val;
        if($brand){
            $cat = implode(',', $brand);  
        };
        
        if ($season_search){
            $season = implode("' OR '", $season_search);
        };
        
        
        
        /* ===Данные для постраничной навигации=== */
        $goods_for_page = GOODS_FOR_PAGE_FILTER; // количество товаров на страницу
        if (isset($_GET['current_page'])){
            $current_page = (int)$_GET['current_page'];
            if($current_page < 1) $current_page = 1;
        }else{
            $current_page = 1;
        }
        $count_goods = count_goods_filter($cat, $startprice, $endprice, $season); // общее количество товаров
        $pages_count = ceil($count_goods / $goods_for_page); // количество страниц, ceil() - округление в бОльшую сторону
        if (!$pages_count) $pages_count = 1; // должна быть хотя бы одна страница
        if ($current_page > $pages_count) $current_page = $pages_count; // если запрошенная страница больше MAX
        
        $start_position = ($current_page -1) * $goods_for_page; // начальная позиция для запроса
        /* ===Данные для постраничной навигации=== */
        
        $products = filter($cat, $startprice, $endprice, $season, $width, $height, $radius, $start_position, $goods_for_page);
  break;
  
  case ('product'):
    // просмотр отдельного товара
    
    $goods_id = abs((int)$_GET['goods_id']);
        if ($goods_id){
            $goods = get_goods($goods_id);
            $brand_name = brand_name($goods['goods_brandid']); // хлебные крошки
            $available = (int)$goods['available'];
        };
  break;
  
  case('personal'):
    // личный кабинет
  break;
  
  default:
    // если из адресной строки получено имя несуществующего вида/шаблона
        $view = 'hits';
        $eyestoppers = eyestopper('hits',$start_position=1,$goods_for_page=6);
};
/* === Проверка переменной $view === */

// подклчение вида
require_once TEMPLATE.'index.php';

?>