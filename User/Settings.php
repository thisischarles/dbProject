<?php
    include('../System/Header.php');
?>
<!DOCTYPE html>
<!--
@Author: Charles Abou Haidar
@Student_ID: 40024373
Settings page for each user in database; options to change some information
-->
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
		$imageID = $db->query("SELECT ImageID FROM User WHERE UserID = $id;");
		$row = mysqli_fetch_array($imageID);
		$t = $row['ImageID'];
		$image = "SELECT Image FROM Images WHERE ImageID = $t;";
		
		$imageOfUser = $db->query($image);
		$imag = mysqli_fetch_array($imageOfUser);
		
		$userImage = $imag['Image']; 
		echo "<a href = 'Homepage.php'><img src = $userImage></a>"; 	
	?>

   <table border = "0">
     <tr>
       <td>
         <button class = "changePasswordButton" onclick = "openPasswordForm()">Change password</button>
         <div class="form-popup" id="passwordForm">
           <form class="form-container" method = "POST">
             <h1>Change password</h1>

             <label for="password"><b>Password</b></label>
             <input type="text" placeholder="Enter current password" name="password" required><br>

             <label for="psw"><b>New password</b></label>
             <input type="password" placeholder="Enter Password" name="newPassword" required><br>

             <label for="confirmPsw"><b>Confirm new password</b></label>
             <input type="password" placeholder="Enter Password" name="confirmNewPassword" required><br>

		<br>
             <button type="submit" class="submitButton" name = "submit">Confirm</button><br>
             <button type="button" class="closeButton" onclick="closePasswordForm()">Close</button>
<?php
		$pw = str_replace("\\", "#", crypt($_POST["password"], 'TBD'));
		$newpw = $_POST['newPassword'];
		$confirmNewPw = $_POST['confirmNewPassword'];
		if($newpw == $confirmNewPw){
			$newpw = str_replace("\\", "#", crypt($newpw, 'TBD'));
			if(mysqli_num_rows($db->query("SELECT * FROM User WHERE UserID = $id AND Password = '$pw';")) >= 1){
				if($db->query("UPDATE User SET Password = '$newpw' WHERE UserID = $id;")){
					echo("Password changed!");
				}
				else{
					echo("Error");
				}		
			}	
		}
		else{
			echo("Passwords do not match!");
		}	
?>
           </form>
         </div>
       </td>
       <td>
         <button class = "changeEmailButton" onclick = "openEmailForm()">Change email</button>
         <div class="form-popup" id="emailForm">
           <form class="form-container" method = "POST">
             <h1>Change email</h1>

             <label for="newEmail"><b>New email</b></label><br>
             <input type="text" placeholder="Enter new email" name="newEmail" required><br>

             <label for="confirmNewEmail"><b>Confirm new email</b></label><br>
             <input type="text" placeholder="Confirm new email" name="confirmNewEmail" required><br>

             <button type="submit" class="submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeEmailForm()">Close</button>
<?php
		$newEmail= $_POST['newEmail'];
		$confirmNewEmail = $_POST['confirmNewEmail'];
		if($newEmail != null){
			if($newEmail == $confirmNewEmail){
				if($db->query("UPDATE User SET Email = '$newEmail' WHERE UserID = $id;")){
					echo("Email changed to ".$newEmail."!");
				}	
			}	
			else{
				echo("Emails do not match!");
			}
		}	
		
?>
           </form>
         </div>
      </td>
     </tr>
     <tr>
       <td>
         <button class = "changeNameButton" onclick = "openNameForm()">Change name</button>
         <div class="form-popup" id="nameForm">
           <form class="form-container" method = "POST">
             <h1>Change name</h1>
             <label for="newName"><b>New first name</b></label><br>
             <input type="text" placeholder="Enter new name" name="newFN" required><br>

             <label for="confirmNewName"><b>New last name</b></label><br>
             <input type="text" placeholder="Confirm new name" name="newLN" required><br>

             <button type="submit" class="submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeNameForm()">Close</button>
<?php		
		$newFN = $_POST['newFN'];
		$newLN = $_POST['newLN'];
		if($newFN != null){
			if($db->query("UPDATE User SET FirstName = '$newFN' WHERE UserID = $id;")){
				echo("Name changed to ".$newFN);
			}
			else{
				echo("Error");
			}		
		}
		if($newLN != null){
			if($db->query("UPDATE User SET LastName = '$newLN' WHERE UserID = $id;")){
				echo("Name changed to ".$newLN);
			}
			else{
				echo("Error");
			}		
		}		
	
			
?>	
           </form>
         </div>
       </td>
       <td>
         <button class = "changeDOBButton" onclick = "openDOBForm()">Change DOB</button>
         <div class="form-popup" id="DOBForm">
           <form class="form-container" method = "POST">
             <h1>Change DOB</h1>
             <label for="newDOB"><b>New DOB(YYYY-MM-DD)</b></label><br>
             <input type="text" placeholder="Enter new DOB" name="newDOB" type = "date" required><br>

             <button type="submit" class="submitButton">Confirm</button>
             <button type="button" class="closeButton" onclick="closeDOBForm()">Close</button>
<?php
	$newDOB = $_POST['newDOB'];
		
	if($db->query("UPDATE User SET DOB = '$newDOB' WHERE UserID = $id;")){
		echo("DOB is updated to: ".$newDOB);
	}
	else{
			echo("Error!");
		}
	
?>
           </form>
         </div>
       </td>
     </tr>
   </table>

<?php
    include('../System/Footer.php');
?>
  <script src="Homepage.js"></script>	
</body>
</html>
