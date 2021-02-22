
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$title?></title>
<link rel="stylesheet" href="<?=ADMIN_TEMPLATE?>css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="<?=ADMIN_TEMPLATE?>js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="<?=ADMIN_TEMPLATE?>js/jquery/ui.core.js" type="text/javascript"></script>
<script src="<?=ADMIN_TEMPLATE?>js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="<?=ADMIN_TEMPLATE?>js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=ADMIN_TEMPLATE?>js/workscripts.js"></script>
<script type="text/javascript" src="<?=ADMIN_TEMPLATE?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "temp/images/forms/choose-file.gif",
          imageheight : 28,
          imagewidth : 78,
          width : 310
      });
  });
</script>



</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    
   
   <a href="?view=pages"><img class="admin_img" style="" src="<?=ADMIN_TEMPLATE?>/images/admin.png" width="95"/></a>
   <center>
    <p style="margin-left: 15px; font-size: 55px; line-height: 85px; color: #FFFFFF; font-family: Verdana, sans-serif;"><i>Панель администратора</i></p>
    </center>
<!-- Start: page-top -->
<div id="page-top">

	
	
	
 	

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
        <div class="nav-divider">&nbsp;</div>
			<div class="showhide-account" style="font-size: 12px; line-height: 12px; color: #FFFFFF; font-family: Verdana, sans-serif;"><a style="color: white;" href="<?=PATH?>" target="_blank">
            Вы вошли как 
            <?php if($_SESSION['auth']['role'] == 3): ?>
            Менеджер
            <?php else: ?>
            Администратор
            <?php endif;?>
            </a></div>
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account" style="font-size: 12px; line-height: 12px; color: #FFFFFF; font-family: Verdana, sans-serif;"><a style="color: white;" href="<?=PATH?>" target="_blank">На сайт</a></div>
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="<?=ADMIN_TEMPLATE?>images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="?do=logout" id="logout"><img src="<?=ADMIN_TEMPLATE?>images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table" style="width:800px;">
		
		<ul class="select"><li><a href="?view=pages"><b>Страницы</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div> -->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="#nogo"><b>Товары</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="#nogo">Просмотр всех товаров</a></li>
				<li><a href="#nogo">Редактирование товаров</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="?view=brands"><b>Категории</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
			<?php foreach($category as $key => $item): ?>
				
				<li><a href="?view=category&number_category=<?=$key?>"><?=$item[0]?></a></li>
			<?php endforeach; ?>
				
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="?view=users"><b>Пользователи</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Клиенты</a></li>
				<li><a href="#nogo">Менеджеры продаж</a></li>
				<li><a href="#nogo">Администраторы</a></li>
			 
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Новости</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">News details 1</a></li>
				<li><a href="#nogo">News details 2</a></li>
				<li><a href="#nogo">News details 3</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Заказы</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">News details 1</a></li>
				<li><a href="#nogo">News details 2</a></li>
				<li><a href="#nogo">News details 3</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>