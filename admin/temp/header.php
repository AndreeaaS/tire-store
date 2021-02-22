<?php defined('CHECK') or die('Access denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?=ADMIN_TEMPLATE?>style.css" />
    
	<script type="text/javascript" src="<?=ADMIN_TEMPLATE?>js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?=ADMIN_TEMPLATE?>js/jquery-ui-1.8.22.custom.min.js"></script>
    <script type="text/javascript" src="<?=ADMIN_TEMPLATE?>js/workscripts.js"></script>
    <script type="text/javascript" src="<?=ADMIN_TEMPLATE?>js/ckeditor/ckeditor.js"></script>
<title><?=$title?></title>
</head>

<body>
<div class="karkas">
	<div class="head">
		<a href="index.php"><img src="<?=ADMIN_TEMPLATE?>images/logoAdm.jpg" /></a>
		<p><a href="?view=edit_user&amp;user_id=<?=$_SESSION['auth']['user_id']?>"><?=$_SESSION['auth']['admin']?></a> | <a href="?do=logout"><strong>Выйти</strong></a></p>
        <a href="<?=PATH?>" style="display: block; margin: 37px 0 0 135px; color: #D10A0A;" target="_blank">Перейти на сайт...</a>
	</div> <!-- .head -->