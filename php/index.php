<?php
	include "src/lang/msgLib.php";
	$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
	session_start();
	if (!isset($_SESSION['lang'])) {
		$_SESSION['lang'] = 'en';
	} else {
		if (isset($_GET['la']) && !empty($_GET['la'])) {
			$_SESSION['lang'] = $_GET['la'];
		}
	}
	$lang = $_SESSION['lang'];
?>

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
	<script id="allLinks">
		companyList = [];
	</script>
	<?php include "src/lang/msgScript.php" ?>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/ljsh-0.1.0.js"></script>
</head>
<body class="background">
	<!-- HEAD BEGIN-->
	<div class="basicLayerHead">
		<span>LJSH (a0.1.0) | <i><?php echo $details->country . " (" .$ip . ") " . $lang ?></i> | <a data-lang="en" href="/privat/php/?la=en">EN</a> / <a data-lang="de" href="/privat/php/?la=de">DE</a> </span>
	</div>
	<!-- HEAD END -->
	
	<!-- FORMS BEGIN-->
	<div class="basicLayer">
		<form id="theForm" class="pure-form pure-form-stacked" method="post" action="src/ljshFunc.php" onSubmit="return ajaxSubmit(this);" onReset="return resetForm();">
			<input id="formAction" type="hidden" name="formAction" value="cAdd" />
			<input id="companyID" type="hidden" name="companyID" value="" />
			<input id="jobID" type="hidden" name="jobID" value="" />
			<input id="listID" type="hidden" name="listID" value="1" />
			<div class="contentLayer">
				<fieldset id="searchField" style="text-align:center">
					<div class="pure-g" >
						<div class="pure-u-1 pure-u-md-1-1">
							<label for="urlInput"><?php echo $msg[$lang]['label_searchfield'] ?></label>
							<input id="urlInput" type="text" name="linkInput" value="" style="display: inline;width: 325px;text-align:center">
						</div>
					</div>
				</fieldset>
				<fieldset id="companyFields" style="display:none;">
					<div class="pure-g">
						<div class="pure-u-1 pure-u-md-1-4">
							<label for="companyURL"><?php echo $msg[$lang]['label_companyURL'] ?></label>
							<input id="companyURL" type="text" name="companyURL" value="">
						</div>
						<div class="pure-u-1 pure-u-md-1-4">
							<label for="companyName"><?php echo $msg[$lang]['label_companyName'] ?></label>
							<input id="companyName" type="text" name="companyName" value="">
						</div>
						<div class="pure-u-1 pure-u-md-1-4">
							<label for="country"><?php echo $msg[$lang]['label_country'] ?></label>
							<input id="country" type="text" name="country" value="">
						</div>
						<div class="pure-u-1 pure-u-md-1-4">
							<label for="city"><?php echo $msg[$lang]['label_city'] ?></label>
							<input id="city" type="text" name="city" value="">
						</div>
						
						<div class="pure-u-1 pure-u-md-1-4">
							<label for="companyAddress"><?php echo $msg[$lang]['label_companyAddress'] ?></label>
							<input id="companyAddress" type="text" name="companyAddress" value="">
						</div>
						<div class="pure-u-1 pure-u-md-1-4">
							<label for="companyMapURL"><?php echo $msg[$lang]['label_companyMapURL'] ?></label>
							<input id="companyMapURL" type="text" name="companyMapURL" value="">
						</div>
						<div class="pure-u-1 pure-u-md-1-4">
							<label for="companyRatings"><?php echo $msg[$lang]['label_companyRatings'] ?></label>
							<input id="companyRatings" type="text" name="companyRatings" value="">
						</div>
						<div class="pure-u-1 pure-u-md-1-4">
							<label for="companyNotes"><?php echo $msg[$lang]['label_companyNotes'] ?></label>
							<input id="companyNotes" type="text" name="companyNotes" value="">
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
							<label for="jobPosition"><?php echo $msg[$lang]['label_jobPosition'] ?></label>
							<input id="jobPosition" type="text" name="jobPosition" value="">
						</div>
						<div class="pure-u-1 pure-u-md-1-3">
							<label for="jobPositionURL"><?php echo $msg[$lang]['label_jobPositionURL'] ?></label>
							<input id="jobPositionURL" type="text" name="jobPositionURL" value="">
						</div>
						<div class="pure-u-1 pure-u-md-1-3">
							<label for="jobNotes"><?php echo $msg[$lang]['label_jobNotes'] ?></label>
							<input id="jobNotes" type="text" name="jobNotes" value="degree, XP, tskills, EN">
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
				<div id="startButton">
					<button id="inputStatus" class="pure-button-disabled pure-button">
						<?php echo $msg[$lang]['button_text_waiting'] ?>
					</button>
					<br><span id="inputWarnings" style="height:9px; font-size: 10px;"></span>
				</div>
				<div id="formButtons" style="display:none">
					<button id="formSubmit" type="submit" name="form_submit" class="pure-button button-success"><?php echo $msg[$lang]['button_text_add_company'] ?></button>
					<button id="formReset" type="reset" name="form_reset" class="pure-button button-error"><?php echo $msg[$lang]['button_text_cancel'] ?></button>
					<br><span id="inputErrors" style="color:red; height:9px; font-size: 10px;"></span>
				</div>
			</div>
		</form>
	</div>
	<!-- FORMS END-->
	
	<!-- TEST CONTENTS BEGIN-->
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
	<!-- TEST CONTENTS END-->
	
	<!-- CONTENTS BEGIN-->
	<div class="basicLayer">
		<div class="contentLayer">
			<div style="display: block;">
				<div data-list="1" class="button" style="width: 33%; text-align: center;"><?php echo $msg[$lang]['l1'] ?></div>
				<div data-list="2" class="button" style="width: 33%; text-align: center;"><?php echo $msg[$lang]['l2'] ?></div>
				<div data-list="3" class="button" style="width: 33%; text-align: center;"><?php echo $msg[$lang]['l3'] ?></div>
			</div>
			<p style="clear: both;">
			<div id="lists">
				<div data-target="1">
					<!-- db data -->
				</div>
				<div data-target="2" style="display:none;">
					<!-- db data -->
				</div>
				<div data-target="3" style="display:none;">
					<!-- db data -->
				</div>
			</div>
			<div id="loader" style="display:none;text-align:center;background:#fff;">
				<img src="img/loader.gif" />
			</div>
		</div>
	</div>
	<!-- CONTENTS END-->
	
</body>
</html>