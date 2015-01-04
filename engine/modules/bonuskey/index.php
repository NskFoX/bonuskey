<?php
/*
*
* Скрипт считывания кода.
*
* Авторство данного скрипта принадлежит FoX`у, страница ВК - vk.com/nskfox
* Дизайн скрипта Dan_Romanenkov, страница ВК - vk.com/id22819551
* Если Вы не является раком, то пожалуйста используйте данный скрипт только в предназначенных ему целях
* Воровство и выдавание данного скрипта за свою работу карается боженькой всевышним.
* Копирайт от 2015 года.
*
*/
if(!defined('DATALIFEENGINE')) exit;
if($member_id['user_group'] == 5) exit;

define('BONUS_KEY', ENGINE_DIR .'/modules/bonuskey');

require_once BONUS_KEY .'/config.php';
require_once BONUS_KEY .'/lang.php';

function msg($arr, $lang1, $lang2){
	$keys = array();
	$values = array();
	foreach($arr as $key => $value){
		$keys[] = $key;
		$values[] = $value;
	}
	$message = str_replace($keys, $values, $lang2);
	msgbox($lang1, $message);
}

function status($arr, $temp){
	$keys = array();
	$values = array();
	foreach($arr as $key => $value){
		$keys[] = $key;
		$values[] = $value;
	}
	return $status = str_replace($keys, $values, $temp);
}

if(isset($_POST['key'])){
	$key=$db->safesql($_POST['key']);
	$results=$db->super_query("SELECT * FROM `{$table['key']}` WHERE `key`='{$key}'");
	if($results['key']){
		switch($results['type']){
			case "1":
				require_once BONUS_KEY .'/money.php';
				break;
			case "2":
				require_once BONUS_KEY .'/item.php';
				break;
			case "3":
				require_once BONUS_KEY .'/status.php';
				break;
			case "4":
				require_once BONUS_KEY .'/virt.php';
				break;
			default:
			msgbox($lang['error'], $lang['create_key']);
		}
	}else msgbox($lang['error'], $lang['key_not_found']);
}
$tpl->load_template('bonuskey/main.tpl');
$tpl->compile('content');
$tpl->clear();