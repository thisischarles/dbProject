<?php
session_start();
include("../sql_connector.php");

$enteredUserInfo = $_POST["user_name"];
$enteredPassword = str_replace("\\", "#", crypt($_POST["user_pass"], 'TBD'));

//$sql1 = "SELECT * from User where Username = \"$enteredUserInfo\" and Password =  \"$enteredPassword\"";
$sql1 = "SELECT * from User where Username = \"$enteredUserInfo\" and Password =  \"$enteredPassword\"";
$sql2 = "SELECT * from User where Email = \"$enteredUserInfo\" and Password =  \"$enteredPassword\"";

$result1 = $db->query($sql1);
$result2 = $db->query($sql2);


if ((mysqli_num_rows($result1) == 1) || (mysqli_num_rows($result2) == 1)) {
    	$row = $result1->fetch_assoc();
	$_SESSION['auth'] = "True";
	$_SESSION['user_name'] = $row['FirstName'];
	$_SESSION['user_id'] = $row['UserID'];
	exit(header('Location: Homepage.php'));
}
else {
	$sql3 = "SELECT * FROM User WHERE Username = '" . $enteredUserInfo . "'";
   	$sql4 = "SELECT * FROM User WHERE Email = '" . $enteredUserInfo . "'";
    	$result3 = $db->query($sql3);
    	$result4 = $db->query($sql4);
    	$problem = "<div class='alert alert-danger'>";
    	// show all problems in the form that exit
    	if ((mysqli_num_rows($result3) == 0) && (mysqli_num_rows($result4) == 0)) {
        	$problem .= "User name / email does not exist.<br><br>";
    	} elseif ((mysqli_num_rows($result1) == 0) && (mysqli_num_rows($result2) == 0)) {
       		$problem .= "Incorrect password.<br><br>";
    	}
    	$problem .= "</div>";
    	$url = "Location: Sign_In.php?problem=$problem";
    	header($url);
}
?>

