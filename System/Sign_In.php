<?php
include('Header.php');
?>
    <div class="content">
        <form id="form" action="check_login.php" method="post">
            <h2>Sign In</h2>
            <input required type="text" name="user_name" placeholder="User name or Email">
            <br><br>
            <input required id="password" type="password" name="user_pass" placeholder="Password"><br><br>
            <div style="padding-bottom: 25px;">
                <input style="display: block; margin:0 auto;" id="sub" type="submit" name="submitform" value="Log In">
            </div>
            <a href="forgot_pwd.php">Forgot password?</a>
            <br><br>
            <button><a href="Sign_Up.php">Sign Up</a></button>
            <br><br>
        </form>
    </div>
<?php
include('Footer.php');
?>