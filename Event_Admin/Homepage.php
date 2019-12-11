<?php
include('../System/Header.php');
if (isset($_SESSION['auth'])) {
if (mysqli_num_rows($db->query("SELECT * from EventAdministator where UserID = $id;")) >= 1) {
?>
<link rel = "stylesheet" href = "..\design.css" />
<h1>
    Welcome to your personal Event Administrator homepage! <br> Click on the options below to perform an action!
</h1>
<h5>Update an Events information here!</h5>
<h2>
    <button class="button" onClick="openModifyEventForm()">Modify Event</button>
</h2>
<h5>Modify a participant by deleting, updating, or adding them.</h5>
<h2>
    <button class="button" onClick="openRemoveAddUpdateForm()">Remove/Add/Update Participants</button>
</h2>
<h5>Use this button to post content to an event or events!</h5>
<h2>
    <button class="button" onClick="openPostContentForm()">Post Content</button>
</h2>
<h5>Assign multiple participants to an event by uploading them in a CSV file!<br> Please use the format: <br>  
"LastName, FirstName, Password, Address, Email, DOB, Username, Phone(xxx-xxx-xxxx), Image link"</h5>
<h2>
    <button class="button" onClick="openUploadForm()">Upload CSV</button>
</h2>
<h2 id ="changeB">
<button class="button" onClick="openViewEvents()">Open List Of Events</button>
</h2>
<div class="hiding" id="ViewEvents">
<h2>
    List of Active Events
</h2>
<?php 
$result = $db->query("SELECT EventID from EventAdministator where UserID = $id;");
if (mysqli_num_rows($result) >= 1) {
	echo "<table border='1'>";
            echo "<tr >";
                echo "<th align='left'><h3><font color='grey'>Event Name</font></h3></th>";
		echo "<th align='left'><h3><font color='grey'>Organization</font></h3></th>";
		echo "<th align='left'><h3><font color='grey'>Participants</font></h3></th>";
            echo "</tr> ";
	while($row = mysqli_fetch_array($result)){
		$EID = $row['EventID'];
		$result2 = $db->query("SELECT Name, Organization from Events where EventID = $EID AND StatusID != 4;");
		$result3 = $db->query("SELECT UserID from EventParticipant where EventID = $EID;");
		$row2 = mysqli_fetch_array($result2);
	    	echo "<tr>";
		$url = "../Event/Event.php?Event=".$row['EventID'];
		echo "<th><a href='$url'>".$row2['Name']."</a></th>";
		echo "<td>".$row2['Organization']."</td>";
		echo "<td>";
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
        echo "No Events To Show";
    }
?>
<h2>
    List of Archived Events
</h2>

<?php

$result = $db->query("SELECT EventID from EventAdministator where UserID = $id;");
if (mysqli_num_rows($result) >= 1) {
	echo "<table border='1'>";
            echo "<tr >";
                echo "<th align='left'><h3><font color='grey'>Event Name</font></h3></th>";
		echo "<th align='left'><h3><font color='grey'>Organization</font></h3></th>";
		echo "<th align='left'><h3><font color='grey'>Participants</font></h3></th>";
            echo "</tr> ";
	while($row = mysqli_fetch_array($result)){
		$EID = $row['EventID'];
		$result2 = $db->query("SELECT Name, Organization from Events where EventID = $EID AND StatusID = 4;");
		if (mysqli_num_rows($result2) >= 1) {
			$result3 = $db->query("SELECT UserID from EventParticipant where EventID = $EID;");
			$row2 = mysqli_fetch_array($result2);
		    	echo "<tr>";
			$url = "../Event/Event.php?Event=".$row['EventID'];
			echo "<th><a href='$url'>".$row2['Name']."</a></th>";
			echo "<td>".$row2['Organization']."</td>";		
			echo "</tr>";
		}
		else{
			echo "<tr><td colspan='3'>No Events To Show</td></tr>";
			break;
	    	}
	}
echo "</table>";
}
?>
</div>

<div class="form-popup" id="ModifyEventForm">
    <form Class="form-container">
        <h1>Select Event</h1>
        <select name='event' required>
            <option selected disabled>Choose one</option>
<?php 
	$result = $db->query("SELECT EventID from EventAdministator where UserID = $id;");
	while($row = mysqli_fetch_array($result)){
		$EID = $row['EventID'];
		$row2 = mysqli_fetch_array($db->query("SELECT Name, Organization from Events where EventID = $EID;"));
            	echo "<option value='$EID'>".$row2['Name'].", ".$row2['Organization']."</option>";
	}
         ?>
        </select>
        <br><br>
        <label for="ModifyEvent"><b>Modify Location</b></label>
        <input type="text" placeholder="Enter the new location" name="changeLoc">
        <br>
	<label for="ModifyEvent"><b>Modify Description</b></label>
        <input type="text" placeholder="Enter the information" name="changeDesc">
        <br>
	<label for="ModifyEvent"><b>Modify Time (HH:MM format)</b></label>
        <input type="text" placeholder="Enter the time" name="changeTime">
        <br>
        <button name="editEvent" type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeModifyEventForm()">Cancel</button>
    </form>
<?php
	if(isset($_GET['editEvent'])) {
		$loc=$_GET['changeLoc'];
		$time = $_GET['changeTime'];
		$desc=$_GET['changeDesc'];
		if($loc != null)
			$db->query("UPDATE Events set Location = '$loc' where EventID = ".$_GET['event'].";");
		if($time != null)
			$db->query("UPDATE Events set Time = '$time' where EventID = ".$_GET['event'].";");
		if($desc != null)
			$db->query("UPDATE Events set Description = '$desc' where EventID = ".$_GET['event'].";");
	}
?>
</div>


<div class="form-popup" id="RemoveAddUpdateForm">
    <form Class="form-container">
        <h3>Choose Event</h3>
        <select name="event">
            <option selected disabled>Choose one</option>
          <?php 
	$result = $db->query("SELECT EventID from EventAdministator where UserID = $id;");
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

<div class="form-popup" id="PostContentForm">
    <form action="post.php" Class="form-container">
        <h1>Post Content</h1>
        <h3>Choose Event(s)</h3>
        (Hold CTRL to select more than 1)
        <br><br>
        <select name = 'eventSelect[]' multiple size="5" required>
            <option selected disabled>Choose one</option>
       <?php 
	$result = $db->query("SELECT EventID from EventAdministator where UserID = $id;");
	while($row = mysqli_fetch_array($result)){
		$EID = $row['EventID'];
		$row2 = mysqli_fetch_array($db->query("SELECT Name, Organization from Events where EventID = $EID;"));
            	echo "<option value='$EID'>".$row2['Name'].", ".$row2['Organization']."</option>";
	}
         ?>
        </select>
        <br><br><br>
        <label for="PostContent"><b>Post</b></label>
        <br>
        <input type="text" rows="4" placeholder="Enter Content" name="content" required>
        <br>
        <input name="img" type="file" onchange="previewFile()"><br>
        <img id="preview" src="" height="200" alt="Image preview...">
        <br><br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closePostContentForm()">Cancel</button>
    </form>
</div>


<div class="form-popup" id="UploadForm">
    <form action="../CSV.php" method="post" Class="form-container" enctype="multipart/form-data">
	<h3>Choose Event(s)</h3>
        (Hold CTRL to select more than 1)
        <br><br>
        <select multiple size="5" required>
            <option selected disabled>Choose one</option>
        <?php 
	$result = $db->query("SELECT EventID from EventAdministator where UserID = $id;");
	while($row = mysqli_fetch_array($result)){
		$EID = $row['EventID'];
		$row2 = mysqli_fetch_array($db->query("SELECT Name, Organization from Events where EventID = $EID;"));
            	echo "<option value='$EID'>".$row2['Name'].", ".$row2['Organization']."</option>";
	}
         ?>
        </select>
        <br>
        <h3>Select CSV file</h3>
        Select a file: <input type="file" name="myFile" required><br><br>
        <br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeUploadForm()">Cancel</button>
    </form>
</div>
<?php
echo "<script src='Event_Admin.js'></script>";
}}
else {
	echo "<div class=\"alert alert-danger\">YOU DO NOT HAVE AUTHORIZATION!</div>";
}

include('../System/Footer.php');
?>
