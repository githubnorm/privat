<?php
	//session_start(); //stripslashes(),addslashes()
	session_start();

	header('Content-Type: text/html; charset=utf-8');
// 	include "src/lang/msgLib.php";
	require_once('src/lang/msgLib.php');
	define('MYTESTCONSTANT',60*60*24);
	$ip = $_SERVER['REMOTE_ADDR'];
	$loc = file_get_contents("http://ipinfo.io/{$ip}/json");
	$details = json_decode($loc);
	if(!isset($details->country)) {
		$details->country = "LOCAL";
	}
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
	<?php include('src/head.php'); ?>
</head>
<body class="background">
	
	<!-- HEADER BEGIN-->
	<?php include('src/header.php'); ?>
	<!-- HEADER END -->

	<!-- FORMS BEGIN-->
	<div style="text-align:center;margin-top: 30px;">
	<div class="basicLayer" style="display:inline-block">
		<form id="theForm" class="pure-form pure-form-aligned" method="post" action="src/ljshFunc.php?a=r" onSubmit="return ajaxSubmit(this);" onReset="return resetForm();">
			<input id="loginFormAction" type="hidden" name="loginFormAction" value="l" />
			<div class="contentLayer">
				<fieldset id="loginFields" style="text-align:center; margin: 20px 50px 0px 50px;">
					<div class="pure-control-group">
						<!-- <label for="email"><?php echo $msg[$lang]['label_email'] ?></label> -->
						<input id="loginID" name="loginID" type="email" placeholder="<?php echo $msg[$lang]['label_email'] ?>" style="width: 250px;text-align: center;">
					</div>
					<div class="pure-control-group">
						<!-- <label for="password"><?php echo $msg[$lang]['label_password'] ?></label> -->
						<input id="loginPW" name="loginPW" type="password" placeholder="<?php echo $msg[$lang]['label_password'] ?>" style="width: 250px;text-align: center;">
					</div>
				</fieldset>
				<fieldset id="subscribeFields" style="text-align:center; margin: 20px 50px 0px 50px; display:none;">
					<div class="pure-control-group">
						<input id="subscribeID" name="subscribeID" type="email" placeholder="<?php echo $msg[$lang]['label_email'] ?>" style="width: 250px;text-align: center;">
					</div>
					<div class="pure-control-group">
						<input id="subscribePW" name="subscribePW" type="password" placeholder="<?php echo $msg[$lang]['label_password'] ?>" style="width: 250px;text-align: center;">
					</div>
					<div class="pure-control-group">
						<input id="subscribePWconfirm" name="subscribePWconfirm" type="password" placeholder="<?php echo $msg[$lang]['label_password_confirm'] ?>" style="width: 250px;text-align: center;">
					</div>
				</fieldset>
				<span id="inputErrors" style="color:red; height:9px; font-size: 10px; margin:0;padding:0;display:none;"></span>
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
					<div id="loginButtons">
						<button id="loginSubmit" type="submit" name="form_submit" class="pure-button button-login"><?php echo $msg[$lang]['button_text_login'] ?></button>
						<div id="signUpNow" style="font-size:12px; margin-top: 10px;cursor:pointer">sign up for free!</div>
					</div>
					<div id="subscribeButtons" style="display:none;">
						<button id="subscribeSubmit" type="submit" name="form_submit" class="pure-button button-subscribe"><?php echo $msg[$lang]['button_text_subscribe'] ?></button>
						<button id="subscribeReset" type="reset" name="form_reset" class="pure-button button-error"><?php echo $msg[$lang]['button_text_cancel'] ?></button>
						<label for="cb" class="pure-checkbox" style="font-size:11px;"><input id="cb" type="checkbox"> I've read the terms and conditions</label>
					</div>
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