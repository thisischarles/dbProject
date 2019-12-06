<?php
    include('../System/Header.php');
   ?>
<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset="utf-8" />
  <title>Profile</title>
  <link rel = "stylesheet" href = "design.css" />
  <style>
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
    img{
      width: 50%;
      height: 50%;
    }
  </style>
</head>
<body>
  
  <table border = "0">
    <tr>
      <th>
       	<?php
		$imageID = $db->query("SELECT ImageID FROM User WHERE UserID = $id;");
		$row = mysqli_fetch_array($imageID);
		$t = $row['ImageID'];
		$image = "SELECT Image FROM Images WHERE ImageID = $t;";
		
		$imageOfUser = $db->query($image);
		$imag = mysqli_fetch_array($imageOfUser);
		
		$userImage = $imag['Image']; 
		echo "<img src = $userImage>"; 
		
	?>
      </th>
    </tr>
    <tr>
      <td>
        <?php

	$full_info = $db->query("SELECT * FROM User WHERE UserID = $id;"); 
	$fullInfo = mysqli_fetch_array($full_info);
	$f = $fullInfo['FirstName'];
	$l = $fullInfo['LastName'];
	$e = $fullInfo['Email'];
	$DOB = $fullInfo['DOB'];
	echo $f." ".$l;
	echo $e;
	echo $DOB;
	?>
      </td>
    </tr>

  </table>
  <?php
    include('../System/Footer.php');
   ?>
   <script>
	
   </script>
</body>
</html>
