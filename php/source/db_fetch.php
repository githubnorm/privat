<?php 
	include "db_connection.php";
	include "db_queries.php";

	$db_job_results  = mysql_query($query_select_jobs, $db_connection);
	$db_init_results = mysql_query($query_select_init, $db_connection);

	if($db_job_results) {
		while ($row = mysql_fetch_array($db_job_results, MYSQL_NUM)) {
			// `company_id`,`location`,`anfahrt`,`position`,`link`,`job_id`,`ratings`
			printf("$row[0], $row[1], $row[2], ($row[3], $row[4])[<span onclick=\"deleteData($row[0],$row[5])\">X</span>], $row[6] [<span onclick=\"showAddForm($row[0])\">add</span>] | [<span onclick=\"deleteData($row[0],0)\">delete</span>]");
			echo "<br>";
		}
	} else {
		echo "Query failed!";
		echo "<br>";
	}
	if($db_init_results) {
		while ($row = mysql_fetch_array($db_init_results, MYSQL_NUM)) {
			// `company_id`,`location`,`anfahrt`,`ratings`
			printf("$row[0], $row[1], $row[2], -, -, $row[3], [<span onclick=\"showAddForm($row[0])\">add</span>] | [<span onclick=\"deleteData($row[0])\">delete</span>]");
			echo "<br>";
		}
	} else {
		echo "Query failed!";
		echo "<br>";
	}
	mysql_close($db_connection);
?>