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
		include "db_connection.php";
		if($insert_modus=='company') {
			
			// let make sure we escape the data (f�r Umlaute)
			$val_location = mysql_real_escape_string(post('location'), $db_connection);
			$val_anfahrt  = mysql_real_escape_string(post('anfahrt'), $db_connection);
			$val_jobs  = mysql_real_escape_string(post('jobs'), $db_connection);
			$val_ratings  = mysql_real_escape_string(post('ratings'), $db_connection);
		
			// lets setup our insert query
			$query_insert = "
				INSERT INTO 
				`companies`(`location`, `anfahrt`, `jobs`, `ratings`) 
				VALUES ('".$val_location."','".$val_anfahrt."','".$val_jobs."','".$val_ratings."')";
			
			$result = mysql_query($query_insert, $db_connection);
			
		} elseif ($insert_modus=='job'){
			
			// let make sure we escape the data (f�r Umlaute)
			$val_position = mysql_real_escape_string(post('position'), $db_connection);
			$val_link  = mysql_real_escape_string(post('link'), $db_connection);
			$val_company  = mysql_real_escape_string(post('company'), $db_connection);
			
			// lets setup our insert query
			$query_insert = "
				INSERT INTO
				`jobs`(`position`, `link`, `company`)
				VALUES ('".$val_position."','".$val_link."','".$val_company."')";
			
			
			$query_update = "
				UPDATE `companies` 
				SET jobs = jobs + 1 
				WHERE `company_id`=".$val_company;
			
			$result = mysql_query($query_insert, $db_connection);
			if($result) {
				$result = mysql_query($query_update, $db_connection);
			}
			
		} else {
			echo "wrong insert type!"; exit;
		}
	} else {
		echo "no insert type!"; exit;
	}

	// lets run our query


	// setup our response "object"
	$resp = new stdClass();
	$resp->success = false;
	if($result) {
		$resp->success = true;
	}

	print json_encode($resp);
?>