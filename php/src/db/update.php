<?php
	
	if( isPost('formAction') ){
		
		if( startsWith(getPost('formAction'),"c") ) {
	
			// let make sure we escape the data (for german umlauts)
			$val['country'] = mysql_real_escape_string(getPost('country'), $db_connection);
			$val['city'] = mysql_real_escape_string(getPost('city'), $db_connection);
			$val['companyName'] = mysql_real_escape_string(getPost('companyName'), $db_connection);
			$val['companyURL'] = mysql_real_escape_string(getPost('companyURL'), $db_connection);
			$val['companyAddress'] = mysql_real_escape_string(getPost('companyAddress'), $db_connection);
			$val['companyMapURL'] = mysql_real_escape_string(getPost('companyMapURL'), $db_connection);
			$val['companyNotes'] = mysql_real_escape_string(getPost('companyNotes'), $db_connection);
			$val['companyRatings'] = mysql_real_escape_string(getPost('companyRatings'), $db_connection);
			$val['listID'] = mysql_real_escape_string(getPost('listID'), $db_connection);
			
			// insertion of new company
			if( getPost('formAction')=="cAdd" ) {
				
				// `companies`(`country`,`city`,`companyName`,`companyURL`,`companyAddress`,`companyMapURL`,`companyNotes`,`companyRatings`,`listID`)
				$query_tmp =  $query['insert_company_values']."
					VALUES ('".$val['country']."',
					'".$val['city']."',
					'".$val['companyName']."',
					'".$val['companyURL']."',
					'".$val['companyAddress']."',
					'".$val['companyMapURL']."',
					'".$val['companyNotes']."',
					'".$val['companyRatings']."',
					'".$val['listID']."')";
				
			}
			
			// update of company
			if(getPost('formAction')=="cEdit" && isPost('companyID')) {
				
				$val['companyID'] = mysql_real_escape_string(getPost('companyID'), $db_connection);
				
				// `COMPANY_ID`=[value-1],`country`=[value-2],`city`=[value-3],`com_name`=[value-4],`com_link`=[value-5],`infos`=[value-6],
				// `loc_address`=[value-7],`loc_link`=[value-8],`loc_route`=[value-9],`ratings`=[value-10],`jobs`=[value-11],`notes`=[value-12]
				$query_tmp = "
					UPDATE companies
					SET `country`='" . $val['country'] . "',
						`city`='" . $val['city'] . "',
						`companyName`='" . $val['companyName'] . "',
						`companyURL`='" . $val['companyURL'] . "',
						`companyAddress`='" . $val['companyAddress'] . "',
						`companyMapURL`='" . $val['companyMapURL'] . "',
						`companyNotes`='" . $val['companyNotes'] . "',
						`companyRatings`='" . $val['companyRatings'] . "'
					WHERE `companyID`=" . $val['companyID'];
			}
			
			// insert/update the company in db
			$result = mysql_query($query_tmp, $db_connection);
		}
		
		if( startsWith(getPost('formAction'),"j") ) {
			
			// let make sure we escape the data (for german umlauts)
			$val['jobID'] = mysql_real_escape_string(getPost('jobID'), $db_connection);
			$val['jobPosition'] = mysql_real_escape_string(getPost('jobPosition'), $db_connection);
			$val['jobPositionURL'] = mysql_real_escape_string(getPost('jobPositionURL'), $db_connection);
			$val['jobNotes'] = mysql_real_escape_string(getPost('jobNotes'), $db_connection);
			
			// insertion of new job
			if(getPost('formAction')=="jAdd" && isPost('companyID')) {
				// let make sure we escape the data (for german umlauts)
				$val['companyID'] = mysql_real_escape_string(getPost('companyID'), $db_connection);
				// `jobs`(`companyID`, `jobPosition`, `jobPositionURL`, `jobNotes`)
				$query_tmp = $query['insert_job_values']."
					VALUES ('".$val['companyID']."',
					'".$val['jobPosition']."',
					'".$val['jobPositionURL']."',
					'".$val['jobNotes']."')";
					
				$result = false;
				// insert the job ..
				if(mysql_query($query_tmp, $db_connection)) {
					// .. and update the company job counter
					$result = mysql_query( $query['update_job_count_plus_where_company_id'] . $val['companyID'], $db_connection);
				}
			}
			// update of job
			if(getPost('formAction')=="jEdit" && isPost('jobID')) {
				// JOB_ID`=[value-1],`company_id`=[value-2],`position`=[value-3],`link`=[value-4],`notes`=[value-5]
				$query_tmp = "
					UPDATE jobs
					SET `jobPosition`='" . $val['jobPosition'] . "',
						`jobPositionURL`='" . $val['jobPositionURL'] . "',
					`jobNotes`='" . $val['jobNotes'] . "'
						WHERE `jobID`=" . $val['jobID'];
					
				// update the job in db
				$result = mysql_query($query_tmp, $db_connection);
			}
		}
	
	} else {
		$result = false;
	}
	
	toJSON($result);
	
?>