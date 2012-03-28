<html>
	<!-- Follow me on Twitter @mmackh -->
	<head>
		<meta charset="utf-8" />
		<title>Wrrrite | Text Editor</title>	
		<link href="css/stylesheet.css" rel="stylesheet" media="screen">
		<link href="css/print.css" rel="stylesheet" media="print">
		<script src="js/writer.js"></script>
	</head>
	<body onload="loadValue()" onkeyup="storeValue()">
		<div class="actions">
			<form name="upload" action="api/cloud" method="POST">
				<a href="#" class="tooltip" rel="Upload to the Cloud"><input type="image" src="img/cloud.png" width="20" id="save" onclick="cloud()"></a>
				<input type="hidden" id="cloudheadertext" name="cloudheadertext" />
				<input type="hidden" id="cloudbodytext" name="cloudbodytext" />
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
					<h1 id="z" contenteditable>Meet Wrrrite</h1>
					<p id="x" contenteditable autofocus>Hi, I am a smart text editor that lives in your browser. Click on my text to start writing. All your work will be saved automagically. You can now also upload your document to the cloud and update it from anywhere.</p>
			</div>
		</div>
	<script type="text/javascript" src="js/webtoolkit.base64.js"></script>
	</body>
</html>

