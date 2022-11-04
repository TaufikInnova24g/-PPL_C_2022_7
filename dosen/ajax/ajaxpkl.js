//fungsi untuk membuat objek XMLHttpRequest
function getXMLHTTPRequest(){
	if (window.XMLHttpRequest){
		// code for modern browsers
		return new XMLHttpRequest();
	}else{
		// code for old IE browsers
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
}

function add_skripsi(){
	var xmlhttp = getXMLHTTPRequest();
	//get input value
	var nama = encodeURI(document.getElementById('nama').value);
	var nim = encodeURI(document.getElementById('nim').value);
	var sks = encodeURI(document.getElementById('sks').value);
	var ipk = encodeURI(document.getElementById('ipk').value);
    var status_kelulusan = encodeURI(document.getElementById('status_kelulusan').value);
	var angkatan = encodeURI(document.getElementById('angkatan').value);
	if (nama != "" && nim != "" && sks != "" && ipk !=""&& status_kelulusan != "" && angkatan != ""){
		//set url and inner
		var url = "./pkl_add.php"; 
        // alert(url);
		var inner = "demo";
		//set parameter and open request
		var params = "&nama=" + nama + "&nim=" + nim + "&ipk=" + ipk + "&sks=" + sks + "&status_kelulusan=" + status_kelulusan + "&angkatan=" + angkatan;
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.onreadystatechange = function() {
			document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
			if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
				 document.getElementById(inner).innerHTML = xmlhttp.responseText;
			}
			return false;
		}
		xmlhttp.send(params);
	}else{
		alert("Tolong diisi semua!!!!");
	}
}
