<?php
/*
*
* Выдача предмета.
*
* Авторство данного скрипта принадлежит FoX`у, страница ВК - vk.com/nskfox
* Дизайн скрипта Dan_Romanenkov, страница ВК - vk.com/id22819551
* Если Вы не является раком, то пожалуйста используйте данный скрипт только в предназначенных ему целях
* Воровство и выдавание данного скрипта за свою работу карается боженькой всевышним.
* Копирайт от 2015 года.
*
*/
if(!defined('DATALIFEENGINE')) exit;

$search=$db->super_query("SELECT * FROM `{$table['name']}` WHERE `id_key`='{$results['id']}' AND `name`='{$login}'");
if(empty($search['name'])){
	require_once BONUS_KEY .'/server.php';
	if(empty($results['endkey'])){
		if(!isset($results['endcount'])){
			$server->query("INSERT INTO `{$dbserver['table_shop']}`(`type`, `player`, `item`, `amount`) VALUES('item', '{$login}', '{$results['bonus']}', '{$results['count']}')");
			$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
			$arr = array('{item}' => $results['des'], '{id}' => $results['bonus'], '{count}' => $results['count'], '{server}' => $dbserver['server']);
			msg($arr, $lang['success'], $lang['add_item']);
		}elseif($results['endcount']>0){
			$server->query("INSERT INTO `{$dbserver['table_shop']}`(`type`, `player`, `item`, `amount`) VALUES('item', '{$login}', '{$results['bonus']}', '{$results['count']}')");
			$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
			$db->query("UPDATE `{$table['key']}` SET `endcount`=(endcount-1) WHERE `id`='{$results['id']}'");
			$arr = array('{item}' => $results['des'], '{id}' => $results['bonus'], '{count}' => $results['count'], '{server}' => $dbserver['server']);
			msg($arr, $lang['success'], $lang['add_item']);
		}else msgbox($lang['error'], $lang['ended_key']);
	}elseif($results['endkey']>=$time){
		if(!isset($results['endcount'])){
			$server->query("INSERT INTO `{$dbserver['table_shop']}`(`type`, `player`, `item`, `amount`) VALUES('item', '{$login}', '{$results['bonus']}', '{$results['count']}')");
			$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
			$arr = array('{item}' => $results['des'], '{id}' => $results['bonus'], '{count}' => $results['count'], '{server}' => $dbserver['server']);
			msg($arr, $lang['success'], $lang['add_item']);
		}elseif($results['endcount']>0){
			$server->query("INSERT INTO `{$dbserver['table_shop']}`(`type`, `player`, `item`, `amount`) VALUES('item', '{$login}', '{$results['bonus']}', '{$results['count']}')");
			$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
			$db->query("UPDATE `{$table['key']}` SET `endcount`=(endcount-1) WHERE `id`='{$results['id']}'");
			$arr = array('{item}' => $results['des'], '{id}' => $results['bonus'], '{count}' => $results['count'], '{server}' => $dbserver['server']);
			msg($arr, $lang['success'], $lang['add_item']);
		}else msgbox($lang['error'], $lang['ended_key']);
	}else msgbox($lang['error'], $lang['time_out']);
}else msgbox($lang['error'], $lang['alredy_key']);