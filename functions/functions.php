<?php
defined('CHECK') or die ('Access denied');

/* ===Распечатка массива=== */
function print_arr($arr){
    echo "<pre>";
        print_r($arr);
    echo "</pre>";
};
/* ===Распечатка массива=== */

/* ===Фильтрация входящих данных=== */
function clear($var){
    $var = mysql_real_escape_string(strip_tags(trim($var)));  
    return $var;
};
/* ===Фильтрация входящих данных=== */

/* ===Редирект=== */
function redirect($http = false){
    if($http) $redirect = $http;
        else    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    header("Location: $redirect");
    exit;
}
/* ===Редирект=== */

/* ===Добавление в корзину=== */
function addtocart($goods_id, $qty = 1){
    if (isset($_SESSION['cart'][$goods_id])){
        // если в массиве cart уже есть добавляемый товар
        $_SESSION['cart'][$goods_id]['qty'] +=$qty;
        return $_SESSION['cart'];
    } else{
        // если товар кладется в корзину в первый раз
        $_SESSION['cart'][$goods_id]['qty'] = $qty;
        return $_SESSION['cart'];
    }
};
/* ===Добавление в корзину=== */

/* ===функция подсчета количества=== */ //количество товара в корзине + защита от ввода несуществующего id товара (goods_id)
function total_quantity(){
    //количество товара в корзине + защита от ввода несуществующего id товара (goods_id)
    $_SESSION['total_quantity'] = 0;
    
    foreach ($_SESSION['cart'] as $key => $value){
        if (isset($value['price'])){
            // если получена цена товара из БД - суммируем количество 
            $_SESSION['total_quantity'] += $value['qty']; 
        }else{
            // иначе - удаляем такой ID из сессии (корзины)
            unset($_SESSION['cart'][$key]);
        };
    };  
};
/* ===функция подсчета количества=== */ //количество товара в корзине + защита от ввода несуществующего id товара (goods_id)

/* ===Удаление товара из корзины=== */
function delete_from_cart($id){
    if ($_SESSION['cart']){
        if(array_key_exists($id, $_SESSION['cart'])){ // функция проверки ключей, - первый параметр - то, что мы ищем, второй - где мы ищем
            $_SESSION['total_quantity'] -= $_SESSION['cart'][$id]['qty'];
            $_SESSION['total_sum'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];
            unset($_SESSION['cart'][$id]);
        };
    };
};
/* ===Удаление товара из корзины=== */

/* ===Выход пользователя=== */
function logout(){
    unset($_SESSION['auth']);  
};
/* ===Выход пользователя=== */

/* ===Очистка корзины=== */
function clear_cart(){
    if(!empty($_SESSION['cart'])){
    unset($_SESSION['cart']);
    unset($_SESSION['total_quantity']);
    
    }
};
/* ===Очистка корзины=== */

/* ===Функция постраничной навигации=== */
function pagination($current_page, $pages_count){
    if ($_SERVER['QUERY_STRING']){ // если есть параметры в url запросе
        
            foreach ($_GET as $key => $value){
                // формируем строку параметров без номера страницы ... номер передается параметром функции 
               if ($key != 'current_page') $link .="{$key}=$value&amp;";        
            };   
    };
    // формирование ссылок
    $back = ''; // ссылка НАЗАД 
    $next = ''; // ссылка ВПЕРЕД
    $in_start = ''; // ссылка В НАЧАЛО
    $in_end = ''; // ссылка В КОНЕЦ
    $page_2_left = ''; // вторая страница слева
    $page_1_left = ''; // первая страница слева
    $page_2_right = ''; // вторая страница справа
    $page_1_right = ''; // первая страница справа
    
    if ($current_page > 1) {
        $back = "<a class='nav_link-back' href='?{$link}current_page=".($current_page - 1)."'></a>";  
    };
    
    if ($current_page < $pages_count) {
        $next = "<a class='nav_link-next' href='?{$link}current_page=".($current_page + 1)."'></a>";  
    };
    
    if ($current_page > 3) {
        $in_start = "<a class='nav_link' href='?{$link}current_page=1'>&laquo</a>";  
    };
    
    if ($current_page < ($pages_count - 2)) {
        $in_end = "<a class='nav_link' href='?{$link}current_page=".$pages_count."'>&raquo;</a>";  
    };
    
    if ($current_page - 2 > 0) {
        $page_2_left = "<a class='nav_link' href='?{$link}current_page=".($current_page - 2)."'>".($current_page - 2)."</a>";  
    };
    
    if ($current_page - 1 > 0) {
        $page_1_left = "<a class='nav_link' href='?{$link}current_page=".($current_page - 1)."'>".($current_page - 1)."</a>";  
    };
    
    if ($current_page + 2 <= $pages_count) {
        $page_2_right = "<a class='nav_link' href='?{$link}current_page=".($current_page + 2)."'>".($current_page + 2)."</a>";  
    };
    
    if ($current_page + 1 <= $pages_count) {
        $page_1_right = "<a class='nav_link' href='?{$link}current_page=".($current_page + 1)."'>".($current_page + 1)."</a>";  
    };
    
    // формируем вывод навигации
    echo '<div class="pagination">' .$back.$page_2_left.$page_1_left.'<a class="nav_active">'.$current_page.'</a>'.$page_1_right.$page_2_right.$next. '</div>';
    
};
/* ===Функция постраничной навигации=== */


?>