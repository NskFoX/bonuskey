<?php
/*
*
* Выдача статуса.
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
			if(empty($results['count'])){
				$server->query("INSERT INTO `{$dbserver['table_status']}`(`child`, `parent`, `type`) VALUES('{$login}', '{$results['bonus']}', '1')");
				$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
				$arr = array('{status}' => $results['des'], '{server}' => $dbserver['server']);
				msg($arr, $lang['success'], $lang['add_status']);
			}else{
				$status_time=$results['count']+$time;
				$server->query("INSERT INTO `{$dbserver['table_status']}`(`child`, `parent`, `type`) VALUES('{$login}', '{$results['bonus']}', '1')");
				$arr = array('{login}' => $login, '{status}' => $results['bonus'], '{status_time}' => $status_time);
				$time_status_value=status($arr, $time_status_value);
				$server->query("INSERT INTO `{$dbserver['table_time']}`({$time_status_column}) VALUES({$time_status_value})");
				$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
				$out_time=date($date_formate, $status_time);
				$arr = array('{status}' => $results['des'], '{server}' => $dbserver['server'], '{time}' => $out_time);
				msg($arr, $lang['success'], $lang['add_status_time']);
			}
		}elseif($results['endcount']>0){
			if(empty($results['count'])){
				$server->query("INSERT INTO `{$dbserver['table_status']}`(`child`, `parent`, `type`) VALUES('{$login}', '{$results['bonus']}', '1')");
				$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
				$db->query("UPDATE `{$table['key']}` SET `endcount`=(endcount-1) WHERE `id`='{$results['id']}'");
				$arr = array('{status}' => $results['des'], '{server}' => $dbserver['server']);
				msg($arr, $lang['success'], $lang['add_status']);
			}else{
				$status_time=$results['count']+$time;
				$server->query("INSERT INTO `{$dbserver['table_status']}`(`child`, `parent`, `type`) VALUES('{$login}', '{$results['bonus']}', '1')");
				$arr = array('{login}' => $login, '{status}' => $results['bonus'], '{status_time}' => $status_time);
				$time_status_value=status($arr, $time_status_value);
				$server->query("INSERT INTO `{$dbserver['table_time']}`({$time_status_column}) VALUES({$time_status_value})");
				$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
				$db->query("UPDATE `{$table['key']}` SET `endcount`=(endcount-1) WHERE `id`='{$results['id']}'");
				$out_time=date($date_formate, $status_time);
				$arr = array('{status}' => $results['des'], '{server}' => $dbserver['server'], '{time}' => $out_time);
				msg($arr, $lang['success'], $lang['add_status_time']);
			}
		}else msgbox($lang['error'], $lang['ended_key']);
	}elseif($results['endkey']>=$time){
		if(!isset($results['endcount'])){
			if(empty($results['count'])){
				$server->query("INSERT INTO `{$dbserver['table_status']}`(`child`, `parent`, `type`) VALUES('{$login}', '{$results['bonus']}', '1')");
				$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
				msgbox($lang['success'], $lang['add_status']);
			}else{
				$status_time=$results['count']+$time;
				$server->query("INSERT INTO `{$dbserver['table_status']}`(`child`, `parent`, `type`) VALUES('{$login}', '{$results['bonus']}', '1')");
				$arr = array('{login}' => $login, '{status}' => $results['bonus'], '{status_time}' => $status_time);
				$time_status_value=status($arr, $time_status_value);
				$server->query("INSERT INTO `{$dbserver['table_time']}`({$time_status_column}) VALUES({$time_status_value})");
				$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
				$out_time=date($date_formate, $status_time);
				msgbox($lang['success'], $lang['add_status_time']);
			}
		}elseif($results['endcount']>0){
			if(empty($results['count'])){
				$server->query("INSERT INTO `{$dbserver['table_status']}`(`child`, `parent`, `type`) VALUES('{$login}', '{$results['bonus']}', '1')");
				$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
				$db->query("UPDATE `{$table['key']}` SET `endcount`=(endcount-1) WHERE `id`='{$results['id']}'");
				msgbox($lang['success'], $lang['add_status']);
			}else{
				$status_time=$results['count']+$time;
				$server->query("INSERT INTO `{$dbserver['table_status']}`(`child`, `parent`, `type`) VALUES('{$login}', '{$results['bonus']}', '1')");
				$arr = array('{login}' => $login, '{status}' => $results['bonus'], '{status_time}' => $status_time);
				$time_status_value=status($arr, $time_status_value);
				$server->query("INSERT INTO `{$dbserver['table_time']}`({$time_status_column}) VALUES({$time_status_value})");
				$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
				$db->query("UPDATE `{$table['key']}` SET `endcount`=(endcount-1) WHERE `id`='{$results['id']}'");
				$out_time=date($date_formate, $status_time);
				msgbox($lang['success'], $lang['add_status_time']);
			}
		}else msgbox($lang['error'], $lang['ended_key']);
	}else msgbox($lang['error'], $lang['time_out']);
}else msgbox($lang['error'], $lang['alredy_key']);