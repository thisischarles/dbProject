<?php
include('../System/Header.php');
if (isset($_SESSION['auth'])) {
	if (mysqli_num_rows($db->query("SELECT * from SystemAdministrator where UserID = $id;")) >= 1) {
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../design.css">
<title>System Admin</title>
</head>
<body>
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
<h2 id ="changeB">
<button class="button" onClick="openViewEvents()">Open List Of Events</button>
</h2>
<div class="hiding" id="ViewEvents">
<?php
$result = $db->query("SELECT * from Events;");
if (mysqli_num_rows($result) >= 1) {
	echo "<table border='1'>";
            echo "<tr >";
                echo "<th align='left'><h3><font color='grey'>Event Name</font></h3></th>";
		echo "<th align='left'><h3><font color='grey'>Organization</font></h3></th>";
		echo "<th align='left'><h3><font color='grey'>Participants</font></h3></th>";
            echo "</tr> ";
	while($row = mysqli_fetch_array($result)){
	    	echo "<tr>";
		$url = "../Event/Event.php?Event=".$row['EventID'];
		echo "<th><a href='$url'>".$row['Name']."</a></th>";
		echo "<td>".$row['Organization']."</td>";
		echo "<td>";
		$result3 = $db->query("SELECT UserID from EventParticipant where EventID = ".$row['EventID'].";");
		while($row3 = mysqli_fetch_array($result3)){
			$UID = $row3['UserID'];
			$url2 = "../User/Profile.php?UID=".$UID;
			$result4 = $db->query("SELECT FirstName, LastName from User where UserID = $UID;");
			$row4 = mysqli_fetch_array($result4);			
			echo "<a href='$url2'>".$row4['FirstName']." ".$row4['LastName']."</a>, ";
		}
		echo "</td>";		
		echo "</tr>";
	}
echo "</table>";
}
 else{
        echo "Error?";
    }
?> 
</div>
<br>
<br>
<br>
<br>
<div class="form-popup" id="EventForm">
	<form Class="form-container">
		<h1>Add Event</h1>
		<br>
		<label for="eventName"><b>Event Name</b></label>
		<input type="text" placeholder="Enter the Event Name" name="Event1" required>
		<br>
		<label for="duration"><b>Duration</b></label>
		<input type="text" placeholder="Enter the Event duration" name="Event2" required>
		<br>
		<label for="organization"><b>Organization</b></label>
		<input type="text" placeholder="Enter the Event Organization" name="Event3" required>
		<br>
		<label for="location"><b>Location</b></label>
		<input type="text" placeholder="Enter the Event Location" name="Event4" required>
		<br>
		<label for="date"><b>Event Date</b></label>
		<input type="text" placeholder="Enter the Event Date" name="Event5" required>
		<br>
		<input type="submit" name="addEventSubmit" value="Submit" class="submitButton">
		<?php
			
			if(isset($_GET['addEventSubmit']))
			{
				$eventNameVariable=$_GET['Event1'];
				$eventDurationVariable=$_GET['Event2'];
				$eventOrganizationVariable=$_GET['Event3'];
				$eventLocationVariable=$_GET['Event4'];
				$eventDateVariable=$_GET['Event5'];
				$sql1 = "INSERT INTO Events(Name, Duration, Organization, Location, StartTime) VALUES ('$eventNameVariable', '$eventDurationVariable', '$eventOrganizationVariable', '$eventLocationVariable', '$eventDateVariable');";
				$db->query($sql1);
			}
		?>
		<button class="closeButton" onClick="closeEventForm()">Cancel</button>
	</form>
</div>
<div  class="form-popup" id="ManagerForm">
	<form action="" Class="form-container">
		<h1>Add Event Manager</h1>
		<br>
		<label for="Manager UserName"><b>Manager Username</b></label>
		<input type="text" placeholder="Enter the Manager's User Name" name="Manager1" required>
		<br>
		<label for="EventAssigned"><b>Event Assigned</b></label>
		<input type="text" placeholder="Enter the assigned Event ID" name="Manager3" required>
		<br>
		<input type="submit" name="addManagerSubmit" value="Submit" class="submitButton">
		<?php
			
			if(isset($_GET['addManagerSubmit']))
			{
				$managerUsernameVariable=$_GET['Manager1'];
				$eventAssignedVariable=$_GET['Manager3'];
				$sql1 = "INSERT INTO EventManager(UserID, EventID) VALUES ('$managerUsernameVariable', '$eventAssignedVariable');";
				$db->query($sql1);
			}
		?>
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
<script src="System_Admin.js"></script>
<?php
}}
else {
	echo "<div class=\"alert alert-danger\">YOU DO NOT HAVE AUTHORIZATION!</div>";
}
include('../System/Footer.php');
?>
</body>
</html>
