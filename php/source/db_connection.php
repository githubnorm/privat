<?php

	include "db_config.php";

	/* create connection */
	$db_connection=mysql_connect("$host[$db]","$name[$db]","$pw[$db]");

	/* Check connection */
	if ($db_connection) {
		$db_select=mysql_select_db($dbname[$db],$db_connection);
		if (!$db_select) {
			die("database not selected"); exit;
		}
	} else {
		die("connection faild"); exit;
	}
	
?>