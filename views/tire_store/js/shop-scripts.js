$(document).ready(function()
{

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

		//Скрипт проверки файла куки при загрузке сайта
	if ($.cookie('select_style_products') == 'grid') //если содержимое файла "select_style_products" == 'grid' то
		{
		$("#block-content__block-products--grid").show(); //показываем блок с выводом товаров в виде таблицы
		$("#block-content__block-products--list").hide(); //прячем блок с выводом товаров в виде списка

		$(".option-list__img1").attr("src", "/images/icon-grid-active.png"); //при нажатии на кнопку, меняем картинку на красную
		$(".option-list__img2").attr("src", "/images/icon-list.png"); //и меняем картинку "option-list__img2" на обычную
		}
		else //если содержимое файла "select_style_products" !== 'grid' то
		{
		$("#block-content__block-products--grid").hide(); //прячем блок с выводом товаров в виде таблицы
		$("#block-content__block-products--list").show(); //показываем блок с выводом товаров в виде списка
	
		$(".option-list__img2").attr("src", "/images/icon-list-active.png"); //при нажатии на кнопку, меняем картинку на красную
		$(".option-list__img1").attr("src", "/images/icon-grid.png"); //и меняем картинку "option-list__img1" на обычную
		};

	//Скрипт изменения вида вывода товаров
	$(".option-list__img1").click(function(){ //Если нажата кнопка "option-list__img1"
		$("#block-content__block-products--grid").show(); //показываем блок с выводом товаров в виде таблицы
		$("#block-content__block-products--list").hide(); //прячем блок с выводом товаров в виде списка

		$(".option-list__img1").attr("src", "/images/icon-grid-active.png"); //при нажатии на кнопку, меняем картинку на красную
		$(".option-list__img2").attr("src", "/images/icon-list.png"); //и меняем картинку "option-list__img2" на обычную
	
		$.cookie('select_style_products','grid'); //записываем в файл "select_style_products" куки значением grid 
	});

	
	$(".option-list__img2").click(function(){ //Если нажата кнопка "option-list__img2"
		$("#block-content__block-products--grid").hide(); //прячем блок с выводом товаров в виде таблицы
		$("#block-content__block-products--list").show(); //показываем блок с выводом товаров в виде списка
	
		$(".option-list__img2").attr("src", "/images/icon-list-active.png"); //при нажатии на кнопку, меняем картинку на красную
		$(".option-list__img1").attr("src", "/images/icon-grid.png"); //и меняем картинку "option-list__img1" на обычную
	
		$.cookie('select_style_products','list'); //записываем в файл "select_style_products" куки значением list
	});

		//Скрипт сортировки, нажатие на ссылку ".option-list__item-link"
		$("#option-list__item--link").click(function() {

			$("#option-list-item5__sorting--list").slideToggle(200); //slideToggle - функция для правного показывания, аргумент - скорость( в мсек)

		});

		
		//Скрипт "Аккодрион" - вывод списков категорий товаров, фирм и т.п
		$('.category-list__item > a').click(function(){ //используем каскадирование, т.к у нас для ссылок указано 3 id

		if ($(this).attr('class') != 'active' ) //через параметр this - передается на какую именно ссылку мы нажали и если эта ссылка не активна
		{
			$('.category-list__category-sublist').slideUp(400); //закрываем все категории, все списки
			$(this).next().slideToggle(400); // открываем именно тот список, на какую ссылку мы нажимаем, next() - следующий элемент, в данном случае - список

			$('.category-list__item > a').removeClass('active'); //удаляем у всех ссылок класс "active"
			$(this).addClass('active'); //именно данной ссылке добавляем класс "active"
			$.cookie('select_category', $(this).attr('id')); // запоминание в файл "select_category" - атрибута нажатой ссылки (id)
		}else //если мы нажимаем уже на активную ссылку
		{
			$('.category-list__item > a').removeClass('active'); //удаляем у всех ссылок класс "active"
			$('.category-list__category-sublist').slideUp(400); //закрываем все категории, все списки
			$.cookie('select_category', ''); //записываем в файл "select_category" пустое место
		}
		
		}); 

		//Скрипт проверки при загрузке страницы файла "select_category"
		if ($.cookie('select_category') != '')
		{
			$('.category-list__item > #'+$.cookie('select_category')).addClass('active').next().show();
		}



});