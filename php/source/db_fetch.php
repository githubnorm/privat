<?php 

	/* connect db & load query libary */
	include "db_connection.php";
	include "db_queries.php";

	$query_tmp  = mysql_query($query['static_select_companies_with_jobs'], $db_connection);
	
	if($query_tmp) {
		$tempIndex = "";
		while ($row = mysql_fetch_array($query_tmp, MYSQL_NUM)) {
			/* $row[0]=companies.COMPANY_ID,
			 * $row[1]=`country`,
			 * $row[2]=`city`,
			 * $row[3]=`com_name`,
			 * $row[4]=`com_link`,
			 * $row[5]=`infos`,
			 * $row[6]=`loc_address`,
			 * $row[7]=`loc_link`,
			 * $row[8]=`loc_route`,
			 * $row[9]=`ratings`,
			 * $row[10]=`position`,
			 * $row[11]=`link`,
			 * $row[12]=jobs.notes,
			 * $row[13]=`JOB_ID`,
			 * $row[14]=companies.notes 
			 */
			if($tempIndex!=$row[0]) {
				printf("
					[$row[0]] $row[1], $row[2], <a href=\"$row[4]\" target=\"_blank\">$row[3]</a>, $row[5], 
					<a href=\"$row[7]\" target=\"_blank\">$row[6]</a>, $row[8], $row[9], 
					(<a href=\"$row[11]\" target=\"_blank\">$row[10]</a>, [$row[12]])[<span onclick=\"deleteData($row[0],$row[13])\">X</span>], 
					$row[6], 
					[<span onclick=\"showAddForm($row[0])\">add</span>] | [<span onclick=\"deleteData($row[0],0)\">delete</span>]
				");
			} else {
				printf("
					-, -, -, -, -, -, -, -, 
					(<a href=\"$row[11]\" target=\"_blank\">$row[10]</a>, [$row[12]])[<span onclick=\"deleteData($row[0],$row[13])\">X</span>], 
					-,
				");
			}
			echo "<br>";
			$tempIndex = $row[0];
		}
	} else {
		echo "Query failed!";
		echo "<br>";
	}
	
	$query_tmp = mysql_query($query['static_select_companies_with_no_jobs'], $db_connection);
	
	if($query_tmp) {
		while ($row = mysql_fetch_array($query_tmp, MYSQL_NUM)) {
			/* $row[0]=`COMPANY_ID`,
			 * $row[1]=`country`,
			 * $row[2]=`city`,
			 * $row[3]=`com_name`,
			 * $row[4]=`com_link`,
			 * $row[5]=`infos`,
			 * $row[6]=`loc_address`,
			 * $row[7]=`loc_link`,
			 * $row[8]=`loc_route`,
			 * $row[9]=`ratings`,
			 * $row[10]=`notes`,
			 */
			printf("
				[$row[0]] $row[1], $row[2], <a href=\"$row[4]\" target=\"_blank\">$row[3]</a>, $row[5], 
				<a href=\"$row[7]\" target=\"_blank\">$row[6]</a>, $row[8], $row[9], 
				-, -, 
				$row[10], 
				[<span onclick=\"showAddForm($row[0])\">add</span>] | [<span onclick=\"deleteData($row[0])\">delete</span>]");
			echo "<br>";
		}
	} else {
		echo "Query failed!";
		echo "<br>";
	}
	
	/* finally close the db connection */
	mysql_close($db_connection);
	
?>