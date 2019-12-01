<?php
$user = 'jrc353_2';
$password = 'gfgaFP';
$database = 'jrc353_2';
$db = new mysqli("jrc353.encs.concordia.ca", $user, $password, $database) or die("cannot connect");

$fin = fopen($_FILES['myFile']['name'],'r') or die('cant open file');

$theQ = "";
$count = 0;

set_time_limit(9999); 

//reading each line of the data file
while (($data=fgetcsv($fin, 5000))!== FALSE) {
    //if the line is the first, skip
    if($count == 0) {
        $count++;
    }
    else {
        $filename = 'Images\Avatar' . $count . ".png";
        $num1 = mt_rand(1, $count);
        $num2 = mt_rand(1, $count);
        $password = str_replace("\\", "#", crypt($data[8], 'TBD'));
        $phone = (float) str_replace('-', '', $data[7]);
        $theQ = $theQ." INSERT INTO Images (Image) VALUES ('$data[10]');";
        $theQ = $theQ." INSERT INTO User (LastName, FirstName, Password, Address, Email, DOB, Username, Phone, ImageID) VALUES ('$data[2]','$data[1]','$password','$data[4]','$data[3]','$data[6]', '$data[5]', $phone , $count);";
        $theQ = $theQ." INSERT INTO Tag (Tag) VALUES ('$data[11]');";
        $theQ = $theQ." INSERT INTO Messages (Sender, Message) VALUES ($num1 , '$data[12]');";
        $theQ = $theQ." INSERT INTO Recipient (MessageID, Recipient) VALUES ($count , $num2);";
        $count++;
    }
}
//query the whole string of inserts
if($db->multi_query($theQ))
	echo "WORKS";

