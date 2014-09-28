<?php

	$query['select_all_companies'] = "
		SELECT `COMPANY_ID`,`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`jobs`,`notes`,`list` 
		FROM companies ";

	$query['select_companies_where_list'] = "
		SELECT `COMPANY_ID`,`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`jobs`,`notes`,`list` 
		FROM companies
		WHERE `list`=";

	$query['select_companies_where_jobs'] = "
		SELECT companies.COMPANY_ID,`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`position`,`link`,jobs.notes,`JOB_ID`,companies.notes 
		FROM companies,jobs 
		WHERE jobs.company_id=companies.COMPANY_ID 
		ORDER BY jobs.company_id DESC"; 
	
	$query['select_companies_where_no_jobs'] = "
		SELECT `COMPANY_ID`,`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`notes` 
		FROM companies 
		WHERE `jobs`=0";
	
	$query['select_all_jobs_where_company_id'] = "
		SELECT `JOB_ID`,`company_id`,`position`,`link`,`notes`
		FROM jobs
		WHERE `company_id`="; // --> generic value, please see delete.php
	
	$query['select_all_jobs_ids_where_company_id'] = "
		SELECT `JOB_ID`
		FROM jobs
		WHERE `company_id`="; // --> generic value, please see delete.php
	
	$query['insert_company_values'] = "
		INSERT INTO 
		`companies`(`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`notes`,`list`)";
		// VALUES ('') --> generic, please see update.php
	
	$query['insert_job_values'] = "
		INSERT INTO
		`jobs`(`company_id`,`position`,`link`,`notes`)";
		// VALUES ('') --> generic, please see update.php
	
	$query['update_jobs_plus_where_company_id'] = "
		UPDATE `companies`
		SET jobs = jobs + 1
		WHERE `COMPANY_ID`="; // --> generic value, please see update.php
	
	$query['update_jobs_minus_where_company_id'] = "
		UPDATE `companies`
		SET jobs = jobs - 1
		WHERE `COMPANY_ID`="; // --> generic value, please see update.php
	
	$query['delete_job_where_id'] = "
		DELETE FROM `jobs`
		WHERE `job_id`="; // --> generic value, please see delete.php
	
	$query['delete_company_where_id'] = "
		DELETE FROM `companies`
		WHERE `company_id`="; // --> generic value, please see delete.php
	
?>