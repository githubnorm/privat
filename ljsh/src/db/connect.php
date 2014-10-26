<?php

	/* test system configs */
	$host['localhost'] = "localhost";
	$name['localhost'] = "root";
	$pw['localhost'] = "";
	$dbname['localhost'] = "ljsh_test";
	
	/* live system configs */
	$host['czepa.net'] = "db540710562.db.1and1.com";
	$name['czepa.net'] = "dbo540710562";
	$pw['czepa.net'] = "SQLduke2982";
	$dbname['czepa.net'] = "db540710562";

	/* automatic set of db */
	$db = $_SERVER['SERVER_NAME'];

	/* create connection */
	$db_connection=mysql_connect("$host[$db]","$name[$db]","$pw[$db]");

	/* check connection */
	if ($db_connection) {
		$db_select=mysql_select_db($dbname[$db],$db_connection);
		if (!$db_select) {
			die("database not selected"); exit;
		}
	} else {
		die("connection faild"); exit;
	}
	
?>