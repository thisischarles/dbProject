<?php
include('sql_connector.php');

$fin = fopen($_FILES['myFile']['name'],'r') or die('cant open file');

set_time_limit(60);
//reading each line of the data file
while (($data=fgetcsv($fin, 5000))!== FALSE) {
	
    $password = str_replace("\\", "#", crypt($data[2], 'TBD'));
    $phone = (float) str_replace('-', '', $data[7]);
    $db->multi_query("INSERT INTO Images (Image) VALUES ('$data[9]');");
    $result = $db->multi_query("SELECT ImageID FROM Images WHERE Image = ('$data[9]');");
    $row = mysqli_fetch_array($result);
    $db->multi_query("INSERT INTO User (LastName, FirstName, Password, Address, Email, DOB, Username, Phone, ImageID) VALUES ('$data[0]','$data[1]','$password','$data[3]','$data[4]','$data[5]', '$data[6]',     $phone ,".$row['ImageID'].";");

}

header('Location: Event_Admin/homepage.php');
