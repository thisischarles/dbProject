<?php
    include('../System/Header.php');
 ?>
<!DOCTYPE html>
<!--
@Author: Charles Abou Haidar
@Student_ID: 40024373
Profile for each user in database; different functionalities for user 
-->
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
		$imageID = $db->query("SELECT ImageID FROM User WHERE UserID = ".$_GET['UID'].";");
		$row = mysqli_fetch_array($imageID);
		$t = $row['ImageID'];
		$image = "SELECT Image FROM Images WHERE ImageID = $t;";
		
		$imageOfUser = $db->query($image);
		$imag = mysqli_fetch_array($imageOfUser);
		
		$userImage = $imag['Image']; 
		if($_GET['UID'] == $id) {
			echo "<a href = 'Homepage.php'><img src = $userImage></a>";
			echo "<h3>Click on profile picture to get to your Homepage!</h3>"; 
		}
		else {
			echo "<img src = $userImage>"; 
		}
	?>
      </th>
<td align='left'>
	<?php 
$result = $db->query("SELECT EventID from EventParticipant where UserID = ".$_GET['UID'].";");
if (mysqli_num_rows($result) >= 1) {
	echo "<table border='1'>";
            echo "<tr >";
                echo "<th align='left'><h3><font color='grey'>Event Name</font></h3></th>";
		echo "<th align='left'><h3><font color='grey'>Organization</font></h3></th>";
            echo "</tr> ";
	while($row = mysqli_fetch_array($result)){
		$EID = $row['EventID'];
		$result2 = $db->query("SELECT Name, Organization from Events where EventID = $EID AND StatusID != 4;");
		$result3 = $db->query("SELECT Name, Organization from Events where EventID = $EID AND StatusID = 4;");
		$row2 = mysqli_fetch_array($result2);
		$row3 = mysqli_fetch_array($result3);
	    	echo "<tr>";
		if($row2['Name'] == '') {
			echo "<td>".$row3['Name']."</td>";
			echo "<td>".$row3['Organization']."</td>";	
			echo "</tr>";
		}
		else {
			$url = "../Event/Event.php?Event=".$row['EventID'];
			echo "<th><a href='$url'>".$row2['Name']."</a></th>";
			echo "<td>".$row2['Organization']."</td>";	
		echo "</tr>";
		}
	}
echo "</table>";
}
 else{
        echo "No Events To Show";
    }
?>
	</td>
<td valign='top'>
	<?php 
$result = $db->query("SELECT GroupID from GroupParticipant where UserID = ".$_GET['UID'].";");
if (mysqli_num_rows($result) >= 1) {
	echo "<table border='1'>";
            echo "<tr >";
                echo "<th align='left'><h3><font color='grey'>Group Name</font></h3></th>";
		echo "<th align='left'><h3><font color='grey'>Created By</font></h3></th>";
            echo "</tr> ";
	while($row = mysqli_fetch_array($result)){
		$GID = $row['GroupID'];
		$result2 = $db->query("SELECT Name, Author from Groupy where GroupID = $GID;");
		$row2 = mysqli_fetch_array($result2);
	    	echo "<tr>";
		$url = "../Group/Group.php?Group=".$row['GroupID'];
		echo "<th><a href='$url'>".$row2['Name']."</a></th>";	
		$UID = $row2['Author'];
		$url2 = "../User/Profile.php?UID=".$UID;
		$result4 = $db->query("SELECT FirstName, LastName from User where UserID = $UID;");
		$row4 = mysqli_fetch_array($result4);			
		echo "<td><a href='$url2'>".$row4['FirstName']." ".$row4['LastName']."</a></td>";
		echo "</tr>";
	}
echo "</table>";
}
 else{
        echo "No Groups To Show";
    }
?>
	</td>
    </tr>
    <tr>
      <td>
        <?php
		$full_info = $db->query("SELECT * FROM User WHERE UserID = ".$_GET['UID'].";"); 
		$fullInfo = mysqli_fetch_array($full_info);
		$f = $fullInfo['FirstName'];
		$l = $fullInfo['LastName'];
		$e = $fullInfo['Email'];
		$DOB = $fullInfo['DOB'];
		echo "<h3>Full name: </h3>".$f." ".$l."";
		echo "<h3>Email: </h3>".$e."";
		echo "<h3>Date of birth (YYYY/MM/DD): </h3>".$DOB."";
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
