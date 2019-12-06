function login() {
  var x = document.URL;
	console.log(a);
	if(x.includes("System/Homepage.php");
  	document.getElementById("login").innerHTML = "<a href='Sign_In.php'>Sign In/Up</a>";
	else {	
		document.getElementById("login").innerHTML = "<a href='../System/Sign_In.php'>Sign In/Up</a>";
	}	
}

function logout() {
  var x = document.URL;
	if(x.includes("System/Homepage.php");
  	document.getElementById("logoff").innerHTML = "<a href='LogOff.php'>Sign In/Up</a>";
	else {	
		document.getElementById("login").innerHTML = "<a href='../System/LogOff.php'>Log Off</a>";
	}
}
