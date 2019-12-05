<?php
include('Header.php');
?>
    <link rel="stylesheet" href="design.css"/>
    <div class="content">
        <form id="form" action="check_login.php" method="post">
            <h2>Sign In</h2>
            <input required type="text" name="user_name" placeholder="User name or Email">
            <br><br>
            <input required id="password" type="password" name="user_pass" placeholder="Password"><br><br>
            <button type="submit" class="submitButton">Log in</button>
    
        </form>
	<?php if (isset($_GET["problem"]))
        	echo "<div><strong>Error!</strong>" . $_GET["problem"] . "</div>";
    	?>
        <button class="button" onclick="openSignUpForm()">Sign Up</button>
    </div>
<br> <!--
    <button ><a href="../Controller/Controller.php">Controller</a></button>
    <button><a href="../Event/Event.php">Event</a></button>
    <button><a href="../Event_Admin/Homepage.php">Event Admin</a></button>
    <button><a href="../Event_Manager/Homepage.php">Event Manager</a></button>
    <button><a href="../Group/Group_Page.php">Group</a></button>
    <button><a href="../System_Admin/SystemAdmin.php">System Admin</a></button>
    <button><a href="../User/HomePage.php">User</a></button>
    <button><a href="../User/Profile.php">Profile</a></button>
    <br><br>
-->
    <div class="form-popup" id="SignUpForm">
        <form id="SignUpForm" method="post">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <br>
            <label for="email"><b>Email</b></label>
            <br>
            <input type="text" placeholder="Enter Email" name="email" required>
            <br>
            <label for="psw"><b>Password</b></label>
            <br>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <br>
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <br>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            <br>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            <div>
                <button type="submit" class="submitButton">Submit</button>
                <button class="closeButton" onClick="closeSignUpForm()">Cancel</button>
            </div>
        </form>
	
    </div>
    <script>
        function openSignUpForm()
        {
            document.getElementById("SignUpForm").style.display="block";
        }
        function closeSignUpForm()
        {
            document.getElementById("SignUpForm").style.display="none";
        }
    </script>
<?php
include('Footer.php');


?>
