<?php

define('CHECK', TRUE);
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/config.php';

if($_SESSION['auth']['admin'] && $_SESSION['auth']['role'] == 3){
    header("Location: ../menedger/");
    exit;
}

if($_SESSION['auth']['admin'] && $_SESSION['auth']['role'] == 2){
    header("Location: ../admin/");
    exit;
} 


if($_POST){
    $email = trim(mysql_real_escape_string($_POST['email']));
    $pass = trim($_POST['pass']);
    $query = "SELECT customer_id, name, password, id_role FROM customers WHERE email = '$email' AND id_role != 1 LIMIT 1";
    $res = mysql_query($query);
    $row = mysql_fetch_assoc($res);
    if($row['password'] == md5($pass)){
        $_SESSION['auth']['admin'] = htmlspecialchars($row['name']);
        $_SESSION['auth']['user_id'] = $row['customer_id'];
        $_SESSION['auth']['role'] = $row['id_role'];
        header("Location: ../");
        exit;
    }else{
        $_SESSION['res'] = '<div class="error">Email/пароль введены неверно!</div>';
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Вход в панель администратора</title>
<link rel="stylesheet" href="../temp/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="../js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="../js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="../js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login" style="visibility: hidden;">
		<a href="index.html"><img src="<?=ADMIN_TEMPLATE?>images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
    <img class="admin_img" src="../admin/temp/images/admin.png" width="95"/>
	<form method="post" action="">
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email</th>
			<td><input type="text" name="email" class="login-inp" /></td>
		</tr>
		<tr>
			<th>Пароль</th>
			<td><input type="password" value="************"  onfocus="this.value=''" class="login-inp" name="pass" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Запомнить меня</label></td>
		</tr>
		<tr>
			<th></th>
			<td><button style="margin-left: 27px;" value="" name="" class="enter_button" >Войти</button></td>
		</tr>
		</table>
	</div>
	</form>
 	<!--  end login-inner -->
	<div class="clear"></div>
	
 </div>
 <!--  end loginbox -->
 
	

</div>
<!-- End: login-holder -->
</body>
</html>