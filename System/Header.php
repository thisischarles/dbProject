<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../sql_connector.php');
?>
<link rel="stylesheet" href="../design.css">
<table width="100%" class="header-bg">
    <tr>
        <th align="left"><a href="Homepage.php"><img padding-bottom="0" src="../Images/Logo-Transparent-BG.png" alt="Logo" width="15%"></a></th>
        <?php if (!isset($_SESSION['auth'])) {
            echo '<th align="right"><a href="Sign_In.php">Sign Up/Sign In</a></th>';
        }
        else {
            $id = $_SESSION['user_id'];
            if (mysqli_num_rows($db->query("SELECT * from SystemAdministrator where UserID = $id;")) == 1)
                echo "<a href=\"System_Admin/SystemAdmin.php\">System Admin</a>   ";
            if (mysqli_num_rows($db->query("SELECT * from Controller where UserID = $id;")) == 1)
                echo "<a href=\"Controller/Controller.php\">Controller</a>  ";
            if (mysqli_num_rows($db->query("SELECT * from EventManager where UserID = $id;")) == 1)
                echo "<a href=\"Event_Manager/Homepage.php\">Event Manager</a>   ";
            if (mysqli_num_rows($db->query("SELECT * from EventAdministator where UserID = $id;")) == 1)
                echo "<a href=\"Event_Admin/Homepage.php\">Event Admin</a>  ";
            echo "Welcome " . $_SESSION['user_name'] . "  <a href='LogOff.php'>Log Off</a>";
        }
        ?>
    </tr>
</table>