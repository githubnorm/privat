<?php
	
	// check if we can get hold of the form field
	if ( get('cid') && get('lid') ) {
		
			// delete all jobs with the same company id
			$query_tmp = $query['update_jobs_list..'] . get('lid') . $query['..where_company_id'] . get('cid');
			$result = mysql_query($query_tmp, $db_connection);
			
	} else {
		$result = false;
	}
	
	toJSON($result);
	
?>