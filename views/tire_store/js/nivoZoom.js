$(window).load(function() {
	$('body').nivoZoom({
		speed:500, // Скорость увеличения
		zoomHoverOpacity:0.8, // прозрачность увеличенного фото
		overlay:false, // наложение отсутствует
		overlayColor:'#333', // цвет наложения на картинку
		overlayOpacity:0.5, // прозрачность наложения
		captionOpacity:0.8 // Прозрачность подписи
	});
});