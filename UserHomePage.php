<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset = "utf-8" />
  <title>Home</title>
  <link rel = "stylesheet" href = "design.css" />
  <style>
  {box-sizing: border-box;}
  .logoutLblPos{
   position:fixed;
   right:10px;
   top:5px;
  }
  .createGroupButton{
    background-color: blue;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin:4px 2px;
    cursor: pointer;
    width: 300px;
  }
  .addParticipantToEventButton{
    background-color: orange;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin:4px 2px;
    cursor: pointer;
    width: 300px;
  }
  .invitationsButton{
    background-color: green;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin:4px 2px;
    cursor: pointer;
    width: 300px;
  }
  .notificationsButton{
    background-color: grey;
    border: none;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin:4px 2px;
    cursor: pointer;
    width: 300px;
  }
  img{
    max-width: 50%;
    max-height: 50%;
  }
  .form-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }
  .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
  }
  .form-container input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }
  .submitButton{
      background-color: green;
      border: none;
      color: black;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin:4px 2px;
      cursor: pointer;
      width: 120px;
    }
  .closeButton{
      background-color: red;
      border: none;
      color: black;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin:4px 2px;
      cursor: pointer;
      width: 120px;
    }
  </style>
</head>
<body>
  <?php
    include(Header.php);
   ?>
   <form align="right" name="form1" method="post" action="log_out.php">
     <label class="logoutLblPos">
       <input name="submit2" type="submit" id="submit2" value="log out">
     </label>
   </form>
   <table border = "0">
     <tr>
       <th>
        <img src = "/Users/Charles/Documents/dbProject/Avatars/Karen.png" alt = "Karen" />
       </th>
     </tr>
     <tr>
       <td>
         <button class = "addParticipantToEventButton" onclick = "openParticipantForm()">Add participant to event</button>
         <div class="form-popup" id="addParticipantForm">
           <form action="/action_page.php" class="form-container">
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
         <button class = "createGroupButton" onclick = "openCreateGroupForm()">Create group</button>
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
         <button class = "invitationsButton" onclick = "openInvitationsForm()">Invitations</button>
         <div class = "form-popup" id = "invitationsForm">
           <form action = "/action_page.php" class = "form-container">
             <h1>Invitations</h1>
             <button type = "button" class = "closeButton" onclick = "closeInvitationsForm()">Close</button>
           </form>
         </div>
       </td>
       <td>
         <button class = "notificationsButton" onclick = "openNotificationsForm()">Notifications</button>
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
    include(Footer.php);
   ?>
   <script>
      function openNotificationsForm(){
        document.getElementById("notificationsForm").style.display ="block";
      }
      function closeNotificationsForm(){
        document.getElementById("notificationsForm").style.display ="none";
      }

      function openParticipantForm(){
        document.getElementById("addParticipantForm").style.display ="block";
      }
      function closeParticipantForm(){
        document.getElementById("addParticipantForm").style.display ="none";
      }

      function openInvitationsForm(){
        document.getElementById("invitationsForm").style.display ="block";
      }
      function closeInvitationsForm(){
        document.getElementById("invitationsForm").style.display ="none";
      }

      function openCreateGroupForm(){
        document.getElementById("createGroupForm").style.display ="block";
      }
      function closeCreateGroupForm(){
        document.getElementById("createGroupForm").style.display ="none";
      }
   </script>
</body>
</html>
