<?php
    include("../System/Header.php");
?>
<!--
@Author: Charles Abou Haidar
@Student_ID: 40024373
Homepage for each user in database; different functionalities for user 
-->
<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset = "utf-8" />
  <title>Home</title>
  <link rel="stylesheet" href="../design.css" />
</head>
<body>
	<button><a href = "Settings.php"><p>Settings</p></a></button>
   <table border = "0">
     <tr>
       <th>
<?php
		$full_info = $db->query("SELECT * FROM User WHERE UserID = $id;"); 
		$fullInfo = mysqli_fetch_array($full_info);
		$f = $fullInfo['FirstName'];
		$l = $fullInfo['LastName'];

		$imageID = $db->query("SELECT ImageID FROM User WHERE UserID = $id;");
		$row = mysqli_fetch_array($imageID);
		$t = $row['ImageID'];
		$image = "SELECT Image FROM Images WHERE ImageID = $t;";
		
		$imageOfUser = $db->query($image);
		$imag = mysqli_fetch_array($imageOfUser);
		
		$userImage = $imag['Image']; 
		echo "<a href = 'Homepage.php'><img src = $userImage></a>"; 
		echo $f." ".$l;
		
?>
       </th>
     </tr>
     <tr>
       <td>
         <button class="button" onclick = "openParticipantForm()">Add participant to event</button>
         <div class="form-popup" id="addParticipantForm">
           <form class="form-container" method = "POST">
		<h2>Choose an event</h2>
		<select size = "5" name = 'eventSelect[]' required>
			<option selected disabled>Choose an event</option>		
<?php	
			$result = $db->query("SELECT EventID, Name from Events;");
			if (mysqli_num_rows($result) >= 1) {
				while($row = mysqli_fetch_array($result)){
					$eid = $row['EventID'];
            				echo "<option value='$eid'>".$row['Name']."</option>";
				}
			} 			
			else{
        			echo "No events To Show";
    			}
		
		
?> 
             <label for="name"><b>Name</b></label><br>
             <input type = "text" placeholder = "Enter participant's username: " name = "username" required>
<?php
		if(isset($_POST['username'])){
			$username = $_POST['username'];
			$userID = $db->query("SELECT UserID FROM User WHERE Username = '$username' ;");
				if(mysqli_num_rows($userID) == 1){
					foreach ($_POST["eventSelect"] as $event)  {
      				 		$row = $userID->fetch_assoc();
						$sql = $db->query("INSERT INTO EventParticipant(UserID, EventID) VALUES ('".$row['UserID']."','$event');");
						echo("<br>"."User ".$username." has been added to the event");
					}
				}
				else{
					echo("Username ".$username." does not exist!");
				}
			}
		else{
			echo("You haven't entered a username!!");
		}
?>
		<br>
             <button type = "submit" class = "submitButton">Confirm</button><br>
             <button type="button" class="closeButton" onclick="closeParticipantForm()">Close</button>
           </form>
         </div>
       </td>
       <td>
         <button class = "button" onclick = "openCreateGroupForm()">Create group</button>
         <div class="form-popup" id="createGroupForm">
           <form class="form-container" method = "POST">
		<select size = "5" name = 'eventSelect[]' required>
			<option selected disabled>Choose an event</option>		
<?php	
			$result = $db->query("SELECT EventID, Name from Events;");
			if (mysqli_num_rows($result) >= 1) {
				while($row = mysqli_fetch_array($result)){
					$eid = $row['EventID'];
            				echo "<option value='$eid'>".$row['Name']."</option>";
				}
			} 			
			else{
        			echo "No Events To Show";
    			}	
?>
             <h2>Create Group</h1>
             <label for="name"><b>Group name</b></label>
             <input type="text" placeholder="Enter group's name" name="groupName" required><br>
		<p>Is this part of a family?<p>
		<input type = "radio" name = "family" id = "yesFamily" value = "yes">Yes<br>
		<input type = "radio" name = "family" id = "noFamily" value = "no">No<br><br>
<?php
			if(isset($_POST['participantName'])){
				$groupName = $_POST['groupName'];
				if(mysqli_num_rows($userID) == 1){
					foreach ($_POST["eventSelect"] as $event){
						
						echo("<br>"."Group created!");
					}
				}
				else{
					echo("Username ".$username." does not exist!");
				}
			}
		else{
		}
			
?>
             <button type = "submit" class = "submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeCreateGroupForm()">Close</button>
           </form>
         </div>
       </td>
     </tr>
     <tr>
       <td>
         <button class = "button" onclick = "openNotificationsForm()">Notifications</button>
         <div class="form-popup" id="notificationsForm">
             <h1>Notifications</h1>
<?php
		
		$messageIDs = $db->query("SELECT MessageID FROM Recipient WHERE Recipient = $id;");
		if (mysqli_num_rows($messageIDs) >= 1) {
			while($row = mysqli_fetch_array($messageIDs)){
				$sender = $db->query("SELECT Sender, Message FROM Messages WHERE MessageID = ".$row['MessageID']." AND MessageStatusID = 2 AND New = 0;");
				while($row2 = mysqli_fetch_array($sender)){
					$query = $db->query("SELECT FirstName, LastName FROM User WHERE UserID = ".$row2['Sender'].";");
					$row3 = $query->fetch_assoc();
					$mess = $row2['Message'];
					$fullName = $row3['FirstName']." ".$row3['LastName'];
					echo "<button><div onclick ='goToNotification(".'"'.$mess.'","'.$fullName.'"'.")'>'".$row3['FirstName']." ".$row3['LastName']."</div></button><br>";
				}
			}
		}
?>
             <button type="button" class="closeButton" onclick="closeNotificationsForm()">Close</button>
	</td>
<td>
	<button class = "button" onclick = "openReadNotificationsForm()">Opened Notifications</button>
	<div class = "form-popup" id = "readNotificationsForm">
			<h1>Opened Notifications</h1>
<?php
		$messageIDs = $db->query("SELECT MessageID FROM Recipient WHERE Recipient = $id;");
		if (mysqli_num_rows($messageIDs) >= 1) {
			while($row = mysqli_fetch_array($messageIDs)){
				$sender = $db->query("SELECT Sender, Message FROM Messages WHERE MessageID = ".$row['MessageID']." AND MessageStatusID = 2 AND New = 1;");
				while($row2 = mysqli_fetch_array($sender)){
					$query = $db->query("SELECT FirstName, LastName FROM User WHERE UserID = ".$row2['Sender'].";");
					$row3 = $query->fetch_assoc();
					$mess = $row2['Message'];
					$fullName = $row3['FirstName']." ".$row3['LastName'];
					echo "<button><div onclick ='goToNotification(".'"'.$mess.'","'.$fullName.'"'.")'>'".$row3['FirstName']." ".$row3['LastName']."</div></button><br>";
				}
			}
		}
?>
		<button type = "button" class = "closeButton" onclick = "closeReadNotificationsForm()">Close</button>
	</div>

	</td> 
<tr>
	<td>
		<button class = "button" onclick = "openMessagesForm()">Messages</button>
         	<div class="form-popup" id="messagesForm">
             	<h1>Messages</h1>
<?php
		
		$messageIDs = $db->query("SELECT MessageID FROM Recipient WHERE Recipient = $id;");
		if (mysqli_num_rows($messageIDs) >= 1) {
			while($row = mysqli_fetch_array($messageIDs)){
				$sender = $db->query("SELECT Sender, Message FROM Messages WHERE MessageID = ".$row['MessageID']." AND MessageStatusID = 1 AND New = 0;");
				while($row2 = mysqli_fetch_array($sender)){
					$query = $db->query("SELECT FirstName, LastName FROM User WHERE UserID = ".$row2['Sender'].";");
					$row3 = $query->fetch_assoc();
					$mess = $row2['Message'];
					$fullName = $row3['FirstName']." ".$row3['LastName'];
					echo "<button><div onclick ='goToNotification(".'"'.$mess.'","'.$fullName.'"'.")'>'".$row3['FirstName']." ".$row3['LastName']."</div></button><br>";
				}
			}
		}

?>
             <button type="button" class="closeButton" onclick="closeMessagesForm()">Close</button>
	</td>
	<td>
		<button class = "button" onclick = "openReadMessagesForm()">Opened Messages</button>
		<div class = "form-popup" id = "readMessagesForm">
		<h1>Opened Messages</h1>
<?php
		$messageIDs = $db->query("SELECT MessageID FROM Recipient WHERE Recipient = $id;");
		if (mysqli_num_rows($messageIDs) >= 1) {
			while($row = mysqli_fetch_array($messageIDs)){
				$sender = $db->query("SELECT Sender, Message FROM Messages WHERE MessageID = ".$row['MessageID']." AND MessageStatusID = 1 AND New = 1;");
				while($row2 = mysqli_fetch_array($sender)){
					$query = $db->query("SELECT FirstName, LastName FROM User WHERE UserID = ".$row2['Sender'].";");
					$row3 = $query->fetch_assoc();
					$mess = $row2['Message'];
					$fullName = $row3['FirstName']." ".$row3['LastName'];
					echo "<button><div onclick ='goToNotification(".'"'.$mess.'","'.$fullName.'"'.")'>'".$row3['FirstName']." ".$row3['LastName']."</div></button><br>";
				}
			}
		}
?>
		<button type = "button" class = "closeButton" onclick = "closeReadMessagesForm()">Close</button>
		</div>

	</td>
</tr>
<tr>	
<td>
         <button class = "button" onclick = "openInvitationsForm()">Invitations</button>
         <div class = "form-popup" id = "invitationsForm">
             <h1>Invitations</h1>
<?php
		$messageIDs = $db->query("SELECT MessageID FROM Recipient WHERE Recipient = $id;");
		if (mysqli_num_rows($messageIDs) >= 1) {
			while($row = mysqli_fetch_array($messageIDs)){
				$sender = $db->query("SELECT Sender, Message FROM Messages WHERE MessageID = ".$row['MessageID']." AND MessageStatusID = 3 AND New = 0;");
				while($row2 = mysqli_fetch_array($sender)){
					$query = $db->query("SELECT FirstName, LastName FROM User WHERE UserID = ".$row2['Sender'].";");
					$row3 = $query->fetch_assoc();
					$mess = $row2['Message'];
					$messID = $row['MessageID'];
					$fullName = $row3['FirstName']." ".$row3['LastName'];
					echo "<button><div onclick ='goToInvitation(".'"'.$mess.'","'.$fullName.'","'.$messID.'"'.")'>'".$row3['FirstName']." ".$row3['LastName']."</div></button><br>";
				}
			}
		}
?>
             <button type = "button" class = "closeButton" onclick = "closeInvitationsForm()">Close</button>
         </div>
       </td>
	<td>
	<button class = "button" onclick = "openReadInvitationsForm()">Opened Invitations</button>
	<div class = "form-popup" id = "readInvitationsForm">
		<h1>Opened Invitations</h1>
<?php
		$messageIDs = $db->query("SELECT MessageID FROM Recipient WHERE Recipient = $id;");
		if (mysqli_num_rows($messageIDs) >= 1) {
			while($row = mysqli_fetch_array($messageIDs)){
				$sender = $db->query("SELECT Sender, Message FROM Messages WHERE MessageID = ".$row['MessageID']." AND MessageStatusID = 3 AND New = 1;");
				while($row2 = mysqli_fetch_array($sender)){
					$query = $db->query("SELECT FirstName, LastName FROM User WHERE UserID = ".$row2['Sender'].";");
					$row3 = $query->fetch_assoc();
					$mess = $row2['Message'];
					$fullName = $row3['FirstName']." ".$row3['LastName'];
					echo "<button><div onclick ='goToInvitation(".'"'.$mess.'","'.$fullName.'"'.")'>'".$row3['FirstName']." ".$row3['LastName']."</div></button><br>";
				}
			}
		}
?>
		<button type = "button" class = "closeButton" onclick = "closeReadInvitationsForm()">Close</button>
	</div>
     </tr>

</table>
<br>
<div id = "invitationBox" class = "hiding">
<form>
	<p class="hiding" id ="sql"></p>
	<p>Sender: </p><label id = "sender"></label><br>
	<p>Message: </p><label id = "invitation"></label><br>
	<button class = "submitButton" name='accept'>Accept Invitation</button>
	<button class = "submitButton" name='reject'>Reject Invitation</button>
</form>
</div>
<?php 
if(isset($_GET['accept'])) {
	$db->query("UPDATE Messages SET New = 1 WHERE MessageID = ".$_GET['messid'].";");	
}
?> 
<div id = "notificationBox" class = "hiding">
	<p class="hiding" id ="sql2"></p>
	<p>Sender: </p><label id = "sender1"></label><br>
	<p>Message: </p><label id = "notification"></label><br>
	<button class = "submitButton" name='read'>Okay</button>
</div>
<?php 
if(isset($_GET['read'])) {
	$db->query("UPDATE Messages SET New = 1 WHERE MessageID = ".$_GET['messid2'].";");	
}
?> 

<?php
    include("../System/Footer.php");
?>
  <script src="Homepage.js"></script>	
</body>
</html>
