﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>php testing</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/scripts.js"></script>
</head>
<body>
	<div id="main" style="margin: 0px; padding: 10px; background-color: #FBFBFB;">
		php testing:<br>
		<p>
			<form method="post" action="source/db_insert.php" onSubmit="return ajaxSubmit(this);">
				Value: <input type="text" name="location" /> 
				<input type="text" name="anfahrt" /> 
				<input type="text" name="job_ids" /> 
				<input type="text" name="ratings" /> 
				<input type="submit" name="form_submit" value="Go" />
			</form>
		</p>
		<p>
			<span data-target="hot">
				<!-- db data -->
			</span>
		</p>
	</div>
</body>
</html>