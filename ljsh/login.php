<?php
	//session_start(); //stripslashes(),addslashes()
	session_start();

	header('Content-Type: text/html; charset=utf-8');
// 	include "src/lang/msgLib.php";
	require_once('src/lang/msgLib.php');
	define('MYCONSTANT',60*60*24);
	$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
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
<html>
<head>
	<?php include('src/head.php'); ?>
</head>
<body class="background">
	
	<!-- HEADER BEGIN-->
	<?php include('src/header.php'); ?>
	<!-- HEADER END -->

	<!-- FORMS BEGIN-->
	<div style="text-align:center;margin-top: 30px;">
	<div class="basicLayer" style="display:inline-block">
		<form id="theForm" class="pure-form pure-form-aligned" method="post" action="src/ljshFunc.php" onSubmit="return ajaxSubmit(this);" onReset="return resetForm();">
			<input id="formAction" type="hidden" name="formAction" value="l" />
			<div class="contentLayer">
				<fieldset id="loginFields" style="text-align:center; margin: 20px 50px 0px 50px; display:none">
					<div class="pure-control-group">
						<!-- <label for="email"><?php echo $msg[$lang]['label_email'] ?></label> -->
						<input id="email" type="email" placeholder="<?php echo $msg[$lang]['label_email'] ?>" style="width: 250px;text-align: center;">
					</div>
					<div class="pure-control-group">
						<!-- <label for="password"><?php echo $msg[$lang]['label_password'] ?></label> -->
						<input id="password" type="password" placeholder="<?php echo $msg[$lang]['label_password'] ?>" style="width: 250px;text-align: center;">
					</div>
				</fieldset>
				<fieldset id="subscribeFields" style="text-align:center; margin: 20px 50px 0px 50px; display:block;">
					<div class="pure-control-group">
						<input id="email" type="email" placeholder="<?php echo $msg[$lang]['label_email'] ?>" style="width: 250px;text-align: center;">
					</div>
					<div class="pure-control-group">
						<input id="password" type="password" placeholder="<?php echo $msg[$lang]['label_password'] ?>" style="width: 250px;text-align: center;">
					</div>
					<div class="pure-control-group">
						<input id="password_confirm" type="password" placeholder="<?php echo $msg[$lang]['label_password_confirm'] ?>" style="width: 250px;text-align: center;">
					</div>
				</fieldset>
				<fieldset>
					<style scoped>
						.button-success,
						.button-error {
							color: white;
							border-radius: 4px;
							text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
						}
						.button-login {
							background: rgb(50, 90, 255); /* this is a green */
						}
						.button-subscribe {
							background: rgb(28, 184, 65); /* this is a green */
						}
					</style>
					<div id="formButtons">
						<!-- <button id="formSubmit" type="submit" name="form_submit" class="pure-button button-login"><?php echo $msg[$lang]['button_text_login'] ?></button> -->
						<button id="formReset" type="reset" name="form_reset" class="pure-button button-subscribe"><?php echo $msg[$lang]['button_text_subscribe'] ?></button>
						<br><span id="inputErrors" style="color:red; height:9px; font-size: 10px;"></span>
					</div>
					<div style="font-size:12px; margin-top: 10px; display:none">sign up for free!</div>
					<label for="cb" class="pure-checkbox" style="font-size:11px;"><input id="cb" type="checkbox"> I've read the terms and conditions</label>
				</fieldset>
				<!-- 
					<label for="remember">
						<input id="remember" type="checkbox"> Remember me
					</label>
				-->
			</div>
		</form>
	</div>
	
	</div>
	<!-- FORMS END-->
	
	<!-- CONTENTS BEGIN-->
	<div style="text-align:center;">
	<div class="basicLayer" style="display:inline-block">
		<div class="contentLayer">
			why ljsh can easily help you<br>
			with your job search<br>
			(click here and watch this video)
		</div>
	</div>
	</div>
	<!-- CONTENTS END-->
	
</body>
</html>