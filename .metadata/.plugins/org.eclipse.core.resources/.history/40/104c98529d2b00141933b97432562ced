<?php 
	include "db_connection.php";
	include "db_queries.php";
	$db_results = mysql_query($query_companies, $db_connection);

	if($db_results) {
		while ($row = mysql_fetch_array($db_results, MYSQL_NUM)) {
			printf("$row[0], $row[1], $row[2], $row[3], $row[4] [<span onclick='deleteRow($row[0])'>delete</span>]");
			echo "<br>";
		}
	} else {
		echo "Query failed!";
	}
	mysql_close($db_connection);
?>