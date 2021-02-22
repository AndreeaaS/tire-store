$(document).ready(function()
{

	//������ ��������� ��������
	$("#block-news__newsticker").jCarouselLite({ //����������� ������� � ����� ��������
	vertical: true, //������������ �������
	hoverPause: true, //��� ��������� �� ���� ������������� ���!
	btnPrev: "#block-news__img1", //�������� ������������� �����
	btnNext: "#block-news__img2", //�������� ������������� ����
	visible: 3, //���������� ��������, ������� ����� ����������
	auto: 3000, //�������� ������������� ��������
	speed: 500 //�������� �������������
	});

		//������ �������� ����� ���� ��� �������� �����
	if ($.cookie('select_style_products') == 'grid') //���� ���������� ����� "select_style_products" == 'grid' ��
		{
		$("#block-content__block-products--grid").show(); //���������� ���� � ������� ������� � ���� �������
		$("#block-content__block-products--list").hide(); //������ ���� � ������� ������� � ���� ������

		$(".option-list__img1").attr("src", "/images/icon-grid-active.png"); //��� ������� �� ������, ������ �������� �� �������
		$(".option-list__img2").attr("src", "/images/icon-list.png"); //� ������ �������� "option-list__img2" �� �������
		}
		else //���� ���������� ����� "select_style_products" !== 'grid' ��
		{
		$("#block-content__block-products--grid").hide(); //������ ���� � ������� ������� � ���� �������
		$("#block-content__block-products--list").show(); //���������� ���� � ������� ������� � ���� ������
	
		$(".option-list__img2").attr("src", "/images/icon-list-active.png"); //��� ������� �� ������, ������ �������� �� �������
		$(".option-list__img1").attr("src", "/images/icon-grid.png"); //� ������ �������� "option-list__img1" �� �������
		};

	//������ ��������� ���� ������ �������
	$(".option-list__img1").click(function(){ //���� ������ ������ "option-list__img1"
		$("#block-content__block-products--grid").show(); //���������� ���� � ������� ������� � ���� �������
		$("#block-content__block-products--list").hide(); //������ ���� � ������� ������� � ���� ������

		$(".option-list__img1").attr("src", "/images/icon-grid-active.png"); //��� ������� �� ������, ������ �������� �� �������
		$(".option-list__img2").attr("src", "/images/icon-list.png"); //� ������ �������� "option-list__img2" �� �������
	
		$.cookie('select_style_products','grid'); //���������� � ���� "select_style_products" ���� ��������� grid 
	});

	
	$(".option-list__img2").click(function(){ //���� ������ ������ "option-list__img2"
		$("#block-content__block-products--grid").hide(); //������ ���� � ������� ������� � ���� �������
		$("#block-content__block-products--list").show(); //���������� ���� � ������� ������� � ���� ������
	
		$(".option-list__img2").attr("src", "/images/icon-list-active.png"); //��� ������� �� ������, ������ �������� �� �������
		$(".option-list__img1").attr("src", "/images/icon-grid.png"); //� ������ �������� "option-list__img1" �� �������
	
		$.cookie('select_style_products','list'); //���������� � ���� "select_style_products" ���� ��������� list
	});

		//������ ����������, ������� �� ������ ".option-list__item-link"
		$("#option-list__item--link").click(function() {

			$("#option-list-item5__sorting--list").slideToggle(200); //slideToggle - ������� ��� �������� �����������, �������� - ��������( � ����)

		});

		
		//������ "���������" - ����� ������� ��������� �������, ���� � �.�
		$('.category-list__item > a').click(function(){ //���������� ��������������, �.� � ��� ��� ������ ������� 3 id

		if ($(this).attr('class') != 'active' ) //����� �������� this - ���������� �� ����� ������ ������ �� ������ � ���� ��� ������ �� �������
		{
			$('.category-list__category-sublist').slideUp(400); //��������� ��� ���������, ��� ������
			$(this).next().slideToggle(400); // ��������� ������ ��� ������, �� ����� ������ �� ��������, next() - ��������� �������, � ������ ������ - ������

			$('.category-list__item > a').removeClass('active'); //������� � ���� ������ ����� "active"
			$(this).addClass('active'); //������ ������ ������ ��������� ����� "active"
			$.cookie('select_category', $(this).attr('id')); // ����������� � ���� "select_category" - �������� ������� ������ (id)
		}else //���� �� �������� ��� �� �������� ������
		{
			$('.category-list__item > a').removeClass('active'); //������� � ���� ������ ����� "active"
			$('.category-list__category-sublist').slideUp(400); //��������� ��� ���������, ��� ������
			$.cookie('select_category', ''); //���������� � ���� "select_category" ������ �����
		}
		
		}); 

		//������ �������� ��� �������� �������� ����� "select_category"
		if ($.cookie('select_category') != '')
		{
			$('.category-list__item > #'+$.cookie('select_category')).addClass('active').next().show();
		}



});