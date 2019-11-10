<!DOCTYPE html>
<html>
<head>
<title>System Admin</title>
<style>
body {background-color: lightgreen;
background-image:linear-gradient(to right, lightgreen, mediumspringgreen);
}
#grad1{
	background-color:powderblue;
	background-image:linear-gradient(to right, powderblue, mediumspringgreen);
	width: 300px;
	height: 600px;
	border: 3px solid orange;
	padding-left: 10px;
}
.button{
	background-color: #29962e;
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin:4px 2px;
	cursor: pointer;
	}
.SignOutButton{
	background-color: #29962e;
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin:4px 2px;
	cursor: pointer;
	position: relative;
	left: 1300px;
	bottom: 600px;
	}	
</style>
</head>
<body>
<h1>
System Admin 
<p>Welcome System Admin Name!</p>
</h1>
<hr>
<div id="grad1">
<br>
<button class="button">Add Event</button>
<br>
<br>
<button class="button">Assign Manager</button>
<br>
<br>
<button class="button">Add Participant</button>
<br>
<br>
<button class="button">Change Event Status</button>
<br>
<br>
<button class="button">View List of Events</button>
<br>
<br>
<button class="button">View List of Participants</button>
<br>
<br>
<button class="SignOutButton">Sign Out</button>
</div>
</body>
</html>