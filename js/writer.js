function loadValue() {

    if (localStorage.getItem("header")) { 
	document.getElementById("z").innerHTML = localStorage.getItem("header");
	document.getElementById("x").innerHTML = localStorage.getItem("text");
	} else {
	}
}

function storeValue() {
	var w = document.getElementById("z").innerHTML;
	localStorage.setItem("header",w);
	var y = document.getElementById("x").innerHTML;
	localStorage.setItem("text",y);
}

function clearValue() {
	var init_header = 'Meet Wrrrite';
	localStorage.setItem("header",init_header);
	var init_text = 'Hi, I am a smart text editor that lives in your browser. Click on my text to start writing. All your work will be saved automagically. You can now also upload your document to the cloud and update it from anywhere.';
	localStorage.setItem("text",init_text);
}

function js2txt() {		
	var header = document.getElementById("z").innerHTML;
	var body = document.getElementById("x").innerHTML;	
	document.getElementById('headertext').value = Base64.encode(header);
	document.getElementById('bodytext').value = Base64.encode(body);
}

function hidenotf() {
	var banner = document.getElementById('banner');
	banner.style.display = 'none';
}

function cloud() {
	var header = document.getElementById("z").innerHTML;
	var body = document.getElementById("x").innerHTML;	
	document.getElementById('cloudheadertext').value = Base64.encode(header);
	document.getElementById('cloudbodytext').value = Base64.encode(body);
}

function focus() {
}