<?php

	if( isPost('formAction') ) {
	
		// let make sure we escape the data (for german umlauts)
		$val['loginID'] = mysql_real_escape_string(getPost('loginID'), $db_connection);
		$val['pw'] = mysql_real_escape_string(getPost('pw'), $db_connection);
		$val['pw_confirm'] = mysql_real_escape_string(getPost('pw_confirm'), $db_connection);
		
		$msg = null;

		// check login data
		if( getPost('formAction')=="l" ) {
			
			$result=false;
			$query_pw = mysql_query( $query['select_pw_where_logingID'] . $val['loginID'], $db_connection);
			if($query_pw) {
				while( $row = mysql_fetch_array($query_pw, MYSQL_NUM) ) {
					if($row[0]==$val['pw']){
						$_SESSION['user'] = $val['loginID'];
						$result = true;
					} else {
						$msg = "password doesn't match to the user";
						$result = true;
					}
				}
			} else {
				if($quey_pw==0) {
					$msg = "user not found!";
					$exist = mysql_query( $query['select_check_if_logingID_is_activated'] . $val['loginID'], $db_connection);
					if($exist==1) {
						$msg = "user hasn't activate his account!";
					}
				}
				$result = false;
			}
			
		}
		
		// insertion of new activation
		if( getPost('formAction')=="r" ) {
			
			$exist = mysql_query( $query['select_check_if_logingID_exist'] . $val['loginID'], $db_connection);
			
			if($exist==0) {

				$exist = mysql_query( $query['select_check_if_logingID_is_activated'] . $val['loginID'], $db_connection);
				
				if($exist==0) {
					
					// Mail senden, ggf. Fehlermeldung ausgeben. Bei erfolgreicher Registrierung den
					// Benutzer fuer weitere Registrierungen temporaer sperren
					$mailtext = "the email text"; //TODO text + link
					define("WEBMASTEREMAIL", "do-not-reply@ljsh.com");
					
					if(mail( $val['loginID'], "confirmation of registration on LJSH", $mailtext,
							"From: " . WEBMASTEREMAIL . "\n" ."Reply-To: " . WEBMASTEREMAIL . "\n")) {
							
							$activationCode =  mt_rand(0,1000) . date('U') . mt_rand(0,1000);
							// `useractivations`(`loginID`, `activationCode`)
							$query_tmp =  $query['insert_useractivation_values']."
							VALUES ('".$val['loginID']."',
								'".$activationCode."')";
							// insert/update the company in db
							$result = mysql_query($query_tmp, $db_connection);
							
					} else{
						$msg = "failed to send the activation mail!";
						$result = false;
					}
							
				} else {
					if($exist==1) {
						$msg = "user hasn't activated his account!";
					}
					$result = false;
				}

			} else {
				if($exist==1) {
					$msg = "user already exist!";
				}
				$result = false;
			}
			
		}
			
	} else {
		$result = false;
	}
	
	toJSON($result,$msg);
	
?>