<?php
if (strstr($_SERVER['REQUEST_URI'],'?')){$udid = substr($_SERVER['REQUEST_URI'], 1, strpos($_SERVER['REQUEST_URI'], '?') - 1);} else {$udid = substr($_SERVER['REQUEST_URI'], 1);}    
$link = mysql_connect("xxxxxxx", "xxxxxx", "xxxxxxx");
mysql_select_db("wrrrite_db", $link);
$result = mysql_query("select * from test where udid = '$udid'");
$values = mysql_fetch_array($result);
$header = base64_decode($values[2]);
$body = str_replace('<div>','<br />',str_replace('</div>','',base64_decode($values[3])));
if (!empty($body) || !empty($header)) { ?>
<html>
	<!-- Follow me on Twitter @mmackh -->
	<head>
		<meta charset="utf-8" />
		<title>Wrrrite: <?php echo $header ?></title>	
		<link href="css/stylesheet.css" rel="stylesheet" media="screen">
		<link href="css/print.css" rel="stylesheet" media="print">
		<?php echo '<script type="text/javascript">
			function hidenotf() {
				var banner = document.getElementById("banner");
				banner.style.display = "none";
			}
			function cloud() {
				var header = document.getElementById("z-'.$udid.'").innerHTML;
				var body = document.getElementById("x-'.$udid.'").innerHTML;	
				document.getElementById("cloudheadertext").value = Base64.encode(header);
				document.getElementById("cloudbodytext").value = Base64.encode(body);
			}
			function js2txt() {		
				var header = document.getElementById("z-'.$udid.'").innerHTML;
				var body = document.getElementById("x-'.$udid.'").innerHTML;	
				document.getElementById("headertext").value = Base64.encode(header);
				document.getElementById("bodytext").value = Base64.encode(body);
			}
			</script>' ?>
		<script src="js/webtoolkit.base64.js"/></script>
	</head>
	<body>
		<?php
		if ($_GET['m']) {echo '<div id="banner">
			<div id="notification">In the Cloud @ http://wrrrite.com/'.$udid.'</div>
			<a href="#" onclick="hidenotf()"><div id="hide-notification">&times;</div></a>
		</div>';} else {}
		?>
		<div class="actions">
			<form name="upload" action="api/update" method="POST">
				<a href="#" class="tooltip" rel="Update your Document"><input type="image" src="img/update.png" width="24" id="save" onclick="cloud()"></a>
				<input type="hidden" id="cloudheadertext" name="cloudheadertext" />
				<input type="hidden" id="cloudbodytext" name="cloudbodytext" />
				<input type="hidden" id="udid" name="udid" value="<?php echo $udid ?>"/>
			</form>
			<form name="download" action="api/txt" method="POST">
				<a href="#" class="tooltip" rel="Download all your Work"><input type="image" src="img/save.png" width="18" id="save" type="Submit" onclick="js2txt()"></a>
				<input type="hidden" id="headertext" name="headertext" />
				<input type="hidden" id="bodytext" name="bodytext" />
			</form>
			<form action="" method="" name="select">
				<a href="#" class="tooltip" rel="Would you like to Print?"><input type="image" src="img/print.png" width="21" alt="Print this document" onclick="javascript:print();"></a>
				<a href="#" class="tooltip" rel="Clear the Document"><input type="image" src="img/clear.png" width="15" alt="Clear" id="clear" onclick="clearValue()"></a>
			</form>
		</div>
		<div id="container">
			<img id="shadow_top" src="img/shadow_top.png" />
			<div class="text" id="write">
					<h1 id="z-<?php echo $udid?>" contenteditable><?php echo $header ?></h1>
					<p id="x-<?php echo $udid?>" contenteditable autofocus><?php echo $body ?></p>
			</div>
		</div>
		<a style="bottom:10px; right:20px; position: fixed; font-size:0.75em; text-declaration:none; color:#AAAAAA;" href="http://wrrrite.com/<?php echo $udid ?>">http://wrrrite.com/<?php echo $udid ?><a/>
	</body>
</html>
<?php } else {

echo '<!DOCTYPE html>
<html>
	<!-- Follow me on Twitter @mmackh -->
	<head>
		<meta charset="utf-8" />
		<title>Wrrrite | 404</title>	
		<link href="http://wrrrite.com/css/stylesheet.css" rel="stylesheet" media="screen">
	</script>
	</head>
	<body>
		<div id="404" style="margin-top:70px; font-weight:bold; font-size:22px;">
		404 | This Document is not the <img src="http://wrrrite.com/img/cloud-icon.png" style="position:fixed; margin-top:-5px; margin-left:20px; opacity:0.7; width="40"; height="40";"/>
		</div>
		<p style="color:#666;">"<i style="font-size:15px; padding:5px;">'.$udid.'</i>" is being logged as missing. Not really, though. If you think there is something seriously wrong, send me a Tweet: <a style="color:#000000;" href="http://twitter.com/mmackh">@mmackh</a></p>
	</body>
</html>';

}

?>