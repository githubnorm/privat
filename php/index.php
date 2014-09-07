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
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/scripts.js"></script>
</head>
<body>
	<div id="main" style="margin: 0px; padding: 10px; background-color: #FBFBFB;">
		php testing <?php echo "[$db]" ?>:<br>
		<p>
			<form method="post" action="source/db_insert.php?i=company" onSubmit="return ajaxSubmit(this);">
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
				<input type="submit" name="form_submit" value="Add" />
			</form>
		</p>
		<p>
			<span data-target="hot">
				<!-- db data -->
			</span>
		</p>
		<!-- TODO: unifying of job edit layers -->
		<p>
			<div id="divAddJob" style="display:none;">
				<form id="formAddJob" method="post" action="source/db_insert.php?i=job" onSubmit="return ajaxSubmit(this);">
					<input id="company" type="hidden" name="companyID" value="-" /> 
					<input type="text" name="position" value="position" /> 
					<input type="text" name="link" value="link" /> 
					<input type="text" name="notes" value="notes" /> 
					<input type="submit" name="form_submit" value="Add" />
				</form>
				<span onclick='showAddForm()'>[close]</span>
			</div>
		</p>
		<p>
			<div id="divEditJob" style="display:none;">
				<form id="formEditJob" method="post" action="source/db_update.php?i=job" onSubmit="return ajaxSubmit(this);">
<!-- 					<input type="hidden" name="companyID" value="-" />  -->
					<input type="hidden" name="jobID" value="-" /> 
					<input type="text" name="position" value="" /> 
					<input type="text" name="link" value="" /> 
					<input type="text" name="notes" value="" /> 
					<input type="submit" name="form_submit" value="Edit" />
				</form>
				<span onclick='showEditFormJob()'>[close]</span>
			</div>
		</p>
		<p>
			<div id="divEditCompany" style="display:none;">
				<form id="formEditCompany" method="post" action="source/db_update.php?i=company" onSubmit="return ajaxSubmit(this);">
					<input type="hidden" name="companyID" value="-" /> 
					<input type="text" name="country" value="" /> 
					<input type="text" name="city" value="" /> 
					<input type="text" name="com_name" value="" /> 
					<input type="text" name="com_link" value="" /> 
					<input type="text" name="infos" value="" /> 
					<input type="text" name="loc_address" value="" /> 
					<input type="text" name="loc_link" value="" /> 
					<input type="text" name="loc_route" value="" /> 
					<input type="text" name="ratings" value="" /> 
					<input type="text" name="notes" value="" /> 
					<input type="submit" name="form_submit" value="Edit" />
				</form>
				<span onclick='showEditFormCompany()'>[close]</span>
			</div>
		</p>
	</div>
</body>
</html>