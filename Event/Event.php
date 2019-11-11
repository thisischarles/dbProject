<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="EventCSS.css"/>
<title>Event</title>
</head>
<body>
<?php
include('../System/Header.php');
?>
<h1>
Events
<p>Welcome to the Events page!</p>
</h1>
<hr>
<br>
<button class="button" onClick="openEventForm()">View Events</button>
<br>
<br>
<button class="button" onClick="openPostEventForm()">Post Event</button>
<br>
<br>
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
<?php
include('../System/Footer.php');
?>
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