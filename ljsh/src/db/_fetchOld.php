<?php 

	$query_tmp  = mysql_query($query['select_companies_where_jobs'], $db_connection);
	
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
					<span>
						[<span class=\"companyID\">$row[0]</span>] <span class=\"country\">$row[1]</span>, 
							<span class=\"city\">$row[2]</span>, <span class=\"company\"><a href=\"$row[4]\" target=\"_blank\">$row[3]</a></span>, 
							<span class=\"infos\">$row[5]</span>, 
							<span class=\"address\"><a href=\"$row[7]\" target=\"_blank\">$row[6]</a></span>, 
							<span class=\"route\">$row[8]</span>, <span class=\"ratings\">$row[9]</span>, 
						<span>
							(<a href=\"$row[11]\" target=\"_blank\">$row[10]</a>, [<span>$row[12]</span>]) 
								[<span class=\"button\" onclick=\"editJData($row[13],this)\">JE</span>] 
								[<span class=\"button\" onclick=\"deleteData($row[0],$row[13])\">JX</span>] 
						</span>, 
						<span class=\"notes\">$row[14]</span> 
						[<span class=\"button\" onclick=\"addJData($row[0])\">AC</span>] | 
							[<span class=\"button\" onclick=\"editCData($row[0],this)\">EC</span>] | 
							[<span class=\"button\" onclick=\"deleteData($row[0],0)\">DC</span>]
					</span>
				");
			} else {
				printf("
					<span>
						-, -, -, -, -, -, -, -, 
						<span>
						(<a href=\"$row[11]\" target=\"_blank\">$row[10]</a>, [<span>$row[12]</span>]) 
							[<span class=\"button\" onclick=\"editJData($row[13],this)\">JE</span>] 
							[<span class=\"button\" onclick=\"deleteData($row[0],$row[13])\">JX</span>]
						</span>, 
						-,
					</span>
				");
			}
			echo "<br>";
			$tempIndex = $row[0];
		}
	} else {
		echo "Query failed!";
		echo "<br>";
	}
	
	$query_tmp = mysql_query($query['select_companies_where_no_jobs'], $db_connection);
	
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
				<span>
					[<span class=\"companyID\">$row[0]</span>] <span class=\"country\">$row[1]</span>, 
						<span class=\"city\">$row[2]</span>, <span class=\"company\"><a href=\"$row[4]\" target=\"_blank\">$row[3]</a></span>, 
						<span class=\"infos\">$row[5]</span>, 
						<span class=\"address\"><a href=\"$row[7]\" target=\"_blank\">$row[6]</a></span>, 
						<span class=\"route\">$row[8]</span>, <span class=\"ratings\">$row[9]</span>, 
					<span>
						-, - 
					</span>, 
					<span class=\"notes\">$row[10]</span> 
					[<span class=\"button\" onclick=\"addJData($row[0])\">AC</span>] | 
						[<span class=\"button\" onclick=\"editCData($row[0],this)\">EC</span>] | 
						[<span class=\"button\" onclick=\"deleteData($row[0])\">DC</span>]
				</span>
			");
			echo "<br>";
		}
	} else {
		echo "Query failed!";
		echo "<br>";
	}
	
?>