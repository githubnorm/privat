<?php
	include "../_dbs/db_nxampp.php";
	$list_query = mysql_query("
		SELECT headline, subline
		FROM head
	");
	list($headline, $subline) = mysql_fetch_row($list_query);
	
	// 		$result = mysql_fetch_row($retrive);
	// 		do {
	// 			echo "$result[0], $result[1], $result[2], $result[3], $result[4]";
	// 			echo "<br>";
	// 			$result = mysql_fetch_row($retrive);
	// 		} while ($result);
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<title><?php echo "$headline"; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>

<body text="#000000" link="#333333" vlink="#000000" alink="#000000">

<table width="380" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="60">
    	<a href="../"><img src="../logo.jpg" width="57" height="57" border="0"></a>
    </td>
    <td valign="middle">
    	<div align="justifiy">
    		<font size="6" face="Courier New, Courier, mono"><b><?php echo "$headline"; ?></b></font><br>
        	<font size="1" face="Courier New, Courier, mono"><?php echo "$subline"; ?></font></div>
    </td>
  </tr>
</table>

<hr color="#999999" size="1" noshade>

<?php
	mysql_close();
?>

<!-- ------------------------------------------------------------------------------------------------ -->

<p align="left"><font face="Arial, Helvetica, sans-serif"><strong><a href="../" target="_self">Main</a> 
  > <a href="#" target="_self">Benchmarks</a> ></strong></font></p>
<table width="500" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width="50"><img src="../file_blank.gif"></td>
    <td><font face="Arial, Helvetica, sans-serif"><a href="3dmark06.php">3DMark06</a></font></td>
  </tr>
  <tr>
    <td><img src="../file_blank.gif"></td>
    <td><font face="Arial, Helvetica, sans-serif"><a href="hddspeedtest.php">HDD 
      Speed Test</a> (v1.0.14)</font></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<!-- ------------------------------------------------------------------------------------------------ -->
<hr color="#999999" size="1" noshade>
<?
	include "../_dbs/db_nxampp.php";
	$list_query = mysql_query("
		SELECT html, html_link, html2, html2_link, php, php_link, css, css_link, flash, flash_link, xampp, xampp_link, pma, pma_link
		FROM foot
	");
	list($html, $html_link, $html2, $html_link2, $php, $php_link, $css, $css_link, $flash, $flash_link, $xampp, $xampp_link, $pma, $pma_link) = mysql_fetch_row($list_query);
?>
<p align="center">
	<font size="2" face="Courier New, Courier, mono">
	<a href="<?php echo "$html_link"; ?>" target="_blank"><?php echo "$html"; ?></a> |
	<a href="<?php echo "$html_link2"; ?>" target="_blank"><?php echo "$html2"; ?></a> |
	<a href="<?php echo "$php_link"; ?>" target="_blank"><?php echo "$php"; ?></a> |
	<a href="<?php echo "$css_link"; ?>" target="_blank"><?php echo "$css"; ?></a> |
	<a href="<?php echo "$flash_link"; ?>" target="_blank"><?php echo "$flash"; ?></a> |
	<a href="<?php echo "$xampp_link"; ?>" target="_blank"><?php echo "$xampp"; ?></a> |
	<a href="<?php echo "$pma_link"; ?>" target="_blank"><?php echo "$pma"; ?></a>
	</font>
</p>
<?
	mysql_close();
?>
<p align="center">
	<img src="../apache_pb.gif" width="259" height="32">
</p>
</body>
</html>