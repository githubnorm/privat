<?php
	
	// check if we can get hold of the form field
	function post($key) {
		if (isset($_POST[$key]) && !empty($_POST[$key]))
			return $_POST[$key];
		return "-";
	}
	
	if (isset($_GET['i']))
		$insert_modus = $_GET['i'];

	if(!empty($insert_modus)) {
		
		/* connect db & load query libary */
		include "db_connection.php";
		include "db_queries.php";
		
		if($insert_modus=='company') {
			
			// let make sure we escape the data (for german umlauts)
			$val['COMPANY_ID'] = mysql_real_escape_string(post('companyID'), $db_connection);
			$val['country'] = mysql_real_escape_string(post('country'), $db_connection);
			$val['city'] = mysql_real_escape_string(post('city'), $db_connection);
			$val['com_name'] = mysql_real_escape_string(post('com_name'), $db_connection);
			$val['com_link'] = mysql_real_escape_string(post('com_link'), $db_connection);
			$val['infos'] = mysql_real_escape_string(post('infos'), $db_connection);
			$val['loc_address'] = mysql_real_escape_string(post('loc_address'), $db_connection);
			$val['loc_link'] = mysql_real_escape_string(post('loc_link'), $db_connection);
			$val['loc_route'] = mysql_real_escape_string(post('loc_route'), $db_connection);
			$val['ratings'] = mysql_real_escape_string(post('ratings'), $db_connection);
			$val['notes'] = mysql_real_escape_string(post('notes'), $db_connection);
			
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
			
			// insert the company
			$result = mysql_query($query_tmp, $db_connection);
			
		} elseif ($insert_modus=='job'){
			
			// let make sure we escape the data (for german umlauts)
// 			$val['company_id'] = mysql_real_escape_string(post('companyID'), $db_connection);
			$val['JOB_ID'] = mysql_real_escape_string(post('jobID'), $db_connection);
			$val['position'] = mysql_real_escape_string(post('position'), $db_connection);
			$val['link'] = mysql_real_escape_string(post('link'), $db_connection);
			$val['notes'] = mysql_real_escape_string(post('notes'), $db_connection);
			
			// JOB_ID`=[value-1],`company_id`=[value-2],`position`=[value-3],`link`=[value-4],`notes`=[value-5]
			$query_tmp = "
				UPDATE jobs
				SET `position`='" . $val['position'] . "',
					`link`='" . $val['link'] . "',
					`notes`='" . $val['notes'] . "'
				WHERE `JOB_ID`=" . $val['JOB_ID'];
			
			// insert the job and update the company job counter
			$result = mysql_query($query_tmp, $db_connection);
			
		} else {
			echo "wrong insert type!"; exit;
		}
	} else {
		echo "no insert type!"; exit;
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