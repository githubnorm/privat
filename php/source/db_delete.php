<?php
	
	function get($key) {
		if (isset($_GET[$key]))
			return $_GET[$key];
		return false;
	}

	// check if we can get hold of the form field
	if ( get('company_id') ) {
		include "db_connection.php";
		if ( !get('job_id') ) {
			
			if ( get('all') ) {
				$query_getjobs = "
					SELECT `job_id` 
					FROM `jobs` 
					WHERE `company`=".get('company_id');
				$jobids = mysql_query($query_getjobs, $db_connection);
				if($jobids) {
					$query_delete = "
						DELETE FROM `jobs`
						WHERE `job_id`=";
					while ($row = mysql_fetch_array($jobids, MYSQL_NUM)) {
						$result = mysql_query($query_delete . $row[0], $db_connection);
						if(!$result) {
							echo "Query failed!"; break; exit;
						}
					}
				} else {
					echo "Query failed!"; exit;
				}
			}
			// lets setup our insert query
			$query_delete = "
				DELETE FROM `companies`
				WHERE `company_id`=".get('company_id');
			
			// lets run our query
			$result = mysql_query($query_delete, $db_connection);
		} else {
			
			// lets setup our insert query
			$query_delete = "
				DELETE FROM `jobs`
				WHERE `job_id`=".get('job_id');
			
			$query_update = "
				UPDATE `companies` 
				SET jobs = jobs - 1 
				WHERE `company_id`=".get('company_id');
			
			$result = mysql_query($query_delete, $db_connection);
			if($result) {
				$result = mysql_query($query_update, $db_connection);
			}
			
		}
	} else {
		echo "parameter are not full filled"; exit;
	}
	
	// setup our response "object"
	$resp = new stdClass();
	$resp->success = false;
	if($result) {
		$resp->success = true;
	}

	print json_encode($resp);
?>