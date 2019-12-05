<?php
/*
$user = 'jrc353_2';
$password = 'gfgaFP';
$database = 'jrc353_2';
$db = new mysqli("jrc353.encs.concordia.ca", $user, $password, $database) or die("cannot connect");

$fin = fopen($_FILES['myFile']['name'],'r') or die('cant open file');
$theQ = '';
$count = 1;

set_time_limit(60);
//reading each line of the data file
while (($data=fgetcsv($fin, 5000))!== FALSE) {
    $password = str_replace("\\", "#", crypt($data[8], 'TBD'));
    $phone = (float) str_replace('-', '', $data[7]);
    $theQ = $theQ." INSERT INTO Images (Image) VALUES ('$data[10]');";
    $theQ = $theQ." INSERT INTO User (LastName, FirstName, Password, Address, Email, DOB, Username, Phone, ImageID) VALUES ('$data[2]','$data[1]','$password','$data[4]','$data[3]','$data[6]', '$data[5]', $phone , $count);";

    $count++;
}
//query the whole string of inserts
if($db->multi_query($theQ))
	echo "WORKS";
*/
header('Location: Event_Admin/homepage.php');