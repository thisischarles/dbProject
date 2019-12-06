<?php
@session_start(); 
include('../sql_connector.php');
?>
<link rel="stylesheet" href="../design.css">
<table width="100%" class="header-bg">
    <tr>
        <th align="left"><a href="Homepage.php"><img padding-bottom="0" src="../Images/Logo-Transparent-BG.png" width="200px" alt="Logo"></a></th>
        <?php if (!isset($_SESSION['auth'])) {
            echo '<th id="login" align="right"><a href="Sign_In.php">Sign In/Up</a></th>';
		echo "<script>login();</script>";
        }
        else {
            $id = $_SESSION['user_id'];
            if (mysqli_num_rows($db->query("SELECT * from SystemAdministrator where UserID = $id;")) >= 1)
                echo "<th align='right'><a href=\"../System_Admin/Homepage.php\">System Admin</a></th>";
            if (mysqli_num_rows($db->query("SELECT * from Controller where UserID = $id;")) >= 1)
                echo "<th align='right'><a href=\"../Controller/Controller.php\">Controller</a></th>";
            if (mysqli_num_rows($db->query("SELECT * from EventManager where UserID = $id;")) >= 1)
                echo "<th align='right'><a href=\"../Event_Manager/Homepage.php\">Event Manager</a></th>";
            if (mysqli_num_rows($db->query("SELECT * from EventAdministator where UserID = $id;")) >= 1)
                echo "<th align='right'><a href=\"../Event_Admin/Homepage.php\">Event Admin</a></th>";
	    echo "<th align='right'><a href='../User/Profile.php'>Profile</a></th>";
		echo "<script>login();</script>";
            echo "<th align='right'>Welcome " . $_SESSION['user_name'] . "<br><div id='logoff'> <a href='LogOff.php'>Log Off</a></div></th>";
        }
        ?>
    </tr>
</table>
<script src="System.js"></script>	
