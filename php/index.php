<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>php testing <?php echo "[" . $_SERVER['SERVER_NAME'] . "]" ?></title>
	<link rel="stylesheet" type="text/css" href="css/ljsh-0.1.0.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<!-- 	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/base-min.css"> -->
	<!--[if lte IE 8]>
	  <link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.5.0/base-min.css&pure/0.5.0/grids-min.css&pure/0.5.0/grids-responsive-old-ie-min.css">
	<![endif]-->
	<!--[if gt IE 8]><!-->
	  <link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.5.0/base-min.css&pure/0.5.0/grids-min.css&pure/0.5.0/grids-responsive-min.css">
	<!--<![endif]-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/ljsh-0.1.0.js"></script>
</head>
<body class="background">
	<div class="basicLayerHeader">
		<span>LJSH (alpha) <i><?php echo "on " . $_SERVER['SERVER_NAME'] ?></i></span>
	</div>
	<div class="basicLayerForm">
		<form id="theForm" class="pure-form pure-form-stacked" method="post" action="src/ljshFunc.php" onSubmit="return ajaxSubmit(this);" onReset="return resetForm();">
			<input id="formAction" type="hidden" name="formAction" value="cAdd" />
			<input id="companyID" type="hidden" name="companyID" value="" />
			<input id="jobID" type="hidden" name="jobID" value="" />
			<div style="margin:10px;padding: 10px;background: none repeat scroll 0 0 #eee;">
			<fieldset id="companyFields">
				<div class="pure-g">
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="clink">Company Link</label>
						<input id="clink" type="text" name="clink" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="cname">Company Name</label>
						<input id="cname" type="text" name="cname" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="country">Country</label>
						<input id="country" type="text" name="country" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="city">City</label>
						<input id="city" type="text" name="city" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="cinfos">Company Infos</label>
						<input id="cinfos" type="text" name="cinfos" value="">
					</div>
					
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="caddress">Street, Post Code</label>
						<input id="caddress" type="text" name="caddress" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="caddress_link">Map Link</label>
						<input id="caddress_link" type="text" name="caddress_link" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="croute">Route</label>
						<input id="croute" type="text" name="croute" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="cratings">Ratings</label>
						<input id="cratings" type="text" name="cratings" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-5">
						<label for="cnotes">Notes</label>
						<input id="cnotes" type="text" name="cnotes" value="">
					</div>
<!-- 						<div class="pure-u-1 pure-u-md-1-3"> -->
<!-- 							<label for="state">State</label> -->
<!-- 								<select id="state" class="pure-input-1-2"> -->
<!-- 									<option>AL</option> -->
<!-- 									<option>CA</option> -->
<!-- 									<option>IL</option> -->
<!-- 								</select> -->
<!-- 						</div> -->
				</div>
			</fieldset>
			<fieldset id="jobFields" style="display:none;">
				<div class="pure-g">
					<div class="pure-u-1 pure-u-md-1-3">
						<label for="jposition">Position Name</label>
						<input id="jposition" type="text" name="jposition" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-3">
						<label for="jlink">Company Name</label>
						<input id="jlink" type="text" name="jlink" value="">
					</div>
					<div class="pure-u-1 pure-u-md-1-3">
						<label for="jnotes">Notes</label>
						<input id="jnotes" type="text" name="jnotes" value="">
					</div>
				</div>
			</fieldset>
			</div>
			<div style="text-align:center;margin:10px;padding: 10px;background: none repeat scroll 0 0 #eee;">
				<style scoped>
					.button-success,
					.button-error {
						color: white;
						border-radius: 4px;
						text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
					}
					.button-success {
						background: rgb(28, 184, 65); /* this is a green */
					}

					.button-error {
						background: rgb(202, 60, 60); /* this is a maroon */
					}
				</style>
				<button id="formSubmit" type="submit" name="form_submit" class="button-success pure-button">Add Company</button>
				<button id="formReset" type="reset" name="form_reset" class="pure-button button-error">Cancel</button>
			</div>
		</form>
	</div>
	
	<div class="basicLayerList">
	<div style="margin:10px;padding: 10px;background: none repeat scroll 0 0 #eee;">
		[<span class="companyID">6</span>] <span class="country">DE</span>, 
			<span class="city">Hamburg</span>, <span class="company"><a href="https://www.google.de/search?q=xyz2" target="_blank">xyz3</a></span>, 
			<span class="infos">sector 2;medium</span>, 
			<span class="address"><a href="https://www.google.de/maps/@53.558572,9.9278215,10z?hl=en" target="_blank">street 321, 54321</a></span>, 
			<span class="route">U321;30min</span>, <span class="ratings">http://www.kununu.com/;3/5</span>, 
		<span>
			(<a href="http://www.job.de" target="_blank">developer</a>, [<span>y;1-3;php,js;good</span>]) 
				[<span class="button" onclick="editJData(1,this)">E</span>] 
				[<span class="button" onclick="deleteData(6,1)">X</span>] 
		</span>, 
		<span class="notes">clubmates</span> 
		[<span class="button" onclick="addJData(6,this)">add</span>] | 
			[<span class="button" onclick="editCData(6,this)">edit</span>] | 
			[<span class="button" onclick="deleteData(6,0)">delete</span>]
			
		
		-, -, -, -, -, -, -, -, 
		<span>
		(<a href="test" target="_blank">test</a>, [<span>test</span>]) 
			[<span class="button" onclick="editJData(10,this)">E</span>] 
			[<span class="button" onclick="deleteData(6,10)">X</span>]
		</span>, 
		-,
			
	</div>
	</div>
	
	<div class="basicLayerList">
		<div id="list" data-target="hot">
			<!-- db data -->
		</div>
		<div id="loader" style="display:none;text-align:center;background:#fff;">
			<img src="img/loader.gif" />
		</div>
	</div>
</body>
</html>