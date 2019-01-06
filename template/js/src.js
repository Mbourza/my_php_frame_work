xmlHttp = false;

if(window.ActiveXObject){

	xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

} else if(window.XMLHttpRequest) {

	try{

		xmlHttp = new XMLHttpRequest();

	} catch(e) {

		alert('unable to Connect to the server');
	}
}

function note(id, Input) {

	var id = encodeURIComponent(document.getElementById(id).value);
	var span = document.getElementById(Input);
	xmlHttp.open('GET', 'note.php?id='+id, true);
	xmlHttp.send();
	xmlHttp.onreadystatechange = function() {

		if (xmlHttp.readyState == 4 && xmlHttp.status == 200){

			span.innerHTML= xmlHttp.responseText;
		}
	}
}
