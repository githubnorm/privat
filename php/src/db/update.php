<?php
	
	if( isPost('formAction') ){
		
		if( startsWith(getPost('formAction'),"c") ) {
	
			// let make sure we escape the data (for german umlauts)
			$val['country'] = mysql_real_escape_string(getPost('country'), $db_connection);
			$val['city'] = mysql_real_escape_string(getPost('city'), $db_connection);
			$val['com_name'] = mysql_real_escape_string(getPost('cname'), $db_connection);
			$val['com_link'] = mysql_real_escape_string(getPost('clink'), $db_connection);
			$val['infos'] = mysql_real_escape_string(getPost('cinfos'), $db_connection);
			$val['loc_address'] = mysql_real_escape_string(getPost('caddress'), $db_connection);
			$val['loc_link'] = mysql_real_escape_string(getPost('caddress_link'), $db_connection);
			$val['loc_route'] = mysql_real_escape_string(getPost('croute'), $db_connection);
			$val['ratings'] = mysql_real_escape_string(getPost('cratings'), $db_connection);
			$val['notes'] = mysql_real_escape_string(getPost('cnotes'), $db_connection);
			
			// insertion of new company
			if( getPost('formAction')=="cAdd" ) {
				
				// `companies`(`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`notes`) ";
				$query_tmp =  $query['insert_company_with_values']."
					VALUES ('".$val['country']."',
					'".$val['city']."',
					'".$val['com_name']."',
					'".$val['com_link']."',
					'".$val['infos']."',
					'".$val['loc_address']."',
					'".$val['loc_link']."',
					'".$val['loc_route']."',
					'".$val['ratings']."',
					'".$val['notes']."')";
			}
			
			// update of company
			if(getPost('formAction')=="cEdit" && isPost('companyID')) {
				
				$val['COMPANY_ID'] = mysql_real_escape_string(getPost('companyID'), $db_connection);
				
				// `COMPANY_ID`=[value-1],`country`=[value-2],`city`=[value-3],`com_name`=[value-4],`com_link`=[value-5],`infos`=[value-6],
				// `loc_address`=[value-7],`loc_link`=[value-8],`loc_route`=[value-9],`ratings`=[value-10],`jobs`=[value-11],`notes`=[value-12]
				$query_tmp = "
					UPDATE companies
					SET `country`='" . $val['country'] . "',
					`city`='" . $val['city'] . "',
					`com_name`='" . $val['com_name'] . "',
					`com_link`='" . $val['com_link'] . "',
					`infos`='" . $val['infos'] . "',
					`loc_address`='" . $val['loc_address'] . "',
					`loc_link`='" . $val['loc_link'] . "',
					`loc_route`='" . $val['loc_route'] . "',
					`ratings`='" . $val['ratings'] . "',
					`notes`='" . $val['notes'] . "'
					WHERE `COMPANY_ID`=" . $val['COMPANY_ID'];
			}
			
			// insert/update the company in db
			$result = mysql_query($query_tmp, $db_connection);
		}
		
		if( startsWith(getPost('formAction'),"j") ) {
			
			// let make sure we escape the data (for german umlauts)
			$val['JOB_ID'] = mysql_real_escape_string(getPost('jobID'), $db_connection);
			$val['position'] = mysql_real_escape_string(getPost('jposition'), $db_connection);
			$val['link'] = mysql_real_escape_string(getPost('jlink'), $db_connection);
			$val['notes'] = mysql_real_escape_string(getPost('jnotes'), $db_connection);
			
			// insertion of new job
			if(getPost('formAction')=="jAdd" && isPost('companyID')) {
				// let make sure we escape the data (for german umlauts)
				$val['COMPANY_ID'] = mysql_real_escape_string(getPost('companyID'), $db_connection);
				// `jobs`(`company_id`,`position`,`link`,`notes`)";
				$query_tmp = $query['insert_job_with_values']."
					VALUES ('".$val['COMPANY_ID']."',
					'".$val['position']."',
					'".$val['link']."',
					'".$val['notes']."')";
					
				$result = false;
				// insert the job ..
				if(mysql_query($query_tmp, $db_connection)) {
					// .. and update the company job counter
					$result = mysql_query( $query['update_jobs_plus_from_company_id'] . $val['COMPANY_ID'], $db_connection);
				}
			}
			// update of job
			if(getPost('formAction')=="jEdit" && isPost('jobID')) {
				// JOB_ID`=[value-1],`company_id`=[value-2],`position`=[value-3],`link`=[value-4],`notes`=[value-5]
				$query_tmp = "
					UPDATE jobs
					SET `position`='" . $val['position'] . "',
					`link`='" . $val['link'] . "',
					`notes`='" . $val['notes'] . "'
					WHERE `JOB_ID`=" . $val['JOB_ID'];
					
				// update the job in db
				$result = mysql_query($query_tmp, $db_connection);
			}
		}
	
	}
	
	toJSON($result);
	
?>