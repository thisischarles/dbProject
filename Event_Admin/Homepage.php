<?php
include('../System/Header.php');
if (isset($_SESSION['auth'])) {
if (mysqli_num_rows($db->query("SELECT * from EventAdministator where UserID = $id;")) >= 1) {
?>
<link rel = "stylesheet" href = "..\design.css" />
<h1>
    Welcome to your personal System Administrator homepage! <br> Click on the options below to perform an action!
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
$eventnames = array();
$eventids = array();
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
		array_push($eventids,$row['EventID']);
		$result2 = $db->query("SELECT Name, Organization from Events where EventID = $EID AND StatusID != 4;");
		$result3 = $db->query("SELECT UserID from EventParticipant where EventID = $EID;");
		$row2 = mysqli_fetch_array($result2);
	    	echo "<tr>";
		array_push($eventnames , $row2['Name'].", ".$row2['Organization']);
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
echo $eventnames[0];
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
	    	}
	}
echo "</table>";
}
?>
</div>

<div class="form-popup" id="ModifyEventForm">
    <form action="ModifyEvent.php" Class="form-container">
        <h1>Select Event</h1>
        <select required>
            <option selected disabled>Choose one</option>
<?php
	for($a = 0; $a < count($eventnames); $a++) {
            echo "<option value=$eventids[$a]>$eventnames[$a]</option>";
	}
         ?>
        </select>
        <br><br>
        <label for="ModifyEvent"><b>Modify Title</b></label>
        <input type="text" placeholder="Enter the title" name="changeTitle" required>
        <br>
        <label for="ModifyEvent"><b>Modify Information</b></label>
        <input type="text" placeholder="Enter the information" name="changeTitle" required>
        <br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeModifyEventForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="RemoveAddUpdateForm">
    <form action="../RAU.php" Class="form-container">
        <h3>Choose Event</h3>
        <select>
            <option selected disabled>Choose one</option>
           <?php
	for($a = 0; $a < count($eventnames); $a++) {
            echo "<option value=$eventids[$a]>$eventnames[$a]</option>";
	}
         ?>
        </select>
        <br>
        <?php
        for($a = 0; $a < 5; $a++) {
            echo "<label for='RemoveAddUpdate' ><b > Participant ". $a ." </b ></label >
        <select>
            <option selected disabled > Choose one </option >
            <option value = '' > Add</option >
            <option value = '' > Update</option >
            <option value = '' > Delete</option >
        </select >
        <br >";
        }
        ?>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeRemoveAddUpdateForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="PostContentForm">
    <form action="post.php" Class="form-container">
        <h1>Post Content</h1>
        <h3>Choose Event(s)</h3>
        (Hold CTRL to select more than 1)
        <br><br>
        <select name = 'eventSelect[]' multiple size="5" required>
            <option selected disabled>Choose one</option>
        <?php
	for($a = 0; $a < count($eventnames); $a++) {
            echo "<option value=$eventids[$a]>$eventnames[$a]</option>";
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
	for($a = 0; $a < count($eventnames); $a++) {
            echo "<option value=$eventids[$a]>$eventnames[$a]</option>";
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
<script src="Event_Admin.js"></script>
<?php
}}
else {
	echo "<div class=\"alert alert-danger\">YOU DO NOT HAVE AUTHORIZATION!</div>";
}
include('../System/Footer.php');
?>
