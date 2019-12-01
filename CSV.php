<?php
/*
 $user = 'jrc353_2';
$password = 'gfgaFP';
$database = 'jrc353_2';
$connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$password);
$conn = sqlsrv_connect( jrc353.encs.concordia.ca, $connectionInfo);

if( $conn ) {
    echo "Connection established.<br />";
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}
 *
 *
 */
set_time_limit(99999);
$fin = fopen($_FILES['myFile']['name'],'r') or die('cant open file');

$theQ = "";
$count = 0;

//reading each line of the data file
while (($data=fgetcsv($fin, 5000))!== FALSE) {
    //if the line is the first, skip
    if($count == 0) {
        $count++;
    }
    else {
        //file_put_contents("Images\Avatar" . $count . ".png", file_get_contents($data[10]));
        $filename = "Images\Avatar" . $count . ".png";
        $num1 = mt_rand(1, $count);
        $num2 = mt_rand(1, $count);
        $password = crypt($data[8], 'TBD');
        $phone = (int) str_replace('-', '', $data[7]);
        $theQ = $theQ." INSERT INTO Images (Image) VALUES ('$data[10]')";
        $theQ = $theQ." INSERT INTO User (LastName, FirstName, Password, Address, Email, DOB, Username, Phone, ImageID) VALUES ('$data[2]','$data[1]','$password','$data[4]','$data[3]','$data[6]', '$data[5]', $phone , $filename);";
        $theQ = $theQ." INSERT INTO Tag (Tag) VALUES ('$data[11]');";
        $theQ = $theQ." INSERT INTO Messages (Sender, Message) VALUES ($num1 , '$data[12]');";
        $theQ = $theQ." INSERT INTO Recipient (MessageID, Recipient) VALUES ($count , $num2);";
        $count++;
    }
}
echo $theQ;
/*
//query the whole string of inserts
$db->query($theQ);

*/
