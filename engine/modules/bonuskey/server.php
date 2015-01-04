<?php
/*
*
* Подключение к БД сервера.
*
* Авторство данного скрипта принадлежит FoX`у, страница ВК - vk.com/nskfox
* Дизайн скрипта Dan_Romanenkov, страница ВК - vk.com/id22819551
* Если Вы не является раком, то пожалуйста используйте данный скрипт только в предназначенных ему целях
* Воровство и выдавание данного скрипта за свою работу карается боженькой всевышним.
* Копирайт от 2015 года.
*
*/
if(!defined('DATALIFEENGINE')) exit;

$dbserver=$db->super_query("SELECT * FROM `{$table['server']}` WHERE `id`='{$results['server']}'");
$server=new db();
$server->connect($dbserver['user'], $dbserver['pass'], $dbserver['base'], $dbserver['host']);
