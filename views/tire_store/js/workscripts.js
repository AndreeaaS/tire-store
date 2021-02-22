$(document).ready(function(){
/* ===Аккордеон=== */
    var openItem = false;
    if($.cookie("openItem") && $.cookie("openItem") != 'false' ){
    var openItem = parseInt($.cookie("openItem"));
   }
   $("#accordion").accordion({
    active: openItem,
    collapsible: true,
    header: 'h3',
    autoHeight: false
    
   });
   
   $("#accordion h3").click(function(){
        $.cookie("openItem", $("#accordion").accordion("option", "active")); // запоминание активного пункта меню
   });
   
   $("#accordion > li").click(function(){
        $.cookie("openItem", null);
        var link = $(this).find('a').attr('href');
        window.location = link;
   });
/* ===Аккордеон=== */


/* ===Переключатель видов=== */
/*
    if ($.cookie("display") == null){
      $.cookie("display", "view_grid");
    }
    $("#view_grid").click(function(){
    var display = $(this).attr("id");
    display = (display == "view_grid") ? "view_grid" : "view_list"; // допустимые значения display
        if (display == $.cookie("display")){
            // если значение переключателя совпадает с кукой - то ничего не делаем
            return false; // отменяем переход по ссылке
        }else{
            // иначе - установим куку с новым значением вида
            $.cookie("display", display);
            window.location = "?" + url_query; // общараемся к глобальному массиву "SERVER" и "QUERY_STRING" - который хранит текущий URL запрос
            $("#view_grid1").attr("src", "views/tire_store/images/vid-tabl-active.jpg");
            $("#view_list1").attr("src", "views/tire_store/images/vid-line.jpg");
            return false;
        };
    });
    
    $("#view_list").click(function(){
    var display = $(this).attr("id");
    display = (display == "view_grid") ? "view_grid" : "view_list"; // допустимые значения display
        if (display == $.cookie("display")){
            // если значение переключателя совпадает с кукой - то ничего не делаем
            return false; // отменяем переход по ссылке
        }else{
            // иначе - установим куку с новым значением вида
            $.cookie("display", display);
            window.location = "?" + url_query; // общараемся к глобальному массиву "SERVER" и "QUERY_STRING" - который хранит текущий URL запрос
            $("#view_grid1").attr("src", "views/tire_store/images/vid-tabl.jpg");
            $("#view_list1").attr("src", "views/tire_store/images/vid-line-active.jpg");
            return false;
        };
    });
    */
/* ===Переключатель видов=== */
       
/* ===Скрипт кнопки "НАВЕРХ"=== */
  var top_show = 200; // В каком положении полосы прокрутки начинать показ кнопки "Наверх"
  var delay = 700; // Задержка прокрутки
  $(document).ready(function() {
    $(window).scroll(function () { // При прокрутке попадаем в эту функцию
      /* В зависимости от положения полосы прокрукти и значения top_show, скрываем или открываем кнопку "Наверх" */
      if ($(this).scrollTop() > top_show) $('#wrapper__top-button').fadeIn();
      else $('#wrapper__top-button').fadeOut();
    });
    $('#wrapper__top-button').click(function () { // При клике по кнопке "Наверх" попадаем в эту функцию
      /* Плавная прокрутка наверх */
      $('body, html').animate({
        scrollTop: 0
      }, delay);
    });
  });
/* ===Скрипт кнопки "НАВЕРХ"=== */   

/* ===Маска для телефона=== */
jQuery(function($){
   $("#user-phone").mask("+7(999) 999-9999");
   });
/* ===Маска для телефона=== */


/* ===Авторизация AJAX=== */
   /* $("#auth-button").click(function(e){
        e.preventDefault();
        var email = $("#user-email").val();
        var pass = $("#user-password").val();
        var auth = $("#auth-button").val();
        
        $.ajax({
            url: './',
            type: 'POST',
            data: {auth: auth, email: email, pass: pass},
            success: function(res){
                if (res != 'Поля email/пароль должны быть заполнены!' && res != 'Email/пароль введены неверно!'){
                    // если пользователь успешно авторизован
                    $("#enter_form").hide().fadeIn(500).html(res);
                }else{
                    // если авторизация неудачна
                    
                }
            },
            error: function(){
                alert("Error!");  
            }
        });
        
    }); */
/* ===Авторизация AJAX=== */

/* ===ENTER при пересчете=== */
 $(".kolvo").keypress(function(e){
    if (e.which == 13){
        return false;
    }
 });
/* ===ENTER при пересчете=== */

/* ===Пересчет товаров в корзине=== */
$(".kolvo").each(function(){
    var qty_start = $(this).val(); // количество то изменения
    $(this).change(function(){
        var qty = $(this).val(); // количество перед пересчетом
        var res = confirm("Пересчитать корзину?");
        if (res){
            var id = $(this).attr("id")
            id = id.substr(2);
            if (!parseInt(qty)){
                qty = qty_start;
            }
            // передаем параметры
            window.location = "?view=cart&qty=" + qty+ "&id=" + id;
        }else{
            // если отменен пересчет корзины
            $(this).val(qty_start);
        }
    });
    
    
});
/* ===Пересчет товаров в корзине=== */


if ($.cookie('display') == 'view_grid') //если содержимое файла "select_style_products" == 'grid' то
		{
		$("#catalog__product-table-block").show(); //показываем блок с выводом товаров в виде таблицы
		$("#catalog__product-line-block").hide(); //прячем блок с выводом товаров в виде списка

		$("#view_grid1").attr("src", "views/tire_store/images/vid-tabl-active.jpg"); //при нажатии на кнопку, меняем картинку на красную
		$("#view_list1").attr("src", "views/tire_store/images/vid-line.jpg"); //и меняем картинку "option-list__img2" на обычную
		}
		else //если содержимое файла "select_style_products" !== 'grid' то
		{
		$("#catalog__product-table-block").hide(); //прячем блок с выводом товаров в виде таблицы
		$("#catalog__product-line-block").show(); //показываем блок с выводом товаров в виде списка
	
		$("#view_grid1").attr("src", "views/tire_store/images/vid-tabl.jpg"); //при нажатии на кнопку, меняем картинку на красную
		$("#view_list1").attr("src", "views/tire_store/images/vid-line-active.jpg"); //и меняем картинку "option-list__img1" на обычную
		};

	//Скрипт изменения вида вывода товаров
	$("#view_grid1").click(function(){ //Если нажата кнопка "option-list__img1"
		$("#catalog__product-table-block").show(); //показываем блок с выводом товаров в виде таблицы
		$("#catalog__product-line-block").hide(); //прячем блок с выводом товаров в виде списка

		$("#view_grid1").attr("src", "views/tire_store/images/vid-tabl-active.jpg"); //при нажатии на кнопку, меняем картинку на красную
		$("#view_list1").attr("src", "views/tire_store/images/vid-line.jpg"); //и меняем картинку "option-list__img2" на обычную
	
		$.cookie('display','view_grid'); //записываем в файл "select_style_products" куки значением grid 
	});

	
	$("#view_list1").click(function(){ //Если нажата кнопка "option-list__img2"
		$("#catalog__product-table-block").hide(); //прячем блок с выводом товаров в виде таблицы
		$("#catalog__product-line-block").show(); //показываем блок с выводом товаров в виде списка
	
		$("#view_grid1").attr("src", "views/tire_store/images/vid-tabl.jpg"); //при нажатии на кнопку, меняем картинку на красную
		$("#view_list1").attr("src", "views/tire_store/images/vid-line-active.jpg"); //и меняем картинку "option-list__img1" на обычную
	
		$.cookie('display','view_list'); //записываем в файл "select_style_products" куки значением list
	});

/*===Скрипт сортировки, нажатие на ссылку ".option-list__item-link" === */
$("#param_order").click(function() {
    $("#sort__wrapper").slideToggle(200); //slideToggle - функция для правного показывания, аргумент - скорость( в мсек)
});

//Скрипт прокрутки новостей
	$("#block-news__newsticker").jCarouselLite({ //подключение скрипта к блоку новостей
	vertical: true, //вертикальная позиция
	hoverPause: true, //при наведении на блок прокручивания нет!
	btnPrev: "#block-news__img1", //картинка прокручивания вверх
	btnNext: "#block-news__img2", //картинка прокручивания вниз
	visible: 3, //количество новостей, которые будут выводиться
	auto: 3000, //интервал прокручивания новостей
	speed: 500 //скорость прокручивания
	});

/* Скрипт геолокации
    ymaps.ready(function() {
            var country = ymaps.geolocation.country;
            var city = ymaps.geolocation.city;
            
            $('#country').html('Выша страна '+country);            
            $('#city').html(city);
        });
*/
    $("ul.tabs").jTabs({content: ".tabs_content", animate: true, effect:"fade"});

}); 



