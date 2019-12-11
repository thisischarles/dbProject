<?php
include('../System/Header.php');
if(isset($_GET['Event'])) {
	$_SESSION['EventID'] = $_GET['Event'];
}
//Mario Bastiampillai 40016804 
$groupinfo = $db->query("SELECT * from Events where EventID = ".$_SESSION['EventID'].";");
$row = mysqli_fetch_array($groupinfo);
echo "
<table>
    <tr valign='top' width='100%'>
        <td width='88%'>
            <h1>
               ".$row['Name']."
            </h1>
            <h2>
		".$row['Description']."
            </h2>
            <h2>
    <button class='button' onClick='openPostContentForm()'>Post Content</button>
</h2>
            <h3>
                Past Posts
";
	
	$result1 = $db->query("SELECT PostID from HasAPost where EventID = ".$_SESSION['EventID'].";");
	while($row2 = mysqli_fetch_array($result1)){
		echo "<table border='1'>";
		$GID = $_SESSION['GroupID'];
		$PID = $row2['PostID'];
		$result4 = $db->query("SELECT * from Post where PostID = $PID;");
		$row4 = mysqli_fetch_array($result4);	
		$row5 = mysqli_fetch_array($db->query("SELECT Username from User where UserID = ".$row4['Author'].";"));	
	    	echo "<tr>";
			echo "<th>By:</th>";
			echo "<td>".$row5['Username']."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Text:</th>";
			echo "<td>".$row4['Words']."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Media: </th>";
			echo "<td><img src='".$row4['Media']."'></td>";
		echo "</tr>";
		while(true) {	
			$r = $db->query("SELECT * from HasComment where PostID = $PID;");	
			if(mysqli_num_rows($r) >= 1) {
				while($row6 = mysqli_fetch_array($r)) {
					$row7 = mysqli_fetch_array($db->query("SELECT * from Post where PostID = ".$row6['CommentID'].";"));
					$row8 = mysqli_fetch_array($db->query("SELECT Username from User where UserID = ".$row7['Author'].";"));
					echo "<tr>";
						echo "<th></th>";
						echo "<th>By:</th>";
						echo "<td>".$row8['Username']."</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<th></th>";
						echo "<th>Text:</th>";
						echo "<td>".$row7['Words']."</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<th></th>";
						echo "<th>Media: </th>";
						echo "<td><img src='".$row7['Media']."'></td>";
					echo "</tr>";
					$PID = $row6['CommentID'];
				}
			}
			else { break;}
	}
	echo "</table>";
	}
	



	echo "</h3>
        </td>
        <td align='right'>
            <h4>
";
	echo "<table border='1'>";
            echo "<tr >";
		echo "<th align='left'><h3><font color='grey'>Participants</font></h3></th>";
            echo "</tr> ";
	$result1 = $db->query("SELECT UserID from EventParticipant where EventID = ".$_SESSION['EventID'].";");
	while($row2 = mysqli_fetch_array($result1)){
		$GID = $_SESSION['EventID'];
		$UID = $row2['UserID'];
	    	echo "<tr>";
		$url = "../User/Profile.php?UID=".$UID;
		$result4 = $db->query("SELECT FirstName, LastName from User where UserID = $UID;");
		$row4 = mysqli_fetch_array($result4);			
		echo "<td><a href='$url'>".$row4['FirstName']." ".$row4['LastName']."</a></td>";
		echo "<td><button class='button' onClick='openMessageForm(".'"'.$row4['FirstName']." ".$row4['LastName'].'","'.$UID.'"'.")'>Message</button></td>";		
		echo "</tr>";
	}
	echo "</table>";
?>
            </h4>
        </td>
    </tr>
</table>

<div class="form-popup" id="MessageForm">
    <form Class="form-container" enctype="multipart/form-data">
	<h3>To:</h3>
	<div id="Recipient"></div>
	<h3>Message:</h3>
        <input type="text" placeholder="Enter your message here." name="message" id="message" required>
        <button type="submit"  class="submitButton" name="send">Send</button>
        <button class="closeButton" onClick="closeMessageForm()">Cancel</button>
    </form>
</div>

<div class="form-popup" id="PostContentForm">
    <form Class="form-container">
        <h1>Post Content</h1>
        <br><br><br>
        <label for="PostContent"><b>Post</b></label>
        <br>
        <input type="text" rows="4" placeholder="Enter Content" name="content" required>
        <br>
        <input name="img" type="file" onchange="previewFile()"><br>
        <img id="preview" src="" height="200" alt="Image preview...">
        <br><br>
        <button type="submit" class="submitButton" name="posted">Submit</button>
        <button class="closeButton" onClick="closePostContentForm()">Cancel</button>
    </form>
</div>

<?php
if(isset($_GET['posted'])) {
	 // Retrieving each selected option 
		$date = (new DateTime())->format('Y/m/d H:i:s');
		$c = $_GET['content'];
		$i = $_GET['img'];
		$db->query("insert into Post (Words, Author, Duration, Deleted, Media) values ('$c', $id, '$date', false,'$i');");
		$result1 = $db->query("Select @@identity;");
	       	$row = $result1->fetch_assoc();
		$db->query("insert into HasAPost (PostID, EventID) values (".$row['@@identity'].", ".$_SESSION['EventID'].");");
	}
if(isset($_GET['send'])) {
	$db->query("INSERT INTO Messages (Sender, Message, New, MessageStatusID) VALUES ($id, '".$_GET['message']."', 0, 1);");
	$result1 = $db->query("Select @@identity;");
        $row = $result1->fetch_assoc();
	$db->query("insert into Recipient (MessageID, Recipient) values (".$row['@@identity'].", ".$_GET['uidholder'].");");
}

echo "<script src='Event.js'></script>";
include('../System/Footer.php');
?>
