<?php

	$query['select_companies_with_jobs'] = "
		SELECT companies.COMPANY_ID,`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`position`,`link`,jobs.notes,`JOB_ID`,companies.notes 
		FROM companies,jobs 
		WHERE jobs.company_id=companies.COMPANY_ID 
		ORDER BY jobs.company_id DESC"; 
	
	$query['select_all_companies'] = "
		SELECT `COMPANY_ID`,`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`jobs`,`notes` 
		FROM companies ";
	
	$query['select_companies_with_no_jobs'] = "
		SELECT `COMPANY_ID`,`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`notes` 
		FROM companies 
		WHERE `jobs`=0";
	
	$query['select_all_jobs_with_company_id'] = "
		SELECT `JOB_ID`,`company_id`,`position`,`link`,`notes`
		FROM jobs
		WHERE `company_id`="; // --> generic value, please see db_delete.php
	
	$query['select_all_jobs_ids_with_company_id'] = "
		SELECT `JOB_ID`
		FROM jobs
		WHERE `company_id`="; // --> generic value, please see db_delete.php
	
	$query['insert_company_with_values'] = "
		INSERT INTO 
		`companies`(`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`notes`)";
		// VALUES ('') --> generic, please see db_insert.php
	
	$query['insert_job_with_values'] = "
		INSERT INTO
		`jobs`(`company_id`,`position`,`link`,`notes`)";
		// VALUES ('') --> generic, please see db_insert.php
	
	$query['update_jobs_plus_from_company_id'] = "
		UPDATE `companies`
		SET jobs = jobs + 1
		WHERE `COMPANY_ID`="; // --> generic value, please see db_insert.php
	
	$query['update_jobs_minus_from_company_id'] = "
		UPDATE `companies`
		SET jobs = jobs - 1
		WHERE `COMPANY_ID`="; // --> generic value, please see db_insert.php
	
	$query['delete_job_by_id'] = "
		DELETE FROM `jobs`
		WHERE `job_id`="; // --> generic value, please see db_delete.php
	
	$query['delete_company_by_id'] = "
		DELETE FROM `companies`
		WHERE `company_id`="; // --> generic value, please see db_delete.php
	
?>