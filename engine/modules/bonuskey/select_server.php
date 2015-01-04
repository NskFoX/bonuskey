<?php
/*
*
* Получение списка серверов для админ-панели.
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

$result=$db->query("SELECT `id`, `server` FROM `{$table['server']}`");
if($result->num_rows>0){
	while($row=$db->get_row($result)){
		$tpl->load_template('bonuskey/server.tpl');
		$tpl->set('{id}', $row['id']);
		$tpl->set('{server}', $row['server']);
		$tpl->compile('server');
	}
}
$server_list=$tpl->result['server'];