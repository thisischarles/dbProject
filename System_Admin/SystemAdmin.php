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
<div class="form-popup" id="EventForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Add Event</h1>
		<br>
		<label for="eventName"><b>Event Name</b></label>
		<input type="text" placeholder="Enter the Event Name" name="Event" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button class="closeButton" onClick="closeEventForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="ManagerForm">
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
		<button class="closeButton" onClick="closeManagerForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="ParticipantForm">
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
		<button class="closeButton" onClick="closeParticipantForm()">Cancel</button>
	</form>
</div> 
<div class="form-popup" id="EventStatusForm">
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
		<button class="closeButton" onClick="closeEventStatusForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="ListOfEventsForm">
	<form action="/action_page.php" Class="form-container">
		<h1>List of Events</h1>
		<br>
		<label for="ListEventName1"><b>Event 1</b></label>
		<br>
		<label for="ListEventName2"><b>Event 2</b></label>
		<br>
		<label for="ListEventName3"><b>Event 3</b></label>
		<br>
		<button class="closeButton" onClick="closeListOfEventsForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="ListOfParticipantsForm">
	<form action="/action_page.php" Class="form-container">
		<h1>List of Participants</h1>
		<br>
		<label for="ListParticipantName1"><b>Participant 1</b></label>
		<br>
		<label for="ListParticipantName2"><b>Participant 2</b></label>
		<br>
		<label for="ListParticipantName3"><b>Participant 3</b></label>
		<br>
		<button class="closeButton" onClick="closeListOfParticipantsForm()">Cancel</button>
	</form>
</div>
<?php
include('../System/Footer.php');
?>
<script src="System_Admin.js"></script>
</body>
</html>