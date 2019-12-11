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
<button class="button" onClick="openParticipantForm()">Edit Participants</button>
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
				$sql1 = "SELECT UserID FROM User WHERE Username = '$managerUsernameVariable';";
				$result1 = $db->query($sql1);
				if(mysqli_num_rows($result1)>=1)
				{
					$row = $result1->fetch_assoc();
					$UID = $row['UserID'];
					$sql3 = "INSERT INTO EventManager(UserID, EventID) VALUES ('$UID', '$eventAssignedVariable');";
					$db->query($sql3);
				}
			}
		?>
		<button class="closeButton" onClick="closeManagerForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="ParticipantForm">
    <form Class="form-container">
        <h3>Choose Event</h3>
        <select name="event">
            <option selected disabled>Choose one</option>
          <?php 
	$result = $db->query("SELECT EventID from Events;");
	while($row = mysqli_fetch_array($result)){
		$EID = $row['EventID'];
		$row2 = mysqli_fetch_array($db->query("SELECT Name, Organization from Events where EventID = $EID;"));
            	echo "<option value='$EID'>".$row2['Name'].", ".$row2['Organization']."</option>";
	}
         ?>
        </select>
        <br>
	<p>Please select to delete or modify:</p>
	  	<input onclick="openModi()" type="radio" id='delete' name="choice" value="Delete">Delete<br>
	  	<input onclick="openModi()" type="radio" id='modify' name="choice" value="Modify">Modify<br> 
		<input onclick="openModi()" type="radio" id='add' name="choice" value="Add" checked>Add<br> 
         <h3>Enter their Username</h3>
        <input type="text" placeholder="Enter the username" name="username">
	<div class="hiding" id="Modi">
		<h3>Modifications</h3>
		<div style="padding: 5px 5px; height:30px;"><label for="ModifyEvent">Last Name: </label><input style="width: 150px;  height:20px;" type="text"name="changeLast"></div>
		<div style="padding: 5px 5px; height:30px;"><label for="ModifyEvent">First Name: </label><input style="width: 150px;  height:20px;" type="text" name="changeFirst"></div>
		<div style="padding: 5px 5px; height:30px;"><label for="ModifyEvent">Address: </label><input style="width: 150px;  height:20px;" type="text"name="changeAddress"></div>
		<div style="padding: 5px 5px; height:30px;"><label for="ModifyEvent">Email: </label><input style="width: 150px;  height:20px;" type="text" name="changeEmail"></div>
		<div style="padding: 5px 5px; height:30px;"><label for="ModifyEvent">DOB: </label><input style="width: 150px;  height:20px;" type="date" name="changeDOB"></div>
		<div style="padding: 5px 5px; height:30px;"><label for="ModifyEvent">Phone Number: </label><input style="width: 150px;  height:20px;" type="text" name="changePN"></div>
		<div style="padding: 5px 5px; height:30px;"><label for="ModifyEvent">Username: </label><input style="width: 150px;  height:20px;" type="text"name="changeUsername"></div>
	</div>
        <button type="submit" name="DUA" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeRemoveAddUpdateForm()">Cancel</button>
    </form>
</div>

<?php 
	if(isset($_GET['DUA'])) {
		$result = $db->query("Select * from User where Username = '".$_GET['username']."';");
		if(mysqli_num_rows($result) >= 1) {
			$row = $result->fetch_assoc();
			$choice = $_GET['choice'];
			if($choice == 'Delete') {
				$db->query("DELETE FROM EventParticipant where UserID = ".$row['UserID']." AND EventID = ".$_GET['event'].";");
			}
			elseif($choice == 'Add') {
				$db->query("INSERT INTO EventParticipant (UserID, EventID) VALUES (".$row['UserID'].",".$_GET['event'].");");
			}
			else {
				echo "SELECT * FROM EventParticipant where UserID = ".$row['UserID']." AND EventID = ".$_GET['event'].";";
				if(mysqli_num_rows($db->query("SELECT * FROM EventParticipant where UserID = ".$row['UserID']." AND EventID = ".$_GET['event'].";")) >= 1) {
					$ln=$_GET['changeLast'];
					$fn=$_GET['changeFirst'];
					$address=$_GET['changeAddress'];
					$email=$_GET['changeEmail'];
					$dob=$_GET['changeDOB'];
					$pn = (float) str_replace('-', '', $_GET['changePN']);
					$un=$_GET['changeUsername'];
					if($ln != null)
						$db->query("UPDATE User set LastName = '$ln' where UserID = ".$row['UserID'].";");
					if($fn != null)
						$db->query("UPDATE User set FirstName = '$fn' where UserID = ".$row['UserID'].";");
					if($address != null)
						$db->query("UPDATE User set Address = '$address' where UserID = ".$row['UserID'].";");
					if($email != null)
						$db->query("UPDATE User set Email = '$email' where UserID = ".$row['UserID'].";");
					if($dob != null)
						$db->query("UPDATE User set DOB = '$dob' where UserID = ".$row['UserID'].";");
					if($pn != null)
						$db->query("UPDATE User set Phone = $pn where UserID = ".$row['UserID'].";");
					if($un != null)
						$db->query("UPDATE User set Username = '$un' where UserID = ".$row['UserID'].";");
				}
				else {
					echo "That username is invalid for this event. Cannot modify anything.";
				}
			}
		}
		else {
			echo "That username is invalid. Nothing Happened.";
		}
	}
?>
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
