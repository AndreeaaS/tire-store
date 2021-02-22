<?php 
defined('CHECK') or die('Access denied');

/* ===Фильтрация входящих данных из админки=== */
function clear_admin($var){
    $var = mysql_real_escape_string($var);
    return $var;
}
/* ===Фильтрация входящих данных из админки=== */

/* ===Каталог - получение массива=== */
function catalog() {
  $query = "SELECT * FROM brands ORDER BY parent_id, brand_name"; 
  $res = mysql_query($query) or die (mysql_error()); 
  
  // массив категорий
  $category = array();
  while ($row = mysql_fetch_assoc($res)){
    if (!$row['parent_id']){
        $category[$row['brand_id']][0] = $row['brand_name']; // массив $category[1][0]
    }else {
        $category[$row['parent_id']]['sub'][$row['brand_id']] = $row['brand_name'];
    };
  }; 
  return $category;
};
/* ===Каталог - получение массива=== */



/* ===Страницы=== */
function pages(){
    $query = "SELECT page_id, title, position 
                FROM pages ORDER BY position";
    $res = mysql_query($query) or die (mysql_error());
    $pages = array();
    while ($row = mysql_fetch_assoc($res)){
        $pages[] = $row;  
    };
    
    return $pages;
};
/* ===Страницы=== */

/* ===Добавление категории=== */
function add_brand(){
    $brand_name = clear_admin(trim($_POST['brand_name']));  
    
    if(empty($brand_name)){
        $_SESSION['add_brand']['res'] = "<div class='error'> Не указано название категории! </div>";
        return false;
    }else{
       // проверяем нет ли такой категории
       $query = "SELECT brand_id FROM brands 
                    WHERE brand_name = '$brand_name'"; 
       $res = mysql_query($query);
       if (mysql_num_rows($res) > 0){
        $_SESSION['add_brand']['res'] = "<div class='error'> Категория с таким названием уже существует! </div>";
        return false;
       }else{
            $query = "INSERT INTO brands (brand_name)
                        VALUES ('$brand_name')";
            $res = mysql_query($query);
            if(mysql_affected_rows() > 0){
                $_SESSION['answer'] = "<div class='success'>Категория добавлена!</div>";
                return true;
            }else{
                $_SESSION['add_brand']['res'] = "<div class='error'>Ошибка при добавлении категории!</div>";
                return false;
            } 
       };
    };     
 ;   
}
/* ===Добавление категории=== */

/* ===Редактивароние бренда=== */
function edit_brand($brand_id){
    $brand_name = clear_admin(trim($_POST['brand_name']));
    if(empty($brand_name)){
        $_SESSION['edit_brand']['res'] = "<div class='error'> Не указано название категории! </div>";
        return false;
    }else{
        // проверяем на наличие такой же категории
        $query = "SELECT brand_id FROM brands 
                    WHERE brand_name = '$brand_name'";
         $res = mysql_query($query);
       if (mysql_num_rows($res) > 0){
            $_SESSION['edit_brand']['res'] = "<div class='error'> Категория с таким названием уже существует! </div>";
            return false;
       }else{
            $query = "UPDATE brands SET 
                        brand_name = '$brand_name'
                            WHERE brand_id = $brand_id";
            $res = mysql_query($query);
             if(mysql_affected_rows() > 0){
                $_SESSION['edit_brand']['res'] = "<div class='success'>Категория успешно обновлена!</div>";
                return true;
            }else{
                $_SESSION['edit_brand']['res'] = "<div class='error'>Ошибка при редактировании категории!</div>";
                return false;
            } 
            
       };
    };
};
/* ===Редактивароние бренда=== */

/* ===Удаление категории=== */
function del_brand($brand_id){
    mysql_query("DELETE FROM goods WHERE goods_brandid = $brand_id");
    mysql_query("DELETE FROM brands WHERE brand_id = $brand_id");  
    $_SESSION['answer'] = "<div class='success'>Категория успешно удалена!</div>";
};
/* ===Удаление категории=== */

/* ===Получение количества товаров для навигации=== */
function count_goods($number_category){
   // if(empty($season)) $season = '';
    $query = "SELECT COUNT(goods_id) as count_goods 
                FROM goods 
                    WHERE goods_brandid=$number_category"; // UNION - объединение двух запросов
    $res = mysql_query($query) or die (mysql_error());
    
    while($row = mysql_fetch_assoc($res)){
        if($row['count_goods'] > 0) $count_goods = $row['count_goods'];
    };
    return $count_goods;
};
/* ===Получение количества товаров для навигации=== */

/* ===Получение массива товаров по категории=== */
function products($number_category, $start_position, $goods_for_page){
    $query = "SELECT goods_id, name, image, anons, price, hits, new, sale, date 
                FROM goods 
                    WHERE goods_brandid=$number_category 
                        LIMIT $start_position, $goods_for_page"; // UNION - объединение двух запросов
    $res = mysql_query($query) or die (mysql_error());
    
    $products = array();
    while ($row = mysql_fetch_assoc($res)){
      $products[] = $row;  
    };
    return $products;                 
};
/* ===Получение массива товаров по категории=== */

/* ===Добавление товара=== */
function add_product(){
    $name = trim($_POST['name']);
    $price = round(floatval(preg_replace("#,#", ".", $_POST['price'])),2);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $goods_brandid = (int)$_POST['category'];
    $anons = trim($_POST['anons']);
    $content = trim($_POST['content']);
    $width = (int)$_POST['width'];
    $height = (int)$_POST['height'];
    $Radius = (int)$_POST['Radius'];
    $new = (int)$_POST['new'];
    $hits = (int)$_POST['hits'];
    $sale = (int)$_POST['sale'];
    $visible = (int)$_POST['visible'];
    $date = date("Y-m-d");
    $season = trim($_POST['season']);
    $available = (int)$_POST['available'];
    
    if(empty($name)){
        $_SESSION['add_product']['res'] = "<div class='error'>Не указано название товара!</div>"; 
        $_SESSION['add_product']['price'] = $price;
        $_SESSION['add_product']['keywords'] = $keywords;
        $_SESSION['add_product']['description'] = $description;
        $_SESSION['add_product']['width'] = $width;
        $_SESSION['add_product']['height'] = $height;
        $_SESSION['add_product']['Radius'] = $Radius;
        $_SESSION['add_product']['anons'] = $anons;
        $_SESSION['add_product']['content'] = $content;
        return false;
    }else{
        $name = clear_admin($name);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $anons = clear_admin($anons);
        $content = clear_admin($content);
        
        $query = "INSERT INTO goods (name, keywords, description, width, height, Radius, goods_brandid, anons, content, hits, new, sale, season, price, available, date, visible)
                    VALUES ('$name', '$keywords', '$description', $width, $height, $Radius, $goods_brandid, '$anons', '$content', '$hits', '$new', '$sale', '$season', $price, $available, '$date', '$visible')";
        $res = mysql_query($query) or die (mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Товар успешно добавлен!</div>";
            return true;
        }else{
            $_SESSION['add_product']['res'] = "<div class='error'>Ошибка при добавлении товара!</div>"; 
            return false;
        };
    };
    
};
/* ===Добавление товара=== */

/* ===Получение количества новых заказов=== */
function count_new_orders(){
   $query = "SELECT COUNT(*) AS count 
                FROM orders 
                    WHERE status = '0'";
   $res = mysql_query($query);
   $row = mysql_fetch_assoc($res);
   
   return $row['count']; 
};
/* ===Получение количества новых заказов=== */

/* ===Получение необработанных заказов=== */
function new_orders(){
    $query = "SELECT orders.order_id, orders.order_date, customers.name
                FROM orders 
                    LEFT JOIN customers
                        ON customers.customer_id = orders.customer_id
                            WHERE orders.status = '0'"; 
    $res = mysql_query($query);
    
    $new_orders = array();
    while ($row = mysql_fetch_assoc($res)){
        $new_orders[] = $row;
        
    };
    return $new_orders;
};
/* ===Получение необработанных заказов=== */

/* ===Просмотр заказа=== */
function show_order($order_id){
    //order_goods: name, price, quantity
    //orders: date, comment
    //customers: name, email, phone, address
    //dostavka: name
    
    $query = "SELECT order_goods.name, order_goods.price, order_goods.quantity,
                orders.order_date, orders.comment,
                    customers.name AS customer, customers.email, customers.phone, customers.address,
                        dostavka.name AS sposob
                            FROM order_goods
                                LEFT JOIN orders
                                    ON order_goods.order_id = orders.order_id
                                LEFT JOIN customers
                                    ON customers.customer_id = orders.customer_id
                                LEFT JOIN dostavka
                                    ON dostavka.dostavka_id = orders.dostavka_id
                                            WHERE order_goods.order_id = $order_id";
    $res = mysql_query($query);
    $show_order = array();
    while ($row = mysql_fetch_assoc($res)){
        $show_order[] = $row;  
    };
    
    return $show_order;
};
/* ===Просмотр заказа=== */

?>