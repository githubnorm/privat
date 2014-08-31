<?php

	$db = "live";
	
	// set test configs if on localhost
	if($_SERVER['SERVER_NAME']=='localhost')
		$db = "local";
		
	/*test system*/
	$host['local'] = "localhost";
	$name['local'] = "root";
	$pw['local'] = "";
	$dbname['local'] = "jobsearch_test";
	
	/*live system*/
	$host['live'] = "db540710562.db.1and1.com";
	$name['live'] = "dbo540710562";
	$pw['live'] = "SQLduke2982";
	$dbname['live'] = "db540710562";
	 
?>