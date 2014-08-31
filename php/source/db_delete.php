<?php
	
	/*
	 * function checks the GET parameter in URL
	 */ 
	function get($key) {
		if (isset($_GET[$key]))
			return $_GET[$key];
		return false;
	}

	// check if we can get hold of the form field
	if ( get('company_id') ) {
		
		/* connect db & load query libary */
		include "db_connection.php";
		include "db_queries.php";
		
		// decide whether deleting a company related jobs or just a job from a company
		if ( !get('job_id') ) {
			
			// if the company should be deleted but still has some jobs related to it
			if ( get('all') ) {
				
				// delete all jobs with the same company id
				$query_tmp = $query['generic_select_all_jobs_with_company_id'] . get('company_id');
				$result_jobids = mysql_query($query_tmp, $db_connection);
				
				if($result_jobids) {
					while ($row = mysql_fetch_array($result_jobids, MYSQL_NUM)) {
						if(!mysql_query($query['generic_delete_job_by_id'] . $row[0], $db_connection)) {
							echo "Query failed!"; break; exit;
						}
					}
				} else {
					echo "Query failed!"; exit;
				}
			}
			
			// delete the company
			$result = mysql_query( $query['generic_delete_company_by_id'] . get('company_id'), $db_connection);
			
		} else {
			
			// delete the job and update the company job counter
			$result = false;
			if(mysql_query( $query['generic_delete_job_by_id'] . get('job_id'), $db_connection)) {
				$result = mysql_query( $query['generic_update_jobs_minus_from_company_id'] . get('company_id'), $db_connection);
			}
			
		}
	} else {
		echo "parameter are not full filled"; exit;
	}
	
	/* close the db connection */
	mysql_close($db_connection);
	
	// finally setup our response "object"
	$resp = new stdClass();
	$resp->success = false;
	if($result) {
		$resp->success = true;
	}
	print json_encode($resp);
	
?>