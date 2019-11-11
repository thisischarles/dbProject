<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="SystemAdminCSS.css"/>
<title>System Admin</title>
</head>
<body>
<?php
include('../System/Header.php');
?>
<h1>
System Admin 
<p>Welcome System Admin Name!</p>
</h1>
<hr>
<br>
<button class="button" onClick="openEventForm()">Add Event</button>
<br>
<br>
<button class="button" onClick="openManagerForm()">Assign Manager</button>
<br>
<br>
<button class="button" onClick="openParticipantForm()">Add Participant</button>
<br>
<br>
<button class="button" onClick="openEventStatusForm()">Change Event Status</button>
<br>
<br>
<button class="button" onClick="openListOfEventsForm()">View List of Events</button>
<br>
<br>
<button class="button" onClick="openListOfParticipantsForm()">View List of Participants</button>
<br>
<br>
<div class="addeventform-popup" id="EventForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Add Event</h1>
		<br>
		<label for="eventName"><b>Event Name</b></label>
		<input type="text" placeholder="Enter the Event Name" name="Event" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closeEventForm()">Cancel</button>
	</form>
</div>
<div class="assignmanagerform-popup" id="ManagerForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Add Event Manager</h1>
		<br>
		<label for="ManagerFirstName"><b>Manager First Name</b></label>
		<input type="text" placeholder="Enter the Manager's First Name" name="Manager1" required>
		<br>
		<label for="ManagerLastName"><b>Manager Last Name</b></label>
		<input type="text" placeholder="Enter the Manager's Last Name" name="Manager2" required>
		<br>
		<label for="EventAssigned"><b>Event Assigned</b></label>
		<input type="text" placeholder="Enter the assigned Event" name="Manager3" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closeManagerForm()">Cancel</button>
	</form>
</div>
<div class="addparticipantform-popup" id="ParticipantForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Add Participant</h1>
		<br>
		<label for="ParticipantFirstName"><b>Participant First Name</b></label>
		<input type="text" placeholder="Enter the Participant's First Name" name="particpant1" required>
		<br>
		<label for="ParticipantLastName"><b>Participant Last Name</b></label>
		<input type="text" placeholder="Enter the Participant's Last Name" name="participant2" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closeParticipantForm()">Cancel</button>
	</form>
</div> 
<div class="changeeventstatusform-popup" id="EventStatusForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Change Event Status</h1>
		<br>
		<label for="ChangingEventName"><b>Event Name</b></label>
		<input type="text" placeholder="Enter the Event's name" name="EventStatus1" required>
		<br>
		<label for="EventStatus"><b>Event Status</b></label>
		<input type="text" placeholder="Enter the Event's status" name="EventStatus2" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closeEventStatusForm()">Cancel</button>
	</form>
</div>
<div class="viewlistofeventsform-popup" id="ListOfEventsForm">
	<form action="/action_page.php" Class="form-container">
		<h1>List of Events</h1>
		<br>
		<label for="ListEventName1"><b>Event 1</b></label>
		<br>
		<label for="ListEventName2"><b>Event 2</b></label>
		<br>
		<label for="ListEventName3"><b>Event 3</b></label>
		<br>
		<button type="submit" class="cancelButton" onClick="closeListOfEventsForm()">Cancel</button>
	</form>
</div>
<div class="viewlistofparticipantsform-popup" id="ListOfParticipantsForm">
	<form action="/action_page.php" Class="form-container">
		<h1>List of Participants</h1>
		<br>
		<label for="ListParticipantName1"><b>Participant 1</b></label>
		<br>
		<label for="ListParticipantName2"><b>Participant 2</b></label>
		<br>
		<label for="ListParticipantName3"><b>Participant 3</b></label>
		<br>
		<button type="submit" class="cancelButton" onClick="closeListOfParticipantsForm()">Cancel</button>
	</form>
</div>
<?php
include('../System/Footer.php');
?>
<script>
function openEventForm()
{
	document.getElementById("EventForm").style.display="block";
}
function openManagerForm()
{
	document.getElementById("ManagerForm").style.display="block";
}
function openParticipantForm()
{
	document.getElementById("ParticipantForm").style.display="block";
}
function openEventStatusForm()
{
	document.getElementById("EventStatusForm").style.display="block";
}
function openListOfEventsForm()
{
	document.getElementById("ListOfEventsForm").style.display="block";
}
function openListOfParticipantsForm()
{
	document.getElementById("ListOfParticipantsForm").style.display="block";
}
function closeEventForm()
{
	document.getElementById("EventForm").style.display="none";
}
function closeManagerForm()
{
	document.getElementById("ManagerForm").style.display="none";
}
function closeParticipantForm()
{
	document.getElementById("ParticipantForm").style.display="none";
}
function closeEventStatusForm()
{
	document.getElementById("EventStatusForm").style.display="none";
}
function closeListOfEventsForm()
{
	document.getElementById("ListOfEventsForm").style.display="none";
}
function closeListOfParticipantsForm()
{
	document.getElementById("ListOfParticipantsForm").style.display="none";
}
</script>
</body>
</html>