<?php

	$query_companies = "
		SELECT * 
		FROM `companies`";
	
	$query_select_jobs = "
		SELECT `company_id`,`location`,`anfahrt`,`position`,`link`,`job_id`,`ratings` 
		FROM `companies`,`jobs` 
		WHERE `jobs`.company=`companies`.company_id";
	
	$query_select_init = "
		SELECT `company_id`,`location`,`anfahrt`,`ratings` 
		FROM `companies` 
		WHERE `jobs`=0";
	
	$query_insert_test = "
		INSERT INTO 
		`companies`(`location`, `anfahrt`, `job_ids`, `ratings`) 
		VALUES ('Hamburg','U-Bahn','3','3')";
		
?>