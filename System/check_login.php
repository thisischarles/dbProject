<?php
include("../sql_connector.php");

if (!isset($_SESSION)) {
    session_start();
}

$enteredUserInfo = $_POST["user_name"];
$enteredPassword = str_replace("\\", "#", crypt($_POST["user_pass"], 'TBD'));

$sql1 = "SELECT * from User where Username = \"$enteredUserInfo\" and Password =  \"$enteredPassword\"";
$sql2 = "SELECT * from User where Email = \"$enteredUserInfo\" and Password =  \"$enteredPassword\"";

$result1 = $db->query($sql1);
$result2 = $db->query($sql2);

if ((mysqli_num_rows($result1) == 1) || (mysqli_num_rows($result2) == 1)) {

    $row = $result1->fetch_assoc();
    $_SESSION['auth'] = "True";
    $_SESSION['user_name'] = $row['FirstName'];
    $_SESSION['user_id'] = $row['UserID'];

    header('Location: homepage.php');

}
else {
    $url = "Location: Sign_In.php";

    header($url);
    exit;
}