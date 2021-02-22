<?php
	defined('CHECK') or die ('Access denied');
    
    // модель
    
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
    $query = "SELECT page_id, title 
                FROM pages ORDER BY position";
    $res = mysql_query($query) or die (mysql_error());
    $pages = array();
    while ($row = mysql_fetch_assoc($res)){
        $pages[] = $row;  
    };
    
    return $pages;
};
/* ===Страницы=== */

/* ===Отдельная страница=== */
function get_page($page_id){
    $query = "SELECT title, text
                FROM pages 
                WHERE page_id = $page_id";
    $res = mysql_query($query) or die (mysql_error());
    $get_page = array();
    $get_page = mysql_fetch_assoc($res);
    
    return $get_page;
};
/* ===Отдельная страница=== */

/* ===Отдельная новость=== */
function get_news_text($news_id){
    $query = "SELECT title, text, date 
                FROM news WHERE news_id = $news_id";
    $res = mysql_query($query);
    
    $news_text = array();
    $news_text = mysql_fetch_assoc($res);
    
    return $news_text;  
};
/* ===Отдельная новость=== */

/* ===Архив новостей=== */
function get_all_news($start_position, $goods_for_page){
    $query = "SELECT news_id, title, anons, date 
                FROM news ORDER BY date DESC LIMIT $start_position, $goods_for_page";
    $res = mysql_query($query);
    
    $all_news = array();
    while($row = mysql_fetch_assoc($res)){
        $all_news[] = $row;
    }
    
    return $all_news;
};
/* ===Архив новостей=== */

/* ===Количество новостей=== */
function count_news(){
    $query = "SELECT COUNT(news_id)
                FROM news";
    $res = mysql_query($query);
    
    $count_news = mysql_fetch_row($res);
    return $count_news[0];
};
/* ===Количество новостей=== */

/* ===Информеры - получение массива=== */
function informer(){
    $query = "SELECT * FROM links 
                INNER JOIN informers ON 
                    links.parent_informer = informers.informer_id
                        ORDER BY informer_position, links_position";    
                        
    $res = mysql_query($query) or die (mysql_error());
    $informers = array();
    $name = ''; // флаг имени информера
    while ($row = mysql_fetch_assoc($res)){
      if ($row['informer_name'] != $name){ // если такого информера в нашем массиве еще нет
        $informers[$row['informer_id']][] = $row['informer_name']; // добавление информер в массив
        $name = $row['informer_name'];
      }
      $informers[$row['parent_informer']]['sub'][$row['link_id']] = $row['link_name']; // заносим страницы в информер
    };
     return $informers;                   
};
/* ===Информеры - получение массива=== */ 

/* ===Получение текста информера=== */
function get_text_informer($informer_id){
    $query = "SELECT link_id, link_name, text, informers.informer_id, informers.informer_name
                FROM links 
                    LEFT JOIN informers ON informers.informer_id = links.parent_informer
                        WHERE link_id = $informer_id";
    $res = mysql_query($query);
    
    $text_informer = array();
    $text_informer = mysql_fetch_assoc($res);
    
    return $text_informer;
};
/* ===Получение текста информера=== */

/* ===Получение количества товаров разных айстопперов=== */
function count_goods_eyestoppers($eyestopper){
    $query = "SELECT COUNT(goods_id) as count_goods_eyestoppers FROM goods
                WHERE visible='1' AND $eyestopper='1'";
    $res = mysql_query($query) or die (mysql_error());
    while($row = mysql_fetch_assoc($res)){
        if($row['count_goods_eyestoppers'] > 0) $count_goods_eyestoppers = $row['count_goods_eyestoppers'];
    };
    return $count_goods_eyestoppers;
};
/* ===Получение количества товаров разных айстопперов=== */

/* ===Айстопперы - новинки, лидеры продаж, распродажа - на выходе - массив=== */
function eyestopper($eyestopper, $start_position, $goods_for_page){
    $query = "SELECT goods_id, name, image, price, available FROM goods
                WHERE visible='1' AND $eyestopper='1' LIMIT $start_position, $goods_for_page";
    $res = mysql_query($query) or die (mysql_error());
    
    $eyestoppers = array();
    
    while ($row = mysql_fetch_assoc($res)){
        $eyestoppers[] = $row;
    };
    return $eyestoppers;         
};
/* ===Айстопперы - новинки, лидеры продаж, распродажа - на выходе - массив=== */

/* ===Получение количества товаров для навигации=== */
function count_goods($number_category, $season){
   // if(empty($season)) $season = '';
    $query = "(SELECT COUNT(goods_id) as count_goods 
                FROM goods 
                    WHERE goods_brandid=$number_category AND visible='1')
               UNION     
               (SELECT COUNT(goods_id) as count_goods 
                FROM goods 
                    WHERE season='$season' AND visible='1')"; // UNION - объединение двух запросов
    $res = mysql_query($query) or die (mysql_error());
    
    while($row = mysql_fetch_assoc($res)){
        if($row['count_goods'] > 0) $count_goods = $row['count_goods'];
    };
    return $count_goods;
};
/* ===Получение количества товаров для навигации=== */

/* ===Получение массива товаров по категории=== */
function products($number_category, $season, $order_sql, $start_position, $goods_for_page){
    $query = "(SELECT goods_id, name, image, anons, price, hits, new, sale, date, available 
                FROM goods 
                    WHERE goods_brandid=$number_category AND visible='1')
               UNION     
               (SELECT goods_id, name, image, anons, price, hits, new, sale, date, available 
                FROM goods 
                    WHERE season='$season' AND visible='1') ORDER BY $order_sql LIMIT $start_position, $goods_for_page"; // UNION - объединение двух запросов
    $res = mysql_query($query) or die (mysql_error());
    
    $products = array();
    while ($row = mysql_fetch_assoc($res)){
      $products[] = $row;  
    };
    return $products;                 
};
/* ===Получение массива товаров по категории=== */

/* ===Получение названия для хлебных крошек=== */
function brand_name($cat){
    $query = "SELECT brand_id, brand_name 
                FROM brands
                    WHERE brand_id = $cat"; 
    $res = mysql_query($query);
    
    $brand_name = array();
    while($row = mysql_fetch_assoc($res)){
        $brand_name[] = $row;  
    };
    
    return $brand_name;
    
};
/* ===Получение названия для хлебных крошек=== */

/* ===Получение количетва выбранных товаров для навигации=== */
function count_goods_filter($cat, $startprice, $endprice, $season){
    
    
    if ($cat OR $endprice OR $season){
        $predicat1 = "visible='1'";
        if($cat){
             $predicat1 .= " AND goods_brandid IN($cat)"; 
        };
        
        if ($season){
        $predicat2 = " AND season = ('$season')";  
        };
        
        if($endprice){
            $predicat1 .= " AND price BETWEEN $startprice AND $endprice";  
        };
        
        $query = "SELECT COUNT(goods_id) as count_goods_filter
                    FROM goods
                        WHERE $predicat1 $predicat2 ;";
        $res = mysql_query($query) or die (mysql_error());
        
            while($row = mysql_fetch_assoc($res)){
                if($row['count_goods_filter'] > 0) {
                    $count_goods_filter = $row['count_goods_filter'];
                    }else{
                        $count_goods_filter = 0;
                    } ;
            };  
        
    }else{
        $count_goods_filter = 0; 
    };
    return $count_goods_filter;
};
/* ===Получение количетва выбранных товаров для навигации=== */

/* ===Выбор по параметрам=== */
function filter($cat, $startprice, $endprice, $season, $width, $height, $radius, $start_position, $goods_for_page){
    $products = array();
    
    if ($cat OR $endprice OR $season OR $width OR $radius OR $height){
        $predicat1 = "visible='1'";
        if($width){
            $predicat3 .=" AND width=$width";  
        };
        
        if($height){
            $predicat3 .=" AND height=$height";  
        };
        
        if($radius){
            $predicat3 .=" AND Radius=$radius";  
        };
        
        if($cat){
             $predicat1 .= " AND goods_brandid IN($cat)"; 
        };
        
        if ($season){
        $predicat2 = " AND season = ('$season')";  
        };
        
        if($endprice){
            $predicat1 .= " AND price BETWEEN $startprice AND $endprice";  
        };
        
        $query = "SELECT goods_id, name, image, anons, price, hits, new, sale, available
                    FROM goods
                        WHERE $predicat1 $predicat2 $predicat3 ORDER BY name LIMIT $start_position, $goods_for_page;";
        $res = mysql_query($query) or die (mysql_error());
        if (mysql_num_rows($res) > 0){
            while($row = mysql_fetch_assoc($res)){
                $products[] = $row;  
            };  
        }else{
            $products['notfound'] = "<div class='error'>По Вашему запросу ничего не найдено!</div>";
        };
    }else{
        $products['notfound'] = "<div class='error'>Вы указали надостаточно параметров подбора!</div>";  
    };
    return $products;
};
/* ===Выбор по параметрам=== */

/* ===Сумма заказа в корзине + атрибуты товара=== */
function total_sum($goods){
   $total_sum = 0;
   
   $str_goods = implode(',',array_keys($goods)); // implode - функция, создающая строку из элементов массива
   
   $query = "SELECT goods_id, name, price, image
                FROM goods
                    WHERE goods_id IN ($str_goods)"; 
                    
   $res = mysql_query($query) or die (mysql_error());
   
   while ($row = mysql_fetch_assoc($res)){
        $_SESSION['cart'][$row['goods_id']]['name'] = $row['name'];
        $_SESSION['cart'][$row['goods_id']]['price'] = $row['price'];
        $_SESSION['cart'][$row['goods_id']]['image'] = $row['image'];
        $total_sum += $_SESSION['cart'][$row['goods_id']]['qty'] * $row['price'];
   };
   return $total_sum;                  
};
/* ===Сумма заказа в корзине + атрибуты товара=== */


/* ===Регистрация=== */
function registration(){
    $error = ''; // флаг проверки пустых полей 
    
    $name = clear($_POST['name']); 
    $second_name = clear($_POST['second_name']);
    $otchestvo = clear($_POST['otchestvo']);
    $phone = clear($_POST['phone']);  
    $email = clear($_POST['email']); 
    $pass = trim($_POST['password']);
    $adres = clear($_POST['address']);  
    
    if (empty($name)){   
    $error .= '<li>Не заполнено имя</li>';
    $_SESSION['reg']['error'] = 'name';
    }; // дописываем error 
    
    if (empty($second_name)){   
    $error .= '<li>Не заполнена фамилия</li>';
    $_SESSION['reg']['error5'] = 'second_name';
    }; // дописываем error 
    
    if (empty($otchestvo)){   
    $error .= '<li>Не заполнео отчество</li>';
    $_SESSION['reg']['error6'] = 'otchestvo';
    }; // дописываем error 
     
    if (empty($phone)) {
        $error .= '<li>Не заполнен контактный телефон</li>';
    $_SESSION['reg']['error1'] = 'phone';    
    };
    if (empty($email)){ 
        $error .= '<li>Не заполнен email</li>';
        $_SESSION['reg']['error2'] = 'email';
    };
    if (empty($pass)) {  $error .= '<li>Не заполнен пароль</li>';
        $_SESSION['reg']['error3'] = 'pass';
    };
    if (empty($adres)){ $error .= '<li>Не заполнен адрес</li>';
        $_SESSION['reg']['error4'] = 'adres';
    };
    
    if (empty($error)) {
        // если все поля заполнены
        // проверяем начилие такого пользователя в БД
        $query = "SELECT customer_id FROM customers 
                    WHERE email = '$email' LIMIT 1";
        $res = mysql_query($query) or die (mysql_error());
        $row = mysql_num_rows($res); // если вернет 1 - такой юзер есть, 0 - нет
            if($row) {
                //если такой email уже есть
                $_SESSION['reg']['res'] = "<div class='error'>Пользователь с таким email уже зарегистрирован на сайте</div>";
                $_SESSION['reg']['name'] = $name;
                $_SESSION['reg']['second_name'] = $second_name;
                $_SESSION['reg']['otchestvo'] = $otchestvo;
                $_SESSION['reg']['phone'] = $phone;
                $_SESSION['reg']['adres'] = $adres;
            }else{
                //если все ок - регистрируем пользователя
                $pass = md5($pass);
                $query = "INSERT INTO customers (name, second_name, otchestvo, email, phone, address, password)
                            VALUES ('$name', '$second_name', '$otchestvo', '$email', '$phone', '$adres', '$pass')";
                $res = mysql_query($query) or die (mysql_error());
                if (mysql_affected_rows() > 0){
                    // если запись добавлена, т.е. изменилось что-то в БД
                     $_SESSION['reg']['res'] = "<div class='success'>Пользователь успешно зарегистрирован</div>"; 
                     $_SESSION['auth']['user'] = $name;
                     $_SESSION['auth']['email'] = $email;
                     $_SESSION['auth']['customer_id'] = mysql_insert_id(); // данная функция возвращает id последней вставленной записи
                }else{
                      $_SESSION['reg']['res'] = "<div class='error'>Ошибка!></div>";
                        $_SESSION['reg']['name'] = $name;
                        $_SESSION['reg']['second_name'] = $second_name;
                        $_SESSION['reg']['otchestvo'] = $otchestvo;
                        $_SESSION['reg']['phone'] = $phone;
                        $_SESSION['reg']['email'] = $email;
                        $_SESSION['reg']['adres'] = $adres;
                };
            };
    }else{
        // если не заполнены обязательные поля
        //$_SESSION['reg']['res'] = "<div class='error'>Не заполнены обязательные поля: <ul>$error</ul></div>";
        $_SESSION['reg']['name'] = $name;
        $_SESSION['reg']['second_name'] = $second_name;
        $_SESSION['reg']['otchestvo'] = $otchestvo;
        $_SESSION['reg']['phone'] = $phone;
        $_SESSION['reg']['email'] = $email;
        $_SESSION['reg']['adres'] = $adres;
    };

};
/* ===Регистрация=== */

/* ===Авторизация=== */
function autorization(){
     $email = mysql_real_escape_string(trim($_POST['user-email'])); 
     $pass = trim($_POST['user-password']);
     
     if(empty($email) OR empty($pass)){
        // если пусты поля email/пароль
       $_SESSION['auth']['error'] = "Поля email/пароль должны быть заполнены!"; 
     }else{
        // если получены данные из полей email и пароль
        $pass = md5($pass);
        
        $query = "SELECT name, second_name, otchestvo, email, customer_id, phone, address FROM customers 
                    WHERE email = '$email' AND password = '$pass' LIMIT 1";
        $res = mysql_query($query) or die (mysql_error());
        if (mysql_num_rows($res) == 1){
            // пользователь такой существует
            $row = mysql_fetch_row($res);
            $_SESSION['auth']['user'] = $row[0];
            $_SESSION['auth']['user_second_name'] = $row[1];
            $_SESSION['auth']['user_otchestvo'] = $row[2];
            $_SESSION['auth']['email'] = $row[3];
            $_SESSION['auth']['customer_id'] = $row[4];
            $_SESSION['auth']['phone'] = $row[5];
            $_SESSION['auth']['address'] = $row[6];
        }else{
            // если неверен email/пароль
                $_SESSION['auth']['error'] = "Email/пароль введены неверно!"; 
        };
     };
};
/* ===Авторизация=== */

/* ===Способы доставки=== */
function get_delivery(){
    $query = "SELECT * FROM dostavka";
    $res = mysql_query($query);
    $delivery = array();
    while($row = mysql_fetch_assoc($res)){
        $delivery[] = $row;
     };
     return $delivery;
};
/* ===Способы доставки=== */

/* ===Добавление заказа=== */
function add_order(){
    // получение общих данных от пользователя
    $delivery_id = (int)$_POST['delivery'];
    if(!$delivery_id) $delivery_id = 1;
    $comment_for_delivery = clear($_POST['comment_for_delivery']);
    $name = clear($_POST['name']);
    $second_name = clear($_POST['second_name']);
    $otchestvo = clear($_POST['otchestvo']);
    $email = clear($_POST['email']);
    $phone = clear($_POST['phone']);
    $adres = clear($_POST['address']);
    if ($_SESSION['auth']['user']) $customer_id = $_SESSION['auth']['customer_id'];
    
    
    $error = ''; // флаг проверки пустых полей 
    
    $name = clear($_POST['name']);
    $second_name = clear($_POST['second_name']);
    $otchestvo = clear($_POST['otchestvo']); 
    $phone = clear($_POST['phone']);  
    $email = clear($_POST['email']); 
    $adres = clear($_POST['address']);
      
    
    if (empty($name)){   
    $error .= '<li>Не заполнено имя</li>';
    $_SESSION['order']['error1'] = 'name';
    }; // дописываем error
    
    if (empty($second_name)){   
    $error .= '<li>Не заполнена фамилия</li>';
    $_SESSION['order']['error2'] = 'second_name';
    }; // дописываем error
    
    if (empty($otchestvo)){   
    $error .= '<li>Не заполнен ФИО</li>';
    $_SESSION['order']['error3'] = 'otchestvo';
    }; // дописываем error
      
    if (empty($phone)) {
        $error .= '<li>Не заполнен контактный телефон</li>';
    $_SESSION['order']['error4'] = 'phone';    
    };
    if (empty($email)){ 
        $error .= '<li>Не заполнен email</li>';
        $_SESSION['order']['error5'] = 'email';
    };
    
    if (empty($adres)){ $error .= '<li>Не заполнен адрес</li>';
        $_SESSION['order']['error6'] = 'adres';
    };
    if (empty($error)){
        $_SESSION['order']['email'] = $email;
        save_order($customer_id, $delivery_id, $name, $second_name, $otchestvo, $email, $phone, $adres, $comment_for_delivery);
        
    }else{ //если не заполнены обязательные поля
        $_SESSION['order']['name'] = $name;
        $_SESSION['order']['second_name'] = $second_name;
        $_SESSION['order']['otchestvo'] = $otchestvo;
        $_SESSION['order']['phone'] = $phone;
        $_SESSION['order']['email'] = $email;
        $_SESSION['order']['adres'] = $adres;
        $_SESSION['order']['comment'] = $comment_for_delivery;
        return false;
    }
};
/* ===Добавление заказа=== */

/* ===Сохранение заказа=== */
function save_order($customer_id, $delivery_id, $name, $second_name, $otchestvo, $email, $phone, $adres, $comment_for_delivery){
    $query = "INSERT INTO orders (customer_id, name, second_name, otchestvo, email, phone, address, order_date, dostavka_id, comment)
                VALUES ($customer_id, '$name', '$second_name', '$otchestvo', '$email', '$phone', '$adres', NOW(), $delivery_id, '$comment_for_delivery')";
    mysql_query($query) or die(mysql_error());
    $order_id = mysql_insert_id(); // вернет id последнего запроса
    
    foreach($_SESSION['cart'] as $goods_id => $value){
        $val .= "($order_id, $goods_id, {$value['qty']}, '{$value['name']}', {$value['price']}),";
    }
    $val = substr($val, 0, -1); // удаляем последнюю запятую в строке
    
    $query = "INSERT INTO order_goods (order_id, goods_id, quantity, name, price)
                VALUES $val";
    mysql_query($query) or die (mysql_error());
    
    if (mysql_affected_rows() == -1) {
        // если не выгрузился заказ - то удаляем заказ из таблицы 'orders'
        mysql_query("DELETE FROM orders WHERE order_id = $order_id"); 
        return false; 
    };
    $email = $_SESSION['order']['email'];
    mail_order($order_id, $email); // отправка на email
    
    // если заказ выгрузился
    unset($_SESSION['cart']);
    unset($_SESSION['total_sum']);
    unset($_SESSION['total_quantity']);
    $_SESSION['order']['success'] = "<div class='success' style='text-align : center;'> Спасибо за Ваш заказ. В ближайшее время с Вами свяжется наш менеджер для согласования деталей заказа. </div>";
    header("Location: http://tire_store?view=cart"); // при переносе сайта на сервер, необходимо изменить ссылку 
    return true;
};
/* ===Сохранение заказа=== */
 
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

/* ===Отправка уведомлений о заказа на email=== */
function mail_order($order_id, $email){
    // mail(to, subject, body, [header]);
    $subject = "Заказ в интернет-магизине Shina38-auto.ru!";
    
    // заголовки
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";
    $headers .= "From: Shina38-auto.ru";
    // тело письма  
    $mail_body = "Здравствуйте, ".$_SESSION['auth']['user']."! Благодарим Вас за заказ!\r\nНомер Вашего заказа - {$order_id}
    \r\n\r\nЗаказанные товары: \r\n";
    // проходимся в цикле и получаем все товары и их атрибуты
    foreach ($_SESSION['cart'] as $goods_id => $value){
        $mail_body .= "Наименование:  {$value['name']}, Цена: {$value['price']}, Количество: {$value['qty']} шт.\r\n";  
    };
    $mail_body .= "\r\nИтого: {$_SESSION['total_quantity']} шт. на сумму {$_SESSION['total_sum']} руб.";
    
    // отправка писем
    mail($email, $subject, $mail_body, $headers);
    mail(ADMIN_EMAIL, $subject, $mail_body, $headers);
};
/* ===Отправка уведомлений о заказа на email=== */

/* ===Получение количества найденных товаров для навигации=== */
function count_goods_search(){
    $search = clear($_GET['search']);
    $query = "SELECT  COUNT(goods_id) as count_goods_search
                    FROM goods
                        WHERE MATCH(name) AGAINST('{$search}*' IN BOOLEAN MODE) AND visible='1'";
    $res = mysql_query($query) or die (mysql_error());
    
    while($row = mysql_fetch_assoc($res)){
        if($row['count_goods_search'] > 0) $count_goods_search = $row['count_goods_search'];
    };
    return $count_goods_search;
};
/* ===Получение количества найденных товаров для навигации=== */

/* ===Поиск === */
function search($order_sql,$start_position,$goods_for_page){
    $search = clear($_GET['search']);
    $result_search = array(); // результат поиска
    
    if(mb_strlen($search, 'UTF-8') < 4 ){
        $result_search['notfound'] = "<div class='error'>Поисковый запрос должен содержать не менее 4-х символов</div>";  
    }else{
        $query = "SELECT goods_id, name, image, anons, price, hits, new, sale
                    FROM goods
                        WHERE MATCH(name) AGAINST('{$search}*' IN BOOLEAN MODE) AND visible='1' ORDER BY $order_sql LIMIT $start_position, $goods_for_page";  
        $res = mysql_query($query) or die (mysql_error());
        
        if (mysql_num_rows($res) > 0){
            while($row_search = mysql_fetch_assoc($res)){
                $result_search[] = $row_search;  
            };
        }else{
            $result_search['notfound'] = "<div class='error'>К сожалению, по Вашему запросу ничего не найдено.</div>";
        };
    };
    return $result_search;
};
/* ===Поиск === */

/* ===Отдельный товар=== */
function get_goods($goods_id){
    $query = "SELECT * FROM goods
                WHERE goods_id = $goods_id AND visible = '1'";
    $res = mysql_query($query) or die (mysql_error());
    
    $goods = array();
    $goods = mysql_fetch_assoc($res);
        // $goods['img_slide'] = explode(",", $goods['img_slide']); - разбивает строки на подстроки; "," - разделитель, второй аргумент - строка, которую разделяем 
    return $goods; 
};
/* ===Отдельный товар=== */

?>