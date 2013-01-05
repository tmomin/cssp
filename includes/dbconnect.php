<?php
	$server = 'mysql0.db.koding.com';
	$username = 'tmomin_jojufivup';
	$password = 'password';
	
	$link = mysql_connect($server, $username, $password);
	if (!link) {
		die('Not connected : ' . mysql_error());
	}
	$db_selected = mysql_select_db('tmomin_jojufivup', $link);
	if (!db_selected) {
		die("Can\'t use ionics_nst : " . mysql_error());
	}
?>
