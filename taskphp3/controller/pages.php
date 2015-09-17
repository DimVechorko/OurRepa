<?php
define('DEFAULT_PAGE','messages');
require_once('../model/model.php');
require_once('getdata.php');
//фомирование и подключение выбранных страниц
$pages = array('messages','getdata','insertmsg','insertData');
$page = (isset($_GET['page']) && in_array($_GET['page'],$pages))? $_GET['page']:DEFAULT_PAGE;
require_once($page.'.php');
?>