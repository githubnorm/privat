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
			
			// `companies`(`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`notes`) ";
			$query_tmp =  $query['generic_insert_company_with_values']."
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
			
			// insert the company
			$result = mysql_query($query_tmp, $db_connection);
			
		} elseif ($insert_modus=='job'){
			
			// let make sure we escape the data (for german umlauts)
			$val['company_id'] = mysql_real_escape_string(post('company_id'), $db_connection);
			$val['position'] = mysql_real_escape_string(post('position'), $db_connection);
			$val['link'] = mysql_real_escape_string(post('link'), $db_connection);
			$val['notes'] = mysql_real_escape_string(post('notes'), $db_connection);
			
			// `jobs`(`company_id`,`position`,`link`,`notes`)";
			$query_tmp = $query['generic_insert_job_with_values']."
				VALUES ('".$val['company_id']."',
						'".$val['position']."',
						'".$val['link']."',
						'".$val['notes']."')";
			
			// insert the job and update the company job counter
			$result = false;
			if(mysql_query($query_tmp, $db_connection)) {
				$result = mysql_query( $query['generic_update_jobs_plus_from_company_id'] . $val['company_id'], $db_connection);
			}
			
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