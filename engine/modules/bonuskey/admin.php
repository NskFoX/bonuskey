<?php
/*
*
* Скрипт Админпанели.
*
* Авторство данного скрипта принадлежит FoX`у, страница ВК - vk.com/nskfox
* Дизайн скрипта Dan_Romanenkov, страница ВК - vk.com/id22819551
* Если Вы не является раком, то пожалуйста используйте данный скрипт только в предназначенных ему целях
* Воровство и выдавание данного скрипта за свою работу карается боженькой всевышним.
* Копирайт от 2015 года.
*
*/
if(!defined('DATALIFEENGINE')) exit;
if($member_id['user_group']!=1) exit;

define('BONUS_KEY', ENGINE_DIR .'/modules/bonuskey');

require_once BONUS_KEY .'/config.php';
require_once BONUS_KEY .'/lang.php';

if(count($_POST)){

	$post = array();
	foreach($_POST as $key => $value)
	$post[$key]=$db->safesql($value);
	
	if(isset($_POST['key'])&&isset($_POST['keytype'])&&isset($_POST['bonus'])){
		$count=(int)$_POST['count'];
		$endkey=(int)$_POST['endkey'];
		$endcount=(int)$_POST['endcount'];
		$server=(int)$_POST['server'];
		$search=$db->super_query("SELECT * FROM `{$table['key']}` WHERE `key`='{$post['key']}'");
		if(empty($search['key'])){
			switch($_POST['keytype']){
				case "1":
					if(empty($_POST['endkey'])){
						if(empty($_POST['endcount'])){
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `type`) VALUES('{$post['key']}', '{$post['bonus']}', '1')");
							msgbox($lang['success'], $lang['add_key']);
						}else{
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `type`, `endcount`) VALUES('{$post['key']}', '{$post['bonus']}', '1', '{$endcount}')");
							msgbox($lang['success'], $lang['add_key']);
						}
					}else{
						if(empty($_POST['endcount'])){
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `type`, `endkey`) VALUES('{$post['key']}', '{$post['bonus']}', '1', '{$endkey}')");
							msgbox($lang['success'], $lang['add_key']);
						}else{
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `type`, `endkey`, `endcount`) VALUES('{$post['key']}', '{$post['bonus']}', '1', '{$endkey}', '{$endcount}')");
							msgbox($lang['success'], $lang['add_key']);
						}
					}
					break;
				case "2":
					if(empty($_POST['endkey'])){
						if(empty($_POST['endcount'])){
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `count`, `des`, `server`, `type`) VALUES('{$post['key']}', '{$post['bonus']}', '{$count}', '{$post['des']}', '{$server}', '2')");
							msgbox($lang['success'], $lang['add_key']);
						}else{
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `count`, `des`, `server`, `type`, `endcount`) VALUES('{$post['key']}', '{$post['bonus']}', '{$count}', '{$post['des']}', '{$server}', '2', '{$endcount}')");
							msgbox($lang['success'], $lang['add_key']);
						}
					}else{
						if(empty($_POST['endcount'])){
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `count`, `des`, `server`, `type`, `endkey`) VALUES('{$post['key']}', '{$post['bonus']}', '{$count}', '{$post['des']}', '{$server}', '2', '{$endkey}')");
							msgbox($lang['success'], $lang['add_key']);
						}else{
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `count`, `des`, `server`, `type`, `endkey`, `endcount`) VALUES('{$post['key']}', '{$post['bonus']}', '{$count}', '{$post['des']}', '{$server}', '2', '{$endkey}', '{$endcount}')");
							msgbox($lang['success'], $lang['add_key']);
						}
					}
					break;
				case "3":
					if(empty($_POST['endkey'])){
						if(empty($_POST['endcount'])){
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `count`, `des`, `server`, `type`) VALUES('{$post['key']}', '{$post['bonus']}', '{$count}', '{$post['des']}', '{$server}', '3')");
							msgbox($lang['success'], $lang['add_key']);
						}else{
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `count`, `des`, `server`, `type`, `endcount`) VALUES('{$post['key']}', '{$post['bonus']}', '{$count}', '{$post['des']}', '{$server}', '3', '{$endcount}')");
							msgbox($lang['success'], $lang['add_key']);
						}
					}else{
						if(empty($_POST['endcount'])){
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `count`, `des`, `server`, `type`, `endkey`) VALUES('{$post['key']}', '{$post['bonus']}', '{$count}', '{$post['des']}', '{$server}', '3', '{$endkey}')");
							msgbox($lang['success'], $lang['add_key']);
						}else{
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `count`, `des`, `server`, `type`, `endkey`, `endcount`) VALUES('{$post['key']}', '{$post['bonus']}', '{$count}', '{$post['des']}', '{$server}', '3', '{$endkey}', '{$endcount}')");
							msgbox($lang['success'], $lang['add_key']);
						}
					}
					break;
				case "4":
					if(empty($_POST['endkey'])){
						if(empty($_POST['endcount'])){
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `server`, `type`) VALUES('{$post['key']}', '{$post['bonus']}', '{$server}', '4')");
							msgbox($lang['success'], $lang['add_key']);
						}else{
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `server`, `type`, `endcount`) VALUES('{$post['key']}', '{$post['bonus']}', '{$server}', '4', '{$endcount}')");
							msgbox($lang['success'], $lang['add_key']);
						}
					}else{
						if(empty($_POST['endcount'])){
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `server`, `type`, `endkey`) VALUES('{$post['key']}', '{$post['bonus']}', '{$server}', '4', '{$endkey}')");
							msgbox($lang['success'], $lang['add_key']);
						}else{
							$db->query("INSERT INTO `{$table['key']}`(`key`, `bonus`, `server`, `type`, `endkey`, `endcount`) VALUES('{$post['key']}', '{$post['bonus']}', '{$server}', '4', '{$endkey}', '{$endcount}')");
							msgbox($lang['success'], $lang['add_key']);
						}
					}
					break;
			}
		}else msgbox($lang['error'], $lang['key_found']);
	}
	
	if(isset($_POST['name_server'])&&isset($_POST['user'])&&isset($_POST['host'])&&isset($_POST['pass'])&&isset($_POST['base'])&&isset($_POST['table_status'])&&isset($_POST['table_time'])&&isset($_POST['table_shop'])){
		$db->query("INSERT INTO `{$table['server']}`(`server`, `user`, `host`, `pass`, `base`, `table_time`, `table_status`, `table_shop`, `table_iconomy`) VALUES('{$post['name_server']}', '{$post['user']}', '{$post['host']}', '{$post['pass']}', '{$post['base']}', '{$post['table_time']}', '{$post['table_status']}', '{$post['table_shop']}', '{$post['table_iconomy']}')");
		msgbox($lang['success'], $lang['add_server']);
	}
	
	if(isset($_POST['id_key'])){
		$db->query("DELETE FROM `{$table['key']}` WHERE `id`='{$post['id_key']}'");
		msgbox($lang['success'], $lang['del_key']);
	}
	
	if(isset($_POST['id_server'])){
		$db->query("DELETE FROM `{$table['server']}` WHERE `id`='{$post['id_server']}'");
		msgbox($lang['success'], $lang['del_server']);
	}
}else{
	switch($_GET['type']){
		case "addkey":
			require_once BONUS_KEY .'/select_server.php';
			$tpl->load_template('bonuskey/addkey.tpl');
			$tpl->set('{server}', $server_list);
			$tpl->compile('content');
			$tpl->clear();
			break;
		case "addserver":
			$tpl->load_template('bonuskey/addserver.tpl');
			$tpl->compile('content');
			$tpl->clear();
			break;
		case "delkey":
			require_once BONUS_KEY .'/select_key.php';
			$tpl->load_template('bonuskey/delkey.tpl');
			$tpl->set('{key}', $key_list);
			$tpl->compile('content');
			$tpl->clear();
			break;
		case "delserver":
			require_once BONUS_KEY .'/select_server.php';
			$tpl->load_template('bonuskey/delserver.tpl');
			$tpl->set('{server}', $server_list);
			$tpl->compile('content');
			$tpl->clear();
			break;
		default:
		$tpl->load_template('bonuskey/admin.tpl');
		$tpl->set('{do}', $_GET['do']);
		$tpl->compile('content');
		$tpl->clear();
	}
}