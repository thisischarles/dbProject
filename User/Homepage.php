<?php
    include("../System/Header.php");
?>
<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset = "utf-8" />
  <title>Home</title>
  <link rel="stylesheet" href="../design.css" />
</head>
	<a href = "Settings.php"><p>Settings</p></a>
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
           <form action="/action_page.php" class="form-container">
		<select size = "5" required>
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
             <h1>Participants</h1>
		
             <label for="name"><b>Name</b></label><br>
             <input type = "text" placeholder = "Enter participant's name: " name = "participant" required>
		<?php
			
		?>
             <button type = "submit" class = "submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeParticipantForm()">Close</button>
           </form>
         </div>
       </td>
       <td>
         <button class = "button" onclick = "openCreateGroupForm()">Create group</button>
         <div class="form-popup" id="createGroupForm">
           <form action="/action_page.php" class="form-container">
		<select size = "5" required>
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
             <h1>Create Group</h1>
             <label for="name"><b>Group name</b></label>
             <input type="text" placeholder="Enter group's name" name="groupName" required>
             <label for="name"><b>Participants:</b></label>
             <input type="text" placeholder="Enter participants' names" name="participantName" required>
             <button type = "submit" class = "submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeCreateGroupForm()">Close</button>
           </form>
         </div>
       </td>
     </tr>
     <tr>
       <td>
         <button class = "button" onclick = "openInvitationsForm()">Invitations</button>
         <div class = "form-popup" id = "invitationsForm">
           <form action = "/action_page.php" class = "form-container">
             <h1>Invitations</h1>
             <button type = "button" class = "closeButton" onclick = "closeInvitationsForm()">Close</button>
           </form>
         </div>
       </td>
       <td>
         <button class = "button" onclick = "openNotificationsForm()">Notifications</button>
         <div class="form-popup" id="notificationsForm">
           <form action="/action_page.php" class="form-container">
             <h1>Notifications</h1>
             <button type="button" class="closeButton" onclick="closeNotificationsForm()">Close</button>
           </form>
         </div>
       </td>
     </tr>
   </table>
<br>

  <?php
    include("../System/Footer.php");
   ?>
  <script src="Homepage.js"></script>	
</body>
</html>
