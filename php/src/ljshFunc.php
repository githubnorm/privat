<?php

	
	error_reporting(0); // Error Reporting komplett abschalten
// 	ini_set('error_reporting', E_ALL); // Melde alle PHP Fehler (siehe Changelog);
// 	error_reporting(E_ALL); // Melde alle PHP Fehler

	include "db/connect.php"; // open db connection
	include "db/queryLib.php"; // load a query lib
	include "functionLib.php";

	/* when db action is delete */
	if(get('a')=="f") {
		include "db/fetch.php";
	} else if(get('a')=="d") {
		include "db/delete.php";
	} else {
		include "db/update.php";
	}
	
	/* finally close the db connection */
	mysql_close($db_connection);

?>