<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../design.css">
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
<?php 
	if (isset($_GET["Event"]))
  	{      	
		$sql1 = "SELECT * from Events WHERE EventID = ".$_GET['Event'].";";
		$result = $db->query($sql1);
		if (mysqli_num_rows($result) >= 1) 
		{
			echo "<table border='1'>";
            			echo "<tr >";
                	echo "<th align='left'><h3><font color='grey'>Event Description</font></h3></th>";
            			echo "</tr> ";
			while($row = mysqli_fetch_array($result))
			{
	    			echo "<tr>";
				echo "<td>".$row['Description']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
?>
<br>
<br>
<button class="button" onClick="openPostEventForm()">Post Event</button>
<br>
<br>

<div class="form-popup" id="PostEventForm">
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
		<button class="closeButton" onClick="closePostEventForm()">Cancel</button>
	</form>
</div>
<?php
include('../System/Footer.php');
?>
<script src="Event.js"></script>
</body>
</html>
