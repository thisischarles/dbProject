<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset = "utf-8" />
  <title>Settings</title>
  <link rel = "stylesheet" href = "design.css" />
  <style>
  {box-sizing: border-box;}
  .logoutLblPos{
   position:fixed;
   right:10px;
   top:5px;
  }
  .changePasswordButton{
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
    width: 200px;
  }
  .changeEmailButton{
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
    width: 200px;
  }
  .changeNameButton{
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
    width: 200px;
  }
  .changeDOBButton{
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
    width: 200px;
  }
  .SignOutButton{
    background-color: #29962e;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin:4px 2px;
    cursor: pointer;
    position: relative;
    left: 1300px;
    bottom: 600px;
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
      img{
        width: 25%;
        height: 25%;
      }
  </style>
</head>
<body>
  <?php
    include('../System/Header.php');
   ?>
   <form align="right" name="form1" method="post" action="log_out.php">
     <label class="logoutLblPos">
       <input name="submit2" type="submit" id="submit2" value="log out">
     </label>
   </form>
   <img src = "Avatars/Karen.png" alt = "Karen"/>

   <table border = "0">
     <tr>
       <td>
         <button class = "changePasswordButton" onclick = "openPasswordForm()">Change password</button>
         <div class="form-popup" id="passwordForm">
           <form action="/action_page.php" class="form-container">
             <h1>Change password</h1>

             <label for="password"><b>Password</b></label>
             <input type="text" placeholder="Enter current password" name="password" required>

             <label for="psw"><b>New password</b></label>
             <input type="password" placeholder="Enter Password" name="psw" required>

             <label for="confirmPsw"><b>Confirm new password</b></label>
             <input type="password" placeholder="Enter Password" name="psw" required>

             <button type="submit" class="submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closePasswordForm()">Close</button>
           </form>
         </div>
       </td>
       <td>
         <button class = "changeEmailButton" onclick = "openEmailForm()">Change email</button>
         <div class="form-popup" id="emailForm">
           <form action="/action_page.php" class="form-container">
             <h1>Change email</h1>

             <label for="email"><b>Email</b></label>
             <input type="text" placeholder="Enter current email" name="email" required>

             <label for="newEmail"><b>New email</b></label>
             <input type="text" placeholder="Enter Password" name="psw" required>

             <label for="confirmNewEmail"><b>Confirm new email</b></label>
             <input type="text" placeholder="Enter Password" name="psw" required>

             <button type="submit" class="submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeEmailForm()">Close</button>
           </form>
         </div>
      </td>
     </tr>
     <tr>
       <td>
         <button class = "changeNameButton" onclick = "openNameForm()">Change name</button>
         <div class="form-popup" id="nameForm">
           <form action="/action_page.php" class="form-container">
             <h1>Change name</h1>
             <label for="email"><b>Name</b></label>
             <input type="text" placeholder="Enter current name" name="name" required>

             <label for="newName"><b>New name</b></label>
             <input type="text" placeholder="Enter new name" name="newName" required>

             <label for="confirmNewName"><b>Confirm new name</b></label>
             <input type="text" placeholder="Confirm new name" name="confirmNewName" required>

             <button type="submit" class="submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeNameForm()">Close</button>
           </form>
         </div>
       </td>

       <td>
         <button class = "changeDOBButton" onclick = "openDOBForm()">Change DOB</button>
         <div class="form-popup" id="DOBForm">
           <form action="/action_page.php" class="form-container">
             <h1>Change DOB</h1>

             <label for="DOB"><b>DOB(DDMMYY)</b></label>
             <input type="text" placeholder="Enter current DOB" name="DOB" required>

             <label for="newDOB"><b>New DOB(DDMMYY)</b></label>
             <input type="text" placeholder="Enter new DOB" name="newDOB" required>

             <label for="confirmNewDOB"><b>Confirm new DOB(DDMMYY)</b></label>
             <input type="text" placeholder="Confirm new DOB" name="confirmNewDOB" required>

             <button type="submit" class="submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeDOBForm()">Close</button>
           </form>
         </div>
       </td>
     </tr>
   </table>
  <?php
    include('../System/Footer.php');
   ?>
   <script>
   function openPasswordForm() {
     document.getElementById("passwordForm").style.display = "block";
   }
   function closePasswordForm() {
     document.getElementById("passwordForm").style.display = "none";
   }

   function openEmailForm() {
     document.getElementById("emailForm").style.display = "block";
   }

   function closeEmailForm() {
     document.getElementById("emailForm").style.display = "none";
   }

   function openNameForm() {
     document.getElementById("nameForm").style.display = "block";
   }
   function closeNameForm() {
     document.getElementById("nameForm").style.display = "none";
   }

   function openDOBForm(){
     document.getElementById("DOBForm").style.display = "block";
   }
   function closeDOBForm(){
     document.getElementById("DOBForm").style.display = "none";
   }

   </script>
</body>
</html>
