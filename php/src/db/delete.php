<?php
	
	// check if we can get hold of the form field
	if ( get('company_id') ) {
		
		// decide whether deleting a company related jobs or just a job from a company
		if ( !get('job_id') ) {
			
			// if the company should be deleted but still has some jobs related to it
			if ( get('all') ) {
				
				// delete all jobs with the same company id
				$query_tmp = $query['select_all_jobs_ids_where_company_id'] . get('company_id');
				$result_jobids = mysql_query($query_tmp, $db_connection);
				
				if($result_jobids) {
					while ($row = mysql_fetch_array($result_jobids, MYSQL_NUM)) {
						if(!mysql_query($query['delete_job_where_id'] . $row[0], $db_connection)) {
							echo "Query failed!"; break; exit;
						}
					}
				} else {
					echo "Query failed!"; exit;
				}
			}
			
			// delete the company
			$result = mysql_query( $query['delete_company_where_id'] . get('company_id'), $db_connection);
			
		} else {
			
			// delete the job ..
			$result = false;
			if(mysql_query( $query['delete_job_where_id'] . get('job_id'), $db_connection)) {
				// .. and update the company job counter
				$result = mysql_query( $query['update_jobs_minus_where_company_id'] . get('company_id'), $db_connection);
			}
			
		}
	} else {
		echo "parameter are not full filled"; exit;
	}
	
	toJSON($result);
	
?>