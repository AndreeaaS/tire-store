<?php
define('CHECK', TRUE);
session_start();

include $_SERVER['DOCUMENT_ROOT'].'/config.php';

if(!$_SESSION['auth']['admin']){
    header("Location: " .PATH. "adminpanel/authorization/enter.php");
    exit;
}else{
    if ($_SESSION['auth']['role'] == 3){
    header("Location: " .PATH. "adminpanel/menedger/");
    exit;
    }else{
    header("Location: " .PATH. "adminpanel/admin/");
    exit;
    }
}