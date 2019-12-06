<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset = "utf-8" />
  <title>Home</title>
  <link rel="stylesheet" href="../design.css" />
</head>
<body>
  <?php
    include("../System/Header.php");
   ?>
   <table border = "0">
     <tr>
       <th>
	//image 
       </th>
     </tr>
     <tr>
       <td>
         <button class="button" onclick = "openParticipantForm()">Add participant to event</button>
         <div class="form-popup" id="addParticipantForm">
           <form action="/action_page.php" class="form-container">
		<?php
			echo "List of events: \n";
			getEvents($_SESSION['user_id']);
		?>
             <h1>Participant</h1>
		
             <label for="name"><b>Name</b></label>
             <input type="text" placeholder="Enter participant's name" name="participantName" required>
             <label for="name"><b>DOB(DDMMYY)</b></label>
             <input type="text" placeholder="Enter participant's DOB" name="participantName" required>

             <button type = "submit" class = "submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeParticipantForm()">Close</button>
           </form>
         </div>
       </td>
       <td>
         <button class = "button" onclick = "openCreateGroupForm()">Create group</button>
         <div class="form-popup" id="createGroupForm">
           <form action="/action_page.php" class="form-container">
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
  <?php
    include("../System/Footer.php");
   ?>
  <script src="Homepage.js"></script>
	<script>
		function getEvents(UserID){
			
		}
	</script>	
</body>
</html>
