<?php
/*
*
* ������ ����� � ����.
*
* ��������� ������� ������� ����������� FoX`�, �������� �� - vk.com/nskfox
* ������ ������� Dan_Romanenkov, �������� �� - vk.com/id22819551
* ���� �� �� �������� �����, �� ���������� ����������� ������ ������ ������ � ��������������� ��� �����
* ��������� � ��������� ������� ������� �� ���� ������ �������� ��������� ���������.
* �������� �� 2015 ����.
*
*/
if(!defined('DATALIFEENGINE')) exit;

$search=$db->super_query("SELECT * FROM `{$table['name']}` WHERE `id_key`='{$results['id']}' AND `name`='{$login}'");
if(empty($search['name'])){
	require_once BONUS_KEY .'/server.php';
	if(empty($results['endkey'])){
		if(!isset($results['endcount'])){
			$server->query("UPDATE `{$dbserver['table_iconomy']}` SET `balance`=(balance+{$results['bonus']}) WHERE `username`='{$login}'");
			$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
			$arr = array('{money}' => $results['bonus'], '{server}' => $dbserver['server']);
			msg($arr, $lang['success'], $lang['add_money_serv']);
		}elseif($results['endcount']>0){
			$server->query("UPDATE `{$dbserver['table_iconomy']}` SET `balance`=(balance+{$results['bonus']}) WHERE `username`='{$login}'");
			$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
			$db->query("UPDATE `{$table['key']}` SET `endcount`=(endcount-1) WHERE `id`='{$results['id']}'");
			$arr = array('{money}' => $results['bonus'], '{server}' => $dbserver['server']);
			msg($arr, $lang['success'], $lang['add_money_serv']);
		}else msgbox($lang['error'], $lang['ended_key']);
	}elseif($results['endkey']>=$time){
		if(!isset($results['endcount'])){
			$server->query("UPDATE `{$dbserver['table_iconomy']}` SET `balance`=(balance+{$results['bonus']}) WHERE `username`='{$login}'");
			$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
			$arr = array('{money}' => $results['bonus'], '{server}' => $dbserver['server']);
			msg($arr, $lang['success'], $lang['add_money_serv']);
		}elseif($results['endcount']>0){
			$server->query("UPDATE `{$dbserver['table_iconomy']}` SET `balance`=(balance+{$results['bonus']}) WHERE `username`='{$login}'");
			$db->query("INSERT INTO `{$table['name']}`(`name`, `id_key`) VALUES('{$login}', '{$results['id']}')");
			$db->query("UPDATE `{$table['key']}` SET `endcount`=(endcount-1) WHERE `id`='{$results['id']}'");
			$arr = array('{money}' => $results['bonus'], '{server}' => $dbserver['server']);
			msg($arr, $lang['success'], $lang['add_money_serv']);
		}else msgbox($lang['error'], $lang['ended_key']);
	}else msgbox($lang['error'], $lang['time_out']);
}else msgbox($lang['error'], $lang['alredy_key']);