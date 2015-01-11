<?php

	/* ### ### ### START OF SELECTS ### ### ### */
	
	$query['select_all_company_urls'] = "
		SELECT `companyURL`,`listID`
		FROM companies ";

	$query['select_companies_where_list_id'] = "
		SELECT `companyID`, `country`, `city`, `companyName`, `companyURL`, `companyAddress`, `companyMapURL`, `companyNotes`, `companyRatings`, `jobCount`,`listID` 
		FROM companies
		WHERE `listID`=";

	$query['select_all_jobs_where_company_id'] = "
		SELECT `jobID`,`companyID`,`jobPosition`,`jobPositionURL`,`jobNotes`
		FROM jobs
		WHERE `companyID`="; // --> generic value, please see delete.php
	
	$query['select_all_jobs_ids_where_company_id'] = "
		SELECT `jobID`
		FROM jobs
		WHERE `companyID`="; // --> generic value, please see delete.php

	$query['select_check_if_logingID_exist'] = "
		SELECT count(1) as exist
		FROM users
		WHERE `loginID`="; // --> generic value, please see subscribe.php
	
	$query['select_pw_where_logingID'] = "
		SELECT userspws.pw
		FROM userspws, users
		WHERE userspws.pwID=users.pwID AND users.loginID ="; // --> generic value, please see subscribe.php
	
	$query['select_check_if_logingID_is_activated'] = "
		SELECT count(1) as exist
		FROM useractivations
		WHERE `activationID`="; // --> generic value, please see subscribe.php
	
	$query['order_by_date'] = "ORDER BY `creationDate` DESC";
	
// 	$query['select_all_companies'] = "
// 		SELECT `companyID`, `country`, `city`, `companyName`, `companyURL`, `companyAddress`, `companyMapURL`, `companyNotes`, `companyRatings`, `jobCount`, `listID`, `loginID`, `creationDate` 
// 		FROM companies ";

// 	$query['select_companies_where_jobs'] = "
// 		SELECT companies.COMPANY_ID,`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`position`,`link`,jobs.notes,`JOB_ID`,companies.notes 
// 		FROM companies,jobs 
// 		WHERE jobs.company_id=companies.COMPANY_ID 
// 		ORDER BY jobs.company_id DESC"; 
	
// 	$query['select_companies_where_no_jobs'] = "
// 		SELECT `COMPANY_ID`,`country`,`city`,`com_name`,`com_link`,`infos`,`loc_address`,`loc_link`,`loc_route`,`ratings`,`notes` 
// 		FROM companies 
// 		WHERE `jobs`=0";
	
	/* +++ +++ +++ END OF SELECTS +++ +++ +++ */
	
	
	
	/* ### ### ### START OF INSERTS ### ### ###  */
	
	$query['insert_company_values'] = "
		INSERT INTO 
		`companies`(`country`,`city`,`companyName`,`companyURL`,`companyAddress`,`companyMapURL`,`companyNotes`,`companyRatings`,`listID`)";
		// VALUES ('') --> generic, please see update.php
	
	$query['insert_job_values'] = "
		INSERT INTO
		`jobs`(`companyID`, `jobPosition`, `jobPositionURL`, `jobNotes`)";
		// VALUES ('') --> generic, please see update.php
		
	$query['insert_useractivation_values'] = "
		INSERT INTO
		`useractivations`(`loginID`, `activationCode`)";
		// VALUES ('') --> generic, please see update.php
		
	/* +++ +++ +++ END OF INSERTS +++ +++ +++ */
	
	
	
	/* ### ### ###  START OF UPDATES ### ### ###  */
	
	$query['update_job_count_plus_where_company_id'] = "
		UPDATE `companies`
		SET jobCount = jobCount + 1
		WHERE `companyID`="; // --> generic value, please see update.php
	
	$query['update_job_count_minus_where_company_id'] = "
		UPDATE `companies`
		SET jobCount = jobCount - 1
		WHERE `companyID`="; // --> generic value, please see update.php

	$query['update_list_id..'] = "
		UPDATE `companies`
		SET listID = "; // --> generic value, please see move.php
	$query['..where_company_id'] = "
		WHERE `companyID`="; // --> generic value, please see move.php
	
	/* +++ +++ +++ END OF UPDATES +++ +++ +++ */
	
	
	
	/* ### ### ### START OF DELETES ### ### ### */
	
	$query['delete_job_where_id'] = "
		DELETE FROM `jobs`
		WHERE `jobID`="; // --> generic value, please see delete.php
	
	$query['delete_company_where_id'] = "
		DELETE FROM `companies`
		WHERE `companyID`="; // --> generic value, please see delete.php
	
	/* +++ +++ +++ END OF DELETES +++ +++ +++ */
	
?>