<?php
//$user = 'jrc353_2';
//$password = 'gfgaFP';
//$database = 'jrc353_2';
//$db = new mysqli("jrc353.encs.concordia.ca", $user, $password, $database) or die("cannot connect");

$fin = fopen($_FILES['myFile']['name'],'r') or die('cant open file');

$theEvents = "INSERT INTO Events (Duration, Name, Organization, BandwidthLimit, StorageLimit, CostID, DiscountID, BandwidthUsed, StorageUsed, Location, StatusID, Period, Description, EndTime, StartTime) VALUES ";
$theGroups = "INSERT INTO Groupy (Author, Fam, Secret, Name) VALUES ";
$thePosts = "INSERT INTO Post (Words, Author, Deleted, Media) VALUES ";
$hasPosts = "INSERT INTO HasAPost (PostID, EventID, GroupID) VALUES ";
$hasAGroup = "INSERT INTO HasAGroup (EventID, GroupID) VALUES ";
$hasAnEvent = "INSERT INTO HasAnEvent(GroupID, EventID) VALUES ";
$GroupPart = "INSERT INTO GroupParticipant (UserID, GroupID) VALUES ";
$EventPart = "INSERT INTO EventParticipant (UserID, EventID) VALUES ";
$EventA = "INSERT INTO EventAdministrator (UserID, EventID) VALUES ";
$EventM = "INSERT INTO EventManager (UserID, EventID) VALUES ";
$EventTag = "INSERT INTO EventTag (EventID, TagID) VALUES ";
$UserT = "INSERT INTO UserTag (UserID, TagID) VALUES ";
$GroupTag = "INSERT INTO GroupTag (GroupID, TagID) VALUES ";
$hasComment = "INSERT INTO HasComment (PostID, CommentID) VALUES ";
//$hasPermissions = "INSERT INTO HasPermissions (UserID, PermissionID, PostID) VALUES ";
//$Sugg = "INSERT INTO Suggestions (EventID, Location, Date, Time) VALUES ";
//$Voting = "INSERT INTO Voting (EventID, SuggestionID, UserID) VALUES ";
$count = 1;

set_time_limit(60);
//reading each line of the data file
while (($data=fgetcsv($fin, 5000))!== FALSE) {
    $num1 = mt_rand(1, 1000);
    if ($count <= 200) {
        $EndTime = date_modify(new DateTime($data[4]), '+' . $data[0] . ' day')->format('Y/m/d');
        $theEvents = $theEvents . "($data[0], '$data[1]', '$data[2]', 2 , 25, " . mt_rand(1, 10) . ", " . mt_rand(1, 21) . ", " . mt_rand(0, 4) . ", " . mt_rand(1, 25) . ", '$data[3]', " . mt_rand(1, 4) . " , " . mt_rand(7, 25) . ", '$data[5] $EndTime', '$EndTime', '$data[4]'), ";
        $hasPosts = $hasPosts . "(".mt_rand(1, 300).",".mt_rand(1, 200).", null), ";
        $EventA = $EventA . "(".mt_rand(1, 1000).",$count), ";
        $EventM = $EventM. "(".mt_rand(1, 1000).",$count), ";
        for($a = 0; $a < 50; $a++)
            $EventPart = $EventPart . "(" . mt_rand(1, 1000) . ",$count), ";
    }
    else {
        $num1 = mt_rand(1, 1000);
        $bool = mt_rand(0,1);
        $bool2 = 0;
        if($bool == 0) {
            $rand = (float)rand()/(float)getrandmax();
            if ($rand < 0.2)
                $bool2 = 1;
            else
                $bool2= 0;
        }
        $theGroups = $theGroups."($num1, $bool, $bool2, '$data[1]'), ";
        $hasPosts = $hasPosts . "(".mt_rand(1, 200).",null,".mt_rand(1, 100)."), ";
        $hasAGroup = $hasAGroup."(".mt_rand(1, 200).",".mt_rand(1, 100)."), ";
        $hasAnEvent = $hasAnEvent."(".mt_rand(1, 100).",".mt_rand(1, 200)."), ";
        for($a = 0; $a < 50; $a++) {
            $c2 = $count - 200;
            $GroupPart = $GroupPart . "(" . mt_rand(1, 1000) . ", $c2), ";
        }
        $hasComment = $hasComment."(" . mt_rand(1, 300) . ", " . mt_rand(1, 300) . "), ";
    }
    $rand = (float)rand()/(float)getrandmax();
    if ($rand < 0.2)
        $bool2 = 1;
    else
        $bool2= 0;
    $thePosts = $thePosts . "('$data[6]',".mt_rand(1, 1000).", $bool2, '$data[7]'), ";

    $count++;
}
for($a = 0; $a < 1000; $a++) {
    $EventTag = $EventTag ."(" . mt_rand(1, 200) . ", " . mt_rand(1, 1000) . "), ";
    $UserT = $UserT ."(" . mt_rand(1, 1000) . ", " . mt_rand(1, 1000) . "), ";
    $GroupTag = $GroupTag ."(" . mt_rand(1, 100) . ", " . mt_rand(1, 1000) . "), ";
}
$Q = str_replace(", I", "; I", $theEvents . $theGroups . $thePosts . $hasPosts . $hasAGroup . $hasAnEvent . $GroupPart . $EventPart . $EventA . $EventM . $EventTag . $UserT . $GroupTag . $hasComment);
echo $Q;
//query the whole string of inserts
//if($db->multi_query())
//	echo "WORKS";
