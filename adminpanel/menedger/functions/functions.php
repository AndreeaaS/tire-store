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
        $_SESSION['add_brand']['res'] = '<div id="message-red">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
				                        <tr>
					                   <td class="red-left">Ошибка. <a href="">Не указано название категории!</a></td>
					                   <td class="red-right"><a class="close-red"><img src="'.ADMIN_TEMPLATE.'images/table/icon_close_red.gif"   alt="" /></a></td>
				                        </tr>
				                        </table>
				                        </div>';
        return false;
    }else{
       // проверяем нет ли такой категории
       $query = "SELECT brand_id FROM brands 
                    WHERE brand_name = '$brand_name'"; 
       $res = mysql_query($query);
       if (mysql_num_rows($res) > 0){
        $_SESSION['add_brand']['res'] = '<div id="message-red">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
				                        <tr>
					                   <td class="red-left">Ошибка. <a href="">Категория с данным названием уже существует!</a></td>
					                   <td class="red-right"><a class="close-red"><img src="'.ADMIN_TEMPLATE.'images/table/icon_close_red.gif"   alt="" /></a></td>
				                        </tr>
				                        </table>
				                        </div>';
        return false;
       }else{
            $query = "INSERT INTO brands (brand_name)
                        VALUES ('$brand_name')";
            $res = mysql_query($query);
            if(mysql_affected_rows() > 0){
                $_SESSION['answer'] = '<div id="message-green">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
				                        <tr>
					                   <td class="green-left">Категория успешно добавлена! <a href="?view=add_brand">Добавить еще одну.</a></td>
					                   <td class="green-right"><a class="close-green"><img src="'.ADMIN_TEMPLATE.'images/table/icon_close_green.gif"   alt="" /></a></td>
				                        </tr>
				                        </table>
				                        </div>';
                return true;
            }else{
                $_SESSION['add_brand']['res'] = '<div id="message-red">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
				                        <tr>
					                   <td class="red-left">Ошибка. <a href="">Ошибка при добавлении категории!</a></td>
					                   <td class="red-right"><a class="close-red"><img src="'.ADMIN_TEMPLATE.'images/table/icon_close_red.gif"   alt="" /></a></td>
				                        </tr>
				                        </table>
				                        </div>';
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
    $_SESSION['answer'] = '<div id="message-green">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
				                        <tr>
					                   <td class="green-left">Категория успешно удалена! </td>
					                   <td class="green-right"><a class="close-green"><img src="'.ADMIN_TEMPLATE.'images/table/icon_close_green.gif"   alt="" /></a></td>
				                        </tr>
				                        </table>
				                        </div>';
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
    $image = "Effiplus EPLUTO 195 55R16 87H.jpeg";
    
    if(empty($name)){
        $_SESSION['add_product']['res'] = '<div id="message-red">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                       <td class="red-left">Ошибка. <a href="">Не указано название товара!</a></td>
                                       <td class="red-right"><a class="close-red"><img src="'.ADMIN_TEMPLATE.'images/table/icon_close_red.gif"   alt="" /></a></td>
                                        </tr>
                                        </table>
                                        </div>'; 
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
        
        $query = "INSERT INTO goods (name, keywords, image, description, width, height, Radius, goods_brandid, anons, content, hits, new, sale, season, price, available, date, visible)
                    VALUES ('$name', '$keywords', '$image', '$description', $width, $height, $Radius, $goods_brandid, '$anons', '$content', '$hits', '$new', '$sale', '$season', $price, $available, '$date', '$visible')";
        $res = mysql_query($query) or die (mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = '<div id="message-green">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                       <td class="green-left">Товар успешно добавлен! </td>
                                       <td class="green-right"><a class="close-green"><img src="'.ADMIN_TEMPLATE.'images/table/icon_close_green.gif"   alt="" /></a></td>
                                        </tr>
                                        </table>
                                        </div>';
            return true;
        }else{
            $_SESSION['add_product']['res'] = '<div id="message-red">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                       <td class="red-left">Ошибка. <a href="">Ошибка при добавлении товара!</a></td>
                                       <td class="red-right"><a class="close-red"><img src="'.ADMIN_TEMPLATE.'images/table/icon_close_red.gif"   alt="" /></a></td>
                                        </tr>
                                        </table>
                                        </div>'; 
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
function orders($status, $start_position, $goods_for_page){
    $query = "SELECT orders.order_id, orders.order_date, orders.status, customers.name, customers.second_name, customers.otchestvo
                FROM orders 
                    LEFT JOIN customers
                        ON customers.customer_id = orders.customer_id
                            ".$status." LIMIT $start_position, $goods_for_page"; 
    $res = mysql_query($query);
    
    $orders = array();
    while ($row = mysql_fetch_assoc($res)){
        $orders[] = $row;
        
    };
    return $orders;
};
/* ===Получение необработанных заказов=== */

/* ===Количество заказов=== */
function count_orders($status){
    $query = "SELECT COUNT(order_id) FROM orders".$status;
    $res = mysql_query($query);
    
    $count_orders = mysql_fetch_row($res);
    
    return $count_orders[0];  
};
/* ===Количество заказов=== */

/* ===Просмотр заказа=== */
function show_order($order_id){
    //order_goods: name, price, quantity
    //orders: date, comment
    //customers: name, email, phone, address
    //dostavka: name
    
    $query = "SELECT order_goods.name, order_goods.price, order_goods.quantity,
                orders.order_date, orders.comment, orders.status,
                    customers.name AS customer, customers.second_name, customers.otchestvo, customers.email, customers.phone, customers.address,
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

/* ===Определение бренда по номеру категории=== */
function getbrand($category_number){
    $query = "SELECT brand_name FROM brands
                WHERE brand_id = $category_number";
    $res = mysql_query($query) or die (mysql_error());
    while($row = mysql_fetch_assoc($res)){
        $number = $row['brand_name'];
     };
    return $number; 
};
/* ===Определение бренда по номеру категории=== */

/* ===Подтверждение заказа=== */
function confirm_order($order_id){
    $query = "UPDATE orders SET status = '1'
                WHERE order_id = $order_id";
    mysql_query($query);
    if (mysql_affected_rows() > 0){
        return true;  
    }else{
        return false;
    }
};
/* ===Подтверждение заказа=== */

/* ===Удаление заказа=== */
function del_order($order_id){
    mysql_query("DELETE FROM orders WHERE order_id = $order_id");
    mysql_query("DELETE FROM order_goods WHERE order_id = $order_id");
    if(mysql_affected_rows() > 0){
        return true;
    }else{
        return false;
    }
      
};
/* ===Удаление заказа=== */

/* ===Количество пользователей=== */
function count_users(){
    $query = "SELECT COUNT(customer_id) FROM customers";
    $res = mysql_query($query);
    
    $count_users = mysql_fetch_row($res);
    
    return $count_users[0];  
};
/* ===Количество пользователей=== */

/* ===Получение списка пользователей=== */
function get_users($start_position, $goods_for_page){
    $query = "SELECT customer_id, name, email, name_character
                FROM customers 
                LEFT JOIN `character`
                    ON customers.id_role = character.id_role
                        LIMIT $start_position, $goods_for_page";
    $res = mysql_query($query);
    $users = array();
    while ($row = mysql_fetch_assoc($res)){
        $users[] = $row;
        
    }
    return $users;
};
/* ===Получение списка пользователей=== */
?>