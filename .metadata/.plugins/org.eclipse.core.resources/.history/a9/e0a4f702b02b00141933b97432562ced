<?php
	
	function get($key) {
		if (isset($_GET[$key]))
			return $_GET[$key];
		return false;
	}

	// check if we can get hold of the form field
	if ( !get('company_id') ) {
		echo "parameter are not full filled"; exit;
	}
	
	include "db_connection.php";
	
	// lets setup our insert query
	$query_delete = "
		DELETE FROM `companies` 
		WHERE `company_id`=".get('company_id');

	// lets run our query
	$result = mysql_query($query_delete, $db_connection);

	// setup our response "object"
	$resp = new stdClass();
	$resp->success = false;
	if($result) {
		$resp->success = true;
	}

	print json_encode($resp);
?>