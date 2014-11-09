<?php

	function isPost($key) {
		if (isset($_POST[$key]) && !empty($_POST[$key]))
			return true;
		return false;
	}

	function getPost($key) {
		if (isset($_POST[$key]) && !empty($_POST[$key]))
			return $_POST[$key];
		return "-";
	}
	
	function get($key) {
		if (isset($_GET[$key]) && !empty($_GET[$key]))
			return $_GET[$key];
		return false;
	}
	
	function startsWith($haystack, $needle) {
		return $needle === "" || strpos($haystack, $needle) === 0;
	}
	
	function toJSON($result, $msg) {
		$resp = new stdClass();
		$resp->success = false;
		if($msg!=null && $msg!="") {
			$resp->msg = $msg;
		}
		if($result) {
			$resp->success = true;
		}
		print json_encode($resp);
	}
	
?>