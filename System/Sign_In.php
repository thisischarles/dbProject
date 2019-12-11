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
<br>
    <div class="form-popup" id="SignUpForm">
        <form id="SignUpForm" method="post">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <br>
	    <label for = "firstname"><b>First Name</b></label>
	 	<br>
            <input type="text" placeholder="Enter first name" name="FN" required><br>
	    <label for = "name"><b>Last Name</b></label><br>
            <input type="text" placeholder="Enter last name" name="LN" required><br>	
            <label for="email"><b>Email</b></label><br>
            <input type="text" placeholder="Enter Email" name="email" required><br>
	    <label for = "address"><b>Address</b></label><br>
            <input type="text" placeholder="Enter address" name="add" required><br>
            <br>
	    <label for "DOB"><b>DOB(YYYY-MM-DD)</b></label><br>
            <input type="date" placeholder="Enter DOB" name="DOB" required><br>
	    <label for "Username"><b>Username</b></label><br>
            <input type="text" placeholder="Enter unique username" name="username" required><br>
            <label for="psw"><b>Password</b></label>
            <br>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <br>
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <br>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
<?php
		$FN = $_POST['FN'];
		$LN = $_POST['LN'];
		$Email = $_POST['email'];
		$Address = $_POST['add'];
		$DOB = $_POST['DOB'];
		$Username = $_POST['Username'];
		$Password = $_POST['psw'];
		$checkPass = $_POST['psw-repeat'];
		if($db->query("SELECT * FROM User WHERE Username = '$Username';")){
			echo("<br>");
			echo("Username already taken!");
		}
		else{
			if($Password == $checkPass){
				if($db->query("INSERT INTO User(FirstName, LastName, Email, Address, DOB, Username, Password) VALUES ('$FN', '$LN', '$Email', '$Address', '$DOB', '$Username', '$Password');")){
					echo("<br>");					
					echo("User created!");
				}
			}
			else{
				echo("<br>");
				echo("Passwords do not match") 	;
			}
		}
?>
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
