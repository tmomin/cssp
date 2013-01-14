<?php
	$server = 'localhost';
	$username = 'usanstc_cssp';
	$password = 'p@ssw0rd!@#';
	
	$link = mysql_connect($server, $username, $password);
	if (!link) {
		die('Not connected : ' . mysql_error());
	}
	$db_selected = mysql_select_db('usanstc_cssp', $link);
	if (!db_selected) {
		die("Can\'t use ionics_nst : " . mysql_error());
	}
?>
