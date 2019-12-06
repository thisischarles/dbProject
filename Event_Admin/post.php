<?php
include("../System/Header.php");
 // Retrieving each selected option 
	$date = (new DateTime())->format('Y/m/d H:i:s');
	$c = $_GET['content'];
	$i = $_GET['img'];
	$db->query("insert into Post (Words, Author, Duration, Deleted, Media) values ('$c', $id, '$date', false,'$i');");
foreach ($_GET["eventSelect"] as $event)  {
	$result1 = $db->query("Select PostID from Post WHERE Duration = '$date' AND Author = $id;");
       	$row = $result1->fetch_assoc();
	$db->query("insert into HasAPost (PostID, EventID) values (".$row['PostID'].", $event);");
}
include("../System/Footer.php");




 
