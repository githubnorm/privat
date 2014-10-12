<?php

	print("<script data-msg=\"" . $_SESSION['lang'] . "\">");
		print("msg=new Array();");
		print("msg['button_text_waiting']=\"". $msg[ $_SESSION['lang'] ]['button_text_waiting'] . "\";");
		print("msg['button_text_enter_company']=\"". $msg[ $_SESSION['lang'] ]['button_text_enter_company'] . "\";");
		print("msg['button_text_invalid']=\"". $msg[ $_SESSION['lang'] ]['button_text_invalid'] . "\";");
		print("msg['button_text_add_company']=\"". $msg[ $_SESSION['lang'] ]['button_text_add_company'] . "\";");
		print("msg['button_text_edit_company']=\"". $msg[ $_SESSION['lang'] ]['button_text_edit_company'] . "\";");
		print("msg['button_text_add_job']=\"". $msg[ $_SESSION['lang'] ]['button_text_add_job'] . "\";");
		print("msg['button_text_edit_job']=\"". $msg[ $_SESSION['lang'] ]['button_text_edit_job'] . "\";");
		print("msg['warning_msg_exist']=\"". $msg[ $_SESSION['lang'] ]['warning_msg_exist'] . "\";");
		print("msg['warning_msg_similar_exist']=\"". $msg[ $_SESSION['lang'] ]['warning_msg_similar_exist'] . "\";");
		print("msg['error_msg_fetch_failed']=\"". $msg[ $_SESSION['lang'] ]['error_msg_fetch_failed'] . "\";");
		print("msg['error_msg_submit_failed']=\"". $msg[ $_SESSION['lang'] ]['error_msg_submit_failed'] . "\";");
		print("msg['error_msg_delete_failed']=\"". $msg[ $_SESSION['lang'] ]['error_msg_delete_failed'] . "\";");
	print("</script>");
	
?>