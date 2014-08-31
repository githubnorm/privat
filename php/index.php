<?php
	include "source/db_config.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>php testing <?php echo "[$db]" ?></title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<!-- TODO: kein externen jquery link -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/scripts.js"></script>
</head>
<body>
	<div id="main" style="margin: 0px; padding: 10px; background-color: #FBFBFB;">
		php testing <?php echo "[$db]" ?>:<br>
		<p>
			<form method="post" action="source/db_insert.php?i=company" onSubmit="return ajaxSubmit(this);">
				Values: 
				<input type="text" name="country" value="country" /> 
				<input type="text" name="city" value="city" /> 
				<input type="text" name="com_name" value="name" /> 
				<input type="text" name="com_link" value="link" /> 
				<input type="text" name="infos" value="infos" /> 
				<input type="text" name="loc_address" value="street" /> 
				<input type="text" name="loc_link" value="map link" /> 
				<input type="text" name="loc_route" value="route" /> 
				<input type="text" name="ratings" value="ratings" /> 
				<input type="text" name="notes" value="notes" /> 
				<input type="submit" name="form_submit" value="Go" />
			</form>
		</p>
		<p>
			<span data-target="hot">
				<!-- db data -->
			</span>
		</p>
		<p>
			<div id="div_add" style="display:none;">
				<form id="form_add" method="post" action="source/db_insert.php?i=job" onSubmit="return ajaxSubmit(this);">
					Values: 
					<input id="company" type="hidden" name="company_id" value="-" /> 
					<input type="text" name="position" value="position" /> 
					<input type="text" name="link" value="link" /> 
					<input type="text" name="notes" value="notes" /> 
					<input type="submit" name="form_submit" value="Go" />
				</form>
				<span onclick='showAddForm(false)'>[close]</span>
			</div>
		</p>
	</div>
</body>
</html>