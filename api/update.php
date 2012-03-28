<?php

$link = mysql_connect("xxxxxxx", "xxxxxxxx", "xxxxxxxxx");
mysql_select_db("wrrrite_db", $link);
mysql_query("SET NAMES 'utf8'");

$udid = $_POST['udid'];
$header = mysql_real_escape_string($_POST["cloudheadertext"]);
$body = mysql_real_escape_string($_POST["cloudbodytext"]);

mysql_query("UPDATE test SET header='$header', body='$body' WHERE udid='$udid'");
header( 'Location: http://wrrrite.com/'.$udid );

?>