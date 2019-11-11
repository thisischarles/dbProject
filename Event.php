<!DOCTYPE html>
<html>
<head>
<title>Event</title>
<style>
/*used to change the color of the body of the page*/
body {background-color: lightgreen;
background-image:linear-gradient(to right, lightgreen, mediumspringgreen);
}

/*grad1 class used for the box surrounding the buttons*/
#grad1{
	background-color:powderblue;
	background-image:linear-gradient(to right, powderblue, mediumspringgreen);
	width: 300px;
	height: 600px;
	border: 3px solid orange;
	padding-left: 10px;
}

/*button class used for the buttons except for the sign out button*/
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
	
/*SignOutButton class used for the sign out button*/
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

/*form class used for the popup, when clicking on each button*/
.vieweventform-popup
{
	display:none;
	position: absolute;	/*was position: fixed*/
	top: 170px;	/*was bottom: 0*/
	right: 870px;	/*was 15px*/
	border: 3px solid #f1f1f1;
	z-index:9;
	margin-left:auto;
	margin-right:auto;
}
.posteventform-popup
{
	display:none;
	position: absolute;
	top: 170px;
	right: 540px;
	border: 3px solid #f1f1f1;
	z-index:9;
	margin-left:auto;
	margin-right:auto;
}
/*class used to add styles to the form*/
.form-container
{
	min-height: 225px;
	min-width: 300px;
	max-width: 300px;
	padding: 10px;
	background-color: lightblue;
}
/*used for the input fields*/
.form-container input[type-text]
{
	width:100%
	padding:15px;
	margin:5px 0 22px 0;
	border: none;
	background: #f1f1f1;
}
/*darken the input fields when clicked on*/
.form-container input[type-text]:focus
{
	background-color: #ddd;
	outline: none;
}
/*style of the submit button*/
.form-container .submitButton
{
	background-color: #4CAF50;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 100%
	margin-bottom:10px;
	opacity: 0.8;
}
/*style of the cancel button*/
.form-container .cancelButton
{
	background-color: #4CAF50;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 100%
	margin-bottom:10px;
	opacity: 0.8;
}
/*addition of hover effects to the buttons*/
.form-container .submitButton:hover, .cancelButoon:hover
{
	opacity: 1;
}
</style>
</head>
<body>
<h1>
Events
<p>Welcome to the Events page!</p>
</h1>
<hr>
<div id="grad1">
<br>
<button class="button" onClick="openEventForm()">View Events</button>
<br>
<br>
<button class="button" onClick="openPostEventForm()">Post Event</button>
<br>
<br>
<button class="SignOutButton">Sign Out</button>
</div>
<div class="vieweventform-popup" id="ViewEventForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Events</h1>
		<br>
		<label for="eventTitle"><b>Event Title1</b></label>
		<label for="eventInformation"><b>Event Info1</b></label>
		<br>
		<label for="eventTitle"><b>Event Title2</b></label>
		<label for="eventInformation"><b>Event Info2</b></label>
		<br>
		<label for="eventTitle"><b>Event Title3</b></label>
		<label for="eventInformation"><b>Event Info3</b></label>
		<br>
		<button type="submit" class="cancelButton" onClick="closePostEventForm()">Cancel</button>
	</form>
</div>
<div class="posteventform-popup" id="PostEventForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Post an Event</h1>
		<br>
		<label for="EventName"><b>Event Title</b></label>
		<input type="text" placeholder="Enter the Event's Title" name="Event1" required>
		<br>
		<label for="DescriptionOfEvent"><b>Description of Event</b></label>
		<input type="text" placeholder="Enter the Description of the Event" name="Event2" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closePostEventForm()">Cancel</button>
	</form>
</div>
<script>
function openEventForm()
{
	document.getElementById("ViewEventForm").style.display="block";
}
function openPostEventForm()
{
	document.getElementById("PostEventForm").style.display="block";
}
function closeEventForm()
{
	document.getElementById("ViewEventForm").style.display="none";
}
function closePostEventForm()
{
	document.getElementById("PostEventForm").style.display="none";
}
</script>
</body>
</html>