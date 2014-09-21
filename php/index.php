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

	<!-- HEAD BEGIN-->
	<div class="basicLayerHead">
		<span>LJSH (a0.1.0) <i><?php echo "on " . $_SERVER['SERVER_NAME'] ?></i></span>
	</div>
	<!-- HEAD END -->
	
	<!-- FORMS BEGIN-->
	<div class="basicLayer">
		<form id="theForm" class="pure-form pure-form-stacked" method="post" action="src/ljshFunc.php" onSubmit="return ajaxSubmit(this);" onReset="return resetForm();">
			<input id="formAction" type="hidden" name="formAction" value="cAdd" />
			<input id="companyID" type="hidden" name="companyID" value="" />
			<input id="jobID" type="hidden" name="jobID" value="" />
			<div class="contentLayer">
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
			<div class="contentLayer" style="text-align:center;">
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
				<button id="formSubmit" type="submit" name="form_submit" class="pure-button button-success">Add Company</button>
				<button id="formReset" type="reset" name="form_reset" class="pure-button button-error">Cancel</button>
			</div>
		</form>
	</div>
	<!-- FORMS END-->
	
	<!-- CONTENTS BEGIN-->
	<div class="basicLayer" style="display:none;">
		<div class="contentLayer">
		
			<div class="listLayer">
			
				<div class="contentCellBasic" style="width: 25px;">
					<div class="contentCellLayer">
						<span class="cellCounty">DE</span><br> 
					</div>
				</div>
				
				<div class="contentCellBasic" style="width: 24%;">
					<a class="cellCompanyLink" href="https://www.google.de/search?q=xyz2" target="_blank">
						<div class="contentCellLayer cellHover" style="width:98%;">
							<span class="cellCompany">xyz3</span>
							<br>
							<span class="cellInfos">sector 2;medium</span>
						</div>
					</a>
					<p class="clear">
					<div class="contentCellLayer" style="width:98%;">
						<span class="cellNotes">clubmates</span>
					</div>
				</div>
				
				<div class="contentCellBasic" style="width: 24%;"">
					<a class="cellAddressLink" href="https://www.google.de/maps/@53.558572,9.9278215,10z?hl=en" target="_blank">
						<div class="contentCellLayer cellHover" style="width:98%;">
							<span class="cellAddress">street 321, 54321</span> 
							<span class="cellCity">Hamburg</span>
							<br>
							<span class="cellRoute">U321;30min</span><br>
						</div>
					</a>
					<p class="clear">
					<div class="contentCellLayer" style="width:98%;">
						<span class="cellRatings">http://www.kununu.com/;3/5</span>
					</div>
				</div>
				
				<div class="contentCellBasic" style="width: 35%;">
					<div class="jobRow">
						<a href="http://www.job.de" target="_blank">
							<span class="contentCellLayer cellHover" style="width: 85%;">
								<span class="cellPosition">developer</span><br>
								<span class="cellJobNotes">[y;1-3;php,js;good]</span>
							</span>
						</a>
						<span class="contentCellLayer">
							<span class="button" style="background: lightblue" onclick="editJData(1,this)">
								<img class="buttonImgJob" src="img/edit.png" />
							</span>
							<span class="button" style="background: #F6CECE" onclick="deleteData(6,1)">
								<img class="buttonImgJob" src="img/delete.png" />
							</span> 
						</span>
					</div>
					<p class="clear">
					<div class="jobRow">
						<a href="test" target="_blank">
							<span class="contentCellLayer cellHover" style="width: 85%;">
								<span class="cellPosition">test</span><br>
								<span class="cellJobNotes">[test]</span>
							</span>
						</a>
						<span class="contentCellLayer">
							<span class="button" style="display: inline-block; background: lightblue" onclick="editJData(10,this)">
								<img class="buttonImgJob" src="img/edit.png" />
							</span> 
							<span class="button" style="display: inline-block; background: #F6CECE" onclick="deleteData(6,10)">
								<img class="buttonImgJob" src="img/delete.png" />
							</span>
						</span>
					</div>
				</div>
				
				<div class="contentCellBasic">
					<span class="button" style="background: lightgreen" onclick="addJData(6)">
						<img class="buttonImgCompany" src="img/add.png" />
					</span> 
					<span class="button" style="background: lightblue" onclick="editCData(6,this)">
						<img class="buttonImgCompany" src="img/edit.png" />
					</span>
					<span class="button" style="background: #F6CECE" onclick="deleteData(6,0)">
						<img class="buttonImgCompany" src="img/delete.png" />
					</span>
				</div>
				
				<p style="clear: both;">
			</div>
			
		</div>
	</div>
	
	<div class="basicLayer">
		<div class="contentLayer">
			<div id="hotList">
				<!-- db data -->
			</div>
			<div id="interestList"style="display:none">
				<!-- db data -->
			</div>
			<div id="blackList"style="display:none">
				<!-- db data -->
			</div>
			<div id="loader" style="display:none;text-align:center;background:#fff;">
				<img src="img/loader.gif" />
			</div>
		</div>
	</div>
	<!-- CONTENTS END-->

</body>
</html>